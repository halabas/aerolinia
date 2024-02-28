<x-app-layout>

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error</span> {{ session()->get('error') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'codigo_vuelo') }}">Vuelo</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'aeropuerto_salida') }}">Aeropuerto de salida</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'aeropuerto_llegada') }}">Aeropuerto de llegada</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'salida') }}">Hora de salida</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'llegada') }}">Hora de llegada</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'plazas') }}">Plazas totales</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ url('ordenar', 'precio') }}">precio</a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reservar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->codigo_vuelo }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $vuelo->aeropuerto_salida->codigo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vuelo->aeropuerto_llegada->codigo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vuelo->salida }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vuelo->llegada }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vuelo->plazas}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vuelo->precio }}€
                        </td>

                        <td class="px-6 py-4">
                            <x-primary-button><a
                                    href="{{ route('billetes.reservar', $vuelo->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reservar</a></x-primary-button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vuelos->links() }}

    </div>

</x-app-layout>
