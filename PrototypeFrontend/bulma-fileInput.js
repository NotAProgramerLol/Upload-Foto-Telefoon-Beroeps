const fileInput = document.querySelector("#file-input input[type=file]");
const clearButton = document.getElementById("clear");
const notification = document.getElementById("clearNoti");

fileInput.onchange = () => {
	if (fileInput.files.length > 0) {
		const fileName = document.querySelector("#file-input .file-name");
		fileName.textContent = fileInput.files[0].name;
	}
};

clearButton.onclick = () => {
	fileInput.value = "";
	document.querySelector("#file-input .file-name").textContent = "No file selected.";

/**********************************************************
 *              TODO: MAKE THIS IF LOOP AUTOMATIC         *
 * SO WHEN CLEAR IS PRESSED IT WILL SHOW THE NOTIFICATION *
 *            FOR X SECONDS AND THEN DISAPEAR             *
 *              THIS NEEDS TO BE REPEATABLE               *
 **********************************************************/
     
	if (!notification.classList.contains("animate__fadeInLeft")) {
        notification.classList.remove("is-hidden");
        
		notification.classList.remove("animate__fadeOutRight");
		notification.classList.add("animate__fadeInLeft");
	} else {
		notification.classList.remove("animate__fadeInLeft");
		notification.classList.add("animate__fadeOutRight");
	}
};
