<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
	<title></title>
	<meta name="generator" content="Bluefish 2.2.12" >
	<meta name="author" content="Eliott" >
	<meta name="date" content="2022-02-16T13:38:09+0100" >
	<meta name="copyright" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="expires" content="0">
	<link href="./CSS/app.css" rel="stylesheet" type="text/css">
	</head>
		<header>
				<div id="nom_site">
					<h1><i><b>Votez !</b></i></h1>
				</div>
		</header>
	<body>
		<section>
		  <article id="img_inssert">
				<form method="post" enctype="multipart/form-data">
					<div>
						<label for="fic">Choose images to upload (PNG, JPG)</label>
						<input type="file" id="fic" name="fic" accept=".jpg, .jpeg, .png" multiple="" style="opacity: 0;" />
						<input type="hidden" name="MAX_FILE_SIZE" value="250000" />
					</div>
					<div class="preview">
						<p>No files currently selected for upload</p>
					</div>
					<div>
						<button>Submit</button>
					</div>
				</form>
				<script>
		    	const input = document.querySelector('input');
					const preview = document.querySelector('.preview');
					input.style.opacity = 0;
					input.addEventListener('change', updateImageDisplay);
					function updateImageDisplay() {
		  			while(preview.firstChild) {
		    			preview.removeChild(preview.firstChild);
		  			}
		  			const curFiles = input.files;
		  			if (curFiles.length === 0) {
		    			const para = document.createElement('p');
		    			para.textContent = 'No files currently selected for upload';
		    			preview.appendChild(para);
		  			}
		  			else {
		    			const list = document.createElement('ol');
		    			preview.appendChild(list);
		    			for (const file of curFiles) {
		      			const listItem = document.createElement('li');
		      			const para = document.createElement('p');
		      			if (validFileType(file)) {
		        			para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
		        			const image = document.createElement('img');
		        			image.src = URL.createObjectURL(file);
		        			listItem.appendChild(image);
		        			listItem.appendChild(para);
		     				}
		     				else {
		        			para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
		        			listItem.appendChild(para);
		      			}
		      			list.appendChild(listItem);
		    			}
		  			}
					}
					// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
					const fileTypes = [
				  "image/apng",
				  "image/bmp",
				  "image/gif",
				  "image/jpeg",
				  "image/pjpeg",
				  "image/png",
				  "image/svg+xml",
				  "image/tiff",
				  "image/webp",
				  "image/x-icon"
					];
					function validFileType(file) {
		  			return fileTypes.includes(file.type);
					}
					function returnFileSize(number) {
		  			if (number < 1024) {
		    			return `${number} bytes`;
		  			}
		  			else if (number >= 1024 && number < 1048576) {
		    			return `${(number / 1024).toFixed(1)} KB`;
		  			}
		  			else if (number >= 1048576) {
		    			return `${(number / 1048576).toFixed(1)} MB`;
		  			}
					}
				</script>
			</article>
		</section>
	</body>
</html>