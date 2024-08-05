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
  
<form class="form" id="product" method="POST" action="" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row mb-3 mt-3">
        <label id="imgInput" for="product" class="col-md-2 col-form-label text-md-e">{{ __('Product Image:') }}
          <img class="ms-3 border-" src="{{asset('/storage/product/' . $product->product)}}" alt="product" width="80px" height="40px"> 
        </label>
      <div class="col-md-3">
        <input  type="file" class="form-control" name="product" value="{{ old('product', $product->product) }}" autofocus>
      </div>

    <label for="name" class="col-md-2 col-form-label text-md-e">{{ __('Customer Name:') }}</label>
      <div class="col-md-3">
        <select class="form-control" id="customer_id" name="customer_id" autofocus>
          @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" {{ $product->customer_id == $customer->id ? 'selected' : '' }}>
              {{ $customer->name }}
            </option>
          @endforeach  
        </select>
        <div id="customerError" class="text-danger"></div>
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-md-12 offset-md-4">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{url('customer')}}" class="btn btn-primary ms-auto">Back</a>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
    var product="{{url('customer/')}}"
  $(document).ready(function () {
    $('#product').submit(function (e) {
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
    type: 'POST', // Change this to PUT
    url: "{{ route('product.update', ['product' => $product->id]) }}",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        console.log(response);
        window.location.href = product

        // Handle success response as needed
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
    $(document).ready(function() {
        $('#shopkeeper').select2();
    });
</script>
@endsection
