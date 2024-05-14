@include('kitchenstaff.includes.header')
@include('kitchenstaff.includes.nav')
@include('kitchenstaff.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{$total}}</h3>
    
                    <p>New Orders</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                  </div>
                 
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$totalSales}}</h3>
    
                    <p>Daily Sales</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{$totalSalesMonth}}</h3>
    
                    <p>Monthly Sales</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                 
                </div>
              </div>
          </div>
          <div class="row">
           <div class="col-lg-8 col-sm-12 col-md-12">
              <div class="card card-primary">
                <div class="card-header ">
                  <h3 class="card-title">Latest Orders</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                          <tr>
                            <th>Order ID</th>
                            
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Date Order</th>
                            <th>Delivery Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                            <tr>
                              <td>{{$order->id}}</td>
                              <td>{{$order->FullName}}</td>
                              <td>
                                @if ($order->status == 'Pending')
                                  <span class="badge badge-warning">{{$order->status}}</span>
                                @elseif ($order->status == 'Delivered')
                                  <span class="badge badge-success">{{$order->status}}</span>
                                @else
                                  <span class="badge badge-danger">{{$order->status}}</span>
                                  
                                @endif
                              
                              </td>
                              <td>{{$order->created_at->format('M d, Y')}}</td>
                              <td>{{$order->DeliveryDate}}</td>
                              <td>
                                <a href="" class="btn btn-primary btn-sm">View</a>
                              </td>
                            </tr>
                            @endforeach
                          @else
                            <tr>
                              <td colspan="6" class="text-center">No Orders Found</td>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
           </div>
           <div class="col-lg-4 col-sm-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
              </div>
              <div class="card-body">
                <h5 class="text-muted">Order ID: </h5>
                <h5 class="text-muted">Total: </h5>
                <h5 class="text-muted">Status: </h5>
                <hr>
                
              </div>
            </div>
         </div>
          </div>
      </div>
    </section>
</div>
@include('kitchenstaff.includes.script')
@include('kitchenstaff.includes.footer')

