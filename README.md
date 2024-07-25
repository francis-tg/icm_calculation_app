# ICM APP BY ALAPHIA Francis 

## Requirements (PHP 8.3 and Nodejs >=18)

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