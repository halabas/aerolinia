<x-app-layout>

    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Error</span> {{session()->get('error')}}
      </div>
    @endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <td scope="col" class="px-6 py-3">
                    Vuelo
                </td>
                <td scope="col" class="px-6 py-3">
                    Propietario del billete
                </td>
                <td scope="col" class="px-6 py-3">
                    Aeropuerto de salida
                </td>
                <td scope="col" class="px-6 py-3">
                    Aeropuerto de llegada
                </td>
                <td scope="col" class="px-6 py-3">
                    Hora de salida
                </td>
                <td scope="col" class="px-6 py-3">
                    Hora de llegada
                </td>
                <td scope="col" class="px-6 py-3">
                    NºAsiento
                </td>
                <td scope="col" class="px-6 py-3">
                    precio
                </td>

            </tr>
        </tdead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$vuelo->codigo_vuelo}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{\App\Models\User::find(auth()->id())->name}}
                </td>
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
                    Nº{{$billete->asiento}}
                </td>
                <td class="px-6 py-4">
                    {{$vuelo->precio}}€
                </td>

            </tr>

        </tbody>
    </table>
</div>



</x-app-layout>
