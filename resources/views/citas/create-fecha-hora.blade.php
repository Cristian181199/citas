<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fecha y hora') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <h1 class="text-xl">Seleccione la fecha y hora</h1>
                        @foreach ($citas as $cita)
                            <a class="px-4 m-2 rounded bg-gray-300" href="#">
                                {{ $cita->fecha_hora }}
                            </a>
                        @endforeach
                    <a href="{{ route('crear-cita-especialista', [$compania, $especialidad, $especialista]) }}" class="mt-4 text-blue-900 hover:underline">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
