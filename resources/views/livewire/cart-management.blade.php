<section class="flex w-3/5 mt-10 gap-10 pt-5 mx-auto ">
    <div class="w-4/6  text-[17px] flex font-medium flex-col">
        <h1 class=" text-2xl">Panier</h1>
        <div class="flex flex-col divide-slate-200  gap-y-6 divide-y">
            @forelse($productInventories as $productInventory)

                <div class="flex pt-6 justify-between gap-x-4">
                    <div class="flex  flex-col gap-y-3 w-64">
                        <a href="{{route('products.detail', ['product' => $productInventory->product])}}">
                            <img class="w-full" src="{{$productInventory->product->image_path}}" alt="">
                        </a>
                        <div class="border items-center justify-between text-lg  rounded-full border-slate-200 flex">
                            <button wire:click="addToCart({{$productInventory}}, {{-1}})"
                                    class="rounded-full p-2 hover:bg-stone-200">
                                @if($productInventory->quantity === 1)
                                    <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img"
                                         width="24px" height="24px" fill="none">
                                        <path stroke="currentColor" stroke-miterlimit="10" stroke-width="1.5"
                                              d="M13.75 10v7m-3.5-7v7m-3.5-8.5V17c0 1.24 1.01 2.25 2.25 2.25h6c1.24 0 2.25-1.01 2.25-2.25V7.75h2.25m-10-3h3.75c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5H4.5"></path>
                                    </svg>
                                @else
                                    <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img"
                                         width="24px" height="24px" fill="none">
                                        <path stroke="currentColor" stroke-miterlimit="10" stroke-width="1.5"
                                              d="M18 12H6"></path>
                                    </svg>
                                @endif
                            </button>
                            <div class="p-2">{{$productInventory->quantity}}</div>
                            <button wire:click="addToCart({{$productInventory}}, {{1}})"
                                    class="rounded-full p-2 hover:bg-stone-200">
                                <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px"
                                     height="24px" fill="none">
                                    <path stroke="currentColor" stroke-miterlimit="10" stroke-width="1.5"
                                          d="M18 12H6m6 6V6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex w-full text-zinc-500 flex-col">
                        <div class="text-black">{{$productInventory->product->name}}</div>
                        <div>{{$productInventory->product->apparel->name}}</div>
                        <div>{{$productInventory->product->color->color_name}}</div>
                        <div>Taille / Pointure {{$productInventory->size->size}}</div>
                    </div>
                    <div class="w-44  text-right">{{$productInventory->product->price}} €</div>
                </div>
            @empty
                <p>Votre panier est vide</p>
            @endforelse
        </div>
    </div>

    <div class="w-2/6 flex text-[17px] gap-y-2 font-medium flex-col">
        <h2 class="text-2xl pb-4">Récapitulatif</h2>
        <div class="flex justify-between">
            <div>sous-total</div>
            <div>{{$total}} €</div>
        </div>
        <div class="flex  justify-between">
            <div>Frais estimés de prise en charge et d'expédition</div>
            <div>Gratuit</div>
        </div>
        <div class="border-y flex justify-between py-5 my-4 border-slate-200">
            <div>Total</div>
            <div class="font-thin">{{$total}} €</div>
        </div>
        <button wire:click="validCart"
           class="@if(empty($productInventories)) bg-zinc-700 @endif border mt-5 text-center font-bold text-white bg-black rounded-full py-5 hover:bg-zinc-700">
            Paiement
        </button>
    </div>

</section>
