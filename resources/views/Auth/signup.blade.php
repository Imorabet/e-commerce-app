<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/bd9b5a24ba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')
    <title>MegaShop</title>
</head>

<body>
    <div class="relative min-h-screen flex ">
        <div
            class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            
            <div class="md:flex md:items-center md:justify-center  sm:w-auto md:h-full w-3/5 xl:w-3/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-gray-50 dark:bg-gray-800">
                <div class="max-w-md w-full space-y-8">
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">
                            Welcome!
                        </h2>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 ">Create your account</p>
                    </div>
                    <form class="mt-8 space-y-6" action="{{ route('register.user')}}" method="post">
                        @csrf
                        <div class="flex w-full gap-5">
                            <label for="UserEmail"
                                class="relative w-1/2 block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                                <input type="text" id="UserEmail" placeholder="First Name" name="fname"
                                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                                <span
                                    class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                    First Name
                                </span>
                            </label>
                            <label for="UserEmail"
                                class="relative block w-1/2 overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                                <input type="text" id="UserEmail" placeholder="Last Name" name="lname"
                                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                                <span
                                    class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                    Last Name
                                </span>
                            </label>

                        </div>
                        <div class="relative">
                            <label for="UserEmail"
                                class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                                <input type="email" id="UserEmail" placeholder="Email" name="email"
                                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                                <span
                                    class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                    Email
                                </span>
                            </label>
                        </div>
                        <div class="mt-8 content-center">
                            <label for="UserEmail"
                                class="relative block overflow-hidden border-b border-gray-200 bg-transparent pt-3 focus-within:border-purple-700 dark:border-gray-700">
                                <input type="password" id="UserEmail" placeholder="Password" name="password"
                                    class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:text-white sm:text-sm" />

                                <span
                                    class="absolute start-0 top-2 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs dark:text-gray-200">
                                    Password
                                </span>
                            </label>
                        </div>
                        <div>
                            <button type="submit" 
                                class="block w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 p-4 transition hover:scale-105">Sign up
                            </button>
                        </div>
                        <p
                            class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500 dark:text-gray-400 ">
                            <span>Already have an account  </span>
                            <a href="/login"
                                class="text-purple-400  hover:text-purple-700 no-underline hover:underline cursor-pointer transition ease-in duration-300">Login now</a>
                        </p>
                       
                    </form>
                </div>
            </div>
            <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                style="background-image: url(https://images.pexels.com/photos/5935754/pexels-photo-5935754.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                <div class="absolute bg-gray-900 opacity-5 inset-0 z-0"></div>
                <div class="w-full  max-w-md z-10 text-right">
                    <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Welcome to MegaShop!
                    </div>
                    <div class="sm:text-sm xl:text-lg text-gray-300 font-normal">Sign up today and join the thousands of happy customers who have already discovered the ease and convenience of shopping with us.
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('sweetalert::alert')   
</body>

</html>
