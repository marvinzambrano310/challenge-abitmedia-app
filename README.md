<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Challenge Abitmedia

El siguiente proyecto tiene la finilidad de usar API REST para cumplir con el sigueinte proposito. Una empresa de venta de software y servicios de soporte, requiere implementar un sistema para poder gestionar su oferta de productos.

## Instalacion del Proyecto

# Requsistos Previos

XAMPP: Herramienta necesaria para generar el ambiente de desarrollo y de pruebas de la aplicacion, controla las dependencias de los leguajes de progrmacion a utilizar dentro del Framework Laravel, asi como tambien la conexion a la base de datos de Mysql **[XAMPP](https://www.apachefriends.org/es/download.html)**.
Composer: Herramienta para intsalar las dependiencias o liberias del proyecto que giran en torno al Framework de Laravel **[Composer](https://getcomposer.org/download/)**.

# Clonar Repositorio

1. Usando el simbolo del sistema o CMD del equipo y en el lugar de preferencia, clonamos el repositorio usando el comando **git clone**, seguido del URL que nos proporciona el repositorio al momento de clonar el repositorio **[Link Repositorio](https://github.com/marvinzambrano310/challenge-abitmedia-app.git)**.
2. Proceder a ingresar a la carpeta del repositorio usando el comando **cd challenge-abitmedia-app**.
3. Instalar las dependencias del proyecto usando el comando **composer update**.
4. Abrir XAMPP e iniciar Apache y Mysql, dando clic en el boton iniciar, esto permitira que se establescan las conexiones entre la base de datos y el framework.

# Configuracion Inicial

1. Generar una copia del archivo que se encuentra en la parte principal del proyecto de nombre **.env.example** y a la copia renombrarla/cambiar de nombre a **.env**, con la finalidad de generar el archivo de variables de entrono necesarios para poner en funcionamiento el proyecto.
2. Ejecutar el comando **php artisan migrate**, con el proposito de que el sistema genere la base de datos y cree las tablas necesarias dentro del Gestor de Base de Datos que es Mysql.
3. Ejecutar el comando **php artisan db:seed** para que el proyecto genere una semilla de datos en las tablas de la base de datos, la informacion que carge en la base de datos debes ser igual a la que se detalla a continuacion:
*Software*
 - Antivirus ($5 para Windows, $7 para Mac), en existencia 10 para cada S.O. respectivamente.
 - Ofimática ($10 para Windows, $12 para Mac), en existencia 20 para cada S.O. respectivamente.
 - Editor de video ($20 para Windows, $22 para Mac), en existencia 30 para cada S.O. respectivamente.
*Servicios*
 - Formateo de computadores ($25)
 - Mantenimiento ($30)
 - Hora de soporte en software ($50)
La informacion va a ir almacenada segun la tabla en la que corresponda.
4. Ejecutar el comando **php artisan optimize** para limpiar la cache, reiniciar rutas y actualizar nuevos cambios de rutas dentro del proyecto. 
5. Para inciar el servidor de forma local ejcutar el comando **php artisan serve**. El sistema se abrira en la sigueinte direccion: *htpp://localhost:8000*.

## Funcionamiento de las APIS

# Generar Token - Autenticacion

- **Generar Token** - http://localhost:8000/api/generate/token (POST)
    *Headers* - No Aplica
    *Parametros* - No Aplica
    *Datos* - Formato de Tipo JSON, utilizar la siguiente estructura.
        {
            "name": "Marvin"
        }
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "name": "Marvin",
            "token": "1SJYk8sUhd",
            "updated_at": "2024-01-08T11:56:53.000000Z",
            "created_at": "2024-01-08T11:56:53.000000Z",
            "id": 1
        }

# CRUD A SERVICIOS
- **Listar Servicios** - http://localhost:8000/api/services (GET)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - No Aplica
    *Datos* - No Aplica
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        [
            {
                "id": 1,
                "name": "Formateo de computadores",
                "sku": "0VTJzDZWUQ",
                "price": 25,
                "status": "A",
                "created_by": "Seeder",
                "updated_by": null,
                "created_at": "2024-01-07T15:58:58.000000Z",
                "updated_at": "2024-01-07T15:58:58.000000Z"
            },
            {
                "id": 2,
                "name": "Mantenimiento",
                "sku": "lje5ojCLho",
                "price": 30,
                "status": "A",
                "created_by": "Seeder",
                "updated_by": null,
                "created_at": "2024-01-07T15:58:58.000000Z",
                "updated_at": "2024-01-07T15:58:58.000000Z"
            }
        ]

- **Crear Servicio** - http://localhost:8000/api/services (POST)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - No Aplica
    *Datos* - Formato de Tipo JSON, utilizar la siguiente estructura. Todos los campos son Obligatorios
        {
            "name": "Mantemiento de Equipos",
            "sku" : "abcdefghij",
            "price": 25.00
        }
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "name": "Mantemiento de Equipos",
            "sku": "abcdefghij",
            "price": 25,
            "status": "A",
            "created_by": "Marvin",
            "updated_at": "2024-01-08T12:04:49.000000Z",
            "created_at": "2024-01-08T12:04:49.000000Z",
            "id": 4
        }

- **Visualizar Servicio** - http://localhost:8000/api/service/{id} (GET)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla servicios)
    *Datos* - No aplica
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "id": 1,
            "name": "Mantemiento",
            "sku": "abcdefghij",
            "price": 25,
            "status": "A",
            "created_by": "Seeder",
            "updated_by": "Marvin",
            "created_at": "2024-01-07T15:58:58.000000Z",
            "updated_at": "2024-01-08T12:13:20.000000Z"
        }

