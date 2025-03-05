{{-- <div>
    @foreach ($categories as $category)
        @if ($category->product->count() > 0)
            <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
                <div class="container">
                    <div class="row">
                        <div class="display-header d-flex justify-content-between pb-3">
                            <h2 class="display-7 text-dark text-uppercase">{{ $category->Catname }}</h2>
                            <div class="btn-right">
                                <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
                            </div>
                        </div>
                        <div class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($category->product as $product)
                                    <div class="swiper-slide">
                                        <div class="product-card position-relative">
                                            <div class="image-holder">
                                                <img src="{{ asset('storage/' . $product->pic) }}" alt="product-item"
                                                    class="img-fluid">
                                            </div>
                                            <div class="cart-concern position-absolute">
                                                <div class="cart-button d-flex">
                                                    <a href="#" class="btn btn-medium btn-black">Add to Cart<svg
                                                            class="cart-outline">
                                                            <use xlink:href="#cart-outline"></use>
                                                        </svg></a>
                                                </div>
                                            </div>
                                            <div
                                                class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                                <h3 class="card-title text-uppercase">
                                                    <a href="#">{{ $product->proName }}</a>
                                                </h3>
                                                <span class="item-price text-primary">${{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-pagination position-absolute text-center"></div>
            </section>
        @endif
    @endforeach
</div> --}}
<div>
    @foreach ($categories as $category)
        @if ($category->product->count() > 0)
            <section class="py-24">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="font-manrope font-bold text-4xl text-black mb-8 max-lg:text-center">
                        {{ $category->Catname }} list
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($category->product as $product)
                            <a href="javascript:;"
                                class="mx-auto sm:mr-0 group cursor-pointer lg:mx-auto bg-white transition-all duration-500">
                                <div class="">
                                    <img src="{{ asset('storage/' . $product->pic) }}" alt=""
                                        class="w-full aspect-square rounded-2xl object-cover">
                                </div>
                                <div class="mt-5">
                                    <div class="flex items-center justify-between">
                                        <h6
                                            class="font-semibold text-xl leading-8 text-black transition-all duration-500 group-hover:text-indigo-600">
                                            {{ $product->proName }}</h6>
                                        <h6 class="font-semibold text-xl leading-8 text-indigo-600">
                                            ${{ $product->price }}
                                        </h6>
                                    </div>
                                    {{-- <p class="mt-2 font-normal text-sm leading-6 text-gray-500">Orange & Aloe Vera</p> --}}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach
</div>
