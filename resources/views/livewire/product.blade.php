<div class="swiper-wrapper">
    @foreach ($category->product as $product)
        <div class="swiper-slide">
            <div class="product-card position-relative">
                <div class="image-holder">
                    <img src="{{ asset('storage/' . $product->pic) }}" alt="product-item" class="img-fluid">
                </div>
                <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                        <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                                <use xlink:href="#cart-outline"></use>
                            </svg></a>
                    </div>
                </div>
                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase">
                        <a href="#">{{ $product->proName }}</a>
                    </h3>
                    <span class="item-price text-primary">${{ $product->price }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
