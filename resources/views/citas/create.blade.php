<x-create-citas name="Companias">
    <h1 class="text-xl">Seleccione la compañía aseguradora</h1>
    @foreach ($companias as $compania)
        @php
            if ($companias_usuario->contains($compania)) {
                $class = 'bg-green-300';
            } else {
                $class = 'bg-gray-300';
            }
        @endphp
        <a class="px-4 m-2 rounded {{ $class }}" href=" {{ route('crear-cita-especialidad', $compania) }} ">
            {{ $compania->denominacion }}
        </a>
    @endforeach
    <a href="{{ route('dashboard-citas') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
</x-create-citas>
