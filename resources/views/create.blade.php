@extends('layouts.createupdate')

@section('content')
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{route('customer.store')}}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Register</li>
            </ol>
        </nav>
       <h2 class="h4">Create Customers</h2>
     <p class="mb-0">Your web analytics Shop.</p>
</div>
</div>
<div class="justify-content-between  align-items-center">
    <div class="card card-body border-0 shadow table-wrapper ">
        <div class="card-header">{{ __('Customer Register') }}</div>
            <form id="customer" action="/upload" enctype="multipart/form-data">
                @CSRF
            <div class="row mb-3 mt-3">
                <label for="product" class="col-md-2 col-form-label text-md-e">{{ __('Product Image:') }}<span class='text-danger'>*</span></label>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="product[]" multiple>
                    </div>

                <label for="name" class="col-md-2 col-form-label text-md-e">{{ __('Customer Name:') }}<span class='text-danger'>*</span></label>
                    <div class="col-md-3">
                        <input id="name" type="text" class="form-control" name="name" autofocus>
                    <div id="nameError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label for="product_name" class="col-md-2 col-form-label text-md-e">{{ __('Product Name:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="product_name" type="text" class="form-control" name="product_name" autofocus>
                    <div id="product_nameError" class="text-danger"></div>
                </div>

                <label for="mrp" class="col-md-2 col-form-label text-md-e">{{ __('MRP:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="mrp" type="number" class="form-control" name="mrp" autofocus>
                    <div id="mrpError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label for="sellprice" class="col-md-2 col-form-label text-md-e">{{ __('Sell Price:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="sellprice" type="number" class="form-control" name="sellprice" autofocus>
                    <div id="sellpriceError" class="text-danger"></div>
                </div>

                <label for="expiry" class="col-md-2 col-form-label text-md-e">{{ __('Expiry:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="expiry" type="date" class="form-control" name="expiry" autofocus>
                    <div id="expiryError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label for="shopkeeper" class="col-md-2 col-form-label text-md-e">{{ __('Shopkeeper:') }}<span class='text-danger'>*</span></label>
            <div class="col-md-3">
                <select class="form-control" id="shopkeeper" name="shopkeeper[]" multiple>
                        @foreach ($shopkeepers as $key => $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                </select>
                <div id="shopkeeperError" class="text-danger"></div>
            </div>



                <label for="country" class="col-md-2 col-form-label text-md-e">{{ __('Country :') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="country" name="country" autofocus>
                        <option value="">-- Select Country --</option>
                        @foreach ($countrys as $id => $country)
                            <option value="{{ $country }}">{{ $id }}</option>
                        @endforeach
                    </select>
                    <div id="countryError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label for="state" class="col-md-2 col-form-label text-md-e">{{ __('State:') }}<span class='text-danger'>*</span></label>

                <div class="col-md-3">
                    <select class="form-control" id="state" name="state" autofocus>
                        <option value="">-- Select State --</option>
                    </select>
                    <div id="stateError" class="text-danger"></div>
                </div>

                <label for="city" class="col-md-2 col-form-label text-md-e">{{ __('City:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                    <select class="form-control" id="city" name="city" autofocus>
                        <option value="">-- Select City --</option>
                    </select>
                    <div id="cityError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <label for="address" class="col-md-2 col-form-label text-md-e">{{ __('Address:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="address" type="text" class="form-control" name="address" autofocus>
                    <div id="addressError" class="text-danger"></div>
                </div>
                <label for="email" class="col-md-2 col-form-label text-md-e">{{ __('Email:') }}<span class='text-danger'>*</span></label>
                <div class="col-md-3">
                        <input id="email" type="email" class="form-control" name="email" autofocus>
                    <div id="emailError" class="text-danger"></div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-12 offset-md-4">
                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                <a type="button" href="{{ url('customer') }}" class="btn btn-primary ms-auto">Back</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var customer = "{{ route('customer.store')}}"
    $(document).ready(function () {
        $('#customer').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('customer.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (customer) {
                        window.location.href = customer;
                    } else {
                        console.error('Redirect URL not found in response');
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            console.log(key);
                             $("#" + key + "Error").html(value[0]);
                        });
                    } else {
                        console.error(xhr.responseText);
                        alert('Error: ' + error);
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#country').on('change', function () {
            var country = this.value;
            $("#state").html('<option value="">-- Select State --</option>');

            var url = "{{ route('customer.getStates', '') }}";
            $.ajax({
                url: url + '/' + country,
                type: "POST",
                dataType: 'json',
                data: {
                    country: country,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $.each(result, function (key, value) {
                        $("#state").append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

    $('#state').on('change', function () {
        var state = this.value;
        $("#city").html('<option value="">-- Select City --</option>');

        var url = "{{ route('customer.getCities', '') }}";
        $.ajax({
            url: url + '/' + state,
            type: "POST",
            dataType: 'json',
            data: {
                state: state,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    $.each(res, function (key, value) {
                        $("#city").append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#shopkeeper').select2();
    });
</script>

@endsection