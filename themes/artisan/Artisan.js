/**--------------------------------------------------------------------------------------------------------------
 * Nome: Artisan.js
 * Autor: liZi by_pandora.io
 * Objetivo: Responsável por publicar (copiar nas pastas) os arquivos compilads/gerados pelo artisan 
 * Doc: Notifier
 * 		- https://www.npmjs.com/package/node-notifier
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar a compilação de JS/CSS
 *     >> 17-06-23  - Criação do programa
 *     >> 18-06-23  - Finalização, tudo pronto para começar a compilar
 *--------------------------------------------------------------------------------------------------------------*/

console.dir("---------------------------------------------------------------")
console.dir("Start publish..................................................")
console.dir("---------------------------------------------------------------")

const filesJS = require("./Artisan.config.js").filesJS
const filesCSS = require("./Artisan.config.js").filesCSS
const fs = require("fs")
const path = require("path")

const notifier = require("node-notifier")

const runCopy = (origem, target) => {
	fs.copyFile(origem, target, (err) => {
		if (err) throw err
	})
}

const getFiles = (Arrfiles, type) => {
	let baseFolderTarget = (type == "css") ? "../css/" : "../js/"

	Arrfiles.forEach(file => {
		let fileDest = file

		let auxFind = file.split(":")
		fileDest = auxFind[1] ?? file

		let origem = __dirname + `/dist/${auxFind[0]}`
		let target = `${baseFolderTarget}${fileDest}`

		runCopy(origem, target)
		console.dir(`    ● ${fileDest} ==> ... done`)

	})
}

getFiles(filesJS, "js")
getFiles(filesCSS, "css")


console.dir("---------------------------------------------------------------")
console.dir(".........................................................Finish")
console.dir("---------------------------------------------------------------") 

notifier.notify({
	title: "Artisan say:",
	message: "Compilação realizada com sucesso! \n\rby: _pandora.io",
	icon: path.join(__dirname, "icon.svg"), // Absolute path (doesn't work on balloons)
	sound: true, // Only Notification Center or Windows Toasters
})