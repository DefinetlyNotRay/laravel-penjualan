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



    
    <title>Kasir</title>
    
</head>
<body>
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
      <section class="mt-[2.3rem] main-section">
     <div>           
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                    <table
                        class="min-w-full text-sm font-light text-center border dark:border-neutral-500">
                        <thead class="font-medium text-left border-b dark:border-neutral-500">
                            <tr>
                                <thead class="font-medium text-left border-b dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="w-10 px-6 py-4 text-left border-r dark:border-neutral-500">No</th>
                                        <th scope="col" class="px-6 py-4 text-left border-r dark:border-neutral-500">Items</th>
                                        <th scope="col" class="w-16 px-2 py-4 text-center border-r dark:border-neutral-500">Quantitas</th>
                                        <th scope="col" class="w-10 px-6 py-4 border-r dark:border-neutral-500">Harga</th>
                                        <th scope="col" class="w-10 px-6 py-4">Action</th>
                                    </tr>
                                </thead>
                                
                                
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            1
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                            Delete
                        </button> </td>

                            
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            2
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            3
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            4
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            5
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            6
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            7
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            8
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            9
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            10
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            11
                            </td>
                            <td
                            class="px-6 py-4 text-left border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            
                            </td>
                            <td class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500"></td>
                            <td class="px-6 py-4 whitespace-nowrap"> <button class="pt-2 pb-2 text-center text-white bg-danger" onclick="deleteRow(this)">
                                Delete
                            </button></td>
                        </tr>
                        
                        
                        
                        </tbody>
                        <tr class="border-b dark:border-neutral-500 original-row">
                            <td colspan="2"
                            class="px-6 py-4 font-medium border-r whitespace-nowrap dark:border-neutral-500">
                            Total Item
                            </td>
                           
                            <td colspan="1" id="jumlah-qty"
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                            0
                            </td>
                            <td colspan="1" id="harga-jumlah"
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                                0
                            </td>
                            <td colspan="1" id="harga-diskon"
                            class="px-6 py-4 border-r whitespace-nowrap dark:border-neutral-500">
                                <input type="text" name="diskon" id="diskon" placeholder="diskon" class="w-[53px] h-[20px] text-xs" onchange="diskon()">
                            </td>
                           
                        </tr>
                        <tr><td colspan="2" class="border-r whitespace-nowrap dark:border-neutral-500"><input placeholder="Tunai" class="w-full h-[30px] text-sm"  type="text" name="jumlah-tunai" id="jumlah-tunai" onchange="kembalianChange()"></td>
                    <td colspan="3" class="border-r whitespace-nowrap dark:border-neutral-500"><input placeholder="Kembalian" class="w-full h-[30px] text-sm"  type="text" id="kembalian" name="kembalian" ></td></tr>

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="flex items-center justify-center">
            <div class="flex flex-col gap-10">
                <div class="flex gap-10">
                    <div class="flex flex-col w-18">
                        <label for="searchComboBox">Select Option:</label>
                        <input type="text" id="searchInput" oninput="filterOptions()" placeholder="Search...">
                        <select id="searchComboBox">
                            @foreach($barang as $items)
                            <option value="{{ $items->nama_barang }}">{{ $items->nama_barang }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="flex flex-col w-18">
                        <label for="">Quantitas</label>
                        <input type="text" id="quantitasInput" value="0">
                    </div>
                    {{-- <div class="flex flex-col w-14">
                        <label for="">Diskon</label>
                        <input type="text" class="w-14" id="diskonInput">
                    </div> --}}
                </div>
              
                <div class="flex flex-col gap-10">
                    <button class="pt-2 pb-2 text-center text-white cursor-pointer bg-success" onclick="handleFormSubmit()">Enter</button>
                    <button class="pt-2 pb-2 text-center text-white cursor-pointer bg-info" onclick="printF()" >Print Struk</button>
                
                </div>
            <div></div>
        </div>
      </section>
      <script>
        
            var originalOptions = Array.from(document.getElementById('searchComboBox').options);
            function filterOptions() {
                // Get the input value
                var input = document.getElementById('searchInput').value.toLowerCase();
                
                // Filter the options based on the input
                var filteredOptions = originalOptions.filter(function (option) {
                    return option.value.toLowerCase().includes(input);
                });

                // Clear the current options
                document.getElementById('searchComboBox').innerHTML = '';

                // Append the filtered options to the combo box
                filteredOptions.forEach(function (option) {
                    document.getElementById('searchComboBox').appendChild(option.cloneNode(true));
                });
            }
            function diskon() {
            const diskon = parseFloat(document.getElementById('diskon').value);
            const jumlahHarga = parseFloat(document.getElementById('harga-jumlah').textContent);
            const discountedHarga = jumlahHarga - (jumlahHarga * (diskon / 100));

            // Update the content of the total harga cell
            document.getElementById("harga-jumlah").textContent = discountedHarga;
            }
            function updateTotalHarga() {
                var tableBody = document.getElementById("tableBody");
                var totalHarga = 0;

                // Iterate through rows to calculate total harga
                for (var i = 0; i < tableBody.rows.length; i++) {
                    var hargaCell = tableBody.rows[i].cells[3];
                    var hargaValue = parseFloat(hargaCell.textContent.trim());

                    if (!isNaN(hargaValue)) {
                        totalHarga += hargaValue;
                    }
                }

                // Update the content of the total harga cell
                document.getElementById("harga-jumlah").textContent = totalHarga;
            }
            function jumlahBarang() {
                var tableBody = document.getElementById("tableBody");
                var totalBarang = 0;

                // Iterate through rows to calculate total harga
                for (var i = 0; i < tableBody.rows.length; i++) {
                    var barang = tableBody.rows[i].cells[2];
                    var barangValue = parseFloat(barang.textContent.trim());

                    if (!isNaN(barangValue)) {
                        totalBarang += barangValue;
                    }
                }

                // Update the content of the total harga cell
                document.getElementById("jumlah-qty").textContent = totalBarang;
            }
            
            function findEmptyRow(tableBody) {
            // Iterate through rows to find an existing empty row
            for (var i = 0; i < tableBody.rows.length; i++) {
                if (tableBody.rows[i].cells[1].textContent.trim() === "") {
                    return tableBody.rows[i];
                }
            }
            return null;
            }
            async function handleFormSubmit() {
        var selectedOption = document.getElementById("searchComboBox").value;
        var quantitas = document.getElementById("quantitasInput").value;

        // Validate the quantity
        if (!isFinite(quantitas) || parseFloat(quantitas) <= 0) {
            alert("Please enter a valid quantity greater than zero.");
            return false; // Prevent form submission
        }

        // Use AJAX to fetch harga from the server
        try {
            var response = await $.ajax({
                url: '/getHarga',
                method: 'GET',
                data: { nama_barang: selectedOption }
            });

            if (response.harga !== undefined) {
                // Check if there is an existing empty row
                var tableBody = document.getElementById("tableBody");
                var emptyRow = findEmptyRow(tableBody);

                if (emptyRow) {
                    // Use the existing empty row to update values
                    updateRow(emptyRow, selectedOption, quantitas, response);
                } else {
                    // If no existing empty row is found, create a new row
                    var newRow = createNewRow(tableBody, selectedOption, quantitas, response);
                    tableBody.appendChild(newRow);
                }

                // Update the total harga
                jumlahBarang();
                updateTotalHarga();
            } else {
                alert("Harga not found for the selected option");
            }
        } catch (error) {
            alert("Error fetching harga: " + error);
        }

        // Clear input fields for the next entry
        document.getElementById("searchInput").value = "";
        document.getElementById("quantitasInput").value = "";

        return false; // Prevent form submission
    }

    function kembalianChange() {
        const tunai = parseFloat(document.getElementById('jumlah-tunai').value);
        const jumlahHarga = parseFloat(document.getElementById('harga-jumlah').textContent);
        const kembalianInput = document.getElementById('kembalian'); // Get the actual input element
        const kembalian = tunai - jumlahHarga;
        kembalianInput.value = kembalian;
    }

        function printF() {
            const jumlahHarga = parseFloat(document.getElementById('harga-jumlah').textContent);
            const qty = document.getElementById('jumlah-qty').textContent;
            const diskon = parseFloat(document.getElementById('diskon').value);
            const tunai = parseFloat(document.getElementById('jumlah-tunai').value);
            const kembalian = parseFloat(document.getElementById('kembalian').value);
            const tableRows = document.getElementById("tableBody").getElementsByTagName('tr');
            const userid = {{ auth()->user()->id }};
            var secondColumnValues = [];
            var thirdColumnValues = [];
                // Iterate through rows to calculate total harga
                for (var i = 0; i < tableRows.length; i++) {
                    
                    var secondColumnCell = tableRows[i].cells[1];
                    var thirdColumnCell = tableRows[i].cells[2];
                    var value = secondColumnCell.textContent.trim();
                    var qts = thirdColumnCell.textContent.trim();
                    if(value === "" ||  qts === ""){
                        break;
                    }
                    secondColumnValues.push(value);
                    thirdColumnValues.push(qts);
                    console.log("Values from the second column:", secondColumnValues);
                    console.log("Values from the third column:", thirdColumnValues);
                }


            // Calculate the discounted total harga
            const discountedHarga = jumlahHarga - (jumlahHarga * (diskon / 100));

            // Send data to the server
            $.ajax({
                url: '/print',
                method: 'GET',
                data: {
                    hargaValue: jumlahHarga,
                    diskonValue: diskon,
                    discountedHargaValue: discountedHarga,
                    qtyValue: qty,
                    barangValues: secondColumnValues,
                    quantitasBarang: thirdColumnValues,
                    user: userid,
                    jumlahTunai: tunai,

                    
                },
                success: function (response) {
                    console.log(response.message);
                },
                error: function (error) {
                    console.error("Error:", error);
                }
            });
            }

            function updateRow(row, selectedOption, quantitas, response) {
            // Update the content of the existing empty row
            row.cells[1].textContent = response.nama;
            row.cells[2].textContent = quantitas;
            row.cells[3].textContent = response.harga * quantitas;
            }

            function createNewRow(tableBody, selectedOption, quantitas, response) {
            // Clone the structure of the original row
            var originalRow = tableBody.rows[0]; // Assuming the original row is the first row
            var newRow = originalRow.cloneNode(true);
            newRow.classList.remove('original-row');

            // Update the content of the new row
            newRow.cells[0].textContent = tableBody.rows.length;
            newRow.cells[1].textContent = response.nama;
            newRow.cells[2].textContent = quantitas;
            newRow.cells[3].textContent = response.harga * quantitas;

            // Clear the content of the last cell (Delete button)
            newRow.cells[4].innerHTML = '<a href="#" onclick="deleteRow(this)" class="pt-2 pb-2 text-center text-white bg-danger"><button>Delete</button></a>';

            return newRow;
            }

            function deleteRow(button) {
            var row = button.parentNode.parentNode;

            // Check if the row has cells before trying to access them
            if (row.cells) {
                // Check if the row is an original row (assuming the class name of original rows is 'original-row')
                var isOriginalRow = row.classList.contains('original-row');

                if (!isOriginalRow) {
                    // If the row is not an original row, remove the entire row
                    row.remove();
                    // Update the total harga after deleting the row
                    updateTotalHarga();
                    jumlahBarang()
                } else {
                    // If it's an original row, clear the content of cells (excluding the first cell)
                    for (var i = 1; i < row.cells.length - 1; i++) {
                        row.cells[i].textContent = "";
                    }
                    // Update the total harga after deleting the row
                    jumlahBarang()
                    updateTotalHarga();
                }
            }
            }




    </script>
    
    @endauth
    
   
    
    

  
</body>
</html>