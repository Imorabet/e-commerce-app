@php use Illuminate\Support\Facades\Auth; @endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>MegaShop</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
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
                                            class="text-sm hover:bg-gray-100 text-gray-700  dark:text-gray-300 hover:text-gray-700 block px-4 py-2">Your orders</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="/logout"
                                        class="text-sm hover:bg-gray-100 text-gray-700 dark:text-gray-300 hover:text-gray-700  block px-4 py-2">Sign out</a>
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
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Discover Our Range
                    of High-Quality Products </h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400"> All of our products are
                    carefully curated and selected to ensure they meet our high standards of quality and style. Browse
                    our collection today and discover the perfect product for you.</p>
                <form class="flex justify-center" id="search-form">
                    <label for="UserEmail"
                        class="relative block w-full overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                        <input type="text" id="UserEmail" placeholder="Search a product name"
                            class="peer h-8 w-full border-none bg-transparent p-0 placeholder focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />
                    </label>
                    <button class="dark:text-gray-500 text-black hover:text-purple-600">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>


            </div>

            <div class="space-y-8 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                <div class="space-y-2">
                    <details
                        class="overflow-hidden rounded border border-gray-300 dark:border-gray-600 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition dark:bg-gray-900 dark:text-white">
                            <span class="text-sm font-medium"> Categories </span>

                            <span class="transition group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>

                        <div class="border-t border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
                            <header class="flex items-center justify-between p-4">
                                <span class="text-sm text-gray-700 dark:text-gray-200">
                                    0 Selected
                                </span>

                                <button type="button"
                                    class="text-sm text-gray-900 underline underline-offset-4 dark:text-white">
                                    Reset
                                </button>
                            </header>

                            <ul class="space-y-1 border-t border-gray-200 p-4 dark:border-gray-700">
                                @foreach ($categories as $category)
                                    <li>
                                        <label for="FilterInStock" class="inline-flex items-center gap-2">
                                            <input type="checkbox" id="FilterInStock"
                                                class="h-5 w-5 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:focus:ring-offset-gray-900" />

                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                                {{ $category->name }}
                                            </span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </details>

                    <details
                        class="overflow-hidden rounded border border-gray-300 dark:border-gray-600 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition dark:bg-gray-900 dark:text-white">
                            <span class="text-sm font-medium"> Price </span>

                            <span class="transition group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>

                        <div class="border-t border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
                            <header class="flex items-center justify-between p-4">
                                <span class="text-sm text-gray-700 dark:text-gray-200">
                                    The highest price is $600
                                </span>

                                <button id="filterBtn"
                                    class="block w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">
                                    Filter
                                </button>

                            </header>

                            <div class="border-t border-gray-200 p-4 dark:border-gray-700">
                                <div class="flex justify-between gap-4">
                                    <label for="FilterPriceFrom" class="flex items-center gap-2">
                                        <span class="text-sm text-gray-600 dark:text-gray-300">$</span>

                                        <input type="number" id="FilterPriceFrom" placeholder="From"
                                            class="w-full rounded-md border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white dark:focus:ring-offset-gray-900 sm:text-sm" />
                                    </label>

                                    <label for="FilterPriceTo" class="flex items-center gap-2">
                                        <span class="text-sm text-gray-600 dark:text-gray-300">$</span>

                                        <input type="number" id="FilterPriceTo" placeholder="To"
                                            class="w-full rounded-md border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white dark:focus:ring-offset-gray-900 sm:text-sm" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </details>
                </div>
                @foreach ($products as $product)
                    <a id="{{ $product->name }}" href="#"
                        class="group block rounded-lg overflow-hidden w-[300px]">
                        <img src="{{ asset('storage/' . $product->img) }}" alt="img"
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />
                        <div class="relative  bg-gray-50 dark:bg-gray-800 p-6">
                            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">{{ $product->name }}
                            </h3>
                            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400 md:text-lg">{{ $product->price }}
                                $</p>
                            <form action="{{ url('/cart/add/' . $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Add
                                    to Cart</button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @component('Layouts.Components.footer')
    @endcomponent
    @include('sweetalert::alert')

</body>
<script>
    const form = document.getElementById('search-form');
    const input = form.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const searchValue = input.value.toLowerCase();

        // Loop through all products and hide/show them based on their ID
        const products = document.querySelectorAll('.group');
        products.forEach((product) => {
            const id = product.id.toLowerCase();
            if (id.includes(searchValue)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
</script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>


</html>
