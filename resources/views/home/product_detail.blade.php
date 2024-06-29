<!DOCTYPE html>
<html>

<head>

@include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('products/' . $product->image) }}" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text"><strong>Price: </strong>{{ $product->price }}</p>
                    <p class="card-text"><strong>Category: </strong>{{ $product->category->category_name }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('buy_now', $product->id) }}" class="btn btn-primary">Buy Now</a>
                        <a href="{{ url('add_to_cart', $product->id) }}" class="btn btn-success">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.footer')

</body>

</html>
