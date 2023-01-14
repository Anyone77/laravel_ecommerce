
<style>
    .container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}
</style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
        <div class="container">
        <div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Product Name</th>
		      <th scope="col">Image</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Price</th>
		      <th scope="col">Payment Status</th>
		      <th scope="col">Delivery Status</th>
              <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      @foreach($order as $order)
              <td>{{$order->product_name}}</td>
		      <td class="w-25">
			      <img src="/product_images/{{$order->image}}" class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
		      <td>{{$order->quantity}}</td>
		      <td>{{$order->price}}</td>
		      <td>{{$order->payment_status}}</td>
		      <td>{{$order->delivery_status}}</td>
              
              <td>
                @if($order->delivery_status == 'processing')
                <a href="{{url('cancel_order',$order->id)}}"  class="btn btn-success">Cancel Order</a>
                @else
                <p style="color:red;">Canceled Order</p>
                @endif
            </td>
		    </tr>

            @endforeach
		    
		  </tbody>
		</table>   
    </div>
  </div>
</div>
        </div>
        
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