- **Actualizar Servicio** - http://localhost:8000/api/service/{id} (PUT)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla servicios)
    *Datos* - Formato de Tipo JSON, utilizar la siguiente estructura. Todos los campos son obligatorios
        {
            "name": "Mantemiento de Equipos Ultima Generacion",
            "sku" : "0987654321",
            "price": 35.00
        }
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "id": 1,
            "name": "Mantemiento de Equipos Ultima Generacion",
            "sku": "0987654321",
            "price": 35,
            "status": "D",
            "created_by": "Seeder",
            "updated_by": "Marvin",
            "created_at": "2024-01-07T15:58:58.000000Z",
            "updated_at": "2024-01-08T12:13:20.000000Z"
        }

- **Eliminar Servicio** - http://localhost:8000/api/service/{id} (DELETE)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla servicios)
    *Datos* - No Aplica
    *Respuesta* - Eliminado Logico el registro se mantiene, el producto cambia a Estado D
        "Item Eliminado"

# CRUD A SOFTWARE

- **Listar Software** - http://localhost:8000/api/software (GET)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - No Aplica
    *Datos* - No Aplica
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        [
            {
                "id": 1,
                "name": "Antivirus",
                "system_operative": "Windows",
                "stock": 1,
                "status": "A",
                "license": "mjV4ibkIKw4tZvZfQgxDO7L7I9HBS7pciG4fmQT5UVGUKCJXXt9LnkOZXA0DPHyFa9DjMcm8hyB3ut98HvgbxS42LHISYiKkKbiY",
                "sku": "gRdZGu4Ntj",
                "price": 5,
                "created_by": "Seeder",
                "updated_by": null,
                "created_at": "2024-01-07T15:58:58.000000Z",
                "updated_at": "2024-01-07T15:58:58.000000Z"
            },
            {
                "id": 2,
                "name": "Antivirus",
                "system_operative": "Windows",
                "stock": 1,
                "status": "A",
                "license": "s37touoMvB7qTQBJZyaF28KGOFmRuuQO2Rzyd9mf0BVC6rPBh91Xuk4KKohWuoYbZvKkfz6yfCwgGUuVXFIIvslo4ea3C7MlT4ht",
                "sku": "YC3LtAE3ai",
                "price": 5,
                "created_by": "Seeder",
                "updated_by": null,
                "created_at": "2024-01-07T15:58:58.000000Z",
                "updated_at": "2024-01-07T15:58:58.000000Z"
            }
        ]

