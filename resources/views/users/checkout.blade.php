@include('users.includes.header')
@include('users.includes.nav')
@include('users.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Review</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Payment</h3>
                    </div>
                    <div class="card-body">
                        <form action="finalcheck" method="post">
                            @csrf
                            <input type="hidden" name="userid" value="{{$userid}}">
                            <div class="form-group">
                                <label for="payment" class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" id=""  value="{{'₱' . number_format($grandtotals)}}" readonly>

                            </div>
                            <div class="form-group">
                                <label for="payment" class="form-label">Payment Method</label>
                                <input type="text" class="form-control" name="payment" value="{{$payment}}" id="payment" readonly>
                            </div>
                            <div class="form-group">
                                <label for="payment" class="form-label">Delivery Fee</label>
                                <input type="text" class="form-control" name="deliveryfee" value="₱ 50.00" id="payment" readonly>
                            </div>
                            <div class="form-group">
                                <label for="payment" class="form-label">Delivery Date</label>
                                <input type="text" class="form-control" name="deliverydate" value="{{ date('F d, Y', strtotime($deliverydate)) }}" id="deliverydate" readonly>
                            </div>
                            <div class="form-group">
                                <label for="payment" class="form-label">Total</label>
                                <input type="text" class="form-control" name="total" value="{{'₱' . number_format($grandtotals + 50)}}" id="deliverytime" readonly>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$deliveryAddress}}" id="address" readonly>
                                
                            </div>
                            <div class="form-group">
                                <button class="btn-sm btn-warning">Place Order</button>
                                <a type="button" href="corderbycustomer" class="btn-sm btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Order Review</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-stripped table-bordered">
                            <thead>
                              <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($corderbycustomer as $c)
                                    <tr>
                                        <td>{{$c->productname }}</td>
                                        <td>{{'₱' . number_format($c->productprice) }}</td>
                                        <td>{{$c->quantity}}</td>
                                        <td>{{('₱' . number_format($c->productprice * $c->quantity) )}}</td>
                                    </tr>
                                @endforeach
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
