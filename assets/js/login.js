const form = document.querySelector(".login form");
const submit = form.querySelector(".button input");
const error = form.querySelector(".error-text");

form.onsubmit = (event) => {
	event.preventDefault();
}

submit.onclick = () => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api/login.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data === "success") {
					location.href = "index.php";
				} else {
					error.style.display = "block";
					error.textContent = data;
				}
			}
		}
	}
	let data = new FormData(form);
	xhr.send(data);
}