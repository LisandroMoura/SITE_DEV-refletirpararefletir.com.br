/**--------------------------------------------------------------------------------------------------------------
 * Nome: Testes.js
 * Autor: liZi by_pandora.io
 * Objetivo: Js principal do site usado para o sistema de testes (quiz)
 * Doc:
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Refatorar o Testes.js
 *     >> 18-06-23  - Criação do arquivo
 * 					- PENDÊNCIA: remover todo o Jquery do código
 *--------------------------------------------------------------------------------------------------------------*/

function init() {

	//get Objects
	const biboka_quiz_li = document.querySelectorAll("li.biboka_quiz_li")
	const terminar = document.getElementById("terminar")
	const ul_biboka_quiz= document.querySelectorAll("ul.biboka_quiz")

	// define functions
	const verificaOpcoes = () =>{
		let nNumerodeOpcoes = 10
		let pontos  			= []
		for (var i =1; i <= nNumerodeOpcoes; i++) {
			//primeiramente, pegar todos os valores dos imputs marcados
			let radios = document.querySelectorAll(`input[name=pergunta-${i}`)
			radios.forEach(radioFilho => {
				if(radioFilho.checked)
					pontos.push(radioFilho.value)
			},pontos)
		}
		return pontos
	}
	

	const fn_resultado = (pontos) =>{
		let arr = pontos 		
		let objects= {} 
		for(let a in arr){
			objects[arr[a]] = objects[arr[a]]!=undefined ? objects[arr[a]]+1 : 1 
		}
		let result = 0
		let escolhido
		for (let o in objects){
			if(result < objects[o] ) {
				result 	   = objects[o] 
				escolhido  = o 
			}			
		}
		return escolhido
	}

	//listners
	if(biboka_quiz_li)
		biboka_quiz_li.forEach(element => {
			element.addEventListener("click",() =>{
				let radioFilho = element.querySelector(".biboka_quiz_questoes")
				if (radioFilho.classList.contains("ver")) 
					return "" 
				radioFilho.checked=true
			})
		})

	if(terminar)
		terminar.addEventListener("click",(e)=>{
			e.preventDefault()
			e.stopPropagation()
			let lreturn = false
			// 1) verificar se existe alguma pergunta ainda não marcada
			ul_biboka_quiz.forEach(ulPai => {
				let ul_marcada=false
				let radios = ulPai.querySelectorAll(".biboka_quiz_questoes")
				radios.forEach(radioFilho => {
					if(radioFilho.checked)
						ul_marcada = true 
				},ul_marcada)
				
				if(!ul_marcada) {
					alert ("OPA!!! VOCÊ ESQUECEU DE RESPONDER A PERGUNTA " +  ulPai.dataset.question_id)
					ulPai.scrollIntoView()
					return
				}
			},lreturn)

			if(lreturn) return
			// 3) chamar o processo para seleção das respostas marcadas
			let pontos = verificaOpcoes()  		

			// 4) chamar o processo de cálculo das respostas
			let escolhido = fn_resultado(pontos)
			const btVerResultado = document.getElementById(`resultado-${escolhido}`)
			if(!btVerResultado) return 
			const resultado  = btVerResultado.querySelector(".bt-ver-resultado")
			if (!resultado) return
			
			// 5) mostrar as respostas, redirecionar o navegador para a página certa do resultado
			window.location.href = resultado.getAttribute("href")

		} )


	return "testes.all.itsOk"
}
init()
export { init }