const form = document.querySelector(".register form");
const submit = form.querySelector(".button input");
const error = form.querySelector(".error-text");

form.onsubmit = (event) => {
	event.preventDefault();
}

submit.onclick = () => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api/register.php", true);
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
	let data = new data(form);
	xhr.send(data);
}