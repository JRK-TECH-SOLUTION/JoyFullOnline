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

                                                    <td>{{ $product->productprice }}</td>
                                                    <td>{{ $product->productquantity }}</td>
                                                    <td><img src="{{asset('uploads'.$product->productimage)}}" style="height:50px;width:50px;" alt=""></td>
                                                    <td>{{ $product->productcategory }}</td>
                                                    <td>{{ $product->productstatus }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditProduct{{ $product->id }}">Edit</button>
                                                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(this)" data-id="{{ $product->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="EditProduct{{ $product->id }}">
                                                    <div class="modal-dialog modal-lg">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">Add Product</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <form action="editproduct" method="post" autocomplete="OFF" enctype="multipart/form-data">
                                                            @csrf

                                                                <input type="hidden" name="productid" value="{{ $product->id }}">
                                                               

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Price</label>
                                                                    <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="inputEmail3" name="productprice" value="{{ $product->productprice }}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Status</label>
                                                                    <div class="col-sm-9">
                                                                    <select class="form-control" name="productstatus">
                                                                        <option value="Available">Available</option>
                                                                        <option value="Not Available">Not Available</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Product Quantity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="inputEmail3" name="productquantity" value="{{ $product->productquantity }}">
                                                                    </div>
                                                                </div>



                                                        </div>
                                                        <div class="modal-footer">

                                                          <button type="submit" class="btn btn-primary float-right">Save Changes</button></form>
                                                        </div>
                                                      </div>
                                                      <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                            </div>
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
            body: '{{ session('success') }}'
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
