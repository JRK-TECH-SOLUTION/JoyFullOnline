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
                <div class="card card-primary card-outline" >
                    <div class="card-header">
                        <h5 class="m-0">My Orders

                        </h5>

                    </div>
                    <div class="card-body table-responsive" style=" overflow-x: auto;white-space: nowrap;">
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
                                <td>{{$c->productname }}</td>
                                <td class="text-center"><img src="{{asset('uploads'.$c->productimage)}}" class="img-thumbnail" width="150"></td>
                                <td>{{'₱' . number_format($c->productprice) }}</td>
                                <td>{{$c->quantity}}</td>
                                <td>{{('₱' . number_format($c->productprice * $c->quantity) )}}</td>

                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm"data-toggle="modal" data-target="#UpdateQuantity{{$c->cartid }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                  <a href="{{url('editcartItem/'.$c->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <!-- Modal -->
                                    <div class="modal fade" id="UpdateQuantity{{$c->cartid }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Quantity</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="editquantity" method="post">
                                                @csrf
                                                <input type="hidden" name="cartid" value="{{$c->cartid}}">

                                                <div class="form-group row">
                                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                                    <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$c->quantity}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button></form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <!-- Modal -->
                              @endforeach
                              <tfoot>
                                <tr>
                                  <td colspan="4" class="text-right">Grand Total</td>
                                  <td>{{'₱' . number_format($grandtotal) }}</td>
                                  <td class="text-center">
                                    <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proced">Checkout</button>
                                  </td>
                                </tr>
                              </tfoot>
                            @endif

                          </tbody>
                      </table>
                        <!-- Modal -->
                        <div class="modal fade" id="proced" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Proceed To Checkout</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="checkout" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="total" value="{{$grandtotal}}">

                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-2 col-form-label">Payments</label>
                                        <div class="col-sm-10">
                                        <select name="paymenttype" id="" class="form-control" required>
                                            <option value="COD">Cash on Delivery</option>
                                            <option value="GCASH">GCash</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-3 col-form-label">Delivery Date</label>
                                        <div class="col-sm-9">
                                        <input type="date" class="form-control" name="deliverydate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-3 col-form-label">Delivery Address</label>
                                        <div class="col-sm-9">
                                        <input type="Text" class="form-control" name="deliveryaddress" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Proceed To CheckOut</button></form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('users.includes.script')
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
@include('users.includes.footer')
