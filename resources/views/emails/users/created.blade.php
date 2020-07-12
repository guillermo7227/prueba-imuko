@component('mail::message')
# Su cuenta ha sido creada

Un Administrador creó una cuenta para usted. Por favor, de clic en el siguiente botón para activar su cuenta.

**NOTA al Evaluador: Por favor, asegúrese de no tener una sesión iniciada en la app de Prueba para que este enlace funcione, ya que este enlace solo es para usuarios que van a activar una cuenta (no logueados).**

@component('mail::button', ['url' => $actionUrl])
    Activar mi cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
