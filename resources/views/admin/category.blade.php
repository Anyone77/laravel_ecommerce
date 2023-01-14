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
          

                  <div class="card-body col-lg-12">
                    <h4 class="card-title">Category table</h4>
                   <br>
                  @if (session('message'))
                      <div  class="alert alert-success alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                          {{ session('message') }}
                      </div>
                  @endif


       

                   <br>
                    <a href="/category/create" class="btn btn-success" style="float:right ;">Create</a><br><br>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> Id </th>
                            <th> Category name </th>
                            <th> Date </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $cat)
                          <tr>
                            <td>{{$cat->id}} </td>
                            <td> {{$cat->category_name}} </td>
                            <td> {{$cat->created_at}}  </td>
                            <td>
                            <div class="form-row">
                              <a style="margin-right: 10px;" href="category/{{$cat->id}}/edit" class="btn btn-warning">Edit</a>
                              <form action="category/{{$cat->id}}" method="POSt" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick=" return confirm('Are you want to sure delete ?')" class="btn btn-danger">Delete</button>
                              </form>
                            </div> 
                            </td>
                          </tr>
                          @endforeach
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
    
   