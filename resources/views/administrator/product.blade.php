@include('administrator.includes.header')
@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Information</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Product Information
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus" aria-hidden="true"></i>  Add Product</button>
                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if (count($products) > 0)
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->productname }}</td>
                                                    <td>{{ $product->productdescription }}</td>
                                                    <td>{{ $product->productprice }}</td>
                                                    <td>{{ $product->productquantity }}</td>
                                                    <td><img src="{{asset('uploads'.$product->productimage)}}" style="height:50px;width:50px;" alt=""></td>
                                                    <td>{{ $product->productcategory }}</td>
                                                    <td>{{ $product->productstatus }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProduct" data-id="{{ $product->id }}" data-product_name="{{ $product->product_name }}" data-product_description="{{ $product->product_description }}" data-product_price="{{ $product->product_price }}" data-product_quantity="{{ $product->product_quantity }}" data-product_image="{{ $product->product_image }}" data-category_id="{{ $product->category_id }}" data-product_status="{{ $product->product_status }}">Edit</button>
                                                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(this)" data-id="{{ $product->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">No Product Available</td>
                                            </tr>
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('administrator.modal')
@include('administrator.includes.script')
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        @if(session('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Successfully Added',
            body: 'System User has been added successfully'
        });
        @endif
        @if(session('error'))
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Error',
                body: '{{ session('error') }}'
            });
        @endif


    });
    </script>
    <script>

        function deleteProduct(e){
            var userId = $(e).data('id');
            //swal confirm
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/deleteProduct/'+userId,
                        type: 'GET',
                        success: function(response){
                            @if(session('success'))
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Successfully Deleted',
                                    body: 'System User has been deleted successfully'
                                });
                                setTimeout(function(){
                                    location.reload();
                                }, 2000);

                            @endif
                            @if(session('error'))
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Error',
                                    body: '{{ session('error') }}'
                                });
                            @endif
                        }
                    });
                }
            });
        }



    </script>
@include('administrator.includes.footer')
