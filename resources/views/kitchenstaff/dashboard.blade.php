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
                    <h3>{{'₱' . number_format($totalSales)}}</h3>
    
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
                    <h3>{{'₱' . number_format($totalSalesMonth)}}</h3>
    
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
                  <h3 class="card-title">Latest Orders

                  </h3>
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
                              <td>{{$order->OrderID}}</td>
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
                                <button class="btn btn-primary btn-sm"  onclick="vieworder(this)" data-id="{{$order->IDorder }}" data-orderid="{{$order->OrderID}}" data-total="{{$order->Total}}" data-status="{{$order->status}}">View</button>
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
                <h3 class="card-title">Product Information
                  
                </h3>
                <div class="" id="displaybutton">
                  
                </div>
              </div>
              <div class="card-body " id="displaydata">
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
<div class="modal fade" id="UpdateUser">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Order</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="UpdateOrderK" method="post" autocomplete="OFF">
          @csrf
          <input type="hidden" id="orderid" name="orderid">
          <input type="hidden" id="ordersid" name="ordersid">
          <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Processing">Processing</option>
                    <option value="Ready to Deliver">Ready to Deliver</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </div>
            <div class="form-group">
              <label for="" class="form-label">Rider</label>
              <select name="rider" id="rider" class="form-control">
                <option value="">Select Rider</option>
                @foreach($rider as $r)
                <option value="{{$r->id}}">{{$r->FullName}}</option>
                @endforeach
              </select>
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
@include('kitchenstaff.includes.script')
<script>
  function vieworder(e){
    var id = $(e).data('id');
    var orderid = $(e).data('orderid');
    var total = $(e).data('total');
    var status = $(e).data('status');
    $('#orderid').val(id);
    $('#ordersid').val(orderid);
    $.ajax({
        url: "/vieworder/" + id,
        type: "GET",
        success: function(data){

        $('#displaydata').html('');
        $('#displaybutton').html('');
        $('#displaybutton').append(`
              <button class="btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#UpdateUser">Update Status</button>
        `);
          $('#displaydata').append(`
                
                  <h5 class="text-muted">Order ID: ${orderid}</h5>
                  <h5 class="text-muted">Total:₱${total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} </h5>
                  <h5 class="text-muted">Status: ${status}</h5>
                  <hr>
                
            `);
            //display the product information
            data.forEach(element => {
              $('#displaydata').append(`
                  <li class="list-group-item">
                    <li class="list-group-item">
                        <b>${element.productname}</b>
                        <span class="float-right">${element.quantity} x ${element.productprice}</span>
                    </li>
                  </li>
              `)
        });
      }
    });
  }
</script>
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

@include('kitchenstaff.includes.footer')

