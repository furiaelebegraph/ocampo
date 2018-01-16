@component('mail::message')
# Hola, tienes un **correo nuevo**

@component('mail::panel')
	{{$data['correo']}}<br>
	{{$data['nombre']}}<br>
	{{$data['telefono']}}<br>
	{{$data['compania']}}<br>
	{{$data['contenido']}}<br>
@endcomponent

Gracias,<br>
**2be.site**
@endcomponent