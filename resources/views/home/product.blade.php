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
</style>

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        <!-- Example product card -->
        @foreach ($product->slice(0, 9) as $products)
            <div class="col-md-4">
                <div class="card mb-4 h-100">
                    <a href="{{ url('product_detail', $products->id) }}" class="stretched-link">
                        <div class="card-body p-0">
                            <h5 class="card-title text-center pt-2" style="color: rgb(0, 0, 0); background-color: rgba(9, 129, 172, 0.5); padding: 5px; border-radius: 5px;">{{ $products->title }}</h5>
                            <img src="products/{{ $products->image }}" class="card-img-top" alt="Product Image">
                            <div class="card-body d-flex flex-column justify-content-between p-2">
                                <p class="card-text text-center mb-2"><strong>Price: </strong>{{ $products->price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        <!-- Add more product cards as needed -->
    </div>
    <div class="btn-box">
        <a href="{{ url('all_products') }}">
            View All Products
        </a>
    </div>
    
  </section>