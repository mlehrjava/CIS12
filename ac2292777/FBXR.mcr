/*
	FBXR
	Author: Albert Carrete	
	Website: www.albertcarrete.com
*/
macroScript FBXR
buttonText:"FBXR"
category:"Custom"
tooltip:"FBXR"
(
	global mopUDKFBXRDialog
	
		-- Function to create an INI file and store settings.
	fn setINISettings =
	(
		local ini = (sysInfo.currentdir +"/fbxr-settings.ini")
		
		local pos = getDialogPos mopUDKFBXRDialog
		-- version of the FBXR
		setINISetting ini "fbxrUDK" "version" "1.3"
		--Position of the dialog box as gathered from local pos
		setINISetting ini "fbxrUDK" "xPos" ( pos.x as string )
		setINISetting ini "fbxrUDK" "yPos" ( pos.y as string )
		setINISetting ini "fbxrUDK" "fileType" ( mopUDKFBXRDialog.fileType.selection as string )
		-- Folder to meshes
		setINISetting ini "fbxrUDK" "sourceFolder" mopUDKFBXRDialog.folderString.text

	)
	
	-- Function to get ini settings
	fn getINISettings =
	(
		local ini = (sysInfo.currentdir + "/fbxr-settings.ini")
		
		if getINISetting ini "fbxrUDK" "version" == "1.3" then(
		)
		
		-- Sets a local variable so we can transfer it to the correct property
		local xPos = getINISetting ini "fbxrUDK" "xPos"
		local yPos = getINISetting ini "fbxrUDK" "yPos"
		
			if xPos != "" and yPos != "" then
			(
				local pos = [ xPos as float, yPos as float ]
				setDialogPos mopUDKFBXRDialog pos
			)
			
		local fileType = getINISetting ini "fbxrUDK" "fileType"
			if fileType != "" then
				mopUDKFBXRDialog.fileType.selection = fileType as integer		
				
		mopUDKFBXRDialog.folderString.text = getINISetting ini "fbxrUDK" "sourceFolder"
		mopUDKFBXRDialog.fileFilterString.text = getINISetting ini "fbxrUDK" "fileFilterString"
		
	)
	
	
		-- Checks if you navigated to a valid folder then displays the files
	fn getFileList =
	(
		local objPath = mopUDKFBXRDialog.folderString.text
		local fileType = "OBJ"
		if mopUDKFBXRDialog.fileType.selection == 2 then
			fileType = "FBX"
		
		if doesFileExist objPath then
		(
			local filterExp = mopUDKFBXRDialog.fileFilterString.text
			local files = getFiles ( objPath + "\\*." + fileType )
			if files.count > 0 then
			(
				local contents = "" as stringStream
				if files.count == 1 then
					format "Folder contains 1 % file." fileType to:contents
				else
					format "Folder contains % % files." files.count fileType to:contents
				mopUDKFBXRDialog.folderContents.text = ( contents as string )
				local objNames = #()
				for f in files do
				(
					local fileName = filenameFromPath f
					if filterExp == "" or filterExp == "*" or findString fileName filterExp != undefined then
					(
						append objNames fileName
					)
				)
				mopUDKFBXRDialog.fileList.items = objNames
				mopUDKFBXRDialog.import.enabled = true
			)
			else
			(
				local contents = "" as stringStream
				format "Folder contains no % files." fileType to:contents
				mopUDKFBXRDialog.folderContents.text = contents
				mopUDKFBXRDialog.fileList.items = #()
				mopUDKFBXRDialog.import.enabled = false
			)
		)
		else
		(
			mopUDKFBXRDialog.folderContents.text = "WARNING: Path not found!"
		)
	)
	
	
		-- Get and store keys / transforms on an object.
	fn getNodeKeys obj =
	(
		local transformData = #()
		
		local positionKeys = numKeys obj.position.controller
		local rotationKeys = numKeys obj.rotation.controller
		local scaleKeys = numKeys obj.scale.controller
		
		if positionKeys == 0 and rotationKeys == 0 and scaleKeys == 0 then
		(
			transformData[ 1 ] = #( undefined, obj.transform )
		)
		
		else
		(
			local keys = #()
			local currTime = currentTime
			
			-- Position keys.
			if positionKeys != 0 then
			(
				for i = 1 to positionKeys do
				(
					local keyTime = getKeyTime obj.position.controller i
					sliderTime = keyTime
					append keys keyTime
					append transformData #( keyTime, obj.transform )
				)
			)
			
			-- Rotation keys.
			if rotationKeys != 0 then
			(
				for i = 1 to rotationKeys do
				(
					local keyTime = getKeyTime obj.rotation.controller i
					if findItem keys keyTime != 0 then (
						sliderTime = keyTime
						append keys keyTime
						append transformData #( keyTime, obj.transform )
					)
				)
			)
			
			-- Scale keys.
			if scaleKeys != 0 then
			(
				for i = 1 to scaleKeys do
				(
					local keyTime = getKeyTime obj.scale.controller i
					if findItem keys keyTime != 0 then (
						sliderTime = keyTime
						append keys keyTime
						append transformData #( keyTime, obj.transform )
					)
				)
			)
			
			sliderTime = currTime
		)
		
		transformData
	)
	
	-- Function to apply stored keys / transforms to an object.
	fn setNodeKeys keyData obj =
	(
		-- If the object had no keyframes.
		if keyData[ 1 ][ 1 ] == undefined then
		(
			obj.transform = keyData[ 1 ][ 2 ]
		)
		
		-- If we need to process keyframes.
		else
		(
			with animate on
			(
				for i = 1 to keyData.count do
				(
					at time keyData[ i ][ 1 ] obj.transform = keyData[ i ][ 2 ]
				)
			)
		)
	)
	
	-- Function to import an OBJ file.
	fn importObject fileName =
	(
		-- Check if the GuruWare OBJ importer is available.
		local plugins = importerPlugin.classes
		local pluginName = Wavefront_Object
		if findItem plugins ObjImp != 0 then pluginName = ObjImp
		
		if mopMultiOBJDialog.fileType.selection == 2 then
			pluginName = FBXIMP
			
		-- Delete old object if requested, but store the material first.
		local node = getFilenameFile fileName
		local obj = execute ( "$'"+ node + "'" )
		local mtl = undefined
		local layer
		local keyData = #()
		
		-- If overwriting scene objects, store some info...
		if mopUDKFBXRDialog.overwrite.state then
		(
			local reassign = false
			if IsValidNode obj then
			(
				mtl = obj.material
				layer = obj.layer
				keyData = getNodeKeys obj
				delete obj
				reassign = true
			)			
			
			importFile ( mopUDKFBXRDialog.folderString.text + "\\" + fileName ) #noPrompt using:pluginName
			
			-- Reassign material, layer and transform data.
			obj = execute ( "$'"+ node + "'" )
			if IsValidNode obj and reassign == true then (
				if mtl != undefined then obj.material = mtl
				layer.addNode obj
				if keyData.count != 0 then setNodeKeys keyData obj
			)
		)

		-- Vanilla import.
		else importFile ( mopUDKFBXRDialog.folderString.text + "\\" + fileName ) #noPrompt using:pluginName
		
		max select none
	)
	
	-- Function to export selected objects to separate OBJ files.
	fn exportObj =
	(
		local objPath = mopUDKFBXRDialog.folderString.text
		if doesFileExist objPath then
		(
			-- Check if the GuruWare OBJ exporter is available.
			local plugins = exporterPlugin.classes
			local pluginName = Wavefront_ObjectExporterPlugin
			local extension = "obj"
			if findItem plugins ObjExp != 0 then pluginName = ObjExp
			
			if mopUDKFBXRDialog.fileType.selection == 2 then
			(
				pluginName = FBXEXP
				extension = "fbx"
			)
			
			local exportArray = #()
			
			for obj in selection do append exportArray obj
			
			for obj in exportArray do
			(
				-- Store and set object and layer visibility.
				local nodeHidden = obj.isNodeHidden
				local layerHidden = obj.layer.isHidden
				obj.isNodeHidden = false
				obj.layer.isHidden = false
				
				local position = obj.position
				local moveToZero = mopUDKFBXRDialog.moveToZero.state
				if moveToZero then
				(
					obj.position = [0,0,0]
				)
				
				select obj

				--SET FBX EXPORT SETTINGS
				--LOADS THE AUTODESK MEDIA & ENTERTAINMENT EXPORT PRESET.
				--FBXExporterSetParam "ResetExport"
				--FBXExporterSetParam "PopSettings"
				--FBXExporterSetParam "PushSettings"
				FBXExporterSetParam "Animation" false
				FBXExporterSetParam "ASCII" false
				FBXExporterSetParam "AxisConversionMethod" #none
				FBXExporterSetParam "BakeAnimation" true
				--NOTE THAT FBX EXPORTS ALL KEY FRAMES WHETHER THEY ARE BAKED OR NOT
				FBXExporterSetParam "BakeFrameStart" animationRange.start
				FBXExporterSetParam "BakeFrameEnd" animationRange.end
				FBXExporterSetParam "BakeFrameStep" 1
				FBXExporterSetParam "BakeResampleAnimation" true
				FBXExporterSetParam "Cameras" false
				FBXExporterSetParam "CAT2HIK" false
				FBXExporterSetParam "ColladaTriangulate" false
				FBXExporterSetParam "ColladaSingleMatrix" false
				FBXExporterSetParam "ColladaFrameRate" frameRate
				FBXExporterSetParam "Convert2Tiff" false
				FBXExporterSetParam "ConvertUnit" "m"
				FBXExporterSetParam "EmbedTextures" false
				FBXExporterSetParam "FileVersion" "FBX201300"
				FBXExporterSetParam "FilterKeyReducer" false
				FBXExporterSetParam "GeomAsBone" true
				FBXExporterSetParam "GenerateLog" false
				FBXExporterSetParam "Lights" false
				FBXExporterSetParam "NormalsPerPoly" false
				FBXExporterSetParam "PointCache" false
				FBXExporterSetParam "Preserveinstances" false
				FBXExporterSetParam "Removesinglekeys" false
				FBXExporterSetParam "Resampling" 30.0
				FBXExporterSetParam "ScaleFactor" 1.0
				FBXExporterSetParam "SelectionSetExport" false
				--FBXExporterSetParam "SelectionSet" 
				FBXExporterSetParam "Shape" false
				FBXExporterSetParam "Skin" true
				FBXExporterSetParam "ShowWarnings" false
				FBXExporterSetParam "SmoothingGroups" true
				FBXExporterSetParam "SmoothMeshExport" false
				FBXExporterSetParam "TangentSpaceExport" false
				FBXExporterSetParam "Triangulate" true
				FBXExporterSetParam "UpAxis" "Y"
				FBXExporterSetParam "UseSceneName" false

				exportFile ( objPath + "\\" + obj.name + "." + extension ) #noPrompt selectedOnly:true using:pluginName
				
				if moveToZero then
				(
					obj.position = position
				)
				
				obj.isNodeHidden = nodeHidden
				obj.layer.isHidden = layerHidden
			)
			
			select exportArray
		)
		else
		(
			mopUDKFBXRDialog.folderContents.text = "WARNING: Path not found!"
			messageBox "Source folder does not exist!" title:"Error"
		)
	)
	
    fn exportMultiObj = 
	(
	local objPath = mopUDKFBXRDialog.folderString.text
		if doesFileExist objPath then
		(
			-- Check if the GuruWare OBJ exporter is available.
			local plugins = exporterPlugin.classes
			local pluginName = Wavefront_ObjectExporterPlugin
			local extension = "obj"
			if findItem plugins ObjExp != 0 then pluginName = ObjExp
			
			if mopUDKFBXRDialog.fileType.selection == 2 then
			(
				pluginName = FBXEXP
				extension = "fbx"
			)
			
			local exportArray = #()
			local storagePosition = #()
			for obj in selection do append exportArray obj
			local i = 1;
			for obj in exportArray do
			(
				storagePosition[i] = obj.position
				local position = obj.position
				local moveToZero = mopUDKFBXRDialog.moveToZero.state
				if moveToZero then
				(
					obj.position = [0,0,0]
				)
				i+=1
			)
				select exportArray

				--SET FBX EXPORT SETTINGS
				--LOADS THE AUTODESK MEDIA & ENTERTAINMENT EXPORT PRESET.
				--FBXExporterSetParam "ResetExport"
				--FBXExporterSetParam "PopSettings"
				--FBXExporterSetParam "PushSettings"
				FBXExporterSetParam "Animation" false
				FBXExporterSetParam "ASCII" false
				FBXExporterSetParam "AxisConversionMethod" #none
				FBXExporterSetParam "BakeAnimation" true
				--NOTE THAT FBX EXPORTS ALL KEY FRAMES WHETHER THEY ARE BAKED OR NOT
				FBXExporterSetParam "BakeFrameStart" animationRange.start
				FBXExporterSetParam "BakeFrameEnd" animationRange.end
				FBXExporterSetParam "BakeFrameStep" 1
				FBXExporterSetParam "BakeResampleAnimation" true
				FBXExporterSetParam "Cameras" false
				FBXExporterSetParam "CAT2HIK" false
				FBXExporterSetParam "ColladaTriangulate" false
				FBXExporterSetParam "ColladaSingleMatrix" false
				FBXExporterSetParam "ColladaFrameRate" frameRate
				FBXExporterSetParam "Convert2Tiff" false
				FBXExporterSetParam "ConvertUnit" "m"
				FBXExporterSetParam "EmbedTextures" false
				FBXExporterSetParam "FileVersion" "FBX201300"
				FBXExporterSetParam "FilterKeyReducer" false
				FBXExporterSetParam "GeomAsBone" true
				FBXExporterSetParam "GenerateLog" false
				FBXExporterSetParam "Lights" false
				FBXExporterSetParam "NormalsPerPoly" false
				FBXExporterSetParam "PointCache" false
				FBXExporterSetParam "Preserveinstances" false
				FBXExporterSetParam "Removesinglekeys" false
				FBXExporterSetParam "Resampling" 30.0
				FBXExporterSetParam "ScaleFactor" 1.0
				FBXExporterSetParam "SelectionSetExport" false
				--FBXExporterSetParam "SelectionSet" 
				FBXExporterSetParam "Shape" false
				FBXExporterSetParam "Skin" true
				FBXExporterSetParam "ShowWarnings" false
				FBXExporterSetParam "SmoothingGroups" true
				FBXExporterSetParam "SmoothMeshExport" false
				FBXExporterSetParam "TangentSpaceExport" false
				FBXExporterSetParam "Triangulate" true
				FBXExporterSetParam "UpAxis" "Y"
				FBXExporterSetParam "UseSceneName" false

				exportFile ( objPath + "\\" +"boomba" + "." + extension ) #noPrompt selectedOnly:true using:pluginName
				
				local moveToZero = mopUDKFBXRDialog.moveToZero.state
			
				if moveToZero then
					(
						local i = 1
					for obj in exportArray do
						(					
						obj.position = storagePosition[i]
							i+=1
						)			
					)
			select exportArray
		)
		else
		(
			mopUDKFBXRDialog.folderContents.text = "WARNING: Path not found!"
			messageBox "Source folder does not exist!" title:"Error"
		)	
		

		
	)

	fn exportUCX = 
	(
	local objPath = mopUDKFBXRDialog.folderString.text
		if doesFileExist objPath then
		(
			-- Check if the GuruWare OBJ exporter is available.
			local plugins = exporterPlugin.classes
			local pluginName = Wavefront_ObjectExporterPlugin
			local extension = "obj"
			if findItem plugins ObjExp != 0 then pluginName = ObjExp
			
			if mopUDKFBXRDialog.fileType.selection == 2 then
			(
				pluginName = FBXEXP
				extension = "fbx"
			)
			
		

			
			objName = selection[1].name
			
				messageBox ("Selected "+objName)			
				selectedObjects = #()
				
			-- Find Collision Meshes
			local count = 1
			local numCollision = 1
			selectedObjects[count] = getNodeByName (objName)
			count+=1
			do
			(
				local objectInstance = numCollision as string
			
				if getNodeByName ("UCX_"+objName+"_"+objectInstance) !=undefined then
				(
				selectedObjects[count] = getNodeByName ("UCX_"+objName+"_"+objectInstance)
				count +=1
				numCollision+=1
				)
				else
				count +=100
			)
			while count < 50
			
			select selectedObjects
			
				--a = getNodeByName ("UCX_"+objName+"_1")
				--select a
			local exportArray = #()
			local storagePosition = #()
			for obj in selection do append exportArray obj
			local i = 1;
			for obj in exportArray do
			(
				storagePosition[i] = obj.position
				local position = obj.position
				local moveToZero = mopUDKFBXRDialog.moveToZero.state
				if moveToZero then
				(
					obj.position = [0,0,0]
				)
				i+=1
			)
				select exportArray

				--SET FBX EXPORT SETTINGS
				--LOADS THE AUTODESK MEDIA & ENTERTAINMENT EXPORT PRESET.
				--FBXExporterSetParam "ResetExport"
				--FBXExporterSetParam "PopSettings"
				--FBXExporterSetParam "PushSettings"
				FBXExporterSetParam "Animation" false
				FBXExporterSetParam "ASCII" false
				FBXExporterSetParam "AxisConversionMethod" #none
				FBXExporterSetParam "BakeAnimation" true
				--NOTE THAT FBX EXPORTS ALL KEY FRAMES WHETHER THEY ARE BAKED OR NOT
				FBXExporterSetParam "BakeFrameStart" animationRange.start
				FBXExporterSetParam "BakeFrameEnd" animationRange.end
				FBXExporterSetParam "BakeFrameStep" 1
				FBXExporterSetParam "BakeResampleAnimation" true
				FBXExporterSetParam "Cameras" false
				FBXExporterSetParam "CAT2HIK" false
				FBXExporterSetParam "ColladaTriangulate" false
				FBXExporterSetParam "ColladaSingleMatrix" false
				FBXExporterSetParam "ColladaFrameRate" frameRate
				FBXExporterSetParam "Convert2Tiff" false
				FBXExporterSetParam "ConvertUnit" "m"
				FBXExporterSetParam "EmbedTextures" false
				FBXExporterSetParam "FileVersion" "FBX201300"
				FBXExporterSetParam "FilterKeyReducer" false
				FBXExporterSetParam "GeomAsBone" true
				FBXExporterSetParam "GenerateLog" false
				FBXExporterSetParam "Lights" false
				FBXExporterSetParam "NormalsPerPoly" false
				FBXExporterSetParam "PointCache" false
				FBXExporterSetParam "Preserveinstances" false
				FBXExporterSetParam "Removesinglekeys" false
				FBXExporterSetParam "Resampling" 30.0
				FBXExporterSetParam "ScaleFactor" 1.0
				FBXExporterSetParam "SelectionSetExport" false
				--FBXExporterSetParam "SelectionSet" 
				FBXExporterSetParam "Shape" false
				FBXExporterSetParam "Skin" true
				FBXExporterSetParam "ShowWarnings" false
				FBXExporterSetParam "SmoothingGroups" true
				FBXExporterSetParam "SmoothMeshExport" false
				FBXExporterSetParam "TangentSpaceExport" false
				FBXExporterSetParam "Triangulate" true
				FBXExporterSetParam "UpAxis" "Y"
				FBXExporterSetParam "UseSceneName" false

				exportFile ( objPath + "\\" +objName + "." + extension ) #noPrompt selectedOnly:true using:pluginName
				
				local moveToZero = mopUDKFBXRDialog.moveToZero.state
			
				if moveToZero then
					(
						local i = 1
					for obj in exportArray do
						(					
						obj.position = storagePosition[i]
							i+=1
						)			
					)
			select exportArray
			)
		else
		(
			mopUDKFBXRDialog.folderContents.text = "WARNING: Path not found!"
			messageBox "Source folder does not exist!" title:"Error"
		)	
		

		
	)
	
	
	
	
		-- Close the dialog if it already exists.
	if mopUDKFBXRDialog != undefined then destroyDialog mopUDKFBXRDialog
	-- Set up the import rollout.
	local width = 300
	local margin = 7
	local doubleMargin = margin * 2
	local full = width - doubleMargin
	local half = full/2
	
	
	rollout mopUDKFBXRDialog "FBXR"
	(
		bitmap the_bmp fileName:"fbxr-logo.jpg" height:75
		label     Lbl1 "Version1.30"
		label     Lbl2 "\xA9 2013 Albert Carrete"
		hyperlink Lbl3 "http://www.albertcarrete.com/" \
					address:"http://www.albertcarrete.com" align:#center \
					color:black hovercolor:blue visitedcolor:black

		
		group "File type" (
		--label fileTypeText "Format:" height:20 width:400 across:2 align:#left
		dropDownList fileType width:275 height:20 items:#( "Wavefront OBJ (*.OBJ)", "Autodesk (*.FBX)" ) tooltip:"File types to list, import and export"

		)
		group  "Source folder" (
		editText folderString "" text:"Browse for folder..." width:240 height:18 across:2 readOnly:true
		button browseBtn "..."  width:22 height:18 toolTip:"Browse for source folder..." align:#right
		label folderContents "No files found."  align:#left
		)
		group "Files"(
		editText fileFilterString "Filter: " text:"" width:207 height:18 readOnly:false
		multiListBox fileList  width:( full - doubleMargin ) height:18
		button refresh "Refresh file list" width:( full - doubleMargin ) height:24 enabled:true toolTip:"Scan the source folder for an updated file list"
		)	
			
		checkbox overwrite "Replace existing scene object(s)"  checked:false toolTip:"Sets things right "
		checkbox moveToZero "Move objects to 0,0,0 when exporting"  checked:false
		
		button import "Import" width:half height:25 across:2 enabled:false toolTip:"Import selected files"
		button export "Export"  width:half height:25 toolTip:"Export selected files to OBJs using the object name as the file name"
		button exportMulti "Export Multi Mesh"  width:full height:25 toolTip:"Export Selected Meshes into Single File"
		button exportCollision "Export with Collision" width:full height:25 toolTip:"Export Object with Collision" bgcolor:(color 235 235 235)

		-- Change the file type.
		on fileType selected fileTypeVal do
		(
			getFileList()
		)
		
		-- Select a folder.
		on browseBtn pressed do
		(
			local objPath = folderString.text
			if doesFileExist objPath then
			(
				objPath = getSavePath initialDir:objPath
			)
			else objPath = getSavePath()
			if objPath != undefined then
				folderString.text = objPath
			getFileList()
		)
		
		-- Filter the file list when filter string changes.
		on fileFilterString changed filterExp do
		(
			getFileList()
		)
		
		-- Refresh the file list.
		on refresh pressed do
		(
			getFileList()
		)
		
		-- Import one OBJ if double-clicked in the list.
		on fileList doubleclicked o do with redraw off
		(
			importObject fileList.items[ o ]
		)
			
		-- Import button.
		on import pressed do with redraw off
		(
			for i = 1 to fileList.items.count do
			(
				if fileList.selection[ i ] then importObject fileList.items[ i ]
			)
		)
		
		-- Export button.
		on export pressed do
		(
			if selection.count > 0 then exportObj()
			else messageBox "No objects selected!" title:"Error"
			getFileList()
		)
		on exportMulti pressed do
		(
			exportMultiObj()
			getFileList()
		)
		on exportCollision pressed do
		(
			exportUCX()
			getFileList()
		)	
		
		-- Dialog open.
		on mopUDKFBXRDialog open do
		(
			getINISettings()
			getFileList()
		)
		
		-- Dialog close.
		on mopUDKFBXRDialog close do
		(
			setINISettings()
		)
	)
	--Syntax for creating a dialog: CreateDialog <Rollout> [<height> <width> <position_x> <position_y>]\
	createDialog mopUDKFBXRDialog width:width height:725 lockHeight:true lockWidth:true 
)