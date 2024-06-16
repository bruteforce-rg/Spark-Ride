<?php
require 'nav.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new.css">
    <style>
        body{
            font-family: Nunito, sans-serif !important;
        }
        a{
            text-decoration: none !important;
        }
    </style>
</head>
<body>
    <div>
        <h2 class="text-4xl font-medium text-center my-10">All Bikes</h2>

        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
                <div>
                    <div class="p-6 rounded-xl border border-gray-200 hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] transition-all duration-500">
                        <img src="pulsarn160pulsarn160rightsideview.png" alt="">

                        <h2 class="text-xl font-semibold">Bajaj Pulsar N160</h2>

                        <ul class="list-disc my-5 ps-5">
                            <li class="text-base font-medium text-gray-500">349 CC</li>
                            <li class="text-base font-medium text-gray-500">36 kmpl</li>
                            <li class="text-base font-medium text-gray-500">5 Speed Manual</li>
                            <li class="text-base font-medium text-gray-500">13 litres</li>
                        </ul>

                        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between gap-4">
                            <h3 class="grow w-1/2 text-xl font-semibold">&#8377; 850/Day</h3>
                            <a href="#" class="grow w-1/2 py-2.5 flex items-center justify-center rounded-full text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">Rent Now</a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="p-6 rounded-xl border border-gray-200 hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] transition-all duration-500">
                        <img src="hunter350image.png" alt="">

                        <h2 class="text-xl font-semibold">Royal Enfield Hunter 350</h2>

                        <ul class="list-disc my-5 ps-5">
                        <li class="text-base font-medium text-gray-500">349 CC</li>
                            <li class="text-base font-medium text-gray-500">36 kmpl</li>
                            <li class="text-base font-medium text-gray-500">5 Speed Manual</li>
                            <li class="text-base font-medium text-gray-500">13 litres</li>
                        </ul>

                        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between gap-4">
                            <h3 class="grow w-1/2 text-xl font-semibold">&#8377; 850/Day</h3>
                            <a href="#" class="grow w-1/2 py-2.5 flex items-center justify-center rounded-full text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">Rent Now</a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="p-6 rounded-xl border border-gray-200 hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] transition-all duration-500">
                        <img src="fzxdarkmatteblue.png" alt="">

                        <h2 class="text-xl font-semibold">Yamaha FZ X</h2>

                        <ul class="list-disc my-5 ps-5">
                        <li class="text-base font-medium text-gray-500">349 CC</li>
                            <li class="text-base font-medium text-gray-500">36 kmpl</li>
                            <li class="text-base font-medium text-gray-500">5 Speed Manual</li>
                            <li class="text-base font-medium text-gray-500">13 litres</li>
                        </ul>

                        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between gap-4">
                            <h3 class="grow w-1/2 text-xl font-semibold">&#8377; 850/Day</h3>
                            <a href="#" class="grow w-1/2 py-2.5 flex items-center justify-center rounded-full text-white bg-blue-500 hover:bg-blue-600 transition-all duration-500">Rent Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
require 'footer.html'
?>