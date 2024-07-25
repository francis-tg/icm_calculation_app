# ICM APP BY ALAPHIA Francis 

 Admin login

 - Username : admin@ciscodev.tg
 - password: password

## Requirements (PHP 8.3 and Nodejs >=18)

### Env
 ````env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imc_backend
DB_USERNAME=root
DB_PASSWORD=

 ````
### Installation

````bash
composer install 
````
(Installation des packages vite)
````bash 
npm install
````

(au cas où, cela demande la clé)
````bash
php artisan key:generate
````

````bash
php artisan migrate
````

````bash
php artisan db:seed
````

## Lancement de l'application

### Environnement de développement

````bash 
php artisan serve
````

````bash 
npm run dev
````

### Mode production

````bash 
npm run build
````
````bash 
php artisan serve
````