## Prueba Imuko

Para correr esta app, clónela a un directorio local y ejecute

    composer install

Asegúrese de crear una base de datos en su servidor MySql y configurar el archivo `.env` acordemente.

Esta app usa una cuenta de Gmail para enviar correos, por favor configure unas credenciales de Gmail válidas en el archivo `.env`.

Igualmente, la función de envío de correos usa el queue worker de Laravel, por lo que debe correr el comando `php artisan queue:work` para permitir el envío de correos.

Para crear la base de datos y alimentarla con información, corra el comando `php artisan imuko:reseed`.

### Cambiar en el `.env`

    APP_URL=[url de la app]
    
    DB_DATABASE=[nombre de la bd]
    DB_USERNAME=[usuario]
    DB_PASSWORD=[contraseña]
    
    MAIL_USERNAME=[correovalido@gmail.com]
    MAIL_PASSWORD=[micontrasena]
    
Puede ver una copia de esta app en funcionamiento en [https://imuko.guillermoagudelo.ga](https://imuko.guillermoagudelo.ga)

App desarrollada por Guillermo Agudelo para Imuko.
