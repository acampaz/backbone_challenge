<h1 align="center"> Reto Técnico BackBone Systems </h1>

<p align="left">
   <img src="https://img.shields.io/badge/Status-Stable-brightgreen">
   </p>

## About this API
<hr>
Esta API, es para el reto técnico para el cargo Backend Developer en Backbone systems.
La API replica la funcionalidad de la siguiente API:
-  https://jobs.backbonesystems.io/api/zip-codes/{zip_code}

La API se desarrolló creando importando el archivo excel con la data hacia una base de datos
MySQL, para lo cual existen 2 opciones, una es mediante un endpoint y la otra es mediante un
comando creado específicamente para esta tarea, una vez con la data importada, se realiza la
consulta a la tabla correspondiente mediante el zip code y su índice, ya con data solicitada
se procede a crear la estructura correspondiente de la respuesta del endpoint, la cual se
serializa a JSON.

## Funcionalidad del proyecto
<hr>
- Recibir un código postal (Mexico) y en base a este entregar los datos correspondientes del mismo
- Importar los datos del Excel a la base de datos mediante un endpoint.
- Importar los datos del Excel a la base de datos mediante un comando artisan.

## Ejemplo de respuesta
<hr>

<pre>
{
    "zip_code": "20020",
    "locality": "AGUASCALIENTES",
    "federal_entity": {
            "key": 1,
            "name": "AGUASCALIENTES",
            "code": null
    },
    "settlements": [
            {
            "key": 16,
            "name": "BUENOS AIRES",
            "zone_type": "URBANO",
            "settlement_type": {
                "name": "Colonia"
                }
            },
            {
            "key": 18,
            "name": "CIRCUNVALACION NORTE",
            "zone_type": "URBANO",
            "settlement_type": {
                "name": "Fraccionamiento"
                }
            },
            {
            "key": 19,
            "name": "LAS ARBOLEDAS",
            "zone_type": "URBANO",
            "settlement_type": {
                "name": "Fraccionamiento"
                }
            },
            {
            "key": 20,
            "name": "VILLAS DE SAN FRANCISCO",
            "zone_type": "URBANO",
            "settlement_type": {
                "name": "Fraccionamiento"
                }
            }
    ],
    "municipality": {
    "key": 1,
    "name": "AGUASCALIENTES"
    }
}
</pre>
<hr>
## Tecnologías utilizadas
- php: >= 8.0.2
- Laravel: >= 9.19
- MySQL: >= 5.7.24

## Otros
<hr>

Dentro del proyecto se utilizó tambien lo siguiente:

- Migraciones
- Eloquent
- Mapeo de datos
- Creación de comandos artisan
- Importación de archivos Excel
- PSR 12
