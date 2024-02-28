<x-app-layout>



<form class="max-w-xl mx-auto" method="POST" action="{{route('billetes.store')}}">
    @csrf
    <div class="mb-5">
      <label for="Codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo Vuelo</label>
      <input type="text" value="{{$vuelo->codigo_vuelo}}" disabled id="Codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
      <input type="hidden" name="vuelo" value="{{$vuelo->id}}"  id="Codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
      <input type="text" disabled value="Plazas disponibles {{$vuelo->plazas - $vuelo->billetes->count()}}">
    </div>
    <div class="mb-5">
        <select name="asiento">
            @foreach ($asientosdispo as $asiento)
                <option>{{$asiento}}</option>
            @endforeach
        </select>

    </div>

<x-primary-button>Reservar</x-primary-button>
  </form>



</x-app-layout>
