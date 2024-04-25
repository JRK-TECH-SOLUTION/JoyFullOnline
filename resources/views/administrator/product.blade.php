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
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Product Image</th>
                                            <th>Product Category</th>
                                            <th>Product Status</th>
                                            <th>Product Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if (count($products) > 0)
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_description }}</td>
                                                    <td>{{ $product->product_price }}</td>
                                                    <td>{{ $product->product_quantity }}</td>
                                                    <td><img src="{{ asset('storage/product_images/'.$product->product_image) }}" alt="{{ $product->product_name }}" class="img-thumbnail" width="100"></td>
                                                    <td>{{ $product->category->category_name }}</td>
                                                    <td>{{ $product->product_status }}</td>
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
@include('administrator.includes.footer')
