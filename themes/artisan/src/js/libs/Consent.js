/**--------------------------------------------------------------------------------------------------------------
 * Nome: Consent.js
 * Autor: LisandroMoura by_pandora.io
 * Objetivo: Js para atender o consentimendo do usuário em relação a mensagem de privacidade
 * Doc:
 * Obs:
 * -------------------------------------------------------
 * UPDATES:
 * -------------------------------------------------------
 *  ● Projeto2023Jun02 - NOVO - Mensagem de privacidade
 *     >> 13-07-23  - Criação do arquivo
 *--------------------------------------------------------------------------------------------------------------*/
function Consent () {
	//defs
	const consentPropertyName = "refletir_consent"
	const clickConfirmed = "refletir_itsOk"
	const cookieStorage = {
		getItem: (item) => {
			const cookies = document.cookie
				.split(";")
				.map(cookie => cookie.split("="))
				.reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {})
			return cookies[item]
		},
		setItem: (item, value, exdays) => {
			const d = new Date()
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
			let expires = "expires=" + d.toUTCString()
			document.cookie = `${item}=${value};${expires}`
		}
	}

	const shouldShowPopup = () => !cookieStorage.getItem(consentPropertyName)
	const saveToStorage = () => cookieStorage.setItem(consentPropertyName, true,366)
	const consentPopup = document.getElementById("consent-popup")
	const btConsent = document.getElementById("btConsent")

	window.onload = () => {
		const handleBtConsent = (event) => {
			event.preventDefault()
			event.stopPropagation()
			saveToStorage(cookieStorage)
			cookieStorage.setItem(clickConfirmed, new Date().getTime(),30)
			consentPopup.classList.add("hidden")
			setTimeout(() => {
				consentPopup.classList.add("closed")
			}, 2000)
		}
		
		btConsent.addEventListener("click", handleBtConsent)
        
		if (shouldShowPopup(cookieStorage)) {
			setTimeout(() => {
				consentPopup.classList.remove("hidden")
				consentPopup.classList.remove("closed")
			}, 2000)
			setTimeout(() => {
				saveToStorage(cookieStorage)
			}, 2000)
		}
	}
	return "itsOk"
}

export {Consent}