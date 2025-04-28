const body = document.querySelector("body"),
	modeText = body.querySelector(".mode-text"),
	iconMode = body.querySelector(".uil-moon"),
	modeToggle = body.querySelector(".mode-toggle");

sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let darkMode = localStorage.getItem("mode");

const enableDarkMode = () => {
	iconMode.classList.replace("uil-moon", "uil-sun");
	body.classList.add("dark");
	if (body.classList.contains("dark")) {
		modeText.innerText = "Light mode";
	} else {
		modeText.innerText = "Dark mode";
	}
	localStorage.setItem("mode", "enabled");
};

const disableDarkMode = () => {
	iconMode.classList.replace("uil-sun", "uil-moon");
	body.classList.remove("dark");
	if (body.classList.contains("dark")) {
		modeText.innerText = "Light mode";
	} else {
		modeText.innerText = "Dark mode";
	}
	localStorage.setItem("mode", "disabled");
};

if (darkMode === "enabled") {
	enableDarkMode();
}

modeToggle.onclick = () => {
	darkMode = localStorage.getItem("mode");
	if (darkMode === "disabled") {
		enableDarkMode();
	} else {
		disableDarkMode();
	}
};

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
	sidebar.classList.toggle("close");
}

sidebarToggle.addEventListener("click", () => {
	sidebar.classList.toggle("close");
	if (sidebar.classList.contains("close")) {
		localStorage.setItem("status", "close");
	} else {
		localStorage.setItem("status", "open");
	}
});
