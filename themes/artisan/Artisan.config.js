/**--------------------------------------------------------------------------------------------------------------
 * Nome: Artisan.config.js
 * Autor: liZi by_pandora.io
 * Objetivo: Arquivos para compilar
 * Doc:
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar a compilação de JS/CSS
 *     >> 17-06-23  - Criação do programa
 *--------------------------------------------------------------------------------------------------------------*/

//arquivos Fontes (entradas)
const dataEntry = [
	{ bundle: "/src/js/Site.js", name:"bundle.js", buildFile:"bundle.js"  },
	{ testes: "/src/js/Testes.js", name:"testes.js", buildFile:"testes.min.js"  },
	{ formValidate: "/src/js/formValidate.js", name:"formValidate.js", buildFile:"formValidate.min.js"  },
	//css
	{ single_min: "/src/scss/Single.scss", name:"single_min.css", buildFile:"single.min.css"  },
	{ style_min: "/src/scss/Style.scss", name:"style_min.css", buildFile:"style.min.css"  },
	{ archive_min: "/src/scss/Archive.scss", name:"archive_min.css", buildFile:"archive.min.css"  },
	{ testes_min: "/src/scss/Testes.scss", name:"testes_min.css", buildFile:"testes.min.css"  },
	{ fixa_min: "/src/scss/Fixa.scss", name:"fixa_min.css", buildFile:"fixa.min.css"  },
]

let entradas = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[0] 
	let valueEntry = element[nameEntry] 
	entradas[nameEntry] = valueEntry
},entradas)

const entries =Object.assign({},entradas)

//Arquivos Resultado da compilações
// variaveis usadas na hora de fazer a cópia pelo Artisan.js
//PS: Para compilar o arquivo com o nome diferente do scr, basta informar o nome correto  ":" (dois pontos)
// 	  de compi

let destJs = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[1] 
	let valueEntry = element[nameEntry] 
	let found = valueEntry.split(".js")
	let buildFile = element.buildFile
	if(found[1] != undefined)
		destJs.push(`${valueEntry}:${buildFile}`)   
},destJs)

const filesJS = destJs
// const filesJS = [
// 	"bundle.js",
// 	"testes.js:testes.min.js"
// ]
let destCSS = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[1] 
	let valueEntry = element[nameEntry] 
	let found = valueEntry.split("css")
	let buildFile = element.buildFile
	if(found[1]!= undefined)
		destCSS.push(`${valueEntry}:${buildFile}`)   
},destCSS)
const filesCSS = destCSS
// const filesCSS = [
// 	"single_min.css:single.min.css",
// 	"style_min.css:style_min.css",
// 	"archive_min.css:archive.min.css",
// 	"testes_min.css:testes.min.css"
// ]

module.exports = {filesJS, filesCSS, entries,dataEntry}
