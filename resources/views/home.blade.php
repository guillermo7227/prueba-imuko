@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 class="mb-4">Bienvenido, {{auth()->user()->firstName}}</h3>
        <p>Esta es una prueba para Imuko realizada por Guillermo Agudelo. Use los enlaces de arriba para navegar por las secciones del sitio.</p>
        <p>
            Funcionalidades:
            <ul>
                <li>CRUD de entidades Ciudades, Clientes y Usuarios</li>
                <li>Puede recrear y alimentar la base de datos con el comando <code>php artisan imuko:reseed</code></li>
                <li>Con las tecnologías Bootstrap 4, Font Awesome 5, Laravel 7</li>
                <li>Paginación de registros</li>
                <li>Puede filtrar los Clientes según ciudad</li>
                <li>Diseño responsive para dispositivos móviles</li>
                <li>Cuando crea un usuario, se envía un email a la dirección de correo del nuevo usuario. Por favor, asegúrese de correr el comando <code>php artisan queue:work</code> para ejecutar el queue worker de Laravel y lograr que esta funcionalidad pueda operar bien. También se usa el servidor SMTP de Gmail para enviar correos, por lo que debe asegurarse de configurar unas credenciales de Gmail válidas en el archivo de variables de entorno (<code>.env</code>)</li>
            </ul>
        </p>
    </div>

@endsection
