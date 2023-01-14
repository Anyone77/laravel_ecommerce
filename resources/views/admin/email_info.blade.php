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
          

          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Send Notification to {{$order->email}}</h2><br><br>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div> 
                      @endif
                    <form action="{{url('send_user_email',$order->id)}}" method="POST" >
                        @csrf

                        <div class="form-group">
                                    <label>Email Greeting</label>
                                    <input type="text" name="greeting" class="form-control" value="{{old('greeting')}}">
                          </div>
                          <div class="form-group">
                                    <label>Email FirstLine</label>
                                    <input type="text" name="firstline" class="form-control" value="{{old('firstline')}}">
                                </div>

                            <div class="form-group">
                                    <label>Email Body</label>
                                    <input type="text" name="body" class="form-control" value="{{old('firstline')}}">
                                </div>

                            <div class="form-group">
                                    <label>Email Button Name </label>
                                    <input type="text" name="button" class="form-control" value="{{old('button')}}">
                            </div>

                            <div class="form-group">
                                    <label>Email Url</label>
                                    <input type="text" name="url" class="form-control" value="{{old('url')}}">
                            </div>

                            <div class="form-group">
                                    <label>Email Lastline</label>
                                    <input type="text" name="lastline" class="form-control" value="{{old('lastline')}}">
                            </div>

                          
                    

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/order" class="btn btn-success">Back</a>
                    </form>
                  </div>
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
    
   