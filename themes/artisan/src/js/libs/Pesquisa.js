function Pesquisa(){
	const botaoPesquisa = document.querySelectorAll("input#s")
	const barraPesquisa = document.querySelectorAll(".barra-de-pesquisa")
	function abrePesquisa(){
		barraPesquisa[0].classList.add("ativo")
	}
	const fechaPesquisa = () =>{
		barraPesquisa[0].classList.remove("ativo")
	}
	botaoPesquisa[0].addEventListener("focusin", abrePesquisa, false)
	botaoPesquisa[0].addEventListener("focusout",fechaPesquisa, false)
	return "Pesquisa.all.itsOk"
}
export {Pesquisa}