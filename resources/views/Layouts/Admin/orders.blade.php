<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>MegaShop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div
        class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-600 text-black dark:text-white">

        <!-- Header -->
        @component('Layouts.Components.header')
        @endcomponent
        <!-- ./Header -->

        <!-- Sidebar -->
        @component('Layouts.Components.dashboard')
        @endcomponent
        <!-- ./Sidebar -->
        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
            <div class="mt-4 mx-4">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <div class="flex justify-between">
                            <h1 class="p-3 text-gray-800 dark:text-white text-center text-2xl font-semibold">All
                                orders</h1>

                        </div>
                        <br>
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">client</th>
                                    <th class="px-4 py-3"> order status</th>
                                    <th class="px-4 py-3">order date </th>
                                    <th class="px-4 py-3">total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($orders as $order)
                                    <tr
                                        class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-purple-800 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $order->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm capitalize">
                                            {{ $order->user->name . ' ' . $order->user->lname }}</td>
                                        <td class="px-4 py-3 text-sm"> 
                                            <label for="UserEmail"
                                                class="relative block w-1/2 overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                                                <select id="UserEmail" placeholder="Category" name="category"
                                                    class="peer capitalize h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-gray-400 sm:text-sm">
                                                    <option value="{{$order->order_status}}">{{ $order->order_status }}</option>
                                                    <option value="Processing">Processing</option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Canceled">Canceled</option>

                                                </select>
                                            </label>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $order->order_date }}</td>
                                        @php
                                            $orderTotal = 0;
                                        @endphp

                                        @foreach ($order->orderProducts as $orderProduct)
                                            @php
                                                $orderTotal += $orderProduct->total;
                                            @endphp
                                        @endforeach

                                        <td class="px-4 py-3 text-sm">{{ $orderTotal }} $</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
