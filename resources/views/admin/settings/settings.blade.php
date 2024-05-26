@extends('admin.layouts.master')

@section('style')
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
                            <li class="breadcrumb-item active">Settings</li>
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

                <div class="row gutters-sm">
                    <div class="col-md-5 mb-3">
                        <!-- Profile Photo and username -->
                        <div class="card">
                            <div class="card-header bg-primary text-white font-weight-bold"><span>Your User ID: </span>
                                <strong class="font-weight-bold ml-1" style="color: yellow"> {{ auth()->user()->id ?? '' }}</strong></div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="avatar avatar-4xl">
                                        <img src="{{ auth()->user()->GetPicture() ?? '' }}"
                                            alt="{{ auth()->user()->name ?? '' }}" class="rounded-circle" width="100">
                                    </div>
                                    <div class="mt-3">
                                        <h4>{{ auth()->user()->name ?? '' }}</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile Photo and username -->

                        <!-- Change Password -->
                        <div class="card mt-3">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">Update Password</h5>
                            </div>

                            <div class="card-body">
                                <div>
                                    <form method="POST" action="{{ route('update_password') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="password" id="current_password" class="form-control "
                                                name="current_password" required="" placeholder="Current Password">

                                            <input id="new_password" type="password" class="form-control mt-3 " name="new_password"
                                                required="" placeholder="New Password">

                                            <input id="confirm_password" type="password" class="form-control mt-3"
                                                name="confirm_password" required="" placeholder="Confirm Password">

                                        </div>
                                        <button type="submit" class="btn bg-primary text-white">Save Changes</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Change Password -->

                        @if (auth()->user()->role == 'client')
                        <!-- Email Notification Setting -->
                        <div class="card mt-3">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">Email Notification Setting </h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form method="POST" action="#">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="form-group row gutters">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_buyer_task_accepted" type="hidden" value="0">
                                                    <input name="email_buyer_task_accepted" value="1" checked=""
                                                        class="custom-control-input" id="email_buyer_task_accepted"
                                                        type="checkbox">
                                                    <label class="custom-control-label" for="email_buyer_task_accepted">Get
                                                        an email notification when a task is accepted </label>
                                                </div>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_buyer_task_rejected" type="hidden" value="0">
                                                    <input name="email_buyer_task_rejected" value="1" checked=""
                                                        class="custom-control-input" id="email_buyer_task_rejected"
                                                        type="checkbox">
                                                    <label class="custom-control-label" for="email_buyer_task_rejected">Get
                                                        an email notification when a task is rejected </label>
                                                </div>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_buyer_task_delivered" type="hidden"
                                                        value="0">
                                                    <input name="email_buyer_task_delivered" value="1"
                                                        checked="" class="custom-control-input"
                                                        id="email_buyer_task_delivered" type="checkbox">
                                                    <label class="custom-control-label"
                                                        for="email_buyer_task_delivered">Get an email notification when a
                                                        task is delivered <small class="text-danger">(Highly
                                                            recommend)</small></label>
                                                </div>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_buyer_websites_added" type="hidden"
                                                        value="0">
                                                    <input name="email_buyer_websites_added" value="1"
                                                        checked="" class="custom-control-input"
                                                        id="email_buyer_websites_added" type="checkbox">
                                                    <label class="custom-control-label"
                                                        for="email_buyer_websites_added">Get a weekly email notification
                                                        when websites are added </label>
                                                </div>

                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_message_received" type="hidden" value="0">
                                                    <input name="email_message_received" value="1" checked=""
                                                        class="custom-control-input" id="email_message_received"
                                                        type="checkbox">
                                                    <label class="custom-control-label" for="email_message_received">Get
                                                        an email notification when you received a message <small
                                                            class="text-danger">(Highly recommend)</small></label>
                                                </div>
                                                <div class="custom-control custom-switch mb-1">
                                                    <input name="email_buyer_task_approval_reminder" type="hidden"
                                                        value="0">
                                                    <input name="email_buyer_task_approval_reminder" value="1"
                                                        checked="" class="custom-control-input"
                                                        id="email_buyer_task_approval_reminder" type="checkbox">
                                                    <label class="custom-control-label"
                                                        for="email_buyer_task_approval_reminder">Get an email notification
                                                        to remind you about task waiting for approval </label>
                                                </div>
                                            </div>

                                        </div>
                                        <button onsubmit="return 0;" type="submit" class="btn bg-primary text-white">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif



                        <!-- End Email Notification Setting -->
                    </div>

                    <div class="col-md-7">

                        <!-- Update Profile Information -->
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">Update Profile Information</h5>
                            </div>
                            <div class="card-body">
                                <div>

                                    <form method="POST" action="{{ route('update_mobile') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Full Name
                                                    <input type="text" name="name" class="form-control "
                                                        id="name" placeholder="Full Name" autocomplete="OFF"
                                                        value="{{ auth()->user()->name ?? '' }}" disabled="">
                                                </label>
                                            </div>

                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Username
                                                    <input type="text" name="username" class="form-control "
                                                        id="username" placeholder="Username" autocomplete="OFF"
                                                        disabled="" value="{{ auth()->user()->name ?? '' }}">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Email
                                                    <input type="email" name="email" class="form-control "
                                                        id="email" placeholder="Email" value="{{ auth()->user()->email ?? '' }}"
                                                        disabled="">
                                                </label>
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Phone Number
                                                    <input type="text" name="new_mobile" class="form-control "
                                                        id="new_mobile" placeholder="Phone Number" value="{{ auth()->user()->mobile ?? '' }}">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mt-3 mb-3">
                                            <input type="checkbox" name="confirmation" class="custom-control-input"
                                                id="cat" required="">
                                            <label class="custom-control-label " for="cat">I confirm that the
                                                information provided herein are accurate</label>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn bg-primary text-white">Save Changes</button>






                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Update Profile Information -->

                        <!-- Change Paypal Email -->
                        <!-- End Change Paypal Email -->

                        @if (auth()->user()->role == 'client')
                        <!-- Billing information -->
                        <div class="card mt-3">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">Billing information</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form method="POST" action="{{ route('billings.update' ,  $user_billing->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Full Name <span class="text-danger">*</span>
                                                    <input type="text" name="name" class="form-control "
                                                        id="name" value="{{ $user_billing->name }}" required="">
                                                </label>
                                            </div>

                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Company Name <span class="text-danger">*</span>
                                                    <input type="text" name="company_name" class="form-control"
                                                        id="company_name" placeholder="Company Name" value="{{ $user_billing->company_name }}"
                                                        required="">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Country <span class="text-danger">*</span>
                                                    <select name="country" class="custom-select" required="">
                                                        <option value="{{ $user_billing->country }}" selected="" {{-- disabled="" --}}>{{ $user_billing->country }}</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and/or Barbuda">Antigua and/or Barbuda
                                                        </option>
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
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                        </option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British lndian Ocean Territory">British lndian Ocean
                                                            Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic
                                                        </option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                                        </option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Democratic Republic of Congo">Democratic Republic of
                                                            Congo</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecudaor">Ecudaor</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                            (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="France, Metropolitan">France, Metropolitan</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern
                                                            Territories</option>
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
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard and Mc Donald Islands">Heard and Mc Donald
                                                            Islands</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic
                                                            of)</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Ivory Coast">Ivory Coast</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea,
                                                            Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's
                                                            Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                                        </option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
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
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia,
                                                            Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfork Island">Norfork Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands
                                                        </option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republic of South Sudan">Republic of South Sudan
                                                        </option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                        </option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and
                                                            the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe
                                                        </option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia South Sandwich Islands">South Georgia
                                                            South Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="St. Helena">St. Helena</option>
                                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon
                                                        </option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbarn and Jan Mayen Islands">Svalbarn and Jan
                                                            Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United
                                                            Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                        </option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United States minor outlying islands">United States
                                                            minor outlying islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican City State">Vatican City State</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)
                                                        </option>
                                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)
                                                        </option>
                                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands
                                                        </option>
                                                        <option value="Western Sahara">Western Sahara</option>
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
                                                    <input type="text" name="state" class="form-control "
                                                        id="state" placeholder="State, Province Or Territory"
                                                        value="{{ $user_billing->state }}">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Address <span class="text-danger">*</span>
                                                    <input type="text" name="address" class="form-control "
                                                        id="address" placeholder="Street" value="{{$user_billing->address}}"
                                                        required="">
                                                </label>
                                            </div>

                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">City <span class="text-danger">*</span>
                                                    <input type="text" name="city" class="form-control "
                                                        id="city" placeholder="City" value="{{ $user_billing->city }}" required="">
                                                </label>
                                            </div>

                                        </div>


                                        <div class="form-group row gutters">
                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">Postal Code <span class="text-danger">*</span>
                                                    <input type="text" class="form-control"
                                                        name="postal_code" id="postal_code" placeholder="Postal Code"
                                                        value="{{ $user_billing->postal_code }}" required="">
                                                </label>
                                            </div>

                                            <div class="col-xl-6 col-md-12">
                                                <label class="d-block ">VAT number
                                                    <input type="text" name="vat_number" class="form-control"
                                                        id="vat_number" placeholder="VAT Number" value="{{ $user_billing->vat_number }}">
                                                </label>
                                            </div>

                                        </div>

                                        <div class="custom-control custom-checkbox mt-3 mb-3">
                                            <input type="checkbox" name="billing_confirmation" class="custom-control-input"
                                                id="billing_confirmation" required="">
                                            <label class="custom-control-label " for="billing_confirmation">I confirm
                                                that the information provided herein are accurate</label>
                                        </div>
                                        <button type="submit" class="btn bg-primary text-white">Save Changes</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- End Billing information -->
                        @endif

                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
