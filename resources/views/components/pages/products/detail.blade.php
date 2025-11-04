@extends('components.layouts.base', ['title' => 'Products List'])

@section('content')
    <main class="w-full h-fit">
        <div class=" flex py-36 space-x-5 justify-center container mx-auto">
            <div class=" h-4/5 sticky top-10 px-2 flex flex-col space-y-3">
                @foreach($product->images as $image)
                    <img class="size-16  shrink-0 flex items-center hover:bg-stone-200 justify-center bg-stone-100 rounded-[4px]"
                         src="{{$image->image_path}}" alt="">
                @endforeach
            </div>
            <div class="flex w-1/3 h-4/5 sticky rounded-lg top-10 bg-stone-100 justify-center items-center">
                <img class="w-full " src="{{$product->image_path}}" alt="">
            </div>
            <div class="flex flex-col max-w-96 font-semibold">
                <div class="text-xl">{{$product->name}}</div>
                <div class="text-lg text-zinc-500">{{$product->label}}</div>
                <div class="text-lg mt-10 font-semibold">{{$product->price}}€</div>

                @if(count($otherProducts))
                    <div class="grid grid-cols-4 gap-1  mt-4">
                        @foreach($otherProducts as $otherProduct)
                            <a class="size-20 p-1 hover:border bg-stone-100 rounded"
                               href="{{route('products.detail', $otherProduct)}}">
                                <img src="{{ $otherProduct->image_path }}" alt="">
                            </a>
                        @endforeach
                    </div>
                @endif

                <div class="mt-3  flex justify-between">
                    <div>Selectionner la taille</div>
                    <div class="text-stone-500">Guide des tailles</div>
                </div>
                @livewire('add-product-to-cart', [
                     'product' => $product,
                      'quantity' => 1,
                       'sizes' => $sizes,
                       'availableSizes' => $availableSizes
                 ])
                <p class="mt-10">{{$product->description}}</p>
                <hr class="my-5 border-zinc-200">
                <div class="flex flex-col">
                    <div class="flex justify-between">
                        <div class="text-lg">
                            Avis({{$product->reviews->count()}})
                        </div>
                        <div class="flex items-center gap-x-1">
                            @include('components.products.stars', ['count' => $product->rating])

                            <svg aria-hidden="true" class="nds-summary-control" focusable="false" viewBox="0 0 24 24"
                                 role="img"
                                 width="24px" height="24px" fill="none">
                                <path stroke="currentColor" stroke-width="1.5"
                                      d="M18.966 8.476L12 15.443 5.033 8.476"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-5 mt-5">
                        @foreach($product->reviews as $review)
                            <div>
                                <div class="justify-between items-center align-middle flex">
                                    <div class="flex text-black">
                                        @include('components.products.stars', ['count' => $review->rating])
                                    </div>
                                    <div class="text-zinc-500">
                                        {{$review->user->firstname}}
                                        - {{\Carbon\Carbon::create($review->created_at)->format('d M.Y')}}
                                    </div>
                                </div>
                                <div class="leading-6 pt-2">
                                    {{$review->review}}
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

                <hr class="my-5 border-zinc-200">

            </div>
        </div>
    </main>

@endsection