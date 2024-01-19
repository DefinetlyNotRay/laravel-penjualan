<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/output.css">
    <link rel="stylesheet" href="/idk.css">

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>|
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @push('head')
    <script src="{{ asset('js/components/script.js')}}"></script>
    @endpush
    <title>CRUD Barang</title>
</head>
<body>
    <nav class="fixed top-0 z-20 w-full border-b border-gray-200 bg-primary dark:bg-primary start-0 dark:border-gray-600">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <p class="font-black text-white">KASIR</p>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <a href="/logout" class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log out</a>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 nav-close" id="navbar-sticky"  >
            <ul class="flex flex-col p-4 mt-4 font-medium border rounded-lg md:p-0 bg-primary md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-primary dark:bg-gray-900 md:dark:bg-primary dark:border-gray-700">
                <li>
                    <a href="/dashboardAdmin" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" >Kasir</a>
                  </li>
                  <li>
                    <a href="/CRUDBarang" class="block px-3 py-2 font-bold text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">CRUD Barang</a>
                  </li>
                  <li>
                    <a href="/CRUDKasir" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">CRUD Akun</a>
                  </li>
                  <li>
                      <a href="/history" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">History</a>
                    </li>
              </ul>
        </div>
        </div>
      </nav>

   
      <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1>Edit Barang: {{$user->name}}</h1>
                <form class="space-y-4 md:space-y-6" action="/userEditData/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                        <input type="text" name="nama" value="{{$user->name}}" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E.g: Laptop.." required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="password" name="password" id="password" value="{{$user->password}}" placeholder="E.g: 10 " class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <div>
                            <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                            <select name="level" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                                @foreach(\App\Models\User::LEVELS as $level)
                                    <option value="{{ $level }}">{{ ucfirst($level) }}</option>
                                @endforeach
                            </select>
                        </div>                   
                     </div>
                  
                    <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-500 dark:focus:ring-primary-800">Submit Item</button>
                  
                </form>
            </div>
        </div>
    </div>
     
</body>
</html>