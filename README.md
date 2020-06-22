Author: Medardo Manuel Juárez González

Guia de despliegue para el sistema
Linux (Ubuntu y derivados)
clonar el repositorio en una carpeta publica de acceso por apache

copiar archivo .env.example a .env Colocar accesos a BD

Crear carpeta vendor mkdir vendor

Dar permisos recursivos a vendor sudo chmod -cR vendor

Ejecutar composer: - composer install o composer update

Proporcionar token de autenticacion de Git Hub

Dar permisos a carpetas sudo chmod -cR 777 storage/framework/ sudo chmod -cR 777 storage/logs

Correr migraciones necesarias para el funcionamiento del sistema php artisan migrate.

vista previa para prueba de la api rest
![img](https://user-images.githubusercontent.com/50437305/85240178-c6672380-b3fc-11ea-8c0d-a43b70d8c747.png)

Insertar
![img_2](https://user-images.githubusercontent.com/50437305/85240080-712b1200-b3fc-11ea-9d06-b357430dd013.png)




