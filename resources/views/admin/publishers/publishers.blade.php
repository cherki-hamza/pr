@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4><strong>Project: <span style="color: goldenrod"> {{  \App\Models\Project::where('id',request()->project_id)->first()->project_name ?? '-'  }} </span> </strong></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
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

                {{-- start searsh --}}
                    @include('admin.inc.client.client_searsh_publisher')
                {{-- end searsh --}}

                <div class="card-header">
                    <h3 class="card-title">
                        Found: <span class="text-danger">{{$sites_count}} </span> Websites {{-- - {{$project_id}} | {{ print_r(request()->all()) }} --}}
                    </h3>

                    {{-- start search --}}
                    {{-- <form  action="{{ route('site_index' , ['project_id' => request()->project_id , 'search' => request()->search ]) }}" method="POST">
                        @csrf
                    <div style="float: right" class="form-group row">

                        <input type="text" style="width: 280px;" class="form-control mx-2" autocomplete="on" value="{{ request()->search ?? '' }}" required name="search" placeholder="Enter Search Keword">
                        <button type="submit" class="btn btn-primary btn-sm loading-trigger mr-3">
                            <svg style="width: 25px" class="svg-inline--fa fa-search fa-w-16 mr-2"  focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>Search</button>
                    </div>
                   </form> --}}
                    {{-- end search --}}

                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                   {{--  <h3>publishers..</h3> --}} {{--  datatable --}}
                                    <div class="table-responsive col-md-12">
                                        <table id="table_publisher" class="table table-bordered table-hover">

                                            {{-- start thead --}}
                                               @include('admin.inc.client.client_thead')
                                             {{-- end thead --}}

                                            <tbody>
                                                @if (!empty($sites) && $sites->count() != 0)
                                                @foreach ($sites as $site)
                                                <tr>
                                                  <td><i class="fa fa-link mr-2"></i>
                                                    <a href="https://{{$site->site_url}}" rel="nofollow" target="_blank" class="text-decoration-none font-weight-bold" data-html="true"
                                                     data-content="<strong class='text-primary font-weight-bold'>{{$site->site_url}}</strong>" data-placement="right" data-toggle="popover"
                                                      data-container="body" data-trigger="hover" data-original-title="" title="">{{ ($site->site_url) ? $site->site_url : $site->site_name}}</a><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-bezier-curve fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bezier-curve" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM208 88h-84.75C113.75 64.56 90.84 48 64 48 28.66 48 0 76.65 0 112s28.66 64 64 64c26.84 0 49.75-16.56 59.25-40h79.73c-55.37 32.52-95.86 87.32-109.54 152h49.4c11.3-41.61 36.77-77.21 71.04-101.56-3.7-8.08-5.88-16.99-5.88-26.44V88zm-48 232H64c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zM576 48c-26.84 0-49.75 16.56-59.25 40H432v72c0 9.45-2.19 18.36-5.88 26.44 34.27 24.35 59.74 59.95 71.04 101.56h49.4c-13.68-64.68-54.17-119.48-109.54-152h79.73c9.5 23.44 32.41 40 59.25 40 35.34 0 64-28.65 64-64s-28.66-64-64-64zm0 272h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-bezier-curve"></i> Font Awesome fontawesome.com --> <span>Max </span> <strong class="font-weight-normal text-primary">03 DoFollow links</strong></span><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock"></i> Font Awesome fontawesome.com --> <span>Turnaround Time: </span>
                                                        <strong class="font-weight-normal text-primary">
                                                            {!! $site->site_time ?? '<span class="text-danger">Not Yet</span>' !!}
                                                        </strong>
                                                     </span>

                                                </td>

                                               {{--  <td>{{ $site->site_name }}</td> --}}

                                                <td><span class="badge badge-primary">{{ $site->handle_category() }}</span></td>

                                                {{-- <td class="text-center align-middle">
                                                    Monthly Traffic <br> --}}
                                                    <td class="text-center align-middle">
                                                        Monthly Traffic <br>

                                                    <img src="https://www.icopify.co/img/google-analytics-icon.svg" alt="google analytic icon" class=" mb-1" width="13px">
                                                    <span class="font-weight-bold h6"> {{ $site->handle_monthly_traffic() }} </span>
                                                </td>

                                                <td class="text-center align-middle">
                                                    <img src="https://www.icopify.co/img/Ahrefs-icon.jpeg" class="mr-1" alt="Ahrefs icon" width="20px">DR
                                                    <strong class=" font-weight-bold">{{$site->site_domain_rating}}</strong>
                                                </td>

                                                <td class="text-center align-middle"><span class="badge badge-primary mr-1">M</span>DA <strong class="font-weight-bold">{{$site->site_domain_authority}}</strong>
                                                    @if (!empty($site->spam_score) && $site->spam_score != '-' )
                                                    <br>Spam Score <strong class="text-primary font-weight-bold">{{$site->spam_score}}%</strong>
                                                    @endif
                                                </td>

                                                <td class="text-center align-middle">
                                                     @if ($site->site_language == 'Arabic')
                                                      <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="" class="shadow">
                                                     @elseif($site->site_language == 'French')
                                                     <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="" class="shadow">

                                                     @elseif($site->site_language == 'Chinese')
                                                     <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/cn.svg" alt="" class="shadow">
                                                     @elseif($site->site_language == 'Japanese')
                                                     <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/jp.svg" alt="" class="shadow">
                                                     @else
                                                     <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/us.svg" alt="" class="shadow">
                                                     @endif

                                                   <br><span>{{ $site->site_language  }}</span>
                                               </td>

                                               <td class="">
                                                  <div class="btn-group btn-group-sm btn-block">
                                                    @if(!empty($site->site_price))
                                                      <a href="{{route('order_index', ['project_id'=> request()->project_id , 'site_id' => $site->id ])}}" style="width: 50%;" class="btn btn-success">Buy Again</a>
                                                       <a href="{{route('order_index', ['project_id'=> request()->project_id, 'site_id' => $site->id ])}}" style="width: 50%;"
                                                         class="btn btn-primary"> {{($site->site_price) ? "$$site->site_price" : '$0'}}</a>
                                                    @else
                                                      <a href="#" style="width: 100px;" class="btn btn-danger">The Price Not Yet</a>
                                                    @endif

                                                  </div>

                                                  <div class="btn-group">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="card my-2 mx-2">
                                                                <input type="hidden" name="site_id" value="{{$site->id}}">
                                                                <a href="{{route('favorite',  ['site_id'=>$site->id])}}" class="btn btn-white">
                                                                    <i style="color: {{ ($site->favoritesCount == 1) ? 'red' : '#f5803e' }}" class="fa fa-heart"></i>
                                                                </a>
                                                        </div>


                                                        <div style="float: center" class="card my-2 mx-2 ml-4 mr-4">
                                                            <form action="{{ route('add_blacklist_publishers' , ['project_id'=> request()->project_id , 'site_id' => $site->id ]) }}" method="post">
                                                              @csrf
                                                                <button class="btn btn-white" type="submit"><i style="color: #f5803e " class="fa fa-ban"></i></button>
                                                                {{-- <input href="" class="btn btn-white"><i style="color: #f5803e " class="fa fa-ban"></i></a> --}}
                                                            </form>
                                                        </div>

                                                        <div style="float: right" class="card my-2 mx-2 mr-2">
                                                            <a href="#" class="btn btn-white"><i style="color: #f5803e " class="fa fa-flag"></i></a>
                                                        </div>

                                                    </div>
                                                  </div>
                                                </td>

                                                </tr>
                                                @endforeach

                                                @else
                                                   <tr class="text-center">
                                                     <td colspan="7">  <span class="text-danger">Oops No Data Found</span></td>
                                                   </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        {{-- start pagination --}}
                                        <div style="float: right" class="">
                                          {{ $sites->appends(Request::except('page'))->links() }}
                                        </div>
                                        {{-- end pagination --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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

{{-- <script>
    document.getElementById('resetButton').addEventListener('click', function(event) {
         event.preventDefault(); // Prevent the default button behaviorlet da = document.getElementByClassName('da').value;
         let da = document.getElementById('da').value = 1;
         let da_to =  document.getElementById('da_to').value = 100;
         let dr =  document.getElementById('dr').value = 1;
         let dr_to = document.getElementById('dr_to').value = 100;

         let price = document.getElementById('price').value = 1;
         let price_to =  document.getElementById('price_to').value = 100000;


         let category = document.getElementById('category').value = 'all';

         let linkType = document.getElementById('linkType').value = 'all';

        /*  let dev = document.getElementById('linkType').innerHTML = 'hamza';
         let t = document.getElementById('linkType').textContent = 'hamza'; */

         /* let mySelect = document.getElementById('linkType');
         console.log(mySelect); */

        /*  let firstOption = mySelect.querySelector('option');
         console.log(firstOption); */

         // Set the selectedIndex to 0 to select the first option
         //mySelect.selectedIndex = 0;

         //console.log(firstOption);

         //let monthlyTraffic =  document.getElementById('monthly_traffic').value = 'all';
         let mySelect = document.getElementById('monthly_traffic');
         console.log(mySelect);

         let firstOption = mySelect.querySelector('option');
         firstOption.setAttribute('selected','true');
         console.log(firstOption);

         let monthlyTraffic =  document.getElementById('monthly_traffic').value = 'all';










         let max_links_allow =  document.getElementById('max_links_allow').value = 1;

         let spamScore = document.getElementById('spamScore').value = 'all';



         let websiteLanguage = document.getElementById('websiteLanguage').value = 'all';



         let sponsored = document.getElementById('sponsored').value = 'all';







         let service_type = document.getElementById('service_type').value = 'all';
         service_type.innerHTML = 'hello';

         let worked_ith_or_not = document.getElementById('worked_it_or_not').value = 'all';
});

</script> --}}

{{-- <script>
    $("body").on('DOMSubtreeModified', ".spamScore", function() {
        //var spamScore = $('.spamScore').text();
        //document.getElementById('spamScore').value = area_code;
        let spamScore = document.getElementById('spamScore');
        console.log(spamScore);
    });
</script> --}}

{{-- <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    let datatable = new DataTable('#table_publisher');
</script> --}}

<script>
    /**
 * Original writed by DGmike
 * Forked to implement new usability by Patrick Müller github.com/mpatrick
 * Hosted on CODELAND's github page gituhub.com/codelandev/continent-country
 */


/* countries Dom Ready */
window.onDomReady = function dgDomReady(fn) {
  if (document.addEventListener)
    document.addEventListener('DOMContentLoaded', fn, false);
  else
    document.onreadystatechange = function() {
      dgReadyState(fn);
    };
};

function dgReadyState(fn) {
  if (document.readyState == 'interactive') fn();
}

/* Object */
var dgContinentsCountries = function(data) {
  var defaultData = {
    continent: false,
    continentVal: '',
    country: false,
    countryVal: '',
    change: false
  };

  for (name in defaultData) {
    if (!data[name]) {
      data[name] = defaultData[name];
    }
  }

  var keys = ['continent', 'country'];
  if (data.change) {
    var nome, length = keys.length;
    for (var a = 0; a < length; a++) {
      nome = keys[a];
      if (data[nome].tagName) {
        var opt = document.createElement('select');
        opt.disabled = null;
        for (var i = 0; i < data[nome].attributes.length; i++) {
          var attr = data[nome].attributes[i];
          if (attr.name != 'type') {
            opt.setAttribute(attr.name, attr.value);
          }
        }
        opt.size = 1;
        opt.disabled = false;
        data[nome].parentNode.replaceChild(opt, data[nome]);
        data[nome] = opt;
      }
    }
  }
  this.set(data.continent, data.country);
  this.start();

  var nome, length = keys.length;
  for (var i = 0; i < length; i++) {
    nome = keys[i];

    if (this[nome].getAttribute('value')) {
      data[nome + 'Val'] = this[nome].getAttribute('value');
    }

    if (data[nome + 'Val']) {
      var options = this[nome].options;
      if (nome == 'continent') this.continent.onchange();
      for (var j = 0; j < options.length; j++) {
        if (options[j].tagName == 'OPTION') {
          if (options[j].value == data[nome + 'Val']) {
            options[j].setAttribute('selected', true);
            if (nome == 'continent') {
              this.continent.selectedIndex = j;
              this.continent.onchange();
            }
          }
        }
      }
    }

  }

};

dgContinentsCountries.prototype = {
  continent: document.createElement('select'),
  country: document.createElement('select'),
  set: function(continent, country) {
    this.continent = continent;
    this.continent.dgContinentsCountries = this;
    this.country = country;
    this.continent.onchange = function() {
      this.dgContinentsCountries.run();
    };
  },
  start: function() {
    var continent = this.continent;
    while (continent.childNodes.length) continent.removeChild(continent.firstChild);
    for (var i = 0; i < this.continents.length; i++) this.addOption(continent, this.continents[i][0], this.continents[i][1]);
    this.addOption(country, '', 'Select a country');
  },
  run: function() {
    var sel = this.continent.selectedIndex;
    var itens = this.countries[sel];
    var itens_total = itens.length;

    var opts = this.country;
    while (opts.childNodes.length) opts.removeChild(opts.firstChild);

    for (var i = 0; i < itens_total; i++) this.addOption(opts, itens[i], itens[i]);
  },
  addOption: function(elm, val, text) {
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode(text));
    opt.value = val;
    elm.appendChild(opt);
  },
  continents: [
    ['', 'Select a continent'],
    ['Africa', 'Africa'],
    ['Antarctica', 'Antarctica'],
    ['Asia', 'Asia'],
    ['Oceania', 'Oceania'],
    ['Europe', 'Europe'],
    ['North America', 'North America'],
    ['South America', 'South America']
  ],
  countries: [
    /* Prompt */
    [''],
    /* Africa */
    ['Algeria', 'Angolia', 'Benin', 'Botswana', 'Burkina', 'Burundi', 'Cameroon', 'Central African Republic', 'Chad', 'Chana', 'Comoros Island', 'Congo', 'Congo (Zaire)', 'Cote D\'Ivoire', 'Djibouti', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Ethiopia', 'Gabon', 'Guinea', 'Guinea Bissau', 'Kenya', 'Lesotho', 'Liberia', 'Libya', 'Madagascar', 'Malawi', 'Mali', 'Mauritania', 'Mauritius', 'Morocco', 'Mozambique', 'Namibia', 'Niger', 'Nigeria', 'Rwanda', 'Sao Tomi and Principe', 'Senegal', 'Seychelles', 'Sierra Leone', 'Somalia', 'Republic of South Africa', 'Sudan', 'Swaziland', 'Tanzania', 'Tunisia', 'Togo', 'Uganda', 'Zambia', 'Zimbabwe'],

    /* Antarctica */
    ['Mainland Antarctica', 'United Kingdom (Islands only)'],

    /* Asia */
    ['Afghanistan', 'Armenia', 'Azerbaijan', 'Bahrain', 'Bangladesh', 'Bhutan', 'Brunei', 'Cambodia', 'China', 'Cyprus', 'Georgia', 'Iran', 'Iraq', 'India', 'Indonesia'/* , 'Israel and Gaza' */, 'Israel', 'Palestine' ,'Japan', 'Jordan', 'Kazakstan', 'Kuwait', 'Kyrgzstan', 'Laos', 'Lebanon', 'Malaysia', 'Mongolia', 'Myanmar (Burma)', 'Nepal', 'North Korea', 'Oman', 'Pakistan', 'Palau', 'Phillipines', 'Quatar', 'Russian Federation', 'Saudi Arabia', 'South Korea', 'Sri Lanka', 'Syria', 'Taiwan', 'Tajikstan', 'Thailand', 'Turkey', 'Turkmenistan', 'United Arab Emirates', 'Uzbekistan', 'Vietnam', 'Yemen'],

    /* Oceania */
    ['Australia', 'Fiji', 'France (Islands only)', 'Kiribati', 'Marshall Islands', 'Micronesia, F.S.O', 'Nauru', 'New Zealand', 'Papua New Guinea', 'Solomon Islands', 'Tonga', 'Tuvalu', 'United Kingdom (Islands only)', 'Vanuatu', 'Western Samoa'],

    /* Europe */
    ['Albania', 'Andorra', 'Austria', 'Belarus', 'Belgium', 'Bosnia-Herzegovina', 'Bulgaria', 'Cape Verde', 'Croatia', 'Czech Republic', 'Denmark and Greenland', 'Estonia', 'Finland', 'France', 'Germany', 'Greece', 'Hungary', 'Iceland', 'Republic of Ireland', 'Italy', 'Latvia', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia', 'Malta', 'Moldova', 'Netherlands', 'Norway', 'Poland', 'Portugal', 'Romania', 'Russian Federation', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Switzerland', 'Turkey', 'Ukraine', 'United Kingdom', 'Yugoslavia'],

    /* North America */
    ['Barbados', 'Bahamas', 'Belize', 'Canada', 'Costa Rica', 'Cuba', 'Dominica', 'Dominican Republic', 'El Salvador', 'France (Islands only)', 'Greenland (Denmark)', 'Grenada', 'Guatemala', 'Haiti', 'Honduras', 'Jamaica', 'Mexico', 'Netherlands (Islands only)', 'Pacific Islands Inc. Hawaii', 'Panama', 'St Kitts-Nevis', 'St Lucia', 'St Vincent and the Grenadines', 'Trinidad and Tobago', 'United Kingdom (Islands only)', 'United States Of America'],

    /* South America */
    ['Argentina', 'Bolivia', 'Brazil', 'Chile', 'Colombia', 'Ecuador', 'French Guiana', 'Guyana', 'Nicaragua', 'Paraguay', 'Peru', 'Suriname', 'United Kingdom (Islands only)', 'Uruguay', 'Venezuela']
  ]
};

</script>

<script type="text/javascript">
    $(function() {
      new dgContinentsCountries({
        continentVal: document.getElementById("continent").val,
        countryVal: document.getElementById("country").val,
        continent: document.getElementById("continent"),
        country: document.getElementById("country"),
        change: true
      });
    });
    </script>

    <script>
     const countryListAllIsoData = [
	{"code": "AF", "code3": "AFG", "name": "Afghanistan", "number": "004"},
	{"code": "AL", "code3": "ALB", "name": "Albania", "number": "008"},
	{"code": "DZ", "code3": "DZA", "name": "Algeria", "number": "012"},
	{"code": "AS", "code3": "ASM", "name": "American Samoa", "number": "016"},
	{"code": "AD", "code3": "AND", "name": "Andorra", "number": "020"},
	{"code": "AO", "code3": "AGO", "name": "Angola", "number": "024"},
	{"code": "AI", "code3": "AIA", "name": "Anguilla", "number": "660"},
	{"code": "AQ", "code3": "ATA", "name": "Antarctica", "number": "010"},
	{"code": "AG", "code3": "ATG", "name": "Antigua and Barbuda", "number": "028"},
	{"code": "AR", "code3": "ARG", "name": "Argentina", "number": "032"},
	{"code": "AM", "code3": "ARM", "name": "Armenia", "number": "051"},
	{"code": "AW", "code3": "ABW", "name": "Aruba", "number": "533"},
	{"code": "AU", "code3": "AUS", "name": "Australia", "number": "036"},
	{"code": "AT", "code3": "AUT", "name": "Austria", "number": "040"},
	{"code": "AZ", "code3": "AZE", "name": "Azerbaijan", "number": "031"},
	{"code": "BS", "code3": "BHS", "name": "Bahamas (the)", "number": "044"},
	{"code": "BH", "code3": "BHR", "name": "Bahrain", "number": "048"},
	{"code": "BD", "code3": "BGD", "name": "Bangladesh", "number": "050"},
	{"code": "BB", "code3": "BRB", "name": "Barbados", "number": "052"},
	{"code": "BY", "code3": "BLR", "name": "Belarus", "number": "112"},
	{"code": "BE", "code3": "BEL", "name": "Belgium", "number": "056"},
	{"code": "BZ", "code3": "BLZ", "name": "Belize", "number": "084"},
	{"code": "BJ", "code3": "BEN", "name": "Benin", "number": "204"},
	{"code": "BM", "code3": "BMU", "name": "Bermuda", "number": "060"},
	{"code": "BT", "code3": "BTN", "name": "Bhutan", "number": "064"},
	{"code": "BO", "code3": "BOL", "name": "Bolivia (Plurinational State of)", "number": "068"},
	{"code": "BQ", "code3": "BES", "name": "Bonaire, Sint Eustatius and Saba", "number": "535"},
	{"code": "BA", "code3": "BIH", "name": "Bosnia and Herzegovina", "number": "070"},
	{"code": "BW", "code3": "BWA", "name": "Botswana", "number": "072"},
	{"code": "BV", "code3": "BVT", "name": "Bouvet Island", "number": "074"},
	{"code": "BR", "code3": "BRA", "name": "Brazil", "number": "076"},
	{"code": "IO", "code3": "IOT", "name": "British Indian Ocean Territory (the)", "number": "086"},
	{"code": "BN", "code3": "BRN", "name": "Brunei Darussalam", "number": "096"},
	{"code": "BG", "code3": "BGR", "name": "Bulgaria", "number": "100"},
	{"code": "BF", "code3": "BFA", "name": "Burkina Faso", "number": "854"},
	{"code": "BI", "code3": "BDI", "name": "Burundi", "number": "108"},
	{"code": "CV", "code3": "CPV", "name": "Cabo Verde", "number": "132"},
	{"code": "KH", "code3": "KHM", "name": "Cambodia", "number": "116"},
	{"code": "CM", "code3": "CMR", "name": "Cameroon", "number": "120"},
	{"code": "CA", "code3": "CAN", "name": "Canada", "number": "124"},
	{"code": "KY", "code3": "CYM", "name": "Cayman Islands (the)", "number": "136"},
	{"code": "CF", "code3": "CAF", "name": "Central African Republic (the)", "number": "140"},
	{"code": "TD", "code3": "TCD", "name": "Chad", "number": "148"},
	{"code": "CL", "code3": "CHL", "name": "Chile", "number": "152"},
	{"code": "CN", "code3": "CHN", "name": "China", "number": "156"},
	{"code": "CX", "code3": "CXR", "name": "Christmas Island", "number": "162"},
	{"code": "CC", "code3": "CCK", "name": "Cocos (Keeling) Islands (the)", "number": "166"},
	{"code": "CO", "code3": "COL", "name": "Colombia", "number": "170"},
	{"code": "KM", "code3": "COM", "name": "Comoros (the)", "number": "174"},
	{"code": "CD", "code3": "COD", "name": "Congo (the Democratic Republic of the)", "number": "180"},
	{"code": "CG", "code3": "COG", "name": "Congo (the)", "number": "178"},
	{"code": "CK", "code3": "COK", "name": "Cook Islands (the)", "number": "184"},
	{"code": "CR", "code3": "CRI", "name": "Costa Rica", "number": "188"},
	{"code": "HR", "code3": "HRV", "name": "Croatia", "number": "191"},
	{"code": "CU", "code3": "CUB", "name": "Cuba", "number": "192"},
	{"code": "CW", "code3": "CUW", "name": "Curaçao", "number": "531"},
	{"code": "CY", "code3": "CYP", "name": "Cyprus", "number": "196"},
	{"code": "CZ", "code3": "CZE", "name": "Czechia", "number": "203"},
	{"code": "CI", "code3": "CIV", "name": "Côte d'Ivoire", "number": "384"},
	{"code": "DK", "code3": "DNK", "name": "Denmark", "number": "208"},
	{"code": "DJ", "code3": "DJI", "name": "Djibouti", "number": "262"},
	{"code": "DM", "code3": "DMA", "name": "Dominica", "number": "212"},
	{"code": "DO", "code3": "DOM", "name": "Dominican Republic (the)", "number": "214"},
	{"code": "EC", "code3": "ECU", "name": "Ecuador", "number": "218"},
	{"code": "EG", "code3": "EGY", "name": "Egypt", "number": "818"},
	{"code": "SV", "code3": "SLV", "name": "El Salvador", "number": "222"},
	{"code": "GQ", "code3": "GNQ", "name": "Equatorial Guinea", "number": "226"},
	{"code": "ER", "code3": "ERI", "name": "Eritrea", "number": "232"},
	{"code": "EE", "code3": "EST", "name": "Estonia", "number": "233"},
	{"code": "SZ", "code3": "SWZ", "name": "Eswatini", "number": "748"},
	{"code": "ET", "code3": "ETH", "name": "Ethiopia", "number": "231"},
	{"code": "FK", "code3": "FLK", "name": "Falkland Islands (the) [Malvinas]", "number": "238"},
	{"code": "FO", "code3": "FRO", "name": "Faroe Islands (the)", "number": "234"},
	{"code": "FJ", "code3": "FJI", "name": "Fiji", "number": "242"},
	{"code": "FI", "code3": "FIN", "name": "Finland", "number": "246"},
	{"code": "FR", "code3": "FRA", "name": "France", "number": "250"},
	{"code": "GF", "code3": "GUF", "name": "French Guiana", "number": "254"},
	{"code": "PF", "code3": "PYF", "name": "French Polynesia", "number": "258"},
	{"code": "TF", "code3": "ATF", "name": "French Southern Territories (the)", "number": "260"},
	{"code": "GA", "code3": "GAB", "name": "Gabon", "number": "266"},
	{"code": "GM", "code3": "GMB", "name": "Gambia (the)", "number": "270"},
	{"code": "GE", "code3": "GEO", "name": "Georgia", "number": "268"},
	{"code": "DE", "code3": "DEU", "name": "Germany", "number": "276"},
	{"code": "GH", "code3": "GHA", "name": "Ghana", "number": "288"},
	{"code": "GI", "code3": "GIB", "name": "Gibraltar", "number": "292"},
	{"code": "GR", "code3": "GRC", "name": "Greece", "number": "300"},
	{"code": "GL", "code3": "GRL", "name": "Greenland", "number": "304"},
	{"code": "GD", "code3": "GRD", "name": "Grenada", "number": "308"},
	{"code": "GP", "code3": "GLP", "name": "Guadeloupe", "number": "312"},
	{"code": "GU", "code3": "GUM", "name": "Guam", "number": "316"},
	{"code": "GT", "code3": "GTM", "name": "Guatemala", "number": "320"},
	{"code": "GG", "code3": "GGY", "name": "Guernsey", "number": "831"},
	{"code": "GN", "code3": "GIN", "name": "Guinea", "number": "324"},
	{"code": "GW", "code3": "GNB", "name": "Guinea-Bissau", "number": "624"},
	{"code": "GY", "code3": "GUY", "name": "Guyana", "number": "328"},
	{"code": "HT", "code3": "HTI", "name": "Haiti", "number": "332"},
	{"code": "HM", "code3": "HMD", "name": "Heard Island and McDonald Islands", "number": "334"},
	{"code": "VA", "code3": "VAT", "name": "Holy See (the)", "number": "336"},
	{"code": "HN", "code3": "HND", "name": "Honduras", "number": "340"},
	{"code": "HK", "code3": "HKG", "name": "Hong Kong", "number": "344"},
	{"code": "HU", "code3": "HUN", "name": "Hungary", "number": "348"},
	{"code": "IS", "code3": "ISL", "name": "Iceland", "number": "352"},
	{"code": "IN", "code3": "IND", "name": "India", "number": "356"},
	{"code": "ID", "code3": "IDN", "name": "Indonesia", "number": "360"},
	{"code": "IR", "code3": "IRN", "name": "Iran (Islamic Republic of)", "number": "364"},
	{"code": "IQ", "code3": "IRQ", "name": "Iraq", "number": "368"},
	{"code": "IE", "code3": "IRL", "name": "Ireland", "number": "372"},
	{"code": "IM", "code3": "IMN", "name": "Isle of Man", "number": "833"},
	{"code": "IL", "code3": "ISR", "name": "Israel", "number": "376"},
	{"code": "IT", "code3": "ITA", "name": "Italy", "number": "380"},
	{"code": "JM", "code3": "JAM", "name": "Jamaica", "number": "388"},
	{"code": "JP", "code3": "JPN", "name": "Japan", "number": "392"},
	{"code": "JE", "code3": "JEY", "name": "Jersey", "number": "832"},
	{"code": "JO", "code3": "JOR", "name": "Jordan", "number": "400"},
	{"code": "KZ", "code3": "KAZ", "name": "Kazakhstan", "number": "398"},
	{"code": "KE", "code3": "KEN", "name": "Kenya", "number": "404"},
	{"code": "KI", "code3": "KIR", "name": "Kiribati", "number": "296"},
	{"code": "KP", "code3": "PRK", "name": "Korea (the Democratic People's Republic of)", "number": "408"},
	{"code": "KR", "code3": "KOR", "name": "Korea (the Republic of)", "number": "410"},
	{"code": "KW", "code3": "KWT", "name": "Kuwait", "number": "414"},
	{"code": "KG", "code3": "KGZ", "name": "Kyrgyzstan", "number": "417"},
	{"code": "LA", "code3": "LAO", "name": "Lao People's Democratic Republic (the)", "number": "418"},
	{"code": "LV", "code3": "LVA", "name": "Latvia", "number": "428"},
	{"code": "LB", "code3": "LBN", "name": "Lebanon", "number": "422"},
	{"code": "LS", "code3": "LSO", "name": "Lesotho", "number": "426"},
	{"code": "LR", "code3": "LBR", "name": "Liberia", "number": "430"},
	{"code": "LY", "code3": "LBY", "name": "Libya", "number": "434"},
	{"code": "LI", "code3": "LIE", "name": "Liechtenstein", "number": "438"},
	{"code": "LT", "code3": "LTU", "name": "Lithuania", "number": "440"},
	{"code": "LU", "code3": "LUX", "name": "Luxembourg", "number": "442"},
	{"code": "MO", "code3": "MAC", "name": "Macao", "number": "446"},
	{"code": "MG", "code3": "MDG", "name": "Madagascar", "number": "450"},
	{"code": "MW", "code3": "MWI", "name": "Malawi", "number": "454"},
	{"code": "MY", "code3": "MYS", "name": "Malaysia", "number": "458"},
	{"code": "MV", "code3": "MDV", "name": "Maldives", "number": "462"},
	{"code": "ML", "code3": "MLI", "name": "Mali", "number": "466"},
	{"code": "MT", "code3": "MLT", "name": "Malta", "number": "470"},
	{"code": "MH", "code3": "MHL", "name": "Marshall Islands (the)", "number": "584"},
	{"code": "MQ", "code3": "MTQ", "name": "Martinique", "number": "474"},
	{"code": "MR", "code3": "MRT", "name": "Mauritania", "number": "478"},
	{"code": "MU", "code3": "MUS", "name": "Mauritius", "number": "480"},
	{"code": "YT", "code3": "MYT", "name": "Mayotte", "number": "175"},
	{"code": "MX", "code3": "MEX", "name": "Mexico", "number": "484"},
	{"code": "FM", "code3": "FSM", "name": "Micronesia (Federated States of)", "number": "583"},
	{"code": "MD", "code3": "MDA", "name": "Moldova (the Republic of)", "number": "498"},
	{"code": "MC", "code3": "MCO", "name": "Monaco", "number": "492"},
	{"code": "MN", "code3": "MNG", "name": "Mongolia", "number": "496"},
	{"code": "ME", "code3": "MNE", "name": "Montenegro", "number": "499"},
	{"code": "MS", "code3": "MSR", "name": "Montserrat", "number": "500"},
	{"code": "MA", "code3": "MAR", "name": "Morocco", "number": "504"},
	{"code": "MZ", "code3": "MOZ", "name": "Mozambique", "number": "508"},
	{"code": "MM", "code3": "MMR", "name": "Myanmar", "number": "104"},
	{"code": "NA", "code3": "NAM", "name": "Namibia", "number": "516"},
	{"code": "NR", "code3": "NRU", "name": "Nauru", "number": "520"},
	{"code": "NP", "code3": "NPL", "name": "Nepal", "number": "524"},
	{"code": "NL", "code3": "NLD", "name": "Netherlands (the)", "number": "528"},
	{"code": "NC", "code3": "NCL", "name": "New Caledonia", "number": "540"},
	{"code": "NZ", "code3": "NZL", "name": "New Zealand", "number": "554"},
	{"code": "NI", "code3": "NIC", "name": "Nicaragua", "number": "558"},
	{"code": "NE", "code3": "NER", "name": "Niger (the)", "number": "562"},
	{"code": "NG", "code3": "NGA", "name": "Nigeria", "number": "566"},
	{"code": "NU", "code3": "NIU", "name": "Niue", "number": "570"},
	{"code": "NF", "code3": "NFK", "name": "Norfolk Island", "number": "574"},
	{"code": "MP", "code3": "MNP", "name": "Northern Mariana Islands (the)", "number": "580"},
	{"code": "NO", "code3": "NOR", "name": "Norway", "number": "578"},
	{"code": "OM", "code3": "OMN", "name": "Oman", "number": "512"},
	{"code": "PK", "code3": "PAK", "name": "Pakistan", "number": "586"},
	{"code": "PW", "code3": "PLW", "name": "Palau", "number": "585"},
	{"code": "PS", "code3": "PSE", "name": "Palestine, State of", "number": "275"},
	{"code": "PA", "code3": "PAN", "name": "Panama", "number": "591"},
	{"code": "PG", "code3": "PNG", "name": "Papua New Guinea", "number": "598"},
	{"code": "PY", "code3": "PRY", "name": "Paraguay", "number": "600"},
	{"code": "PE", "code3": "PER", "name": "Peru", "number": "604"},
	{"code": "PH", "code3": "PHL", "name": "Philippines (the)", "number": "608"},
	{"code": "PN", "code3": "PCN", "name": "Pitcairn", "number": "612"},
	{"code": "PL", "code3": "POL", "name": "Poland", "number": "616"},
	{"code": "PT", "code3": "PRT", "name": "Portugal", "number": "620"},
	{"code": "PR", "code3": "PRI", "name": "Puerto Rico", "number": "630"},
	{"code": "QA", "code3": "QAT", "name": "Qatar", "number": "634"},
	{"code": "MK", "code3": "MKD", "name": "Republic of North Macedonia", "number": "807"},
	{"code": "RO", "code3": "ROU", "name": "Romania", "number": "642"},
	{"code": "RU", "code3": "RUS", "name": "Russian Federation (the)", "number": "643"},
	{"code": "RW", "code3": "RWA", "name": "Rwanda", "number": "646"},
	{"code": "RE", "code3": "REU", "name": "Réunion", "number": "638"},
	{"code": "BL", "code3": "BLM", "name": "Saint Barthélemy", "number": "652"},
	{"code": "SH", "code3": "SHN", "name": "Saint Helena, Ascension and Tristan da Cunha", "number": "654"},
	{"code": "KN", "code3": "KNA", "name": "Saint Kitts and Nevis", "number": "659"},
	{"code": "LC", "code3": "LCA", "name": "Saint Lucia", "number": "662"},
	{"code": "MF", "code3": "MAF", "name": "Saint Martin (French part)", "number": "663"},
	{"code": "PM", "code3": "SPM", "name": "Saint Pierre and Miquelon", "number": "666"},
	{"code": "VC", "code3": "VCT", "name": "Saint Vincent and the Grenadines", "number": "670"},
	{"code": "WS", "code3": "WSM", "name": "Samoa", "number": "882"},
	{"code": "SM", "code3": "SMR", "name": "San Marino", "number": "674"},
	{"code": "ST", "code3": "STP", "name": "Sao Tome and Principe", "number": "678"},
	{"code": "SA", "code3": "SAU", "name": "Saudi Arabia", "number": "682"},
	{"code": "SN", "code3": "SEN", "name": "Senegal", "number": "686"},
	{"code": "RS", "code3": "SRB", "name": "Serbia", "number": "688"},
	{"code": "SC", "code3": "SYC", "name": "Seychelles", "number": "690"},
	{"code": "SL", "code3": "SLE", "name": "Sierra Leone", "number": "694"},
	{"code": "SG", "code3": "SGP", "name": "Singapore", "number": "702"},
	{"code": "SX", "code3": "SXM", "name": "Sint Maarten (Dutch part)", "number": "534"},
	{"code": "SK", "code3": "SVK", "name": "Slovakia", "number": "703"},
	{"code": "SI", "code3": "SVN", "name": "Slovenia", "number": "705"},
	{"code": "SB", "code3": "SLB", "name": "Solomon Islands", "number": "090"},
	{"code": "SO", "code3": "SOM", "name": "Somalia", "number": "706"},
	{"code": "ZA", "code3": "ZAF", "name": "South Africa", "number": "710"},
	{"code": "GS", "code3": "SGS", "name": "South Georgia and the South Sandwich Islands", "number": "239"},
	{"code": "SS", "code3": "SSD", "name": "South Sudan", "number": "728"},
	{"code": "ES", "code3": "ESP", "name": "Spain", "number": "724"},
	{"code": "LK", "code3": "LKA", "name": "Sri Lanka", "number": "144"},
	{"code": "SD", "code3": "SDN", "name": "Sudan (the)", "number": "729"},
	{"code": "SR", "code3": "SUR", "name": "Suriname", "number": "740"},
	{"code": "SJ", "code3": "SJM", "name": "Svalbard and Jan Mayen", "number": "744"},
	{"code": "SE", "code3": "SWE", "name": "Sweden", "number": "752"},
	{"code": "CH", "code3": "CHE", "name": "Switzerland", "number": "756"},
	{"code": "SY", "code3": "SYR", "name": "Syrian Arab Republic", "number": "760"},
	{"code": "TW", "code3": "TWN", "name": "Taiwan", "number": "158"},
	{"code": "TJ", "code3": "TJK", "name": "Tajikistan", "number": "762"},
	{"code": "TZ", "code3": "TZA", "name": "Tanzania, United Republic of", "number": "834"},
	{"code": "TH", "code3": "THA", "name": "Thailand", "number": "764"},
	{"code": "TL", "code3": "TLS", "name": "Timor-Leste", "number": "626"},
	{"code": "TG", "code3": "TGO", "name": "Togo", "number": "768"},
	{"code": "TK", "code3": "TKL", "name": "Tokelau", "number": "772"},
	{"code": "TO", "code3": "TON", "name": "Tonga", "number": "776"},
	{"code": "TT", "code3": "TTO", "name": "Trinidad and Tobago", "number": "780"},
	{"code": "TN", "code3": "TUN", "name": "Tunisia", "number": "788"},
	{"code": "TR", "code3": "TUR", "name": "Turkey", "number": "792"},
	{"code": "TM", "code3": "TKM", "name": "Turkmenistan", "number": "795"},
	{"code": "TC", "code3": "TCA", "name": "Turks and Caicos Islands (the)", "number": "796"},
	{"code": "TV", "code3": "TUV", "name": "Tuvalu", "number": "798"},
	{"code": "UG", "code3": "UGA", "name": "Uganda", "number": "800"},
	{"code": "UA", "code3": "UKR", "name": "Ukraine", "number": "804"},
	{"code": "AE", "code3": "ARE", "name": "United Arab Emirates (the)", "number": "784"},
	{"code": "GB", "code3": "GBR", "name": "United Kingdom of Great Britain and Northern Ireland (the)", "number": "826"},
	{"code": "UM", "code3": "UMI", "name": "United States Minor Outlying Islands (the)", "number": "581"},
	{"code": "US", "code3": "USA", "name": "United States of America (the)", "number": "840"},
	{"code": "UY", "code3": "URY", "name": "Uruguay", "number": "858"},
	{"code": "UZ", "code3": "UZB", "name": "Uzbekistan", "number": "860"},
	{"code": "VU", "code3": "VUT", "name": "Vanuatu", "number": "548"},
	{"code": "VE", "code3": "VEN", "name": "Venezuela (Bolivarian Republic of)", "number": "862"},
	{"code": "VN", "code3": "VNM", "name": "Viet Nam", "number": "704"},
	{"code": "VG", "code3": "VGB", "name": "Virgin Islands (British)", "number": "092"},
	{"code": "VI", "code3": "VIR", "name": "Virgin Islands (U.S.)", "number": "850"},
	{"code": "WF", "code3": "WLF", "name": "Wallis and Futuna", "number": "876"},
	{"code": "EH", "code3": "ESH", "name": "Western Sahara", "number": "732"},
	{"code": "YE", "code3": "YEM", "name": "Yemen", "number": "887"},
	{"code": "ZM", "code3": "ZMB", "name": "Zambia", "number": "894"},
	{"code": "ZW", "code3": "ZWE", "name": "Zimbabwe", "number": "716"},
	{"code": "AX", "code3": "ALA", "name": "Åland Islands", "number": "248"}
];

let found = countryListAllIsoData.find(country => country.name === 'Morocco');
// let code = found ? found.code3 : 'n/a';
// console.log(found);

    </script>

@endsection
