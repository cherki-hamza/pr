@if ( !empty(\App\Models\Billing::where('user_id',auth()->id())->first()) )


<button class="btn bg-primary text-white">
    <svg style="width: 25px"
        class="svg-inline--fa fa-credit-card fa-w-18 mr-2 ml-1"
        aria-hidden="true" focusable="false" data-prefix="far"
        data-icon="credit-card" role="img"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
        data-fa-i2svg="">
        <path fill="currentColor"
            d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z">
        </path>
    </svg>
    <!-- <i class="far fa-credit-card mr-2 ml-1"></i> Font Awesome fontawesome.com -->
    <span class="font-weight-bold  mr-1" id="payButton">Pay with Paypal 2024</span>
    </button>

@else

<a href="#test_dev" class="btn bg-primary text-white"
    data-toggle="modal" data-target="#billingInformation">
    <svg style="width: 25px"
        class="svg-inline--fa fa-credit-card fa-w-18 mr-2 ml-1"
        aria-hidden="true" focusable="false" data-prefix="far"
        data-icon="credit-card" role="img"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
        data-fa-i2svg="">
        <path fill="currentColor"
            d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z">
        </path>
    </svg>
    <!-- <i class="far fa-credit-card mr-2 ml-1"></i> Font Awesome fontawesome.com -->
    <span class="font-weight-bold  mr-1" id="payButton">Pay with
        Paypal</span>
</a>

@endif