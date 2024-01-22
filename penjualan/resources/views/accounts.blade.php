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
    <title>CRUD Akun Kasir</title>
    <style>
        #alert-2,#alert-3,#alert-4,#alert-5 {
            z-index: 9999; /* Set a high z-index value */
        }
    </style>
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
                <a href="/dashboardAdmin" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kasir</a>
            </li>
            <li>
                <a href="/CRUDBarang" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">CRUD Barang</a>
            </li>
            <li>
                <a href="/CRUDKasir" class="block px-3 py-2 font-bold text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">CRUD Akun</a>
            </li>
            <li>
                <a href="/history" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">History</a>
              </li>
          </ul>
        </div>
        </div>
    </nav>
    @if(session('message'))
    <div id="alert-3" class="absolute z-10 flex items-center p-4 mb-4 ml-5 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
         {{session('message')}}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
    @elseif(session('error'))
    <div id="alert-2" class="absolute flex items-center p-4 mb-4 ml-5 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{session('error')}}        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
      @endif
    <div id="alert-4" class="absolute z-10 flex items-center hidden p-4 mb-4 ml-5 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="text-sm font-medium ms-3">
       Please type a letter in the input
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    <div class="mt-20 overflow-x-hidden">
        <div class="flex items-end mb-2">
            <div>
                <a class="p-2 pt-2 ml-5 bg-blue-200 rounded " href="/nameOrder/asc">Name ASC</a> 
                <a class="p-2 pt-2 bg-blue-200 rounded " href="/nameOrder/desc">Name DESC </a> 

            </div>
            <div class="flex flex-col w-fit border-l-[4px] border-black ml-2">
                <input type="text" name="" class="mb-5 ml-2" id="inputName" placeholder="Insert one character, E.g: a">
                <div>
                    <a class="p-2 pt-2 ml-2 bg-blue-200 rounded" href="#" onclick="updateHref('left')">Name LIKE KIRI</a>
                    <a class="p-2 pt-2 bg-blue-200 rounded" href="#" onclick="updateHref('middle')">Name LIKE TENGAH</a>
                    <a class="p-2 pt-2 ml-2 bg-blue-200 rounded" href="#" onclick="updateHref('right')">Name LIKE KANAN</a>
                    <a class="p-2 pt-2 ml-2 bg-blue-200 border-l border-black rounded" href="/CRUDBarang">Back</a>
                </div>
  
            </div>
        </div>
       <div class="items-center ">
           <div class="overflow-x-hidden sm:-mx-6 lg:-mx-8">
               <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                   <div class="overflow-hidden">
                   <table
                       class="flex-col w-[1840px] ml-5 text-sm font-light text-center border dark:border-neutral-500">
                       <thead class="font-medium text-left border-b dark:border-neutral-500">
                           <tr>
                               <thead class="font-medium text-left border-b dark:border-neutral-500">
                                   <tr>
                                       <th scope="col" class="w-10 px-6 py-4 text-left border-r dark:border-neutral-500">No</th>
                                       <th scope="col" class="px-6 py-4 text-left border-r dark:border-neutral-500">Nama</th>
                                       <th scope="col" class="w-16 px-2 py-4 text-center border-r dark:border-neutral-500">Password</th>
                                       <th scope="col" class="w-10 w-32 px-6 py-4 text-center border-r dark:border-neutral-500">Level</th>
                                       <th scope="col" class="w-10 px-6 py-4 text-center">Action</th>
                                   </tr>
                               </thead>
                               
                               
                           </tr>
                       </thead>
                       <tbody id="tableBody">
                        @php
                        $no = 1; // Initialize $no before the loop
                    @endphp
                       
                        @foreach($user as $users)
                        <tr class="border-b dark:border-neutral-500 original-row">
                        <td
                        class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                        {{$no++}}
                        </td>
                        <td
                        class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                        {{$users->name}}
                        </td>
                        <td
                        class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                        {{$users->password}}
                        </td>
                        <td class="px-6 py-4 border-r whitespace-nowrap harga dark:border-neutral-500">
                            {{ $users->level }}
                        </td>
                        <td class="flex gap-3 px-6 py-4 whitespace-nowrap"> 
                         <a href="/userEdit/{{$users->id}}">
                             <button class="pt-2 pb-2 pl-3 pr-3 text-center text-white bg-info" >
                              Edit
                         </button> 
                         </a>
                         <form action="/userDelete/{{$users->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 pb-2 text-center text-white bg-danger" >
                                Delete
                           </button> 
                        </form>
                       
                        </td>
                    </tr>
                    @endforeach
                        <tr class="border-b dark:border-neutral-500 original-row">
                           <td
                           class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                           {{$no++}}
                           </td>
                           <td
                           class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                           
                           </td>
                           <td
                           class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                           
                           </td>
                           <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                           <td class="px-6 py-4 whitespace-nowrap"> 
                            <a href="/kasirAdd">
                                <button class="p-2 pb-2 text-center text-white bg-success" >
                                 Add Barang+
                            </button> 
                            </a>
                           </td>

                           
                       
                       </tr>
                       
                      
                       
                       </tbody>
                      
                   </table>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <script>
        function updateHref(position) {
           var inputText = document.getElementById('inputName').value.trim(); // Trim whitespace

           if (inputText === "") {
               const alertSubmit = document.getElementById('alert-4')
                alertSubmit.classList.remove('hidden','opacity-0');
           return;
       }
       console.log("Function called");
       var inputText = document.getElementById('inputName').value;
       console.log("Input text: " + inputText);
       var href = "/nameLike/" + position + "/" + inputText;
       console.log("New href: " + href);
       window.location.href = href;
   }
    </script>
</body>
</html>