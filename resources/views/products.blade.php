<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
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
                        <!-- <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a> -->
                        <a href="#" class="text-white hover:text-gray-200" id="cart-button"><i
                                class="fas fa-shopping-cart fa-lg"></i></a>

                        @section('scripts')
                            <script>
                                $(document).ready(function() {
                                    $('#cart-button').click(function(e) {
                                        e.preventDefault();
                                        Swal.fire({
                                            title: 'Shopping cart',
                                            html: $('#cart-content').html(),
                                            showCloseButton: true,
                                            showConfirmButton: false,
                                            customClass: 'sweet-alert-overflow',
                                            scrollbarPadding: false
                                        });
                                    });
                                });
                            </script>
                        @endsection

                        <a href="/logout" class="text-white hover:text-gray-200"><i
                                class="fa-solid fa-user fa-lg"></i></a>
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
            <div id="cart-content">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 overflow-hidden">
                  <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                      <!--
                        Slide-over panel, show/hide based on slide-over state.
              
                        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                          From: "translate-x-full"
                          To: "translate-x-0"
                        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                          From: "translate-x-0"
                          To: "translate-x-full"
                      -->
                      <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                          <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                              <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                              <div class="ml-3 flex h-7 items-center">
                                <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                  <span class="sr-only">Close panel</span>
                                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                                </button>
                              </div>
                            </div>
              
                            <div class="mt-8">
                              <div class="flow-root">
                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                  <li class="flex py-6">
                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                      <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                                    </div>
              
                                    <div class="ml-4 flex flex-1 flex-col">
                                      <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                          <h3>
                                            <a href="#">Throwback Hip Bag</a>
                                          </h3>
                                          <p class="ml-4">$90.00</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Salmon</p>
                                      </div>
                                      <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Qty 1</p>
              
                                        <div class="flex">
                                          <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="flex py-6">
                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                      <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-cover object-center">
                                    </div>
              
                                    <div class="ml-4 flex flex-1 flex-col">
                                      <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                          <h3>
                                            <a href="#">Medium Stuff Satchel</a>
                                          </h3>
                                          <p class="ml-4">$32.00</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Blue</p>
                                      </div>
                                      <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500">Qty 1</p>
              
                                        <div class="flex">
                                          <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
              
                                  <!-- More products... -->
                                </ul>
                              </div>
                            </div>
                          </div>
              
                          <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                              <p>Subtotal</p>
                              <p>$262.00</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                              <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                              <p>
                                or
                                <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                  Continue Shopping
                                  <span aria-hidden="true"> &rarr;</span>
                                </button>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
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
                            <form class="mt-4">
                                <button
                                    class="block w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Add
                                    to Cart
                                </button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @component('Layouts.Components.footer')
    @endcomponent
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

</html>