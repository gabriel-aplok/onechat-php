const password = document.querySelector(".form input[type='password']");
const toggle = document.querySelector(".form .field i");

toggle.onclick = () => {
	if (password.type === "password") {
		password.type = "text";
		toggle.classList.add("active");
	} else {
		password.type = "password";
		toggle.classList.remove("active");
	}
}