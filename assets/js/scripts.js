function toggleNav() {
	nav = document.getElementsByTagName("nav")[0];
	if (nav.classList.contains("open")) {
		nav.classList.remove("open");
	} else {
		nav.classList.add("open");
	}
}

function closeNav() {
	nav = document.getElementsByTagName("nav")[0];
	nav.classList.remove("open");
}