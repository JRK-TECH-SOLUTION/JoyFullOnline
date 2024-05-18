@include('users.includes.header')

@include('users.includes.nav')
@include('users.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            @foreach ($products as $products)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 food-item">
                <form method="post" action="addtocartItem">
                  @csrf
                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                    <input type="hidden" name="item_id" value="{{$products->id}}">
                    <input type="hidden" name="item_price" value="{{$products->productprice}}">
                    <div class="card rounded-0" align="center";>
                        <div class="food-img-holder position-relative overflow-hidden">
                        <img src="{{asset('uploads'.$products->productimage)}}" class="img-top img-thumbnail">
                        </div>
                        <div class="card-body">
                            <div class="lh-1">
                                <div class="card-title fw-bold h5 mb-0"><h4 class="float-center">{{$products->productname}}</h4></div>
                               <br>
                                <div><small class="card-description text-success h5">₱ {{$products->productprice}}</small></div>
                                <div class="d-grid">

                                @if ($products->productquantity == 0)
                                <div class="badge bg-danger">Out of Stock</div><br>
                                @else
                                <div class="input-group input-sm">
                                    <span class="input-group-text rounded-0">Quantity</span>
                                    <input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
                                </div>
                                <input type="submit" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
                                @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            @endforeach
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
