@extends('layouts.default')

@section('content')

<div class="w-full md:w-4/5 lg:w-1/2 overflow-hidden p-6 rounded-lg border border-gray-200 shadow-md m-auto" >
        <h2 class="text-3xl text-center font-bold my-5">VNHS Student Pre-Enrollment</h2>
        
        <div class="mt-10" x-data="{student: ''}">
            <h3 class="text-xl mb-2">Are you a New Student or an Old Student?</h3>
            
            <p><label><input name="Student" type="radio" value="NewStudent" x-model="student"> New Student</label></p>
            <p><label><input name="Student" type="radio" value="OldStudent"  x-model="student"> Old Student</label></p> 

            <section id="NewStudent" class="desc bg-white dark:bg-gray-900 my-4" x-show="student == $el.id" x-cloak>
             
                <p class="my-4">If you are a <strong>New Student</strong>. Please fill-up the form as carefully as you can.</p>
                <livewire:create-student />
            </section>

            <section id="OldStudent" class="desc h-3/6 my-4" x-show="student == $el.id" x-cloak>
                <p>If <strong>Old Student</strong>, Please proceed to your respective adiviser for your enrollment.</p>
                <p>Bring the Following Requirements:</p>
                <ul class="list-disc px-10 my-4">
                    <li>Card</li>
                    <li>Good Moral</li>
                    <li>Ka Gwapo/Gwapa</li>
                </ul>

                <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Return to Homepage</a>
            </section>
                 
        </div>
</div>
@endsection