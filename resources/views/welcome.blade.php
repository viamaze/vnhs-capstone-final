@extends('layouts.default')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
            <div class="col-span-2 mb-8">
                <p class="text-lg font-medium text-purple-600 dark:text-purple-500">Welcome</p>
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">Valencia National Highschool Student Information System</h2>
            </div>
            <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
                <div class="text-center">
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Admin Panel</h3>
                    <a href="/admin" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
                <div class="text-center">
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Pre-Enrollment</h3>
                    <a href="/pre-enrollment" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
                <div class="text-center">
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Student Portal</h3>
                    <a href="/students" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
                <div class="text-center">
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Teachers Portal</h3>
                    <a href="/teachers" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get started</a>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="bg-white dark:bg-gray-900 w-1/2 m-auto">
        @livewire('create-student')
    </section> --}}
@endsection