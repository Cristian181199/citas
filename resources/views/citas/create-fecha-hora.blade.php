<x-create-citas>
    <h1 class="text-xl">Seleccione la fecha y hora</h1>
        @foreach ($citas as $cita)
            <a class="px-4 m-2 rounded bg-gray-300" href="{{ route('crear-cita-confirmar', [$compania, $cita]) }}">
                {{ $cita->fecha_hora }}
            </a>
        @endforeach
    <a href="{{ route('crear-cita-especialista', [$compania, $especialidad, $especialista]) }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
</x-create-citas>
