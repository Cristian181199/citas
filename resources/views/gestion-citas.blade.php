<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="py-4">
                        <a class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300" href="{{ route('ver-citas') }}">Mis citas</a>
                    </div>

                    <div class="py-4">
                        <a class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-green-500 hover:bg-green-400 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" href="{{ route('crear-cita') }}">Cita nueva</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
