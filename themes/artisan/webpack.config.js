/**--------------------------------------------------------------------------------------------------------------
 * Nome: webpack.config.js
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Configurações do webpack
 * Doc: https://webpack.js.org/plugins/mini-css-extract-plugin/#minimizing-for-production
 * 		https://webpack.js.org/loaders/sass-loader/#root
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar a compilação de JS/CSS
 *     >> 17-06-23  - Criação do programa
 *--------------------------------------------------------------------------------------------------------------*/
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const entries = require("./Artisan.config.js").entries

module.exports = {
	// ********** Dá para definir a entrada apenas informando os endereços
	// entry: 
	// 	[
	// 		"/src/js/App.js",
	// 		"/src/scss/Single.scss",
	// 	]
	// ,
	// ********** outra forma de definir as entradas:
	// entry: 
	// 	[
	// 		__dirname + "/src/scss/Single.scss",
	// 		__dirname + "/src/scss/Testes.scss",
	// 	]
	// ,
	// ********** Podemos informar o nome dos Arquivos
	// entry: {
	// 	bundle: "/src/js/Site.js",
	// 	testes: "/src/js/Testes.js",
	// 	// Style: "/src/scss/Single.scss",
	// },
	// Podemos também não passar valores de entrada
	// porém neste o caso o webpack vai ser apontado por default para a pasta src
	// e dentro desta pasta aele vai buscar um arquivo index.js para fazer o bundle
	// e a separação do css, vai ser feita automáticamente,
	// ele vai gerar na pssta dist dois arquivos: um main.js e um main.css
	// os arquivos para compilação são informados no Artisan.config.js

	//Eu resolvi informar o nome do arquivo, porém fiz isso lá no Artisan.config, conforme linha abaixo: 
	entry: entries,
	plugins: [
		new MiniCssExtractPlugin({
			linkType: "text/css",
			// filename: "bundle.css", //podemos informar o nome de saída do css
			// filename: "[name].bundle.css", //podemos usar também uma variável
			// que vai conter o nome da entrada. Essa variável foi informada ali acima
			// no objeto entry{}
		}),
	],
	module: {
		rules: [
			{
				// test: /\.s[ac]ss$/i,
				// test: /\.scss$/,
				test: /\.s[ac]ss$/i,
				exclude: /node_modules/,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					// Compiles Sass to CSS
					"sass-loader",
				],
			},
		],
	},
	mode: "production",
}