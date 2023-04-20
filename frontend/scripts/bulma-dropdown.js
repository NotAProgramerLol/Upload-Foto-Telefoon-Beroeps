const dropDownMenuBurger = document.getElementById("navbar-burger");
const navbar = document.getElementById("navbar");

dropDownMenuBurger.addEventListener("click", function dropdown() {
	if (!dropDownMenuBurger.classList.contains("is-active")) {
		dropDownMenuBurger.classList.add("is-active");
		navbar.classList.add("is-active");
	} else {
		dropDownMenuBurger.classList.remove("is-active");
		navbar.classList.remove("is-active");
	}
});
