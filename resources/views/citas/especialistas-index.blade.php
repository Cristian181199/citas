<x-contenido>
    <x-slot name="cabecera">
        Citas pendientes del especialista
    </x-slot>

    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Fecha y hora
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Paciente
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Compania
                </th>

            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($citas as $cita)
                <tr class="whitespace-nowrap">
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $cita->fecha_hora->locale('es_ES')->timezone('Europe/Madrid')->isoFormat('DD-MM-YYYY HH:mm') }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $cita->paciente->nombre }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $cita->compania->denominacion }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard-especialista') }}" class="bg-red-500 hover:bg-red-400 transition-colors rounded-[8px] px-[15px] py-[4px] text-white focus:ring-2 ring-red-500">Volver</a>

</x-contenido>
