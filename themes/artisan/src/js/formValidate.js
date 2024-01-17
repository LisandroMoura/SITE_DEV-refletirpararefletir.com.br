/**--------------------------------------------------------------------------------------------------------------
 * Nome: formValidate.js
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Js principal do site usado para a pergunta anti-spam
 * Doc:
 * Obs:
 * O texto: 
 * Seu comentário está aguardando moderação. Esta é uma pré-visualização, seu comentário ficará visível assim que for aprovado.
 * está no arquivo de tradução do wordpress pt_BR.po
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - Rotina de Pergunta Anti-spam via JS
 *     >> 29-06-23  - Criação do arquivo
 *--------------------------------------------------------------------------------------------------------------*/

function validate() {

	//get Objects
	const btEnviarForm = document.getElementById("enviarForm")
	const validateForm = document.getElementById("validateForm")
	const form = document.getElementById("commentform")
	let fieldInvalids = []

	const start = () =>{
		if(validateForm){
			const div = document.createElement("div")
			div.id = "question"
			div.innerHTML = `
            <p id="bibokaquiz" style="clear:both"> * Pergunta anti-Spam, <label for="quiz">por favor responda sim ou não: Azul é uma cor? </label><input class="requerid" type="text" name="quiz" id="quiz" size="6" value="" tabindex="4"> </p>
            `
			validateForm.appendChild(div)
			btEnviarForm.addEventListener("click",(e)=>{
				e.preventDefault()
				e.stopPropagation()

				console.log(form)
				validateFields()
				if (fieldInvalids.length == 0) form.submit()
				else 
					handleErrors(fieldInvalids)
				fieldInvalids = []
			} )
		}
	}
    
	const handleErrors = (errors) =>{
		removeCardError()
		let divMsg = document.createElement("div")
		divMsg.classList.add("card-msg")
		divMsg.classList.add("error")
		let msgsError = ""
		let msgHeader = "<header class=\"error\">Atenção!!!</header>"
		errors.forEach(error => {
			// catalogar os erros
			switch (Object.keys(error)[0]) {
			case "erroSize":
				if(error.erroSize.name == "author")
					msgsError += "<li>- O seu <b> nome </b> precisa ser informado</li> " 
				
				if(error.erroSize.name == "comment")
					msgsError += "<li>- Você não escreveu nada para nós. <b>Deixe seu recado </b> que teremos o maior prazer em responder!</li> " 

				break
			case "erroEmail":
				msgsError += "<li>- Ops, <b>Email</b> inválido</li>" 
				break
			case "erroAntiSpam":
				msgsError += "<li>- Parece que você não respondeu a <b>pergunta Anti-Spam</b> corretamente! Dica: acho que azul é uma cor <b>SIM</b></li>" 
				break
			}
		},msgsError)

		//escrever os erros na tela
		divMsg.innerHTML =msgHeader +  "<ul>" + msgsError +"</ul>"
		validateForm.appendChild(divMsg)
	}

	const removeCardError = () => {
		const carfError = document.querySelector(".card-msg")
		if(carfError){
			validateForm.removeChild(carfError)
		}
	}
	const validateFields = () => {
        
		const formFields = document.querySelectorAll(".requerid")
        
		formFields.forEach(element => {
			element.classList.remove("input-with-errors")
			if(
				element.name =="author" || 
				element.name =="comment"  
			){
				if(validateSize(element)){
					fieldInvalids.push({"erroSize": element})
					element.classList.add("input-with-errors")
				}
			}
			if(element.name =="email"){
				if(!validateEmail(element.value)){
					fieldInvalids.push({"erroEmail": element})
					element.classList.add("input-with-errors")
				}
			}

			if(element.name =="quiz"){
				if (element.value.toLowerCase() !="sim" ){
					fieldInvalids.push({"erroAntiSpam": element})
					element.classList.add("input-with-errors")
				}
			}
		}, fieldInvalids)
	}


	const validateSize = (element) => {
		if(element.name !="quiz"){
			return element.value.length < 6
		}
		return false
	}

	const validateEmail = (email) => {
		let ret = /\S+@\S+\.\S+/
		return ret.test(email)
	}
	
	start()
	return "formValidate.all.itsOk"
}
validate()
export { validate }