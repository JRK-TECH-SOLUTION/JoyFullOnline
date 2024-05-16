@include('administrator.includes.header')

@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
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
                        <h5 class="m-0">Customer Orders

                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Order ID</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Type</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->FullName}}</td>
                                                    <td>{{$order->Address}}</td>
                                                    <td>{{$order->OrderID}}</td>
                                                    <td>{{$order->Total}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->PaymentMethod}}</td>
                                                    <td>{{$order->created_at->format('M d, Y')}}</td>
                                                </tr>
                                            @endforeach


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
@include('administrator.includes.script')
@include('administrator.includes.footer')
