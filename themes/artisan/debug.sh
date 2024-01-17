#!/usr/bin/env bash
clear
echo "$(tput setaf 8) ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
echo "$(tput sgr0) ───── ● Debug mobile:$(tput setaf 2) STARTED $(tput setaf 8) ─────"
echo "$(tput setaf 8) ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
echo "$(tput sgr0)"
echo "Como conectar: "
echo ""
echo "- Digite, http://refletirpararefletir.antigo.io:5501 no navegador para desktop;"
echo "- Ou digite http://192.168.3.3:5501 para celular;"
echo "- Conecte o aparelho no computador (não esqueça de dar acesso no mobile);"
echo "- No chrome digite o endereço : chrome://inspect/#devices;"
echo "- Tudo pronto, agora basta abrir o chrome do mobile para depurar"
echo ""
XDEBUG_MODE=debug php -S refletirpararefletir.antigo.io:5501 -t /home/bibolfo/repositorio/refletir.projeto/refletirWp5.5.3 