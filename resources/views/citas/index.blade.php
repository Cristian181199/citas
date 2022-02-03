<x-contenido>
    <x-slot name="cabecera">
        Mis Citas
    </x-slot>
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
    <a href="{{ route('dashboard-citas') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>

</x-contenido>
