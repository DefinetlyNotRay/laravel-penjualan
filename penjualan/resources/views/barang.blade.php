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

        
        <div class="mt-20 overflow-x-hidden">
            <button class="p-2 ml-5 bg-blue-200 rounded">Stock ASC</button> <button class="p-2 bg-blue-200 rounded">Stock DESC </button> <button class="p-2 bg-blue-200 rounded">Name LIKE KIRI</button> <button class="p-2 bg-blue-200 rounded">Name LIKE TENGAH</button><button class="p-2 bg-blue-200 rounded">Name LIKE KANAN</button>            
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
                                           <th scope="col" class="px-6 py-4 text-left border-r dark:border-neutral-500">Items</th>
                                           <th scope="col" class="w-16 px-2 py-4 text-center border-r dark:border-neutral-500">Stock</th>
                                           <th scope="col" class="w-10 w-32 px-6 py-4 text-center border-r dark:border-neutral-500">Harga</th>
                                           <th scope="col" class="w-10 px-6 py-4 text-center">Action</th>
                                       </tr>
                                   </thead>
                                   
                                   
                               </tr>
                           </thead>
                           <tbody id="tableBody">
                            @php
                            $no = 1; // Initialize $no before the loop
                        @endphp
                           
                            @foreach($barang as $items)
                            <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            {{$no++}}
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            {{$items->nama_barang}}
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            {{$items->stock}}
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap harga dark:border-neutral-500">
                                {{ number_format($items->harga, 0, ',', '.') }}
                            </td>
                            <td class="flex gap-3 px-6 py-4 whitespace-nowrap"> 
                             <a href="/barangEdit/{{$items->id_barang}}">
                                 <button class="pt-2 pb-2 pl-3 pr-3 text-center text-white bg-info" >
                                  Edit
                             </button> 
                             </a>
                             <form action="/barangDelete/{{$items->id_barang}}" method="POST">
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
                                <a href="/barangAdd">
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
        const harga = document.querySelector('.harga').value;
        console.log(harga);
     </script>
</body>
</html>