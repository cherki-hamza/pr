@extends('admin.layouts.master')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div id="content">
                    <div id="loading-overlay" style="display: none;">
                        <img src="/img/loading.gif" alt="Loading...">
                    </div>

                    <div class="main-body pt-2" id="allPage">


                        <!-- Errors and Success Messages -->
                        <!-- / Errors and Success Messages -->

                        <!-- Order Form -->


                        @if(Session::has('message'))
                        <div class="alert alert-warning text-center font-weight-bold" role="alert">
                            <span class="font-weight-extra-bold h5 text-danger">
                                <strong>  {{ session()->get('message') }}</strong>
                            </span>
                       </div>
                        @endif


                        <div>

                            <div class="ml-auto p-0">
                                <h5>Your Current Balance: ${{ \App\Models\Payment::where('user_id', auth()->id())->sum('amount') }}</h5>
                            </div>
                            {{-- <form action="https://icopify.co/add-funds/pay" method="POST" id="paymentForm"
                                onsubmit="this.querySelectorAll('[type=submit]').forEach(b => b.disabled = true)"> --}}

                                <div class="row gutters-sm mt-3">
                                    <div class="col-md-12 col-lg-8 col-xl-8 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header bg-facebook text-white">
                                                <h5 class="text-white mt-n2 mb-n2">Add Funds</h5>
                                            </div>

                                            <div class="card-body align-middle">

                                                {{-- <div style="font-size: 20px" class="text-center mt-2 alert alert-dark">
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$10 - $499</strong> Get 5% Extra
                                                        Bonus</span>
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$50 - $499</strong> Get 5% Extra
                                                        Bonus</span>
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$500 - $999</strong> Get 10% Extra
                                                        Bonus</span>
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$1000 - $1999</strong> Get 15% Extra
                                                        Bonus</span>
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$2000 - $4999</strong> Get 20% Extra
                                                        Bonus</span>
                                                    <span class="badge badge-soft-primary fs--1 mb-1"><strong
                                                            class="font-weight-bold">$5000 - $10000</strong> Get 25% Extra
                                                        Bonus</span>
                                                </div> --}}


                                                <div class="row">
                                                    <div class="col-xl-4 col-md-12">
                                                        <label class="text-facebook font-weight-bold mt-2">Amount</label>

                                                        <select class="custom-select" name="value" id="amount"
                                                            onchange="toggleAmount()" required="">

                                                            <option value="10">$10</option>
                                                            <option value="25">$25</option>
                                                            <option value="50">$50</option>
                                                            <option value="100">$100</option>
                                                            <option value="250">$250</option>
                                                            <option value="500">$500</option>
                                                            <option value="750">$750</option>
                                                            <option value="1000">$1,000</option>
                                                            <option value="1500">$1,500</option>
                                                            <option value="2000">$2,000</option>
                                                            <option value="2500">$2,500</option>
                                                            <option value="3000">$3,000</option>
                                                            <option value="4000">$4,000</option>
                                                            <option value="5000">$5,000</option>
                                                            <option value="7500">$7,500</option>
                                                            <option value="10000">$10,000</option>
                                                        </select>

                                                    </div>

                                                    <div class="col-xl-4 col-md-12">
                                                        <label class="text-facebook font-weight-bold mt-2">Currency</label>
                                                        <select class="custom-select" name="currency" required="">
                                                            <option value="usd">
                                                                USD
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-4 col-md-12 mt-1">
                                                        <input type="hidden" name="currency" value="usd">
                                                        <label class="text-facebook font-weight-bold">Payment Method</label>

                                                        <select class="custom-select" name="paymentPlatform"
                                                            id="paymentMethod" onchange="togglePayment()" required="">
                                                            <option value="paypal" selected="">PayPal</option>
                                                            <option value="credit_card">Credit Card</option>
                                                            <option value="crypto">Crypto</option>
                                                        </select>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Order Form -->

                                    <div class="col-md-12 col-lg-4 col-xl-4 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="text-white mt-n2 mb-n2">Credit Amount</h5>
                                            </div>
                                            <div class="card-body">

                                                <form action="{{ route('paypal_pay') }}" method="POST">
                                                    @csrf

                                                <div class="table-responsive" style="border-radius:5px">
                                                    <table class="table table-dashboard table-striped p-0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="font-weight-bold text-facebook">Amount To Be
                                                                    Paid</td>
                                                                <td class="text-right text-facebook font-weight-bold h5">
                                                                    $<span class="mt-n3" id="amountSummary">10.00</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="bg-soft-primary">
                                                                <td class="font-weight-bold text-facebook">
                                                                    {{-- Bonus --}}</td>
                                                                <td class="text-right text-warning font-weight-bold h5">
                                                                    {{-- $ --}}<span class="mt-n3"
                                                                        id="bonusSummary">{{-- 0.50 --}}</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class=""></td>
                                                                <td class="text-right">
                                                                    {{-- <input type="text" class="form-control" name="amount" id="totalSummary" value="10.00"> --}}
                                                                    Total: <span class="text-facebook font-weight-bold h5">$<span class="mt-n3" id="totalSummary">10.00</span>
                                                                    <input type="hidden" name="amount" id="app_total" value="10.00">
                                                                    <input type="hidden" id="payment_method" name="payment_platform" value="paypal">
                                                                </span>
                                                               </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="text-right mt-n3">
                                                    <div class="mb-2 my-4">
                                                        <img src="{{ asset('public/assets/images/paypal.webp') }}"
                                                            width="220px" id="imgCard" alt="Card">
                                                    </div>

                                                    <div>

                                                        @include('admin.inc.payement_btn')

                                                        <div>
                                                            <div id="crypto_text" style="display: none"
                                                                class="text-danger text-left my-3">
                                                                For cryptocurrency payments only: After making the payment,
                                                                Kindly provide us with the transaction link along with your
                                                                email address and pr Content Username . Please note that it
                                                                may take up to 24 hours for us to manually process and add
                                                                funds to your account.
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="text-danger mt-3" id="warningMessage"></div>

                                            </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            {{-- </form> --}}


                            {{-- start the card billing --}}
                            <div class="card mt-3">
                                <div class="card-body">

                                    <div class="table-responsive" style="border-radius:5px">

                                        {{-- start the billing info --}}
                                        <div class="modal fade" id="billingInformation" tabindex="-1"
                                            aria-labelledby="basicModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title text-white" id="basicModalLabel">Billing
                                                            Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"
                                                            style="outline: none !important; box-shadow: none;">
                                                            <span aria-hidden="true" class="text-white">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="card-body">
                                                        <div>
                                                            <form method="POST" action="{{route('billings.store')}}">

                                                            @csrf
                                                            <div class="form-group row gutters">
                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">Full Name <span
                                                                            class="text-danger">*</span>
                                                                        <input type="text" name="name"
                                                                            class="form-control " id="name"
                                                                            value="{{ auth()->user()->name ?? 'Enter Your Full Name' }}"
                                                                            required="">
                                                                            <input type="hidden" id="payment_method" name="payment_method" value="paypal">
                                                                    </label>
                                                                </div>

                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">Company Name <span
                                                                            class="text-danger">*</span>
                                                                        <input type="text" name="company_name"
                                                                            class="form-control " id="company_name"
                                                                            placeholder="Company Name"
                                                                            required="">
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row gutters">
                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">Country <span
                                                                            class="text-danger">*</span>
                                                                        <select name="country" class="custom-select "
                                                                            required="">
                                                                            <option value="" selected=""
                                                                                disabled="">Select Your Country</option>
                                                                            <option value="United Kingdom">United Kingdom
                                                                            </option>
                                                                            <option value="United States">United States
                                                                            </option>
                                                                            <option value="Canada">Canada</option>
                                                                            <option value="Australia">Australia</option>
                                                                            <option value="Afghanistan">Afghanistan
                                                                            </option>
                                                                            <option value="Albania">Albania</option>
                                                                            <option value="Algeria">Algeria</option>
                                                                            <option value="American Samoa">American Samoa
                                                                            </option>
                                                                            <option value="Andorra">Andorra</option>
                                                                            <option value="Angola">Angola</option>
                                                                            <option value="Anguilla">Anguilla</option>
                                                                            <option value="Antarctica">Antarctica</option>
                                                                            <option value="Antigua and/or Barbuda">Antigua
                                                                                and/or Barbuda</option>
                                                                            <option value="Argentina">Argentina</option>
                                                                            <option value="Armenia">Armenia</option>
                                                                            <option value="Aruba">Aruba</option>
                                                                            <option value="Austria">Austria</option>
                                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                                            <option value="Bahamas">Bahamas</option>
                                                                            <option value="Bahrain">Bahrain</option>
                                                                            <option value="Bangladesh">Bangladesh</option>
                                                                            <option value="Barbados">Barbados</option>
                                                                            <option value="Belarus">Belarus</option>
                                                                            <option value="Belgium">Belgium</option>
                                                                            <option value="Belize">Belize</option>
                                                                            <option value="Benin">Benin</option>
                                                                            <option value="Bermuda">Bermuda</option>
                                                                            <option value="Bhutan">Bhutan</option>
                                                                            <option value="Bolivia">Bolivia</option>
                                                                            <option value="Bosnia and Herzegovina">Bosnia
                                                                                and Herzegovina</option>
                                                                            <option value="Botswana">Botswana</option>
                                                                            <option value="Bouvet Island">Bouvet Island
                                                                            </option>
                                                                            <option value="Brazil">Brazil</option>
                                                                            <option value="British lndian Ocean Territory">
                                                                                British lndian Ocean Territory</option>
                                                                            <option value="Brunei Darussalam">Brunei
                                                                                Darussalam</option>
                                                                            <option value="Bulgaria">Bulgaria</option>
                                                                            <option value="Burkina Faso">Burkina Faso
                                                                            </option>
                                                                            <option value="Burundi">Burundi</option>
                                                                            <option value="Cambodia">Cambodia</option>
                                                                            <option value="Cameroon">Cameroon</option>
                                                                            <option value="Cape Verde">Cape Verde</option>
                                                                            <option value="Cayman Islands">Cayman Islands
                                                                            </option>
                                                                            <option value="Central African Republic">
                                                                                Central African Republic</option>
                                                                            <option value="Chad">Chad</option>
                                                                            <option value="Chile">Chile</option>
                                                                            <option value="China">China</option>
                                                                            <option value="Christmas Island">Christmas
                                                                                Island</option>
                                                                            <option value="Cocos (Keeling) Islands">Cocos
                                                                                (Keeling) Islands</option>
                                                                            <option value="Colombia">Colombia</option>
                                                                            <option value="Comoros">Comoros</option>
                                                                            <option value="Congo">Congo</option>
                                                                            <option value="Cook Islands">Cook Islands
                                                                            </option>
                                                                            <option value="Costa Rica">Costa Rica</option>
                                                                            <option value="Croatia (Hrvatska)">Croatia
                                                                                (Hrvatska)</option>
                                                                            <option value="Cuba">Cuba</option>
                                                                            <option value="Cyprus">Cyprus</option>
                                                                            <option value="Czech Republic">Czech Republic
                                                                            </option>
                                                                            <option value="Democratic Republic of Congo">
                                                                                Democratic Republic of Congo</option>
                                                                            <option value="Denmark">Denmark</option>
                                                                            <option value="Djibouti">Djibouti</option>
                                                                            <option value="Dominica">Dominica</option>
                                                                            <option value="Dominican Republic">Dominican
                                                                                Republic</option>
                                                                            <option value="East Timor">East Timor</option>
                                                                            <option value="Ecudaor">Ecudaor</option>
                                                                            <option value="Egypt">Egypt</option>
                                                                            <option value="El Salvador">El Salvador
                                                                            </option>
                                                                            <option value="Equatorial Guinea">Equatorial
                                                                                Guinea</option>
                                                                            <option value="Eritrea">Eritrea</option>
                                                                            <option value="Estonia">Estonia</option>
                                                                            <option value="Ethiopia">Ethiopia</option>
                                                                            <option value="Falkland Islands (Malvinas)">
                                                                                Falkland Islands (Malvinas)</option>
                                                                            <option value="Faroe Islands">Faroe Islands
                                                                            </option>
                                                                            <option value="Fiji">Fiji</option>
                                                                            <option value="Finland">Finland</option>
                                                                            <option value="France">France</option>
                                                                            <option value="France, Metropolitan">France,
                                                                                Metropolitan</option>
                                                                            <option value="French Guiana">French Guiana
                                                                            </option>
                                                                            <option value="French Polynesia">French
                                                                                Polynesia</option>
                                                                            <option value="French Southern Territories">
                                                                                French Southern Territories</option>
                                                                            <option value="Gabon">Gabon</option>
                                                                            <option value="Gambia">Gambia</option>
                                                                            <option value="Georgia">Georgia</option>
                                                                            <option value="Germany">Germany</option>
                                                                            <option value="Ghana">Ghana</option>
                                                                            <option value="Gibraltar">Gibraltar</option>
                                                                            <option value="Greece">Greece</option>
                                                                            <option value="Greenland">Greenland</option>
                                                                            <option value="Grenada">Grenada</option>
                                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                                            <option value="Guam">Guam</option>
                                                                            <option value="Guatemala">Guatemala</option>
                                                                            <option value="Guinea">Guinea</option>
                                                                            <option value="Guinea-Bissau">Guinea-Bissau
                                                                            </option>
                                                                            <option value="Guyana">Guyana</option>
                                                                            <option value="Haiti">Haiti</option>
                                                                            <option value="Heard and Mc Donald Islands">
                                                                                Heard and Mc Donald Islands</option>
                                                                            <option value="Honduras">Honduras</option>
                                                                            <option value="Hong Kong">Hong Kong</option>
                                                                            <option value="Hungary">Hungary</option>
                                                                            <option value="Iceland">Iceland</option>
                                                                            <option value="India">India</option>
                                                                            <option value="Indonesia">Indonesia</option>
                                                                            <option value="Iran (Islamic Republic of)">Iran
                                                                                (Islamic Republic of)</option>
                                                                            <option value="Iraq">Iraq</option>
                                                                            <option value="Ireland">Ireland</option>
                                                                            <option value="Israel">Israel</option>
                                                                            <option value="Italy">Italy</option>
                                                                            <option value="Ivory Coast">Ivory Coast
                                                                            </option>
                                                                            <option value="Jamaica">Jamaica</option>
                                                                            <option value="Japan">Japan</option>
                                                                            <option value="Jordan">Jordan</option>
                                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                                            <option value="Kenya">Kenya</option>
                                                                            <option value="Kiribati">Kiribati</option>
                                                                            <option
                                                                                value="Korea, Democratic People's Republic of">
                                                                                Korea, Democratic People's Republic of
                                                                            </option>
                                                                            <option value="Korea, Republic of">Korea,
                                                                                Republic of</option>
                                                                            <option value="Kuwait">Kuwait</option>
                                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                            <option
                                                                                value="Lao People's Democratic Republic">
                                                                                Lao People's Democratic Republic</option>
                                                                            <option value="Latvia">Latvia</option>
                                                                            <option value="Lebanon">Lebanon</option>
                                                                            <option value="Lesotho">Lesotho</option>
                                                                            <option value="Liberia">Liberia</option>
                                                                            <option value="Libyan Arab Jamahiriya">Libyan
                                                                                Arab Jamahiriya</option>
                                                                            <option value="Liechtenstein">Liechtenstein
                                                                            </option>
                                                                            <option value="Lithuania">Lithuania</option>
                                                                            <option value="Luxembourg">Luxembourg</option>
                                                                            <option value="Macau">Macau</option>
                                                                            <option value="Macedonia">Macedonia</option>
                                                                            <option value="Madagascar">Madagascar</option>
                                                                            <option value="Malawi">Malawi</option>
                                                                            <option value="Malaysia">Malaysia</option>
                                                                            <option value="Maldives">Maldives</option>
                                                                            <option value="Mali">Mali</option>
                                                                            <option value="Malta">Malta</option>
                                                                            <option value="Marshall Islands">Marshall
                                                                                Islands</option>
                                                                            <option value="Martinique">Martinique</option>
                                                                            <option value="Mauritania">Mauritania</option>
                                                                            <option value="Mauritius">Mauritius</option>
                                                                            <option value="Mayotte">Mayotte</option>
                                                                            <option value="Mexico">Mexico</option>
                                                                            <option
                                                                                value="Micronesia, Federated States of">
                                                                                Micronesia, Federated States of</option>
                                                                            <option value="Moldova, Republic of">Moldova,
                                                                                Republic of</option>
                                                                            <option value="Monaco">Monaco</option>
                                                                            <option value="Mongolia">Mongolia</option>
                                                                            <option value="Montserrat">Montserrat</option>
                                                                            <option value="Morocco">Morocco</option>
                                                                            <option value="Mozambique">Mozambique</option>
                                                                            <option value="Myanmar">Myanmar</option>
                                                                            <option value="Namibia">Namibia</option>
                                                                            <option value="Nauru">Nauru</option>
                                                                            <option value="Nepal">Nepal</option>
                                                                            <option value="Netherlands">Netherlands
                                                                            </option>
                                                                            <option value="Netherlands Antilles">
                                                                                Netherlands Antilles</option>
                                                                            <option value="New Caledonia">New Caledonia
                                                                            </option>
                                                                            <option value="New Zealand">New Zealand
                                                                            </option>
                                                                            <option value="Nicaragua">Nicaragua</option>
                                                                            <option value="Niger">Niger</option>
                                                                            <option value="Nigeria">Nigeria</option>
                                                                            <option value="Niue">Niue</option>
                                                                            <option value="Norfork Island">Norfork Island
                                                                            </option>
                                                                            <option value="Northern Mariana Islands">
                                                                                Northern Mariana Islands</option>
                                                                            <option value="Norway">Norway</option>
                                                                            <option value="Oman">Oman</option>
                                                                            <option value="Pakistan">Pakistan</option>
                                                                            <option value="Palau">Palau</option>
                                                                            <option value="Panama">Panama</option>
                                                                            <option value="Papua New Guinea">Papua New
                                                                                Guinea</option>
                                                                            <option value="Paraguay">Paraguay</option>
                                                                            <option value="Peru">Peru</option>
                                                                            <option value="Philippines">Philippines
                                                                            </option>
                                                                            <option value="Pitcairn">Pitcairn</option>
                                                                            <option value="Poland">Poland</option>
                                                                            <option value="Portugal">Portugal</option>
                                                                            <option value="Puerto Rico">Puerto Rico
                                                                            </option>
                                                                            <option value="Qatar">Qatar</option>
                                                                            <option value="Republic of South Sudan">
                                                                                Republic of South Sudan</option>
                                                                            <option value="Reunion">Reunion</option>
                                                                            <option value="Romania">Romania</option>
                                                                            <option value="Russian Federation">Russian
                                                                                Federation</option>
                                                                            <option value="Rwanda">Rwanda</option>
                                                                            <option value="Saint Kitts and Nevis">Saint
                                                                                Kitts and Nevis</option>
                                                                            <option value="Saint Lucia">Saint Lucia
                                                                            </option>
                                                                            <option
                                                                                value="Saint Vincent and the Grenadines">
                                                                                Saint Vincent and the Grenadines</option>
                                                                            <option value="Samoa">Samoa</option>
                                                                            <option value="San Marino">San Marino</option>
                                                                            <option value="Sao Tome and Principe">Sao Tome
                                                                                and Principe</option>
                                                                            <option value="Saudi Arabia">Saudi Arabia
                                                                            </option>
                                                                            <option value="Senegal">Senegal</option>
                                                                            <option value="Serbia">Serbia</option>
                                                                            <option value="Seychelles">Seychelles</option>
                                                                            <option value="Sierra Leone">Sierra Leone
                                                                            </option>
                                                                            <option value="Singapore">Singapore</option>
                                                                            <option value="Slovakia">Slovakia</option>
                                                                            <option value="Slovenia">Slovenia</option>
                                                                            <option value="Solomon Islands">Solomon Islands
                                                                            </option>
                                                                            <option value="Somalia">Somalia</option>
                                                                            <option value="South Africa">South Africa
                                                                            </option>
                                                                            <option
                                                                                value="South Georgia South Sandwich Islands">
                                                                                South Georgia South Sandwich Islands
                                                                            </option>
                                                                            <option value="Spain">Spain</option>
                                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                                            <option value="St. Helena">St. Helena</option>
                                                                            <option value="St. Pierre and Miquelon">St.
                                                                                Pierre and Miquelon</option>
                                                                            <option value="Sudan">Sudan</option>
                                                                            <option value="Suriname">Suriname</option>
                                                                            <option value="Svalbarn and Jan Mayen Islands">
                                                                                Svalbarn and Jan Mayen Islands</option>
                                                                            <option value="Swaziland">Swaziland</option>
                                                                            <option value="Sweden">Sweden</option>
                                                                            <option value="Switzerland">Switzerland
                                                                            </option>
                                                                            <option value="Syrian Arab Republic">Syrian
                                                                                Arab Republic</option>
                                                                            <option value="Taiwan">Taiwan</option>
                                                                            <option value="Tajikistan">Tajikistan</option>
                                                                            <option value="Tanzania, United Republic of">
                                                                                Tanzania, United Republic of</option>
                                                                            <option value="Thailand">Thailand</option>
                                                                            <option value="Togo">Togo</option>
                                                                            <option value="Tokelau">Tokelau</option>
                                                                            <option value="Tonga">Tonga</option>
                                                                            <option value="Trinidad and Tobago">Trinidad
                                                                                and Tobago</option>
                                                                            <option value="Tunisia">Tunisia</option>
                                                                            <option value="Turkey">Turkey</option>
                                                                            <option value="Turkmenistan">Turkmenistan
                                                                            </option>
                                                                            <option value="Turks and Caicos Islands">Turks
                                                                                and Caicos Islands</option>
                                                                            <option value="Tuvalu">Tuvalu</option>
                                                                            <option value="Uganda">Uganda</option>
                                                                            <option value="Ukraine">Ukraine</option>
                                                                            <option value="United Arab Emirates">United
                                                                                Arab Emirates</option>
                                                                            <option
                                                                                value="United States minor outlying islands">
                                                                                United States minor outlying islands
                                                                            </option>
                                                                            <option value="Uruguay">Uruguay</option>
                                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                                            <option value="Vanuatu">Vanuatu</option>
                                                                            <option value="Vatican City State">Vatican City
                                                                                State</option>
                                                                            <option value="Venezuela">Venezuela</option>
                                                                            <option value="Vietnam">Vietnam</option>
                                                                            <option value="Virgin Islands (British)">Virgin
                                                                                Islands (British)</option>
                                                                            <option value="Virgin Islands (U.S.)">Virgin
                                                                                Islands (U.S.)</option>
                                                                            <option value="Wallis and Futuna Islands">
                                                                                Wallis and Futuna Islands</option>
                                                                            <option value="Western Sahara">Western Sahara
                                                                            </option>
                                                                            <option value="Yemen">Yemen</option>
                                                                            <option value="Yugoslavia">Yugoslavia</option>
                                                                            <option value="Zaire">Zaire</option>
                                                                            <option value="Zambia">Zambia</option>
                                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                                        </select>
                                                                    </label>
                                                                </div>

                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">State/Province/Territory
                                                                        <input type="text"
                                                                            name="state"
                                                                            class="form-control "
                                                                            id="state"
                                                                            placeholder="State, Province Or Territory">
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row gutters">
                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">Address <span
                                                                            class="text-danger">*</span>
                                                                        <input type="text" name="address"
                                                                            class="form-control " id="address"
                                                                            placeholder="Street"
                                                                            required="">
                                                                    </label>
                                                                </div>

                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">City <span
                                                                            class="text-danger">*</span>
                                                                        <input type="text" name="city"
                                                                            class="form-control " id="city"
                                                                            placeholder="City"
                                                                            required="">
                                                                    </label>
                                                                </div>

                                                            </div>


                                                            <div class="form-group row gutters">
                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">Postal Code <span
                                                                            class="text-danger">*</span>
                                                                        <input type="text" name="postal_code"
                                                                            class="form-control " id="postal_code"
                                                                            placeholder="Postal Code"
                                                                            required="">
                                                                    </label>
                                                                </div>

                                                                <div class="col-xl-6 col-md-12">
                                                                    <label class="d-block ">VAT number
                                                                        <input type="text" name="vat_number"
                                                                            class="form-control " id="vat_number"
                                                                            placeholder="VAT Number" >
                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <div class="custom-control custom-checkbox mt-3 mb-3">
                                                                <input type="checkbox" name="billing_confirmation"
                                                                    class="custom-control-input"
                                                                    id="billing_confirmation" required="">
                                                                <label class="custom-control-label"
                                                                    for="billing_confirmation">I confirm that the
                                                                    information provided herein are accurate</label>
                                                            </div>
                                                            <button type="submit" class="btn bg-primary text-white">Save
                                                                Changes</button>

                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end the billing info --}}


                                        {{-- start billing table info --}}
                                        <table
                                            class="table table-sm table-dashboard table-bordered table-striped fs--1 p-0">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th class="">Date</th>
                                                    <th class="">Transaction Description</th>
                                                    <th class="">Transaction Amount</th>
                                                    <th class="text-center">Payment Platform</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                {{-- start --}}
                                                @foreach ($payments as $payment)
                                                <tr style="font-size: 20px">
                                                    <td class="text-primary">{{ $payment->created_at->diffForHumans() }}</td>
                                                    <td class="text-primary">You have added funds to Your account via {{ $payment->payment_platform }}
                                                    </td>
                                                    <td class="text-primary">${{ $payment->amount }}</td>
                                                    <td class="text-center text-primary">{{ $payment->payment_platform }}</td>
                                                    {{-- <td class="text-center">
                                                        <a href="#" id="billingInformation" data-toggle="modal"
                                                            data-target="#billingInformation">Add Billing Details</a>
                                                        <svg style="width:25px"
                                                            class="svg-inline--fa fa-info-circle fa-w-16 text-facebook"
                                                            data-html="true"
                                                            data-content="To view and print your invoices, you must add your billing information"
                                                            data-placement="right" data-toggle="popover"
                                                            data-container="body" data-trigger="hover"
                                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                                            data-icon="info-circle" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            data-fa-i2svg="" data-original-title="" title="">
                                                            <path fill="currentColor"
                                                                d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z">
                                                            </path>
                                                        </svg><!-- <i class="fas fa-info-circle text-facebook" data-html="true" data-content="To view and print your invoices, you must add your billing information" data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover"></i> Font Awesome fontawesome.com -->
                                                    </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- end --}}



                                                <!--Start  Modal Billing Information -->

                                                <!-- End Modal Billing Information -->
                                            </tbody>
                                        </table>
                                        {{-- end billing table info --}}

                                    </div>
                                </div>
                            </div>
                            {{-- end the card billing --}}

                            {{-- start table pagination --}}
                            <div>
                                <ul class="pagination justify-content-center mb-0 pt-3">
                                    <li class="page-item">
                                      {{ $payments->links() }}
                                    </li>
                                </ul>
                            </div>
                            {{-- end table pagination --}}

                        </div>

                    </div>



                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        // start function for change the gatways images
        function togglePayment() {

            var selectedGateway = document.getElementById("paymentMethod").value;
            var paymentImages = document.querySelectorAll('.payment-img');

            if (selectedGateway == 'credit_card') {
                //console.log(selectedGateway);
                document.getElementById("imgCard").src = "{{ asset('public/assets/images/cards_stripe.webp') }}";
                document.getElementById("crypto_text").style.display = 'none';
                document.getElementById('payment_method').value = 'credit_card';
                document.getElementById('payButton').textContent = 'Pay with Credit Card';

            } else if (selectedGateway == 'crypto') {
                //console.log(selectedGateway);
                document.getElementById("imgCard").src = "{{ asset('public/assets/images/crypto.webp') }}";
                document.getElementById("crypto_text").style.display = 'block';
                document.getElementById('payment_method').value = 'crypto';
                document.getElementById('payButton').textContent = 'Pay with Crypto';
            } else {
                //console.log(selectedGateway);
                document.getElementById("imgCard").src = "{{ asset('public/assets/images/paypal.webp') }}";
                document.getElementById("crypto_text").style.display = 'none';
                document.getElementById('payment_method').value = 'paypal';
                document.getElementById('payButton').textContent = 'Pay with Paypal';
            }

        }
        // end the gatway images

        // start function to change amount
        function toggleAmount() {
            var selectedGateway = document.getElementById("amount").value;

            //console.log(selectedGateway);

            let amountSummary = document.getElementById("amountSummary");
            amountSummary.textContent = selectedGateway;

            let totalSummary = document.getElementById("totalSummary");
            totalSummary.textContent = selectedGateway;

            let app = document.getElementById("app_total").value = selectedGateway;
            //app.value = selectedGateway
           // console.log(app);
        }
        // end function to change amount
    </script>
