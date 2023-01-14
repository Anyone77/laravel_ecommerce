<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br><br>

               <div>
                  <form action="{{url('product_search')}}" method="GET">
                     @csrf
                     <input type="text" name="search" placeholder="Search Products" id="" style="width: 500px;">
                     <input type="submit" value="search">
                  </form>
               </div>
            </div>

            <div class="row" id="product">

               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detail',$product->id)}}" class="option1">
                           Product Detail
                           </a>
                          
                           
                              <form action="{{url('add_cart',$product->id)}}" method="post" >
                                 @csrf
                                 <input type="number" name="quantity" min="1" value="1">
                                 <input type="submit" value="Add Cart" class="btn btn-success" >
                              </form>
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{url('/product_images/'.$product->image)}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$product->name}}
                        </h5>

                        @if($product->discount_price != null )
                        <h6 style="color: red;">
                           Discount Price <br>
                           {{$product->discount_price}}
                        </h6>
                        <h6  style="text-decoration: line-through; color:blue;" >
                           Price <br>
                           {{$product->price}}
                        </h6>

                        @else
                        <h6  style=" color:blue;" >
                           Price <br>
                           {{$product->price}}
                        </h6>

                        @endif

                     </div>
                  </div>
               </div> 
               
               @endforeach

               <span style="padding-top: 20px;">
               {{  $products->links() }}
               
               </span>
               

              
                          

            </div>
           
         </div>
      </section>