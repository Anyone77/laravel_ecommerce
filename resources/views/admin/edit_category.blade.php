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
        <!-- <form method="POST" action="{{url('category')}}">
          <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <input type="text" name="category" class="form-control" id="exampleInputEmail1" value="{{old('category')}}">
            
          </div>
          
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
        <div class="card-body" style="margin-top: 100px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/category/{{$category->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" value="{{old('category',$category->category_name)}}">
            </div>
            
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            
        </div>



           
            </div>
          <!-- content-wrapper ends -->
          
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    