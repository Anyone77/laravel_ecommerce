@include('admin.header')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial_sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.partial_navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          

                  <div class="card-body ">
                    <h4 class="card-title">Orders table</h4>

                    <div>
                      <form action="{{url('search')}}" method="get">
                        @csrf

                        <input type="text" name="search">
                        <input type="submit" value="Search">
                      </form>
                    </div>
                
                  @if (session('message'))
                      <div  class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                          {{ session('message') }}
                      </div>
                  @endif


       

                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone</th>
                            <th> Address</th>
                            <th> Product Name</th>
                            <th> Quantity</th>
                            <th> Price</th>
                            <th> Payment Status</th>
                            <th> Delivery Status</th>
                            <th> Order Date</th>
                            <th> Action </th>
                            <th> Download</th>
                            <th> Send Email</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($order as $orders)
                          <tr>
                            <td>{{$orders->id}} </td>
                            <td>{{$orders->name}} </td>
                            <td>{{$orders->email}} </td>
                            <td> {{$orders->phone}} </td>
                            <td>{{$orders->address}} </td>
                            <td>{{$orders->product_name}} </td>
                            <td> {{$orders->quantity}} </td>
                            <td> {{$orders->price}} </td>
                            <td> {{$orders->payment_status}} </td>
                            <td> {{$orders->delivery_status}} </td>
                        
                            <td> {{$orders->created_at}}  </td>
                            <td>
                            <div class="form-row">

                            @if($orders->delivery_status == 'processing')
                              <a  href="{{url('delivered',$orders->id)}}" onclick=" return confirm('Are you sure finish delivered ?')" class="btn btn-warning">Delivered</a>
                              
                            @else

                            <p>Delivery Done</p>


                            @endif


                            </div> 
                            </td>
                            <td>
                              <a  href="{{url('print_pdf',$orders->id)}}" onclick=" return confirm('Are you want to sure pdf download ?')" class="btn btn-success">Print Pdf</a>
                            </td>
                            <td><a  href="{{url('send_email',$orders->id)}}" class="btn btn-success">Send Email</a></td>
                          </tr>

                          @empty
                          <h3>No Data Found</h3>
                          
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                
                  
          </div>
        </div>
          <!-- content-wrapper ends -->
          
          <!-- partial:partials/_footer.html -->
          @include('admin.partial_footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
   