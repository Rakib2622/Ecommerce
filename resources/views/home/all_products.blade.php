<!DOCTYPE html>
<html>
    
<head>

@include('home.css')
<style>
    .card-img-top {
        height: 200px; /* Adjust height as needed */
        object-fit: cover; /* Ensure the image covers the space */
    }
  
    .card {
        border: none; /* Optional: Remove card border */
        overflow: hidden; /* Ensure contents don't overflow */
    }
  
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
  
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .card-text{
      color: black;
    }
    .flex-row {
        display: flex;
        flex-wrap: nowrap;
    }
    .overflow-auto {
        overflow-x: auto;
    }
  </style>


</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header') 
    <!-- end header section -->
  </div>

 
  <div class="container">
    @foreach ($categories as $category)
        @if ($category->products->isNotEmpty())
            <h2>{{ $category->category_name }}</h2>
            <div class="row flex-row flex-nowrap overflow-auto">
                @foreach ($category->products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 h-100">
                            <a href="{{ url('product_detail', $product->id) }}" class="stretched-link">
                                <div class="card-body p-0">
                                    <h5 class="card-title text-center pt-2" style="color: rgb(0, 0, 0); background-color: rgba(9, 129, 172, 0.5); padding: 5px; border-radius: 5px;">{{ $product->title }}</h5>
                                    <img src="{{ asset('products/' . $product->image) }}" class="card-img-top" alt="Product Image">
                                    <div class="card-body d-flex flex-column justify-content-between p-2">
                                        <p class="card-text text-center mb-2"><strong>Price: </strong>{{ $product->price }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
</div>

<br><br>

  

@include('home.footer')

</body>

</html>
