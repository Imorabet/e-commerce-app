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
    <div class="h-screen bg-gray-100 dark:bg-gray-800 overflow-x-auto pt-10">
        <h1 class="mb-10 text-center text-2xl font-bold dark:text-white">Cart Items</h1>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @if (sizeof($items) == 0)
                    <div class="flex flex-col gap-3 justify-center items-center">
                        <p class="text-gray-900 dark:text-gray-400 font-semibold text-2xl my-9">No item added :)</p>
                        <a href="/products"
                            class="text-gray-500 dark:text-gray-600 hover:dark:text-gray-300 hover:underline">start
                            shopping now</a>
                    </div>
                @else
                    @foreach ($items as $item)
                        <div
                            class="justify-between mb-6 rounded-lg bg-white dark:bg-gray-900 p-6 shadow-md sm:flex sm:justify-start h-[170px]">
                            <img src="{{ asset('storage/' . $item->product->img) }}" alt="product-image"
                                class="w-[50%] rounded-lg sm:w-40" />
                            <form class="sm:ml-4 sm:flex sm:w-full sm:justify-between" method="POST"
                                action="{{ route('quantity.update', $item->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-200">
                                        {{ $item->product->name }}</h2>
                                </div>
                                <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                    <div class="flex items-center border-gray-100">
                                        <span
                                            class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-purple-500 hover:text-blue-50 decrease-quantity">
                                            -
                                        </span>
                                        <input class="h-8 w-8 border bg-white text-center text-xs outline-none quantity"
                                            type="number" value="{{ $item->quantity }}" min="1" name="quantity"
                                            data-price="{{ $item->product->price }}" data-item-id="{{ $item->id }}"
                                            onload="updatePrice()" />
                                        <span
                                            class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-purple-500 hover:text-blue-50 increase-quantity">
                                            +
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <p class="text-sm dark:text-gray-400 price"
                                            value="{{ $item->product->price * $item->quantity }}">
                                            {{ $item->product->price * $item->quantity }} $</p>
                                        <a href="{{ route('cartItem.delete', ['id' => $item->id]) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-5 w-5 cursor-pointer dark:text-white duration-150 hover:text-red-500 remove-item"
                                                data-item-id="{{ $item->id }}">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg></a>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-purple-700 capitalize hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">confirm</button>
                                </div>
                            </form>
                        </div>
                    @endforeach


            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg  bg-white dark:bg-gray-900 p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700 dark:text-gray-400">Subtotal</p>
                    <p class="text-gray-700 dark:text-gray-400" id="subtotal" name='price'>$0.00</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-700 dark:text-gray-400">Shipping</p>
                    <p class="text-gray-700 dark:text-gray-400">$4.99</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between dark:text-white">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold" name='total' id="total">$4.99</p>
                        <p class="text-sm text-gray-700">including VAT</p>
                    </div>
                </div>
                <form action="{{route('orders.store')}}" method="post">
                    @csrf
                    <button
                        class="mt-6 w-full rounded-md bg-purple-600 py-1.5 font-medium text-blue-50 hover:bg-purple-700">Order
                        now</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    @include('sweetalert::alert')
    <script>
        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.nextElementSibling;
                let quantity = parseInt(input.value);
                if (quantity > 1) {
                    input.value = --quantity;
                    updatePrice(input);
                }
            });
        });

        // Increase quantity
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.previousElementSibling;
                input.value = ++input.value;
                updatePrice(input);
            });
        });

        function updatePrice(input) {
            const price = input.getAttribute('data-price');
            const quantity = input.value;
            const item_id = input.getAttribute('data-item-id');
            const priceElement = input.parentElement.nextElementSibling.querySelector('.price');
            const newPrice = price * quantity;
            priceElement.innerText = newPrice + ' $';

            // Recalculate subtotal and total
            let subtotal = 0;
            quantityInputs.forEach(input => {
                const price = input.getAttribute('data-price');
                const quantity = input.value;
                const product = price * quantity;
                subtotal += product;
            });
            const subtotalElement = document.querySelector('#subtotal');
            subtotalElement.innerText = '$' + subtotal.toFixed(2);

            const shipping = 4.99;
            const total = subtotal + shipping;
            const totalElement = document.querySelector('#total');
            totalElement.innerText = '$' + total.toFixed(2);
        }

        const quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(input => {
            updatePrice(input);
            input.addEventListener('change', function() {
                updatePrice(input);
            });
        });
    </script>

</body>

</html>
