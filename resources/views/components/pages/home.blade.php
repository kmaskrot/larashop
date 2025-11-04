@extends('components.layouts.base', ['title' => 'Make your life Easier'])

@section('content')
    @include('components.products.carousel')


    <main class="h-fit w-full">
        {{--    <figure style="height: 30rem" class="w-full relative overflow-hidden">--}}
        {{--        <figcaption class="flex flex-col absolute z-50 top-28 left-16 ">--}}

        {{--            <h1 class="font-bold text-3xl pb-2 slide-in-top">New Collection</h1>--}}
        {{--            <div class="font-bold flex items-center fade-in">--}}
        {{--                <div class="text-7xl">20</div>--}}
        {{--                <div class="flex flex-col justify-center">--}}
        {{--                    <div class="text-3xl">%</div>--}}
        {{--                    <div class="2xl">OFF</div>--}}
        {{--                </div>--}}

        {{--            </div>--}}

        {{--            <button class="flex justify-center items-center w-fit px-3 py-2 bg-black text-white hover:bg-slate-900 mt-5  fade-in">SHOP NOW</button>--}}
        {{--        </figcaption>--}}
        {{--                <video  class="object-cover z-10 " style="filter: grayscale(1); transform: scaleX(-1)" autoplay muted>--}}
        {{--                    <source class="mt-80" src="{{Vite::asset('resources/assets/video.mp4')}}" type="video/mp4" />--}}
        {{--                </video>--}}
        {{--    </figure>--}}

        <figure class="w-full relative overflow-hidden">
            <figcaption
                    class="flex border text-center flex-col text-white justify-center h-full items-center absolute z-20 w-full">

                <h1 class="font-bold text-7xl pb-2">New Offers <br> for new members</h1>
                <div class="font-bold flex items-center">
                    <div class="text-7xl">20</div>
                    <div class="flex flex-col justify-center">
                        <div class="text-5xl">%</div>
                        <div class="text-xl">OFF</div>
                    </div>

                </div>

                <a href="{{route('auth.lookup')}}"
                   class="flex justify-center items-center rounded-full w-fit px-5 font-semibold py-3 text-black bg-white hover:bg-stone-200 mt-5">
                    JOIN NOW
                </a>
            </figcaption>
            {{--        <video class="h-full z-10 " style="filter: grayscale(1); transform: scaleX(-1)" autoplay muted>--}}
            {{--            <source class="mt-80" src="{{Vite::asset('resources/assets/video.mp4')}}" type="video/mp4" />--}}
            {{--        </video>--}}
            <video playsinline class="w-full" loop tabindex="-1" preload="auto" autoplay muted
                   src="{{Vite::asset('resources/assets/video2.mp4')}}"></video>

            {{--        <img class="w-full " src="{{Vite::asset('resources/assets/running.jpg')}}" alt="running image">--}}
        </figure>

        <section class=" flex flex-col container mx-auto py-8 px-5">
            <div class="mySwiper overflow-x-auto hide-scrollbar ">
                <div class="w-full py-5 flex justify-between">
                    <h2 class="font-bold text-xl">Popular Categories</h2>
                    <div class="flex  rounded mt-2 h-10 justify-center  items-center space-x-3 swiper-pagination"></div>
                </div>
                <div class="flex  swiper-wrapper cursor-grab">
                    @foreach($popularCategories as $popularCategory)
                        <a href="{{route('products.categories', ['category' => $popularCategory->category])}}"
                           class="swiper-slide">
                            <div class="bg-slate-100 overflow-hidden flex items-center justify-center rounded-full size-40">
                                <img class="p-5 pt-32" src="{{$popularCategory->category->image_url}}"
                                     alt="{{$popularCategory->category->alt}}">
                            </div>
                            <div class="pt-2 text-center text-lg font-semibold">{{$popularCategory->category->name}}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class=" flex flex-col container mx-auto p-5">

            <div class="swiper hide-scrollbar mySwiper overflow-x-auto">
                <div class="w-full py-5 flex justify-between">
                    <h2 class="font-bold text-xl">Recommended for you</h2>
                    <div class="flex  rounded mt-2 h-10 justify-center  items-center space-x-3 swiper-pagination"></div>
                </div>

                <div class="flex  hide-scrollbar w-full h-2/3  swiper-wrapper cursor-grab">
                    @foreach($collections as $collection)
                        <a href="{{route('products.collections', ['collection' => $collection->slug])}}"
                           class="swiper-slide">
                            <div class="bg-blue-100  flex items-center justify-center  w-80 h-full">
                                <img class="object-cover size-34 block" src="{{ $collection->image_url }}"
                                     alt="{{$collection->alt }}">
                            </div>
                        </a>
                    @endforeach

                </div>
                {{--            <div class="flex  bg-slate-50 rounded mt-2 h-10 justify-center  items-center space-x-3 swiper-pagination"></div>--}}

            </div>
        </section>


        <section class=" flex flex-col container mx-auto p-5">
            <div class="swiper hide-scrollbar mySwiper overflow-x-auto">
                <div class="w-full py-5 flex justify-between">
                    <h2 class="font-bold text-xl">Nouveauté de la semaine</h2>
                    <div class="flex  rounded mt-2 h-10 justify-center  items-center space-x-3 swiper-pagination"></div>
                </div>

                <div class="flex  hide-scrollbar w-96 swiper-wrapper cursor-grab">
                    @foreach($newProducts as $newProduct)
                        <a href="{{route('products.detail', ['product' => $newProduct])}}" class="swiper-slide">
                            <div class="bg-blue-100  flex items-center justify-center  w-80 h-96">
                                <img class="object-cover size-34 block" src="{{$newProduct->image_path}}"
                                     alt="running logo">
                            </div>
                            <div class=" flex flex-col mt-1">
                                <div class="font-medium text-xl">{{$newProduct->name}}</div>
                                <div class="font-medium text-lg text-zinc-500">{{__($newProduct->apparel->name)}}
                                    pour {{__($newProduct->gender->name)}}</div>
                                <div class="font-medium text-lg mt-1">{{$newProduct->price}}€</div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="flex hidden bg-slate-50 rounded mt-2 h-10 justify-center  items-center space-x-3 swiper-pagination"></div>

            </div>
        </section>
    </main>

@endsection