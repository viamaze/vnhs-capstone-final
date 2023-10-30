<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Styles -->

    </head>
    <body class="antialiased">
        <div class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-eval-0 dark:text-gray-200">

            <!-- Page Wrapper -->
            <div
                class="flex flex-col min-h-screen"
                style="transition-property: margin; transition-duration: 150ms;"
            >

                <!-- Page Content -->
                <main class="flex">
                    <div class="w-full p-2 m-2 min-h-screen overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 ">
            @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>