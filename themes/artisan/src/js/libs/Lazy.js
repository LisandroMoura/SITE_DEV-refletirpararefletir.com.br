function Lazy() {
	document.addEventListener("DOMContentLoaded", () => {
		/**************************************************
		 *  Get images to apply lazy
		 *************************************************/
		// Make colection
		const imagensCollection = Array.from(document.querySelectorAll("img.lazy-hidden")).concat(Array.from(document.querySelectorAll("img.avatar.photo")))
		//Count results.. 
		const getImagensCont = () => {
			let cont = 0
			imagensCollection.forEach(function (img) {
				img.classList.add("aguardando")
				cont++
			})
			return cont
		}
		/**************************************************
		 *  Get images to apply lazy
		 *************************************************/
		// Make colection
		const bgsCollection = Array.from(document.querySelectorAll("div.lazy"))
		//Count results.. 
		const getBgsCont = () => {
			let cont = 0
			bgsCollection.forEach(function (div) {
				div.classList.add("aguardando")
				cont++
			})
			return cont
		}

		let lazyloadThrottleTimeout = null
		let imagensCont = getImagensCont() + getBgsCont()
		let executados = 0

		const lazyLoad = () => {
			if (lazyloadThrottleTimeout)
				clearTimeout(lazyloadThrottleTimeout)
				
			lazyloadThrottleTimeout = setTimeout(() => {
				let scrollTop = window.pageYOffset
				imagensCollection.forEach((img) => {
					if (img.classList.contains("aguardando")) {
						// debugger
						if (img.offsetTop < (window.innerHeight +scrollTop)) {
							img.src = img.dataset.src
							img.classList.remove("aguardando")
							executados++

						}
					}
				})
				bgsCollection.forEach(function (div) {
					if (div.classList.contains("aguardando")) {
						if (div.offsetTop < (window.innerHeight + scrollTop)) {
							div.style.backgroundImage = "url('" + div.dataset.src + "')"
							div.classList.remove("aguardando")
							executados++
						}
					}
				})

			}, 20)

			if (imagensCont == executados) {
				document.removeEventListener("scroll", lazyLoad)
				document.removeEventListener("touchstart", lazyLoad)
				window.removeEventListener("resize", lazyLoad)
				window.removeEventListener("orientationChange", lazyLoad)
			}

		}

		/**************************************************
		 *  Listner's
		 *************************************************/
		document.addEventListener("scroll", lazyLoad)
		window.addEventListener("resize", lazyLoad)
		window.addEventListener("touchstart", lazyLoad)
		window.addEventListener("orientationChange", lazyLoad)


	})
	return "Lazy.all.itsOk"
}
export { Lazy }