(()=>{"use strict";(function(){const e=document.querySelectorAll(".nav-bt.animes"),t=document.querySelectorAll(".menu-mobile-fechar"),o=document.querySelectorAll(".line-bt"),a=document.querySelectorAll("#page"),s=document.querySelectorAll(".area-do-menu"),n=document.querySelectorAll("#cabecalho_do_site");function i(){s[0].classList.contains("ativado")?(s[0].classList.remove("ativado"),t[0].style.display="none",n[0].classList.remove("ativado"),o[0].classList.remove("ativado"),o[1].classList.remove("ativado"),o[2].classList.remove("ativado"),a[0].classList.remove("fixada")):(s[0].classList.add("ativado"),t[0].style.display="block",n[0].classList.add("ativado"),o[0].classList.add("ativado"),o[1].classList.add("ativado"),o[2].classList.add("ativado"),a[0].classList.add("fixada"))}e[0].addEventListener("click",i,!1),t[0].addEventListener("click",i,!1)})(),function(){const e=document.querySelectorAll("input#s"),t=document.querySelectorAll(".barra-de-pesquisa");e[0].addEventListener("focusin",(function(){t[0].classList.add("ativo")}),!1),e[0].addEventListener("focusout",(()=>{t[0].classList.remove("ativo")}),!1)}(),document.addEventListener("DOMContentLoaded",(()=>{const e=Array.from(document.querySelectorAll("img.lazy-hidden")).concat(Array.from(document.querySelectorAll("img.avatar.photo"))),t=Array.from(document.querySelectorAll("div.lazy"));let o=null,a=(()=>{let t=0;return e.forEach((function(e){e.classList.add("aguardando"),t++})),t})()+(()=>{let e=0;return t.forEach((function(t){t.classList.add("aguardando"),e++})),e})(),s=0;const n=()=>{o&&clearTimeout(o),o=setTimeout((()=>{let o=window.pageYOffset;e.forEach((e=>{e.classList.contains("aguardando")&&e.offsetTop<window.innerHeight+o&&(e.src=e.dataset.src,e.classList.remove("aguardando"),s++)})),t.forEach((function(e){e.classList.contains("aguardando")&&e.offsetTop<window.innerHeight+o&&(e.style.backgroundImage="url('"+e.dataset.src+"')",e.classList.remove("aguardando"),s++)}))}),20),a==s&&(document.removeEventListener("scroll",n),document.removeEventListener("touchstart",n),window.removeEventListener("resize",n),window.removeEventListener("orientationChange",n))};document.addEventListener("scroll",n),window.addEventListener("resize",n),window.addEventListener("touchstart",n),window.addEventListener("orientationChange",n)})),function(){const e="refletir_consent",t=e=>document.cookie.split(";").map((e=>e.split("="))).reduce(((e,[t,o])=>({...e,[t.trim()]:o})),{})[e],o=(e,t,o)=>{const a=new Date;a.setTime(a.getTime()+24*o*60*60*1e3);let s="expires="+a.toUTCString();document.cookie=`${e}=${t};${s}`},a=()=>o(e,!0,366),s=document.getElementById("consent-popup"),n=document.getElementById("btConsent");window.onload=()=>{n.addEventListener("click",(e=>{e.preventDefault(),e.stopPropagation(),a(),o("refletir_itsOk",(new Date).getTime(),30),s.classList.add("hidden"),setTimeout((()=>{s.classList.add("closed")}),2e3)})),t(e)||(setTimeout((()=>{s.classList.remove("hidden"),s.classList.remove("closed")}),2e3),setTimeout((()=>{a()}),2e3))}}()})();