@include('kitchenstaff.includes.header')

@include('kitchenstaff.includes.nav')
@include('kitchenstaff.includes.sidebar')
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
                                <table class="table table-bordered table-striped" id="example1" >
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
                                        @if($orders->count() > 0)
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->FullName}}</td>
                                                    <td>{{$order->Address}}</td>
                                                    <td>{{$order->order_id}}</td>
                                                    <td>{{$order->total}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->payment_method}}</td>
                                                </tr>
                                            @endforeach

                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">No Orders Found</td>
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
@include('kitchenstaff.includes.script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@include('kitchenstaff.includes.footer')
