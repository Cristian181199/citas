<x-contenido>
    <x-slot name="cabecera">
        Especialidades
    </x-slot>
    <h1 class="text-xl">Seleccione la especialidad</h1>
        @foreach ($especialidades as $especialidad)
            <a class="px-4 m-2 rounded bg-gray-300" href=" {{ route('crear-cita-especialista', [$compania, $especialidad]) }} ">
                {{ $especialidad->denominacion }}
            </a>
        @endforeach
    <a href="{{ route('crear-cita') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
</x-create-citas>
