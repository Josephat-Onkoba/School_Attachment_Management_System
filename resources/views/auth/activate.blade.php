@extends('layouts.app')

@section('title', 'Welcome to the Student Attachment Monitoring System')

@section('content')
<div class="m-10 place-content-center">
    <div class="fixed top-0 left-0 right-0 z-50">
        @include('_messages')
    </div>
    <form action="{{ url('/auth/activate') }}" method="post" class="max-w-sm mx-auto mt-12">
        {{ csrf_field() }}
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="youremail@zetech.ac.ke" required />
        </div>
        @if ($errors->has('email'))
        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif
        <div class="mb-5">
            <label for="admission_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Registration Number</label>
            <input type="text" id="admission_number" name="admission_number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        @if ($errors->has('admission_number'))
        <div class="alert alert-danger">{{ $errors->first('admission_number') }}</div>
        @endif
        <div class="mb-5">
            <label for="activation_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activation Code</label>
            <input type="text" id="activation_code" name="activation_code" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
        </div>
        @if ($errors->has('activation_code'))
        <div class="alert alert-danger">{{ $errors->first('activation_code') }}</div>
        @endif
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-gray-600 hover:underline dark:text-gray-500">terms and conditions</a></label>
        </div>
        <button type="submit" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-gray bg-white rounded-md hover:bg-custom-color-2 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-500">Check now</button>
    </form>
</div>

@endsection