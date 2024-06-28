<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    input[type='text']
    {
        width: 300px;
        height: 40px;
    }
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px
    }
    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1 style="align-items: center">Update Category</h1>
            <div class="div_deg">
                
                <div class="container mt-5">
                    <h2 class="mb-4">Update Product</h2>
                    <form action="{{url('update_product',$product->id )}}" method="post" enctype="multipart/form-data">
                      @csrf
    
                      <div class="form-group">
                        <label for="productTitle">Product Title</label>
                        <input type="text" name="title" value="{{$product->title}}" class="form-control" id="productTitle" placeholder="Enter product title" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control" id="productPrice" placeholder="Enter product price" required>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Image</label>
                        <input type="file" name="image"  class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="productCategory">Category</label>
                    <select class="form-control" name="category" id="productCategory" required>
                        <option value="{{$product->category}}">{{$product->category}}</option>
                        @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update Product</button>
                    </form>
                </div>
                
                </div>
                </form>
            </div>
            


          </div>
      </div>
    </div>
    <!-- JavaScript files-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>