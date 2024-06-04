<nav class="bg-custom-color border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/zetech_logo.png') }}" class="h-8" alt="Flowbite Logo" />
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @if(Request::is('auth/login'))
      <a href="{{url('/auth/activate')}}" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-gray bg-white rounded-md hover:bg-custom-color-2 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-500">Get started</a>
      @else
      <a href="{{url('/auth/login')}}" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-gray bg-white rounded-md hover:bg-custom-color-2 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-500">Login</a>
      @endif
      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 bg-custom-color md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
        <li>
          <a href="{{url('/')}}" class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-white rounded md:bg-transparent">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>