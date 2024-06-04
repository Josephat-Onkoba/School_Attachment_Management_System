@if (session()->has('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Success</p>
    <p>{{ session('success') }}</p>
</div>
@endif

@if (session()->has('error'))
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Error</p>
    <p>{{ session('error') }}</p>
</div>
@endif

@if (session()->has('payment-error'))
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Payment Error</p>
    <p>{{ session('payment-error') }}</p>
</div>
@endif

@if (session()->has('warning'))
<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Warning</p>
    <p>{{ session('warning') }}</p>
</div>
@endif

@if (session()->has('info'))
<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Information</p>
    <p>{{ session('info') }}</p>
</div>
@endif

@if (session()->has('secondary'))
<div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Notice</p>
    <p>{{ session('secondary') }}</p>
</div>
@endif

@if (session()->has('primary'))
<div class="bg-blue-500 text-white p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Important</p>
    <p>{{ session('primary') }}</p>
</div>
@endif

@if (session()->has('light'))
<div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 auto-dismiss-alert" role="alert">
    <p class="font-bold">Note</p>
    <p>{{ session('light') }}</p>
</div>
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Auto-dismiss script -->
<script>
$(document).ready(function(){
    // Hide alert messages with the class 'auto-dismiss-alert' after 5 seconds
    $('.auto-dismiss-alert').delay(5000).fadeOut('slow');
});
</script>

