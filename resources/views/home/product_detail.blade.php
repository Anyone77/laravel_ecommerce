
   <base href="/public">
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px;">
                  <div class="box">
                     <div class="option_container">

                     </div>
                     <div class="img-box">
                        <img src="{{url('/product_images/'.$product->image)}}" alt="">
                     </div><br><hr>
                     <div class="detail-box">
                        <h5>
                        {{$product->name}}
                        </h5><br><br>

                        @if($product->discount_price != null )
                        <h6 style="color: red;">
                           Discount Price :
                           {{$product->discount_price}}
                        </h6>
                        <h6  style="text-decoration: line-through; color:blue;" >
                           Price :
                           {{$product->price}}
                        </h6>

                        @else
                        <h6  style=" color:blue;" >
                           Price :
                           {{$product->price}}
                        </h6>

                        @endif

                        <h6 >
                           Avaliable Product :
                           {{$product->quantity}}
                        </h6>

                        <h6>
                           Description : 
                           
                           {{$product->description}}
                           
                        </h6>
                        

                        <form action="{{url('add_cart',$product->id)}}" method="post" >
                                 @csrf
                                 <input type="number" name="quantity" min="1" value="1">
                                 <input type="submit" value="Add Cart" class="btn btn-success" >
                                 <a href="/" class="btn btn-primary">Back</a>
                              </form>
                        

                     </div>
                  </div>
               </div> 
         
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
   </body>
</html>