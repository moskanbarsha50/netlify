<?php 
	// First of all i have to check if i am receiving
	// the superglobal $_FILES
	if(isset($_FILES['files'])){
		// If so, then i have to set the uploads path.
		$folder = "";
		// The $_FILES variable holds a multidimensional array.
		// That means that each image property is an array.
		// In order to store the images in our folder, i need
		// the image name, and the temporary stored location.
		$names = $_FILES['files']['name']; // The $names variable will hold an array
		// of the images names;
		$tmp_names = $_FILES['files']['tmp_name']; // And the $tmp_names holds
		// an array of the tempory locations where the images were uploaded.

		// Next i need to combine those two arrays into one,
		// so i can loop trough and move the files to the uploads folder.
		$upload_data = array_combine($tmp_names, $names);
		// Now this is important. 
		// The array_combine function returns an associative array, 
		// where the keys are the items of the first argument,
		// and the values are the items of the second argument.
		// So the order of the arguments matters.
highlight_string("<?php " . var_export($upload_data, true) . ";?>");
		// Next i will loop trhiugh our new array, and move every file
		// to the uploads folder.
		foreach ($upload_data as $temp_folder => $file) {
			move_uploaded_file($temp_folder, $folder.$file);
		}

	}		; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Uploading multiple files</title>
</head>
<body>
	
	<!-- Upload form -->
	<form action="" method="post" enctype="multipart/form-data">
		<h1> Select the files you want to upload </h1>
		<input type="file" name="files[]" multiple >

		<button type="submit" name="upload">Upload files</button>
	</form>
	
<br>
<h3>POWERED BY MARUF</h3>
<style>*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body{
	font-family: sans-serif;
	min-height: 100vh;
	color: #555;
}

.display-uploads{
	min-height: 300px;
	background-color: #f4f4f4;
	padding: 20px;
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
	grid-column-gap: 20px;
	grid-row-gap: 20px;
}

.image-wrap{
	background-color: #fff;
}
.image-wrap p{
	padding: 5px 10px;
}

.display-uploads img{
	margin-bottom: 10px;
	width:  100%;
}

form{
	margin-top: 50px;
	padding: 20px;
	border: thin solid #e4e4e4;
}

h1{
	margin-bottom: 30px;	
}

input, button{
	display:  block;
	font-size: 16px;
}

input[type=file]{
	margin-bottom: 30px;
}

form button{
	padding: 10px 25px;
	background-color: #4e82b8;
	border:  none;
	color: white;
	cursor: pointer;
}

form button:active{
	background-color: #4eb84e;
}</style>
</body>
</html>