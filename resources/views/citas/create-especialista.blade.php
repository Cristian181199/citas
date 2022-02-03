<x-contenido>
    <x-slot name="cabecera">
        Especialistas
    </x-slot>

    <h1 class="text-xl">Seleccione al especialista</h1>

        @foreach ($especialistas as $especialista)
            <a class="px-4 m-2 rounded bg-gray-300" href="{{ route('crear-cita-fechaHora', [$compania, $especialidad, $especialista]) }}">
                {{ $especialista->nombre }}
            </a>
        @endforeach

    <a href="{{ route('crear-cita-especialidad', [$compania, $especialidad]) }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
</x-contenido>

