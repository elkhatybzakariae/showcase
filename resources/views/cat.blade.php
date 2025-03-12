<!DOCTYPE html>
<html>

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
    tabindex="0">
    <div class="search-popup">
        <div class="search-popup-container">

            <form role="search" method="get" class="search-form" action="">
                <input type="search" id="search-form" class="search-field" placeholder="Type and press enter"
                    value="" name="s" />
                <button type="submit" class="search-submit"><svg class="search">
                        <use xlink:href="#search"></use>
                    </svg></button>
            </form>

            <h5 class="cat-list-title">Browse Categories</h5>

            <ul class="cat-list">
                <li class="cat-list-item">
                    <a href="#" title="Mobile Phones">Mobile Phones</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Smart Watches">Smart Watches</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Headphones">Headphones</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Accessories">Accessories</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Monitors">Monitors</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Speakers">Speakers</a>
                </li>
                <li class="cat-list-item">
                    <a href="#" title="Memory Cards">Memory Cards</a>
                </li>
            </ul>

        </div>
    </div>

    @include('master.header')


    <section class="py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8 max-lg:flex-col max-lg:text-center">
                <h2 class="font-manrope font-bold text-4xl text-black">
                    {{ $category->Catname }} list
                </h2>
                </h4>
            </div>

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






    @include('master.footer')
    @include('master.footer-bottom')

    <script src="{{ asset('storage/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('storage/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('storage/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
    <script>
        const toggleTheme = () => {
            const body = document.body;
            if (body.classList.contains('dark-mode')) {
                body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            }
        };

        // Apply saved theme on page load
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }

        document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
    </script>
    @livewireScripts
</body>

</html>
