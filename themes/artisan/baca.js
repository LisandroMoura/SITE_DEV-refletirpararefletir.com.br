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

const dataEntry = [
	{ bundle: "/src/js/Site.js", name:"bundle.js", buildFile:"bundle.js"  },
	{ testes: "/src/js/Testes.js", name:"testes.js", buildFile:"testes.min.js"  },
	//css
	{ single_min: "/src/scss/Single.scss", name:"single_min.css", buildFile:"single.min.css"  },
	{ style_min: "/src/scss/Style.scss", name:"style_min.css", buildFile:"style.min.css"  },
	{ archive_min: "/src/scss/Archive.scss", name:"archive_min.css", buildFile:"archive.min.css"  },
	{ testes_min: "/src/scss/Testes.scss", name:"testes_min.css", buildFile:"testes.min.css"  },
]

let entradas = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[0] 
	let valueEntry = element[nameEntry] 
	entradas[nameEntry] = valueEntry
},entradas)

// const entry =Object.assign({},entradas)

///////////////////
let destJs = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[1] 
	let valueEntry = element[nameEntry] 
	let found = valueEntry.split(".js")
	let buildFile = element.buildFile
	if(found[1] != undefined)
		destJs.push(`${valueEntry}:${buildFile}`)  
},destJs)
console.log(destJs)

let destCSS = []
dataEntry.forEach(element => {
	let nameEntry = Object.keys(element)[1] 
	let valueEntry = element[nameEntry] 
	let found = valueEntry.split("css")
	let buildFile = element.buildFile
	if(found[1]!= undefined)
		destCSS.push(`${valueEntry}:${buildFile}`)   
},destCSS)

console.log(destCSS)


// const filesJS = [
// 	"bundle.js",
// 	"testes.js:testes.min.js"
// ]

// const filesCSS = [
// 	"single_min.css:single.min.css",
// 	"style_min.css:style_min.css",
// 	"archive_min.css:archive.min.css",
// 	"testes_min.css:testes.min.css"
// ]


// console.log(entry)