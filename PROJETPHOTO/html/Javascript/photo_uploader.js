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
		para.textContent = "Aucun fichier n'est actuellement sélectionné pour le dépôt";
		preview.appendChild(para);
	}

	else {
		const list = document.createElement('ol');
		preview.appendChild(list);

		for (const file of curFiles) {

			const listItem = document.createElement('li');
			const para = document.createElement('p');

			if (validFileType(file)) {
				para.textContent = `Nom du fichier : ${file.name}, taille du fichier : ${returnFileSize(file.size)}.`;
				const image = document.createElement('img');
				image.src = URL.createObjectURL(file);
				listItem.appendChild(image);
				listItem.appendChild(para);
			}

			else {
				para.textContent = `Le fichier ${file.name} n'est pas un type de fichier valide. Veuillez en sélectionner un nouveau.`;
				listItem.appendChild(para);
			}

			list.appendChild(listItem);
		}
	}
}

// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
const fileTypes = [
	"image/jpg",
	"image/jpeg",
	"image/png",
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