- **Crear Software** - http://localhost:8000/api/software (POST)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - No Aplica
    *Datos* - Formato de Tipo JSON, utilizar la siguiente estructura. Todos los campos son Obligatorios
        {
            "name": "Camtasia",
            "sku" : "abcdefghij",
            "system": "Windows",
            "price": 25.00
        }
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "name": "Camtasia",
            "sku": "abcdefghij",
            "system_operative": "Windows",
            "price": 25,
            "status": "A",
            "created_by": "Marvin",
            "license": "0CdSd5Q5SRh0Zb5wOZulJUy2RcnjFKVVBdhGXNqCjpLaw3gjxj3pu3jToj7pjFAH0Yk6G0siYOGQnU3FInTiZ5fnvGimu5SpbX7e",
            "stock": 1,
            "updated_at": "2024-01-08T12:17:09.000000Z",
            "created_at": "2024-01-08T12:17:09.000000Z",
            "id": 121
        }

- **Visualizar Software** - http://localhost:8000/api/software/{id} (GET)
    *Headers* - Usar el Token Generado en el Api Generar Token
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla software)
    *Datos* - No aplica
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "id": 121,
            "name": "Camtasia",
            "system_operative": "Windows",
            "stock": 1,
            "status": "A",
            "license": "0CdSd5Q5SRh0Zb5wOZulJUy2RcnjFKVVBdhGXNqCjpLaw3gjxj3pu3jToj7pjFAH0Yk6G0siYOGQnU3FInTiZ5fnvGimu5SpbX7e",
            "sku": "abcdefghij",
            "price": 25,
            "created_by": "Marvin",
            "updated_by": null,
            "created_at": "2024-01-08T12:17:09.000000Z",
            "updated_at": "2024-01-08T12:17:09.000000Z"
        }

- **Actualizar Software** - http://localhost:8000/api/software/{id} (PUT)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla software)
    *Datos* - Formato de Tipo JSON, utilizar la siguiente estructura. Todos los campos son obligatorios
        {
            "name": "Antivirus ESET",
            "sku" : "0987654321",
            "system": "Windows",
            "price": 35.00
        }
    *Respuesta* - Formato de Tipo JSON, sistema Devuelve la sigueinte estructura.
        {
            "id": 1,
            "name": "Antivirus ESET",
            "system_operative": "Windows",
            "stock": 1,
            "status": "A",
            "license": "mjV4ibkIKw4tZvZfQgxDO7L7I9HBS7pciG4fmQT5UVGUKCJXXt9LnkOZXA0DPHyFa9DjMcm8hyB3ut98HvgbxS42LHISYiKkKbiY",
            "sku": "0987654321",
            "price": 35,
            "created_by": "Seeder",
            "updated_by": "Marvin",
            "created_at": "2024-01-07T15:58:58.000000Z",
            "updated_at": "2024-01-08T12:20:35.000000Z"
        }

- **Eliminar Software** - http://localhost:8000/api/software/{id} (DELETE)
    *Headers* - Usar el Token Generado en el Api Generar Token\
        {
            "Authorization": (*token*) 
        }
    *Parametros* - Identificadores
        id: (Identificador de registro en la tabla software)
    *Datos* - No Aplica
    *Respuesta* - Eliminado Logico el registro se mantiene, el producto cambia a Estado D
        "Item Eliminado"


## Uso de Archivo JSON en POSTMAN

Si esta instalado POSTMAN en tu computador en el proyecto existe una coleccion donde se encuentan alojadas todas las rutas para que se puedan realizar cada una de las pruebas necesarias y verificar la funcionalidad del sistema. **Challenge.postman_collection.json**


**Proyecto Creado Por:** *Marvin Zambrano - Software Developer*

