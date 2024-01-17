/**--------------------------------------------------------------------------------------------------------------
 * Nome: Site.js
 * Autor: liZi by_pandora.io
 * Objetivo: Js principal do site usado em todo o site, reposnsável pelo lazyload,  pelo clique do menu e pela 
 * 			animação de abrir e fechar a barra de pesquisa
 * Doc:
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar a compilação de JS/CSS
 *     >> 17-06-23  - Inserido o padrão de comentário de cabeçalhos que temos no fraseteca
 * 					- Implementado o padrão export/import renderizado pelo webpack
 * 					- Melhor separação de códigos, por funcionalidades
 *--------------------------------------------------------------------------------------------------------------*/
import { Menu } from "./libs/Menu"
import { Pesquisa } from "./libs/Pesquisa"
import { Lazy } from "./libs/Lazy"
import { Consent } from "./libs/Consent"

function init() {
	Menu()
	Pesquisa()
	Lazy()
	Consent()
	return "all.itsOk"
}
init()
export { init }