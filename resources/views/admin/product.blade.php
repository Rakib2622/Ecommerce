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
    .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
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

            <div class="container mt-5">
              <h2 class="mb-4">Products</h2>
              <form method="get" action="{{ url('search_product') }}" class="mb-4">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for products..." aria-label="Search for products">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            
              <div class="row">
                  <!-- Example product card -->
                  @foreach ($product as $products )

                  <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="products/{{$products->image}}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$products->title}}</h5>
                            <p class="card-text">{{$products->Description}}</p>
                            <p class="card-text"><strong>Price: </strong>{{$products->price}}</p>
                            <p class="card-text"><strong>Category: </strong>{{$products->category}}</p>
                            <a href="{{url('edit_product',$products->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{url('delete_product',$products->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
                    
                  @endforeach
                  
                  <!-- Add more product cards as needed -->
              </div>
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