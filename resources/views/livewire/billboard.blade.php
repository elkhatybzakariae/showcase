{{-- <section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="display-2 text-uppercase text-dark pb-5">Your Products Are Great.</h1>
                                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop
                                    Product</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image-holder">
                                <img src="{{ asset('storage/images/banner-image.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="display-2 text-uppercase text-dark pb-5">Technology Hack You Won't Get
                                </h1>
                                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop
                                    Product</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image-holder">
                                <img src="{{ asset('storage/images/banner-image.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-prev">
        <svg class="chevron-left">
            <use xlink:href="#chevron-left" />
        </svg>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-next">
        <svg class="chevron-right">
            <use xlink:href="#chevron-right" />
        </svg>
    </div>
</section> --}}


<script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<div x-data="swipeCards()" x-init="let isDown = false;
let startX;
let scrollLeft;
$el.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - $el.offsetLeft;
    scrollLeft = $el.scrollLeft;
});
$el.addEventListener('mouseleave', () => {
    isDown = false;
});
$el.addEventListener('mouseup', () => {
    isDown = false;
});
$el.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - $el.offsetLeft;
    const walk = (x - startX) * 1;
    $el.scrollLeft = scrollLeft - walk;
});" class="overflow-x-scroll scrollbar-hide mb-4  relative px-0.5"
    style="overflow-y: hidden;">
    <div class="flex snap-x snap-mandatory gap-4 mt-5" style="width: max-content;">
        <template x-for="card in cards" :key="card.id">
            <div class="flex-none w-64 snap-center mt-5">
                <div class="bg-white border-1 border border-gray-200 rounded-lg overflow-hidden mb-4">
                    <img :src="card.image" alt="" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg leading-6 font-bold text-gray-900" x-text="card.title"></h3>
                        <p class="text-gray-600 mt-2 text-sm" x-text="card.description"></p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-2xl font-extrabold text-gray-900"
                                x-text="'$' + card.price.toFixed(2)"></span>
                            <a :href="card.link"
                                class="text-white bg-fuchsia-950 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
<script>
    var lastProducts = {!! $lastProductsJson !!};
    var cards = @json($cards);
    console.log(cards);

    function swipeCards() {
        return {
            cards: cards,
            addToCart(product) {
                // Implement your add to cart logic here
                console.log('Adding to cart:', product);
            }
        };
    }
</script>
