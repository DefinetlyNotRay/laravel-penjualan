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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @push('head')
    <script src="{{ asset('js/components/script.js')}}"></script>
    @endpush



    
    <title>Kasir</title>
    
</head>
<body class="w-screen h-screen">
    @auth
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
              <a href="/dashboardAdmin" class="block px-3 py-2 font-bold text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Kasir</a>
            </li>
            <li>
              <a href="/CRUDBarang" class="block px-3 py-2 text-white rounded hover:bg-black md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">CRUD Barang</a>
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
      <section class="absolute inset-0 flex items-center justify-center main-section" >
        <div class="p-6 bg-white border-2 w-fit "id="content">
            @foreach($struk as $s)
            @php
                $id_struk = $s->id_struk;
                $id_user = $s->id;
                $user = $user->name;
                $timestamp = $s->created_at;
            @endphp
            <div>
              <h1 class="mb-4 text-xl font-bold text-center">Pelita Dunia Electric</h1> 
              <p class="mb-4 font-normal text-center">jl</p> 
              <div class="flex items-center justify-center gap-5 text-sm">
                <div class="">
                    <p class="">Struk #:{{$id_struk}} </p>
                    <p class="">Oleh:{{$user}} </p>
                </div>
                <div class="">
                    <p class="">{{$timestamp}}</p>
                    <p class="">Kasir: Main Register</p>    
                </div>
              </div>
              <hr>
              <div class="flex items-center justify-center gap-6">
                <p class="mr-5">Barang</p>
                <p class="">Harga</p>
                <p class="">Jumlah</p>
                <p class="">Total</p>
              </div>
              <hr>  
              <div class="flex flex-col items-center justify-center gap-6 text-sm">
                @foreach($itemss as $item)
                <div class="flex items-center justify-center gap-6 text-s">
                  <p class="">{{ $item['name'] }}</p>
                
                  <p class="">{{ $item['harga'] }}</p>
                  <p class="">{{ $item['quantity'] }}</p>
                  <p class="">{{$item['total']}}</p>
                </div>
               
                @endforeach
              </div>
              <hr>
              <div class="flex justify-end">
                <div class="">
                    <p></p>
                </div>
                <div class="flex flex-col gap-1 text-sm">
                    <p class="mt-2">Total Pembelian: {{$s->jumlah_barang}} </p>
                    <p class="">Subtotal: Rp. {{number_format($s->total, 0, '.', ',')}}</p>
                    <p class="">Diskon: {{$s->diskon}}%</p>
                    <hr>
                    <p class="">Total: Rp. {{number_format($s->jumlah_total, 0, '.', ',')}}</p>
                    <hr>
                    <p class="">Tunai: Rp. {{number_format($s->tunai, 0, '.', ',')}} </p>
                    <hr>
                    <p class="">Kembalian: Rp. {{number_format($s->kembalian, 0, '.', ',')}} </p>
                </div>
                
              </div>
              <hr>
              <div class="flex justfiy-center max-w-96">
                  <p class="font-thin text-[12px] text-center ">Barang TIDAK DAPAT ditukar/dikembalikan dengan ALASAN APAPUN. Sebelum dibayar akan dicoba, keruskana barang bukan tanggung jawab kami </p>
              </div>
           
            </div>
            @endforeach
        </div>
      </section>
    @endauth
    <script>
      document.addEventListener("DOMContentLoaded", (event) => {
    const invoice = this.document.getElementById("content");
    var contentWidth = invoice.offsetWidth;
    var contentHeight = invoice.offsetHeight;
    console.log(invoice);
    console.log(window);
    var opt = {
      margin: 1,
      filename: `Data.pdf`,
      image: {
        type: 'jpeg',
        quality: 0.98
      },
      html2canvas: {
        scale: 2
      },
      jsPDF: {
        unit: 'in',
        format: 'tabloid',
        orientation: 'landscape'
      }
    };
    html2pdf().from(invoice).set(opt).save();
  });
    </script>
   
    
    

  
</body>
</html>