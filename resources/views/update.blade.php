@extends('layouts.createupdate')

@section('content')
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">

      </div>
<!-- Navbar links -->
      <ul class="navbar-nav align-items-center">

      </ul>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
            </ol>
        </nav>
        <h2 class="h4">Edit Orders</h2>
        <p class="mb-0">Your web analytics dashboard template.</p>
    </div>
</div>
<hr>
<div class="justify-content-between  align-items-center">
<div class="card card-body border-0 shadow table-wrapper ">
<div class="card-header">{{ __('Edit Customer Details') }}</div>
  
<form class="form" id="customer" method="POST" action="" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row mb-3 mt-3">
      <label for="name" class="col-md-2 col-form-label text-md-e">{{ __('Customer Name:') }}</label>

        <div class="col-md-3">
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}" autofocus>
            <div id="nameError" class="text-danger"></div>
        </div>

      <label for="product_name" class="col-md-2 col-form-label text-md-e">{{ __('Product Name:') }}</label>

        <div class="col-md-3">
          <input id="product_name" type="text" class="form-control" name="product_name"  value="{{ old('product_name', $customer->product_name) }}" autofocus>
            <div id="product_nameError" class="text-danger"></div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
      <label for="mrp" class="col-md-2 col-form-label text-md-e">{{ __('MRP:') }}</label>
        <div class="col-md-3">
          <input id="mrp" type="number" class="form-control" name="mrp" value="{{ old('mrp', $customer->mrp) }}" autofocus>
            <div id="mrpError" class="text-danger"></div>
        </div>
                   
      <label for="sellprice" class="col-md-2 col-form-label text-md-e">{{ __('Sell Price:') }}</label>
        <div class="col-md-3">
          <input id="sellprice" type="number" class="form-control" name="sellprice"  value="{{ old('sellprice', $customer->sellprice) }}" autofocus>
            <div id="sellpriceError" class="text-danger"></div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
      <label for="expiry" class="col-md-2 col-form-label text-md-e">{{ __('Expiry:') }}</label>
        <div class="col-md-3">
          <input id="expiry" type="date" class="form-control" name="expiry" value="{{ old('expiry', $customer->expiry) }}" autofocus>
            <div id="expiryError" class="text-danger"></div>
        </div> 
        
      <label for="shopkeeper" class="col-md-2 col-form-label text-md-e">{{ __('Shopkeeper :') }}</label>
        <div class="col-md-3">
          <select multiple class="form-control" id="shopkeeper" name="shopkeeper[]" autofocus>
            @foreach ($shopkeepers as $shopkeeper)
              <option value="{{ $shopkeeper->id }}" 
                {{ $customer->shopkeepers && in_array($shopkeeper->id, $customer->shopkeepers->pluck('id')->toArray()) ? 'selected' : '' }}>
                  {{ $shopkeeper->name }}
              </option>
            @endforeach  
          </select>
          <div id="shopkeeperError" class="text-danger"></div>
        </div>
    </div>

    <div class="row mb-3 mt-3">
      <label for="country" class="col-md-2 col-form-label text-md-e">{{ __('Country :') }}</label>
        <div class="col-md-3">
          <select class="form-control" id="country" name="country" autofocus>
            @foreach ($countrys as $country)
              <option value="{{ $country->id }}" {{ $customer->country == $country->id ? 'selected' : '' }}>
                {{ $country->country }}
              </option>
            @endforeach  
          </select>
          <div id="countryError" class="text-danger"></div>
        </div>

      <label for="state" class="col-md-2 col-form-label text-md-e">{{ __('State :') }}</label>
        <div class="col-md-3">
          <select class="form-control" id="state" name="state" autofocus>
            @foreach ($states as $state)
              <option value="{{ $state->id }}" {{ $customer->state == $state->id ? 'selected' : '' }}>
                {{ $state->state }}
              </option>
            @endforeach                                
          </select>
          <div id="stateError" class="text-danger"></div>
        </div>
    </div>
          
    <div class="row mb-3 mt-3">
      <label for="city" class="col-md-2 col-form-label text-md-e">{{ __('City :') }}</label>
        <div class="col-md-3">
          <select class="form-control" id="city" name="city" autofocus>
            @foreach ($citys as $city)
              <option value="{{ $city->id }}" {{ $customer->city == $city->id ? 'selected' : '' }}>
                {{ $city->city }}
              </option>
            @endforeach                                
          </select>
          <div id="cityError" class="text-danger"></div>
        </div>

      <label for="address" class="col-md-2 col-form-label text-md-e">{{ __('Address:') }}</label>
        <div class="col-md-3">
          <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $customer->address) }}" autofocus>
            <div id="addressError" class="text-danger"></div>
        </div>
    </div>
    <div class="row mb-3 mt-3">
      <label for="email" class="col-md-2 col-form-label text-md-e">{{ __('Email :') }}</label>
        <div class="col-md-3">
          <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $customer->email) }}" autofocus>
          <div id="emailError" class="text-danger"></div>
        </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 offset-md-4">
          <button type="submit" class="btn btn-primary">Update</button>
        <a type="button" href="{{ url('customer') }}" class="btn btn-primary ms-auto">Back</a>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  var customer="{{ route('customer.store')}}"
  $(document).ready(function () {
    $('#customer').submit(function (e) {
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        type: 'POST',
        url: "{{ route('customer.update', ['customer' => $customer->id]) }}",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(response);
          window.location.href = customer
        },
        error: function (xhr, status, error) {  
          console.error(xhr.responseText);
          alert('Error: ' + error);
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function () {
    $('#country').on('change', function () {
      var country = $(this).val();
      $("#state").html('<option value="">-- Select State --</option>');

      var url = "{{ route('customer.getStates', '') }}";
      $.ajax({
        url: url + '/' + country,
        type: "POST", 
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (result) {
          $.each(result, function (key, value) {
            $("#state").append('<option value="' + key + '">' + value + '</option>');
          });
        },
        error: function (xhr, status, error) {
          console.error('Error fetching states:', error);
        }
      });
    });

    $('#state').on('change', function () {
      var state = $(this).val();
      $("#city").html('<option value="">-- Select City --</option>');

      var url = "{{ route('customer.getCities', '') }}";
      $.ajax({
        url: url + '/' + state,
        type: "POST", 
        dataType: 'json',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (res) {
          $.each(res, function (key, value) {
            $("#city").append('<option value="' + key + '">' + value + '</option>');
          });
        },
        error: function (xhr, status, error) {
          console.error('Error fetching cities:', error);
        }
      });
    });

  });
</script>
<script>
  $("#imgInput").change(function() {
    if (this.files && this.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
}); 

$(document).on('click', '.btn-view-products', function() {
            var products = JSON.parse($(this).data('products'));
            var modalBody = $('#productModal .modal-body');
            modalBody.empty();

            products.forEach(function(product) {
                modalBody.append('<img src="{{ asset('storage/product') }}/' + product + '" class="img-thumbnail m-2" style="width: 80px; height: 40px;">');
            });
        });
</script>

<script>
    $(document).ready(function() {
        $('#shopkeeper').select2();
    });
</script>
@endsection
