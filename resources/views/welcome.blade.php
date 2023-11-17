<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
 
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>{{ config('app.name') }}</title>
 
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
 
        @filamentStyles
        @vite('resources/css/app.css')
    </head>
 
    <body class="antialiased">
        <div class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-eval-0 dark:text-gray-200">
            <div class="flex flex-col min-h-screen" style="transition-property: margin; transition-duration: 150ms;">
                <main class="flex">
                    <div class="w-full p-2 m-2 min-h-screen overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 ">
                    @yield('content')
                    </div>
                </main>
            </div>
        </div>  
        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>