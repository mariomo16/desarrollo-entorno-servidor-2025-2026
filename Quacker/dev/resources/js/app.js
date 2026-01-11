import "./bootstrap";

if (location.href.includes("users")) {
	document.getElementsByClassName("nav-menu-user")[0].style.color =
		"var(--color-primary)";
}

if (location.href.includes("quacks")) {
	document.getElementsByClassName("nav-menu-quack")[0].style.color =
		"var(--color-primary)";
}

if (location.href.includes("quashtags")) {
	document.getElementsByClassName("nav-menu-quashtag")[0].style.color =
		"var(--color-primary)";
}
