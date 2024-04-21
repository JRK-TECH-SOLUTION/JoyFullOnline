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
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>4600</h3>

                    <p>Daily Sales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        <div class="row mt-5">
            <div class="col-md-6 col-lg-6">
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
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Sales Reports</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>
        </div>

      </div>
    </section>
</div>
@include('administrator.includes.script')
@include('administrator.includes.footer')
