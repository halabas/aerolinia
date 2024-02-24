<x-app-layout>



<form class="max-w-xl mx-auto">
    <div class="mb-5">
      <label for="Codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo Vuelo</label>
      <input type="text" value="{{$vuelo->codigo}}" disabled id="Codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5">
        <select>
            @foreach ($asientosdispo as $asiento)
                <option>{{$asiento}}</option>
            @endforeach
        </select>

    </div>
    <div class="flex items-start mb-5">
      <div class="flex items-center h-5">
        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
      </div>
      <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
    </div>
<x-primary-button>Reservar</x-primary-button>
  </form>



</x-app-layout>
