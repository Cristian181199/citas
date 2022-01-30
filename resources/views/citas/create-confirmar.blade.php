<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
                        <h1 class="text-2xl">Datos de la cita:</h1>

                        <h3 class="border-t mb-2 pt-3 font-semibold">Compania: <span class="font-thin">{{ $compania->denominacion }}</span></p>
                        <h3 class="border-t mb-2 pt-3 font-semibold">Nombre: <span class="font-thin">{{ $usuario->name }}</span></p>
                        <h3 class="border-t mb-2 pt-3 font-semibold">Especialidad: <span class="font-thin">{{ $cita->especialista->especialidad->denominacion }}</span></p>
                        <h3 class="border-t mb-2 pt-3 font-semibold">Especialista: <span class="font-thin">{{ $cita->especialista->nombre }}</span></p>
                        <h3 class="border-t mb-2 pt-3 font-semibold">Fecha y Hora: <span class="font-thin">{{ $cita->fecha_hora }}</span></p>

                        <h3 class="border-t mb-2 pt-3 font-semibold">Email:
                            <span class="font-thin">{{ $usuario->email }}</span></p>
                        <div class="flex justify-end space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 cursor-pointer" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2 pt-3">
                            <a href="{{ route('crear-cita-fechaHora', [$compania, $cita->especialista->especialidad, $cita->especialista]) }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>
                        <form action="{{ route('guardar-cita', [$compania, $cita]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-500 hover:bg-green-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-green-500" type="submit">Confirmar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
