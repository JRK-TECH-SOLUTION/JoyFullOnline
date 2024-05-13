@include('users.includes.header')
@include('users.includes.nav')
@include('users.includes.sidebar')
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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-sm-12 col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">My Orders</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myorder as $order)
                                <tr>
                                    <td>{{ $order->OrderID }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" onclick="viewdata(this)" data-id="{{ $order->id }}" data-orderid="{{ $order->OrderID }}" data-total="{{ $order->Total }}" data-status="{{ $order->status }}" data-payment="{{ $order->PaymentMethod }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Order Details</h5>
                    </div>
                    <div class="card-body" id="displaydata">

                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('users.includes.script')
<script>
function viewdata(e) {
    var id = $(e).data('id');
    var orderid = $(e).data('orderid');
    var total = $(e).data('total');
    var status = $(e).data('status');
    var payment = $(e).data('payment');
    $.ajax({
        url: "/myorderdetails/" + id,
        type: "GET",
        success: function(data){
            $('#displaydata').html('');

            // Display Order ID and Total once
            $('#displaydata').append(`
                <div class="card-body">
                    <h3 class="profile-username text-center">Order ID: ${orderid}</h3>
                    <p class="text-muted text-start text-danger">Total: ${total}</p>
                    <p class="text-muted text-left">Order Status: ${status}</p>
                    <p class="text-muted text-end">Payment Method: ${payment}</p>
                    <ul class="list-group list-group-unbordered mb-3" id="productList">
                    </ul>
                </div>
            `);

            // Loop through each product and append to the list
            data.forEach(function(orderItem) {
                $('#productList').append(`
                    <li class="list-group-item">
                        <b>${orderItem.productname}</b>
                        <span class="float-right">${orderItem.quantity} x ${orderItem.productprice}</span>
                    </li>
                `);
            });
        }
    });
}


</script>
@include('users.includes.footer')
