@include('users.includes.header')

@include('users.includes.nav')
@include('users.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer  Order</li>
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
                        <h5 class="m-0">My Orders

                        </h5>

                    </div>
                    <div class="card-body">
                      <table class="table table-hover table-stripped table-bordered">
                          <thead>
                            <tr>
                              <th>Item</th>
                              <th>Image</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!--- if cart is empty -->
                            @if($corderbycustomer->count() == 0)
                              <tr>
                                <td colspan="6" class="text-center">Cart is Empty</td>
                              </tr>
                            @else
                              @foreach($corderbycustomer as $c)
                              <tr>
                                <td>{{$c->productname}}</td>
                                <td class="text-center"><img src="{{asset('uploads'.$c->productimage)}}" class="img-thumbnail" width="150"></td>
                                <td>{{$c->productprice}}</td>
                                <td>{{$c->quantity}}</td>
                                <td>{{$c->total}}</td>
                                <td class="text-center">
                                  <a href="{{url('editcartItem/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                  
                                  <a href="{{url('editcartItem/'.$c->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                  <a href="{{url('editcartItem/'.$c->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                              @endforeach
                            @endif

                          </tbody>
                       
                      </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('users.includes.script')
@include('users.includes.footer')
