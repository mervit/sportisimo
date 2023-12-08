# Sportisimo
Ukázková aplikace pro přijímací řízení

## Požadavky
Je třeba mít nainstalové:
 - PHP 8
 - Mysql
 - Composer
 - NodeJs (npm)
 - Yarn

## Instalace
1. Nainstalování PHP závislostí pomocí příkazu `composer install`
2. Nainstalování NodeJs knihoven pomocí příkazu `yarn install`
3. Vytvoření assetů (JS a CSS) pomocí příkazu `yarn run build`
4. Vytvoření configuračního souboru `config/local.neon` a zadefinování připojení k databázi dle návodu https://doc.nette.org/en/database/configuration 

## Spuštění

### Pomocí Apache/Nginx
Document root nasměrovat do složky `www`

### V příkazové řádce (vývoj)
Přejděte do složky `www` a spusťte přkazem: `php -S localhost:8080`