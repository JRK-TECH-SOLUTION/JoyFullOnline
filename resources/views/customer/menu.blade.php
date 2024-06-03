@include('customer.includes.header')
@include('customer.includes.nav')
<section class="packages" id="packages">

    <h1 class="heading"> our <span>Foods</span> </h1>

    <div class="box-container">
        
       <!--if item count is 0-->
    @if(count($item) == 0)
    
        <h1 class="text-center">No items found</h1>
   
         
    @else
        @foreach($item as $items)
        <div class="box" data-aos="fade-up">
            <div class="image">
                <img src="{{asset('uploads/'.$items->productimage)}}" alt="">
                <h3> <i class="fas fa-utensils"></i> {{$items->productname}} </h3>
            </div>
            <div class="content">
                <div class="price"> &#8369; {{ number_format($items->productprice) }} </div>
                <a type="button" onclick="addToCart(this)" data-id="{{$items->id}}" class="btn">Add To Cart</a>
            </div>
        </div>
        @endforeach
    @endif

       

       

        

    </div>

</section>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    function addToCart(e) {
        var id = $(e).data('id');

        Swal.fire({
            title: 'Enter Quantity',
            input: 'number',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Add to Cart',
            showLoaderOnConfirm: true,
            preConfirm: (quantity) => {
                //pass the data to the controller
                return fetch(`/add-to-cart/id=${id}/quantity=${quantity}`)
                   
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `Added to Cart`,
                    html: `Quantity: ${result.value}`
                })
            }
        })
    }
</script>



<!-- blog section ends -->

@include('customer.includes.footer')