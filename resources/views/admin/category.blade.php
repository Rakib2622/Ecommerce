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
            
            <div class="div_deg">
                <form action="{{url('add_category')}}" method="post">
                  @csrf

                    <div>
                        <input type="text" name = "category">
                        <input class="btn btn-info" type="submit" value="Add Category">
                    </div>
                </form>
            </div>
            <div>
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $data)
                  <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a href="{{url('edit_category',$data->id)}}" class="btn btn-success"   role="button">Edit</a></td>
                    <td><a href="{{url('delete_category',$data->id)}}" class="btn btn-danger"  role="button">Delete</a></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
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