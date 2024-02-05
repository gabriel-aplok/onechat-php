const searchBar = document.querySelector(".search input");
const searchIcon = document.querySelector(".search button");
const usersList = document.querySelector(".users-list");

searchIcon.onclick = () => {
	searchBar.classList.toggle("show");
	searchIcon.classList.toggle("active");
	searchBar.focus();
	if (searchBar.classList.contains("active")) {
		searchBar.value = "";
		searchBar.classList.remove("active");
	}
}

searchBar.onkeyup = () => {
	let search = searchBar.value;
	if (search != "") {
		searchBar.classList.add("active");
	} else {
		searchBar.classList.remove("active");
	}
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "api/search.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				usersList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("search=" + search);
}

setInterval(() => {
	if (!searchBar.classList.contains("active")) {
		let xhr = new XMLHttpRequest();
		xhr.open("GET", "api/users.php", true);
		xhr.onload = () => {
			if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 200) {
					let data = xhr.response;
					usersList.innerHTML = data;
				}
			}
		}
		xhr.send();
	}
}, 1000);