#!/usr/bin/env bash
clear

while read linha
do
    aux=$(echo $linha | grep "\$ENV_VER=\"2023")
    if [ $aux ];then
        echo "\$ENV_VER=\"$( date '+%Y_%m%d_%H%M_%S' )\";"
    else
        echo "$linha"
    fi
done < ".original_env" > ../.env
# clear
echo "run..."
echo "$(tput setaf 8) ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
echo "$(tput sgr0) ───── ● Update .env:$(tput setaf 2) FINISH $(tput setaf 8) ─────"
echo "$(tput setaf 8) ─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────"
echo "$(tput sgr0)"
echo ""

# exit 0