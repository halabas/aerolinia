<x-app-layout>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Vuelo
                </th>
                <th scope="col" class="px-6 py-3">
                    Aeropuerto de salida
                </th>
                <th scope="col" class="px-6 py-3">
                    Aeropuerto de llegada
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora de salida
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora de llegada
                </th>
                <th scope="col" class="px-6 py-3">
                    asientos disponibles
                </th>
                <th scope="col" class="px-6 py-3">
                    precio
                </th>
                <th scope="col" class="px-6 py-3">
                    Reservar
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo )

            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$vuelo->codigo}}
                </th>
                <td class="px-6 py-4">
                    {{$vuelo->aeropuerto_salida->codigo}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->aeropuerto_llegada->codigo}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->salida}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->llegada}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->plazas - $vuelo->billetes->count()}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->precio}}€
                </td>

                <td class="px-6 py-4">
                    <x-primary-button><a href="{{route('billetes.reservar',$vuelo->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reservar</a></x-primary-button>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



</x-app-layout>
