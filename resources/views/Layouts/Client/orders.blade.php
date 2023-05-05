<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>MegaShop</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="h-full">
    @if (Auth::guest())
        @component('Layouts.Components.menu')
        @endcomponent
        {{-- header --}}
    @elseif(Auth::user()->type == 'client' || Auth::user()->type == 'admin')
        <header class="fixed w-full">
            <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
                <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                    <a href="/" class="flex items-center">
                        <span class="self-center text-xl font-bold whitespace-nowrap dark:text-white">MegaShop</span>
                    </a>
                    <div class="flex items-center gap-3 lg:order-2">
                        <a href="/cart" class="text-white hover:text-purple-500" id="cart-button"><i
                                class="fas fa-shopping-cart fa-lg"></i></a>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="text-gray-700 dark:text-white hover:text-purple-500 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-purple-500 md:p-0 font-medium relative inline-block text-left w-full md:w-auto">
                                <i class="fa-solid fa-bars fa-lg"></i></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="hidden bg-white text-gray-700 dark:bg-gray-800 text-base z-10 list-none dark:text-white divide-y divide-gray-900 rounded shadow my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">

                                    <li>
                                        <a href="/orders"
                                            class="text-sm hover:bg-gray-100 text-gray-700  dark:text-gray-300 hover:text-gray-700 block px-4 py-2">Your
                                            orders</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="/logout"
                                        class="text-sm hover:bg-gray-100 text-gray-700 dark:text-gray-300 hover:text-gray-700  block px-4 py-2">Sign
                                        out</a>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="items-center justify-between  w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="/"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="products"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Products</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

        </header>
    @endif
    <section class="h-screen bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">These are all the
                    orders you have placed so far</h2>
            </div>


            <table class="w-full">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">order date</th>
                        <th class="px-4 py-3">order status</th>
                        <th class="px-4 py-3">total</th>
                        <th class="px-4 py-3">order bills</th>

                    </tr>
                </thead>
                @php
                    $x = 0;
                @endphp
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($orders as $order)
                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-purple-800 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $x=$x+1 }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $order->order_date }}</td>
                            <td class="px-4 py-3 text-sm">{{ $order->order_status }}</td>
                            @php
                                $orderTotal = 0;
                            @endphp

                            @foreach ($order->orderProducts as $orderProduct)
                                @php
                                    $orderTotal += $orderProduct->total;
                                @endphp
                            @endforeach

                            <td class="px-4 py-3 text-sm">{{ $orderTotal }} $</td>
                            <td class="px-4 py-3 text-sm"><button
                                    class="block text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Print
                                    PDF</button></td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    @include('sweetalert::alert')

</body>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>

</html>
