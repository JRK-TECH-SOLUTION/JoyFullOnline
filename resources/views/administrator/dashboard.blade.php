@include('administrator.includes.header')

@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
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
                <div class="col-lg-3 col-6">
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
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{'₱ '.number_format($totalSales)}}</h3>

                    <p>Daily Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{'₱ '.number_format($totalSalesMonth)}}</h3>

                    <p>Monthly Sales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$totalCustomer}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    
                    </div>
                </div>
            </div>

        <div class="row mt-5">
            <div class="col-md-12 col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Stocks Information</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover  table-stripped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Stocks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->productname}}</td>
                                    <td>{{$product->productquantity}}</td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
            </div>
            

      </div>
    </section>
</div>
@include('administrator.includes.script')
@include('administrator.includes.footer')
