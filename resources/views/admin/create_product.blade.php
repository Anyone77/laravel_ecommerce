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
                    <h2 class="card-title">Add New Product</h2>
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div> 
                      @endif
                    <form action="/product" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                          </div>
                          <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control" value="{{old('price')}}">
                                </div>
                            <div class="form-group">
                                    <label>Discount Price</label>
                                    <input type="number" name="dprice" class="form-control" value="{{old('dprice')}}">
                            </div>
                            <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}">
                            </div>

                            <div class="form-group">
                                    <label>Description</label>
                                    
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10">{{old('dprice')}}</textarea>
                                </div>
                          <div class="form-group">
                                    <label >Image</label>
                                    <input type="file" class="form-control-file" name="product_image">
                                </div>
                          <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                  <option value="">Select Category</option>
                                  @foreach($category as $cat)
                                  <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                  @endforeach
                            </select>
                          </div>
                    

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/product" class="btn btn-success">Back</a>
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
    
   