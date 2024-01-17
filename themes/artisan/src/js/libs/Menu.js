//evento ao carregar os elementos do Dom


function Menu() {

	const botaoMenu = document.querySelectorAll(".nav-bt.animes")
	const botaoFechar = document.querySelectorAll(".menu-mobile-fechar")
	const lineBt = document.querySelectorAll(".line-bt")
	const page = document.querySelectorAll("#page")
	const areaDomenu = document.querySelectorAll(".area-do-menu")
	const cabecalho = document.querySelectorAll("#cabecalho_do_site")

	function abreMenu() {
		if (!areaDomenu[0].classList.contains("ativado")) {
			areaDomenu[0].classList.add("ativado")
			botaoFechar[0].style.display = "block"
			cabecalho[0].classList.add("ativado")
			lineBt[0].classList.add("ativado")
			lineBt[1].classList.add("ativado")
			lineBt[2].classList.add("ativado")
			page[0].classList.add("fixada")
		} else {
			areaDomenu[0].classList.remove("ativado")
			botaoFechar[0].style.display = "none"
			cabecalho[0].classList.remove("ativado")
			lineBt[0].classList.remove("ativado")
			lineBt[1].classList.remove("ativado")
			lineBt[2].classList.remove("ativado")
			page[0].classList.remove("fixada")
		}
	}

	botaoMenu[0].addEventListener("click", abreMenu, false)
	botaoFechar[0].addEventListener("click", abreMenu, false)

	return "Menu.all.itsOk"
}
export { Menu }