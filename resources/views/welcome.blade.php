@extends('layouts.app')

@section('title', 'Welcome to the Student Attachment Monitoring System')

@section('content')

<div class="flex place-content-center items-center h-full">
    <div class="max-w-lg p-6 bg-white border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Welcome aboard!</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">As you navigate through your attachment journey, our system will serve as your trusted companion, offering tools to streamline your tasks, resources to enhance your skills, and insights to propel your success.</p>
        <a href="{{url('/auth/activate')}}" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-gray bg-white rounded-md hover:bg-custom-color-2 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-500">
            Get started
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg> 
        </a>
    </div>
</div>

@endsection