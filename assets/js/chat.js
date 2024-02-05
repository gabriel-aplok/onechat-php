const form = document.querySelector(".typing-area");
const incoming_id = form.querySelector(".incoming_id").value;
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (event) => {
	event.preventDefault();
}

inputField.focus();
inputField.onkeyup = () => {
	if (inputField.value != "") {
		sendBtn.classList.add("active");
	} else {
		sendBtn.classList.remove("active");
	}
}

sendBtn.onclick = () => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api/send.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				inputField.value = "";
				scrollToBottom();
			}
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);
}
chatBox.onmouseenter = () => {
	chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
	chatBox.classList.remove("active");
}

setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api/chat.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				chatBox.innerHTML = data;
				if (!chatBox.classList.contains("active")) {
					scrollToBottom();
				}
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("incoming_id=" + incoming_id);
}, 1000);

scrollToBottom = () => {
	chatBox.scrollTop = chatBox.scrollHeight;
}