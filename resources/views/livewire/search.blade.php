<div style="z-index: 100" class="flex items-center space-x-3">
    <div id="search-menu"
         class="@if($isMenuActive)visible absolute h-2/4 px-20 overflow-hidden @else invisible @endif p-3 flex flex-col z-50 bg-white z-50 top-0 left-0 w-full">
        <div class="flex justify-between items-center">
            <img class="size-14  @if(!$isMenuActive) hidden @endif"
                 src="{{Vite::asset('resources/assets/logo.svg')}}" alt="">

            <form wire:submit="onSearch" class="flex  flex-col">
                <div class="visible bg-stone-100 flex px-2 items-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                    </svg>
                    <input wire:click="activeMenu" placeholder="Rechercher..." autocomplete="off" id="button-search"
                           wire:model.live="search"
                           class="border-zinc-800 placeholder:text-zinc-400 @if($isMenuActive) w-80 @endif focus:ring-0 border-0 bg-gray-50"
                           type="text" required>
                    <span wire:click="resetSearch" id="button-reset-search"
                          class="  @if(!$search && (!$products || !$categories)) hidden @endif">
                <svg class="cursor-pointer" aria-hidden="true" focusable="true" viewBox="0 0 24 24" role="img"
                     width="24px" height="24px"
                     fill="none">
                    <path stroke="currentColor" stroke-width="1.5"
                          d="M18.973 5.027L5.028 18.972m0-13.945l13.944 13.945"></path>
                </svg>

            </span>
                </div>
            </form>

            <button id="button-cancel-search" class="@if(!$isMenuActive) hidden @endif font-medium"
                    wire:click="resetSearch">
                Annuler
            </button>
        </div>

        @if($isMenuActive)
            <div class="flex w-full justify-between overflow-auto">
                @if(isset($categories) &&
                   (!empty($categories[__('popular collections')]) ||
                     !empty($categories[__('categories')]) ||
                     !empty($categories[__('popular categories')]))
                    )
                    <div class="flex flex-col  space-y-3 overflow-auto">
                        @foreach($categories as $key => $result)
                            @if(!empty($result) &&  $key !== __('products'))
                                <div>
                                    <h1 class="font-medium">{{$key}}</h1>
                                    <ul class="">
                                        @foreach($result as $product)
                                            <li>{{$product->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                        @endforeach
                    </div>
                @endif
                @if($products)
                    <div class="flex space-x-3">
                        @foreach($products as $key => $product)
                            <a href="{{route('products.detail',['product' => $product])}}" class="flex flex-col">
                                <div class="h-76">
                                    <img class="rounded  size-full" src="{{$product->image_path}}" alt="">
                                </div>
                                <div class="font-medium pt-2">{{$product->name}}</div>
                                <div class="font-medium text-zinc-500">
                                    {{$product->apparel->name}}
                                    pour {{$product->gender->name}}
                                </div>
                                <div class="font-medium ">{{$product->price}} €</div>
                            </a>
                        @endforeach
                    </div>
                @endif

            </div>
        @endif

        @if((!$products && !$categories) && $isMenuActive)
            <div class=" flex flex-col space-y-3 pt-3 justify-center">
                <div class="text-center">
                    <h4 class="font-lg font-medium">{{__('popular categories')}}</h4>
                </div>
                <div class="flex justify-center space-x-4">
                    @foreach($popularCategories as $popularCategory)
                        <a class="hover:italic hover:tracking-wide"
                           href="{{route('products.categories', ['category' => $popularCategory->category])}}">
                            {{$popularCategory->category->name}}
                        </a>
                        @if(!$loop->last)
                            <div>-</div>
                        @endif
                    @endforeach
                </div>

            </div>
        @endif
    </div>
</div>

@script
<script>
    const buttonSearch = document.getElementById('button-search');
    const buttonResetSearch = document.getElementById('button-reset-search');
    const buttonCancelSearch = document.getElementById('button-cancel-search');
    const searchMenu = document.getElementById('search-menu');
    const logoSearch = document.getElementById('logo-search');

    if (buttonSearch && searchMenu) {
        const body = document.getElementsByTagName('body')[0];
        const main = document.getElementsByTagName('main')[0];


        if (body && main) {
            document.addEventListener('click', (e) => {
                if (!e.target.closest('#search-menu') && !e.target.contains(searchMenu)) {
                    @this.
                    set('isMenuActive', false);
                    body.style.overflow = 'auto';
                    main.style.filter = 'brightness(1)';
                    main.style.backgroundColor = 'white';

                }
            });

            buttonCancelSearch.addEventListener('click', () => {
                body.style.overflow = 'auto';
            })
            buttonSearch.addEventListener('focus', () => {
                body.style.overflow = 'hidden';
                main.style.backgroundColor = 'rgba(0,0,0,0.22)';
                main.style.filter = 'brightness(70%)';
            })


        }
    }


</script>
@endscript