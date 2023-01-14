
   <base href="/public">
   <style>
   .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
   </style>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

         @if (session('message'))
                      <div  class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                          {{ session('message') }}
                      </div>
                  @endif

         <section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Cart - {{$cart->count()}} items
            <a href="/" style="float: right;" class="btn btn-success">Back Shopping</a>
            </h5>
            
          </div>
          
          <div class="card-body">
            <!-- Single item -->

            <?php $total_price = 0; ?>
            
            @foreach($cart as $carts)
            <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="{{url('/product_images/'.$carts->image)}}"
                    class="w-100" alt="Blue Jeans Jacket" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div>
                <!-- Image -->
              </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p><strong>{{$carts->product_name}}</strong></p>
                <p>Color: blue</p>
                <p>Size: M</p>
                

                <a href="{{url('remove_cart',$carts->id)}}" onclick="confirmation(event)" class="btn btn-danger">Remove</a>
                
                <!-- Data -->
              </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                  
                  <div class="form-outline">
                    <label class="form-label" for="form1">Quantity</label>
                    <p>{{$carts->quantity}}</p>
                  </div>

                  <div class="form-outline" style="margin-left: 25px;">
                    <label class="form-label" for="form1">Price</label>
                    <p class="text-start text-md-center">
                  <strong>{{$carts->price}}</strong>
                </p>
                  </div>


                </div>
                <!-- Quantity -->

                <!-- Price -->
               
                <!-- Price -->
              </div>
            </div><br><hr>
            <!-- Single item -->

            <?php $total_price +=   $carts->price * $carts->quantity; ?>

            @endforeach

            <hr class="my-4" />

            
          </div>
        </div>
        
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>{{$total_price}}</strong></span>
              </li>
            </ul>

           

            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe',$total_price)}}" class="btn btn-primary">Pay Using Card</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
         
      </div>
      
      <!-- footer start -->
            @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>
   </body>
</html>


<script>
  function confirmation(ev)
  {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
      title: "Are you sure to cancel this product",
      text: "You will not be able to revert this !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willCancel) => {
      if(willCancel) {

        window.location.href = urlToRedirect;
      }
    }
    );
  }
</script>