@extends('layouts.app')

@section('title', 'Welcome to the Student Attachment Monitoring System')

@section('content')
<div class="m-10 place-content-center">
    <form class="max-w-md mx-auto justify-center items-center h-full mt-12">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School email</label>
            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="youremail@zetech.ac.ke" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" required />
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
        <button type="submit" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-gray bg-white rounded-md hover:bg-custom-color-2 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-500">Sign in</button>
    </form>
</div>

@endsection