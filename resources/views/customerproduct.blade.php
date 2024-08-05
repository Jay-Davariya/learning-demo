@extends('layouts.customerproduct')

@section('content')
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">

      </div>
      <!-- Navbar links -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->

      </div>
      </li>
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
          <a href="#">
            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
              </path>
            </svg>
          </a>
        </li>

        <li class="breadcrumb-item"><a href="#">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customer Product Details</li>
      </ol>
    </nav>
    <h2 class="h4">Customer Product Images</h2>
    <p class="mb-0">Your web analytics shop .</p>
  </div>
  <div class="btn-toolbar mb-2 mb-md-0">
    <a href="{{route('customer.create')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
      <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      ADD CUSTOMER
    </a>
  </div>
</div>
<div class="table-settings mb-4">
  <div class="row align-items-center justify-content-between">
    <div class="col col-md-6 col-lg-3 col-xl-4">
      <div class="input-group me-2 me-lg-3 fmxw-400">

      </div>
    </div>
  </div>
  <hr>
  <div class="card card-body">
    <table class="table table-bordered product-table">
      <thead>
        <tr>
          <th class="border-gray-200">ID</th>
          <th class="border-gray-200">Customer Name</th>
          <th class="border-gray-200">Product</th>
          <th width="100px">Action</th>
        </tr>
      </thead>
        <tbody>
        </tbody>
    </table>
  </div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Are you sure you want to delete this item?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form id="delete-form" action="#" method="POST">
                @csrf
                @method('DELETE')
                <button href="{{route('customer.store')}} type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
      </div>
  </div>
</div>

  <div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
    <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
      <span class="fw-bold d-inline-flex align-items-center h6">
        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
            clip-rule="evenodd"></path>
        </svg>
        Settings
      </span>
    </div>
  </div>

<footer class="bg-white bottom-fixed rounded shadow p-5 mb-4 mt-4">
  <div class="row">
    <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
      <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a
          class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
    </div>
    <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
       <!-- List -->
      <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
          
      <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/about">About</a>
        </li>
          
      <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/themes">Themes</a>
        </li>
        
      <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/blog">Blog</a>
        </li>
        
      <li class="list-inline-item px-0 px-sm-2">
        <a href="https://themesberg.com/contact">Contact</a>
        </li>
        
      </ul>
    </div>
  </div>
</footer>
<script>
    $(document).ready(function () {
        var table = $('.product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getproduct', ['id'=>$id]) }}", // Corrected route usage
            columns: [
                { data: 'id', name: 'id' },
                { data: 'customer_id', name: 'customer_id', orderable: false, searchable: false },
                { 
                    data: 'product', 
                    name: 'product',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<img src="/storage/product/' + data + '" width="50px" height="50px" >';
                    }
                },
                { 
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        var editUrl = "{{ route('product.edit', ':id') }}";
                        editUrl = editUrl.replace(':id', full.id);
                        var editButton = '<a href="' + editUrl + '" class="edit m-3" title="Edit" data-toggle="tooltip" data-placement="top">' +
                            '<i class="bi bi-pencil-square"></i>' +
                            '</a>';
                        var deleteUrl = "{{ route('product.destroy', ':id') }}";
                        deleteUrl = deleteUrl.replace(':id', full.id);
                        var deleteButton = '<a href="#" class="btn btn-sm btn-square btn-neutral text-danger-hover modal-popup-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="' + deleteUrl + '"><i class="bi bi-trash3-fill"></i></a>';
                        return editButton + ' ' + deleteButton;
                    }
                }
            ]
        });

        $(document).on('click', '.modal-popup-delete', function (e) {
            e.preventDefault();
            var deleteUrl = $(this).data('url');
            $('#exampleModal').modal('show');
            $('#delete-form').attr('action', deleteUrl);
        });

        // Optional: Handle form submission (if needed for AJAX or additional processing)
        $('#delete-form').on('submit', function () {
            // You can handle form submission here if needed
        });
    });
</script>
@endsection