<x-layout>
    <x-slot:title>Acceso no autorizado</x-slot:title>
    <section id="prohibido">
         <div class="container mt-5 text-center">
        <h1 class="text-danger">🚫 No estás autorizado para ingresar</h1>
        <p class="mt-3">Tu usuario actual no tiene permisos para acceder a esta sección.</p>

        <a href="{{ route('home') }}" class="btn btn-primary mt-4">
            Volver al inicio
        </a>
    </div>
    </section>
   
</x-layout>
