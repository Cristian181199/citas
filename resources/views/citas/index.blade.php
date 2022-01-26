<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <x-success-message/>
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Especialista
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Especialidad
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Compañía
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Fecha y hora
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Anular
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($citas as $cita)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $cita->especialista->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $cita->especialista->especialidad->denominacion }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $cita->compania->denominacion }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $cita->fecha_hora }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('anular-cita', $cita) }}" method="POST">
                                            @method('DELETE')
                                            <button class="px-4 py-1 text-sm text-white bg-red-400 rounded" type="submit"> Anular </button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                <a href="{{ route('dashboard-citas') }}" class="mt-4 text-blue-900 hover:underline">Volver</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
