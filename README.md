## Prueba Imuko

Para correr esta app, clónela a un directorio local y ejecute

    composer install

Asegúrese de crear una base de datos en su servidor MySql y configurar el archivo `.env` acordemente.

Esta app usa una cuenta de Gmail para enviar correos, por favor configure unas credenciales de Gmail válidas en el archivo `.env`.

Igualmente, la función de envío de correos usa el queue worker de Laravel, por lo que debe correr el comando `php artisan queue:work` para permitir el envío de correos.

App desarrollada por Guillermo Agudelo para Imuko.
