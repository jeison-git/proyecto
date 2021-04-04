Proyecto

_Entorno Virtual de aprendizaje_

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

_Este proyecto se realizo utilizando el framework Laravel-8 y Xampp-7.4. Por que es necesario tener PHP 7.4 (para evitar problemas de dependencias)._

```
composer global require laravel/installer 
```
```
https://www.apachefriends.org/download.html 
```

### Instalación 🔧

_Paso a paso para clonar este entorno de desarrollo_


_1. Copiar la dirección HTTPS del repositorio, en la opción de clonar:_

```
https://github.com/jeison-git/proyecto.git
```

_2. Después en la consola de comandos de Git Bash (Windows) o la Terminal CMD posiciónate en la carpeta donde clonarás tu repositorio con el comando cd. Ejecute el comado:_

```
git clone https://github.com/jeison-git/proyecto.git
```

_3. En la carpeta del proyecto que acabas de clonar, desde consola  ejecuta el comando: composer install (debe tener instalado el gestor de paquetes Composer).
Esto descargará e instalará las dependencias utilizadas por el proyecto._

```
composer install
```

_4. Lo siguiente es copiar el contenido del archivo .env.example en un nuevo archivo con el nombre .env._

```
copy .env.example .env
```

_5. Abrir el archivo .env y cambiar el nombre de la base (DB_DATABASE) a lo que usted tiene, nombre de usuario (DB_USERNAME) y una contraseña (DB_PASSWORD) Campo corresponden a la configuración.
De forma predeterminada, el nombre de usuario es root y puede dejar el campo de contraseña vacío. (Esto es para Xampp)._


_6. Desde consola jecutar el comando:  npm install (debe tener instalado Node.js)._

```
npm install
```

_7. Generar APP_KEY, La APP_KEY es una cadena de carácteres generada aleatoriamente por Laravel que utiliza para todas las cookies cifradas, como las cookies de sesión. Para generar la APP_KEY del proyecto ejecuta el siguiente comando:_

```
 php artisan key:generate
```

_8. Desde consola jecutar el comando: php artisan migrate (Para crear todas las tablas del proyecto, dentro de la bases de datos que creo y espesifico en el archivo .env)._

```
php artisan migrate
```

_9. Ir a localhost y ver el proyecto_


## Este proyecto todavia se encuentra en proceso de elaboración. 🖇️

## Construido con 🛠️

_Herramientas que utilize para crear el proyecto_

* [Laravel](https://laravel.com/docs) - El framework web usado.
* [VisualStudioCode](https://code.visualstudio.com/Download) - Editor de codigo
* [Composer](https://getcomposer.org/download/) - Usado para gestionar las dependencias.
* [Xampp](https://www.apachefriends.org/download.html ) - Servicios independientes.

---
⌨️ Por [jeison-git](https://github.com/jeison-git) 😊
