<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>FindFlat</title>


   <link rel="stylesheet" href="{{ asset('css/app.css') }}">


   <script src="https://cdn.tailwindcss.com"></script>

   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-gradient-to-b from-white to-red-500">

    <span class="fixed text-white text-xl top-5 left-4 cursor-pointer ml-3" onclick="Open()">
        <i class="fa-solid fa-bars-staggered bg-gray-700 p-2 rounded-md"></i>
    </span>

    <div class="flex">

        {{-- sidebar --}}
        <div class="sidebar fixed top-0 bottom-0 left-[-300px] p-2 w-[300px] overflow-y-auto text-center bg-gray-700 duration-1000">

            <div class="text-white text-xl font-thin">
                <div class="p-2.5 mt-1 flex items-center">
                    <h1 class="font-bold text-white text-[15px] ml-3">Admin</h1>
                    <i class="fa-solid fa-xmark ml-48 cursor-pointer hover:scale-125" onclick="Open()"></i>
                </div>

                <hr class="my-2 text-gray-400">
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 text-white cursor-pointer hover:bg-red-500">
                <i class="fa-solid fa-house"></i>
                <span class="text-[15px] font-semibold ml-8 text-white">Home</span>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 text-white cursor-pointer hover:bg-red-500">
                <i class="fa-solid fa-house-laptop"></i>
                <span class="text-[15px] font-semibold ml-8 text-white">Rent</span>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 text-white cursor-pointer hover:bg-red-500">
                <i class="fa-solid fa-house-flag"></i>
                <span class="text-[15px] font-semibold ml-8 text-white">Property</span>
            </div>

            <hr class="my-2 text-gray-400">

            {{-- Verification dropdown --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500 text-white">
                <i class="fa-solid fa-check-double"></i>
                <div class="flex justify-between w-full items-center" onclick="dropDown1()">
                    <span class="text-[15px] ml-4 text-white">Verification</span>
                    <span class="text-sm rotate-180" id="arrow">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
            </div>

            <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-white" id="submenu">
                <h1 class="cursor-pointer p-2 hover:bg-red-500 rounded-md mt-1" onclick="scrollToElement('landlordlist')">Landlord Verification</h1>
                <h1 class="cursor-pointer p-2 hover:bg-red-500 rounded-md mt-1" onclick="scrollToElement('propertylist')">Property Verification</h1>
            </div>

            {{-- manage dropdown --}}
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500 text-white">
                <i class="fa-solid fa-list-check"></i>
                <div class="flex justify-between w-full items-center" onclick="dropDown2()">
                    <span class="text-[15px] ml-4 text-white">Manage</span>
                    <span class="text-sm rotate-180" id="arrow2">
                        <i class="fa-solid fa-chevron-down"></i>
                    </span>
                </div>
            </div>

            <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-white" id="submenu2">
                <h1 class="cursor-pointer p-2 hover:bg-red-500 rounded-md mt-1" onclick="scrollToElement('verilandlordlist')">Landlords</h1>
                <h1 class="cursor-pointer p-2 hover:bg-red-500 rounded-md mt-1" onclick="scrollToElement('verirenterlist')">Renters</h1>
                <h1 class="cursor-pointer p-2 hover:bg-red-500 rounded-md mt-1" onclick="scrollToElement('veripropertylist')">Properties</h1>
            </div>

            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500 text-white">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="text-[15px] ml-4 text-gray-200">Logout</span>
            </div>
        </div>

        {{-- script ng sidebar --}}
        <script type="text/javascript">
            function dropDown1() {
                document.querySelector('#submenu').classList.toggle('hidden')
                document.querySelector('#arrow').classList.toggle('rotate-0')
            }
            dropDown1()

            function dropDown2() {
                document.querySelector('#submenu2').classList.toggle('hidden')
                document.querySelector('#arrow2').classList.toggle('rotate-0')
            }
            dropDown2()

            function Open() {
                var sidebar = document.querySelector('.sidebar');
                sidebar.classList.toggle('-left-0');
                sidebar.classList.toggle('left-[-300px]');

                var content = document.querySelector('.content');
                content.classList.toggle('ml-0');
                content.classList.toggle('lg:ml-[300px]');
            }
        </script>


    {{-- SA LOOB NITO YUNG MAIN PAGE --}}
        <div class="content flex-grow p-4 ml-0 duration-1000">

            {{-- STATISTICS PWEDE ILAGAY DITO --}}

            {{-- account wrapper --}}
                <div class="container p-6 bg-white rounded-md mb-10">

                    <div class="grid grid-cols-5 gap-4">

                        <div>
                            <h1>VERIFICATION LIST</h1>
                        </div>

                        <div class="col-span-5 bg-transparent rounded-lg shadow-sm">


                            {{-- list nto --}}
                            <div class="container mt-3 mx-auto border rounded-sm py-5 border-gray-400" id="landlordlist">
                                <div class="px-4 pb-2 overflow-hidden">
                                    <div class="mr-14 flex items-center">
                                        <h3 class="text-xl mt-5 font-semibold">
                                            Landlord Verification
                                        </h3>
                                    </div>
                                </div>

                                <div class="overflow-x-auto my-3 bg-gray-300 rounded-lg max-h-[400px] relative">
                                    <table class="table-auto w-full border-transparent">
                                        <thead class="sticky top-0 bg-white">
                                            <tr>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">ID</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Name</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Email</th>
                                                <th class="py-2 text-gray-800 border-b border-gray-400 bg-gray-300">Verification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">1</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">2</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">3</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">4</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">5</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">6</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">7</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">8</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">9</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">10</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">11</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>

                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            {{-- properties --}}
                            <div class="container mt-8 mx-auto border rounded-sm py-5 border-gray-400" id="propertylist">

                                <div class="px-4 pb-2 overflow-hidden">
                                    <div class="mr-14 flex items-center">
                                        <h3 class="text-xl mt-5 font-semibold">
                                            Properties Verification
                                        </h3>
                                    </div>
                                </div>

                                <div class="overflow-x-auto max-h-[700px] my-3 bg-gray-300 rounded-lg relative">
                                    <table class="table-auto w-full border-transparent">
                                        <thead class="sticky top-0 bg-white">
                                            <tr>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Place Name</th>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Owner</th>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Place Name</th>
                                                <th class="py-2 px-3 text-gray-800 border-b border-gray-400 bg-gray-300" style="width: 15%;">Verification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 1</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 2</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 3</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 4</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 5</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 6</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 1</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 2</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 3</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 4</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 5</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 6</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-check"></i></button></td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            {{--  --}}
                            <div class="container mt-8 mx-auto">

                            </div>
                        </div>
                    </div>
                </div>
            {{-- account wrapper --}}

            {{-- manage wrapper --}}
                <div class="container p-6 bg-white rounded-md">

                    <div class="grid grid-cols-5 gap-4">

                        <div class="col-span-5 bg-whiterounded-lg shadow-sm">

                            <div>
                                <h1>Account Management</h1>
                            </div>

                            {{-- landlord list --}}
                            <div class="container mt-3 mx-auto border rounded-sm py-5 border-gray-400" id="verilandlordlist">
                                <div class="px-4 pb-2 overflow-hidden">
                                    <div class="mr-14 flex items-center">
                                        <h3 class="text-xl mt-5 font-semibold">
                                            Landlord
                                        </h3>
                                    </div>
                                </div>

                                <div class="overflow-x-auto max-h-[400px] bg-gray-300 rounded-lg relative">
                                    <table class="table-auto w-full border-transparent">
                                        <thead class="sticky top-0 bg-white">
                                            <tr>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">ID</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Name</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Email</th>
                                                <th class="py-2 text-gray-800 border-b border-gray-400 bg-gray-300">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">1</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">2</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">3</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">4</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">5</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">6</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">7</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">8</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">9</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">10</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">11</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">12</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            {{-- renters list --}}
                            <div class="container mt-3 mx-auto border rounded-sm py-5 border-gray-400" id="verirenterlist">
                                <div class="px-4 pb-2 overflow-hidden">
                                    <div class="mr-14 flex items-center">
                                        <h3 class="text-xl mt-5 font-semibold">
                                            Renters
                                        </h3>
                                    </div>
                                </div>

                                <div class="overflow-x-auto max-h-[400px] bg-gray-300 rounded-lg relative">
                                    <table class="table-auto w-full border-transparent">
                                        <thead class="sticky top-0 bg-white">
                                            <tr>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">ID</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Name</th>
                                                <th class="px-4 py-2 text-gray-800 border-b border-r border-gray-400 bg-gray-300">Email</th>
                                                <th class="py-2 text-gray-800 border-b border-gray-400 bg-gray-300">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">1</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">2</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">3</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">4</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">5</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">6</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">7</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">8</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">9</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">10</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">11</td>
                                                <td class="px-4 py-2 border-b border-gray-400">John Doe</td>
                                                <td class="px-4 py-2 border-b border-gray-400">john@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400">12</td>
                                                <td class="px-4 py-2 border-b border-gray-400">Jane Smith</td>
                                                <td class="px-4 py-2 border-b border-gray-400">jane@example.com</td>
                                                <td class="px-4 py-2 border-b border-gray-400 text-center"><button class="bg-transparent rounded-md px-5 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- properties --}}
                            <div class="container mt-8 mx-auto border rounded-sm py-5 border-gray-400" id="veripropertylist">

                                <div class="px-4 pb-2 overflow-hidden">
                                    <div class="mr-14 flex items-center">
                                        <h3 class="text-xl mt-5 font-semibold">
                                            Property Lists
                                        </h3>
                                    </div>
                                </div>

                                <div class="overflow-x-auto max-h-[700px] my-3 bg-gray-300 rounded-lg relative">
                                    <table class="table-auto w-full border-transparent">
                                        <thead class="sticky top-0 bg-white">
                                            <tr>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Place Name</th>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Owner</th>
                                                <th class="px-4 py-2 border-b border-r border-gray-400 bg-gray-300" style="width: 35%;">Place Name</th>
                                                <th class="py-2 px-3 text-gray-800 border-b border-gray-400 bg-gray-300" style="width: 15%;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 1</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 2</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 3</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 4</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 5</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 6</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 1</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 2</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 3</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 4</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 5</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;"><img src="https://static-ph.lamudi.com/static/media/bm9uZS9ub25l/2x2x6x1200x900/9c8e653dc6d133.webp" alt="Property Photo 1"></td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 25%;">John Doe 6</td>
                                                <td class="px-4 py-2 border-b border-gray-400" style="width: 30%;">4BR Fully Furnished House for lease in McKinley Hills Subdivision, Taguig</td>
                                                <td class="px-5 py-2 border-b border-gray-400 text-center" style="width: 15%;"><button class="bg-transparent rounded-md px-5 py-1 hover:bg-primary hover:border-b hover:border-t hover:border-primary hover:text-white font-bold"><i class="fa-solid fa-x"></i></button></td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            {{--  --}}
                            <div class="container mt-8 mx-auto">

                            </div>
                        </div>
                    </div>
                </div>
            {{-- manage wrapper --}}
        </div>

        {{-- script ng smooth scroll --}}
        <script>
            function scrollToElement(elementId) {
                var element = document.getElementById(elementId);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        </script>


    </div>

</body>
</html>
