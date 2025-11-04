<div class="container mx-auto">
    <div class="flex justify-between z-50  sticky items-center h-32 py-5 bg-white top-0">
        <div class="flex font-semibold  flex-col">
            @if($category)
                <div> {{__('Categories')}}</div>
                <h1 class="text-2xl">{{ $category->title }} ({{$products ? count($products) : 0}})</h1>
            @endif

            @if($collection)
                <div> {{__('Collection')}}</div>
                <h1 class="text-2xl">{{__($collection->name)}} ({{$products ? count($products) : 0}})</h1>
            @endif
        </div>

        <div class="flex items-center space-x-3 text-lg">
            <button wire:click="toggleMenu()">@if($isMenuActive)
                    {{__('Hide filters')}}
                @else
                    {{__('Show filters')}}
                @endif</button>
            <select class="border-0 focus:ring-0" wire:model.change="orderType">
                <option value="">Trier par</option>
                <option value="popular">populaires</option>
                <option value="news">récents</option>
                <option value="price_desc">prix décroissant</option>
                <option value="price_asc">prix croissant</option>
            </select>
        </div>
    </div>
    <div class="flex justify-between w-full gap-x-3 h-fit">
        <ul class="pl-2 @if(!$isMenuActive) hidden @endif  pr-10 z-10 font-semibold overflow-auto text-lg flex flex-col sticky  space-y-3 top-32 h-[800px]">

            @if(isset($filters['filter']))
                <li class="flex flex-col gap-y-1">
                    <div class="flex justify-between">
                        <div>Sports</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        @foreach($filters['filter'] as $filter)
                            <div class="flex items-center gap-x-3">
                                <input wire:model.live="sports" value="{{$filter->uuid}}"
                                       type="checkbox">{{$filter->name}}
                            </div>
                        @endforeach
                    </div>
                </li>
                <hr class="border-stone-200">

            @endif

            @if(isset($filters['apparel']))
                <li class="flex flex-col gap-y-1">
                    <div class="flex justify-between">
                        <div>Vetements</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        @foreach($filters['apparel'] as $filter)
                            <div class="flex items-center gap-x-3">
                                <input wire:model.live="apparel" value="{{$filter->uuid}}"
                                       type="checkbox">{{$filter->name}}
                            </div>
                        @endforeach
                    </div>
                </li>
                <hr class="border-stone-200">

            @endif

            @if(isset($filters['gender']))
                <li class="flex flex-col gap-y-1">
                    <div class="flex justify-between">
                        <div>Genres</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        @foreach($filters['gender'] as $filter)
                            <div class="flex items-center gap-x-3">
                                <input wire:model.live="genders" value="{{$filter->uuid}}"
                                       type="checkbox">{{$filter->name}}
                            </div>
                        @endforeach
                    </div>
                </li>
                <hr class="border-stone-200">

            @endif

            @if(isset($defaultSizes))
                <li class="flex flex-col gap-y-1">
                    <div class="flex justify-between">
                        <div>Tailles</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        @foreach($defaultSizes as $defaultSize)
                            <div class="flex items-center gap-x-3">
                                <input wire:model.live="sizes"
                                       value="{{$defaultSize->uuid}}"
                                       type="checkbox">
                                {{$defaultSize->size}}
                            </div>
                        @endforeach
                    </div>
                </li>
                <hr class="border-stone-200">

            @endif

        </ul>
        <section class=" flex flex-wrap overflow-hidden justify-between gap-x-5 gap-y-20 w-full h-fit">
            @foreach($products as $product)
                <a href="{{route("products.detail", ['product' => $product])}}" class="grid-item">
                    <div class="bg-stone-100 size-96  flex justify-center items-center">
                        <img class="w-full " src="{{$product->image_path}}"
                             alt="running image">
                    </div>
                    <div class="flex flex-col pt-4 text-lg">
                        <div class="title font-bold">{{$product->name}}</div>
                        <div class="category font-semibold text-stone-500">
                            {{$product->label}}
                        </div>
                        <div class="color font-semibold text-stone-500">1 couleur</div>
                        <div class="price font-bold">{{$product->price}}€</div>
                    </div>
                </a>

            @endforeach

            <template x-if="$wire.continueScroll">
                <div x-intersect.full="$wire.loadMore()">
                    <div wire:loading wire:target="loadMore"
                         class="w-full loading-indicator">
                        Loading more posts...
                    </div>
                </div>
            </template>

        </section>

    </div>

</div>