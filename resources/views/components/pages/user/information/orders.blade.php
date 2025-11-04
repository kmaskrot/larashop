@extends('components.layouts.base', ['title' => 'User Settings'])

@section('content')
    @include('components.products.carousel')

    <main class="h-fit w-full border">
        <div class=" border flex py-28 px-40  flex-col gap-y-10 gap-x-5  container mx-auto">
            @include('components.users.presentation', ['user' => $user])


            <div class="flex justify-between items-center">
                <div class="flex flex-col ">
                    <div class="flex space-x-1 text-base items-center font-medium text-stone-500">
                        <a class="hover:text-stone-800 hover:underline align-middle" href="/users/1">Votre Compte</a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <div class="">Vos commandes</div>
                    </div>
                    <h1 class=" w-fit text-xl font-semibold">Vos commandes (3)</h1>
                </div>
                <div>
                    <div class=" bg-stone-100 flex px-2 items-center rounded-full">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
                </svg>

            </span>
                        <input placeholder="Rechercher..." class="focus:ring-0 border-0 bg-gray-50" type="text">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded-lg  py-5 px-8 border border-stone-300">
                    <div class=" grid grid-cols-4 gap-x-3 "
                         style="grid-template-columns: 4fr 3fr 2fr 3fr">
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>N° de commande 408-6429147-4605908</div>
                            <div class="text-stone-500">Commande effectuée le 24 Septembre 2024</div>
                            <div class="text-lg pt-5">109,99€</div>
                        </div>
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>Livré à Karim Maskrot</div>
                            <div class="text-stone-500">11 rue du docteur Zamenhof</div>
                            <div class="text-stone-500">57300 Hagondange</div>
                        </div>

                        <a class=" font-semibold  hover:underline" href="">Télécharger la facture</a>


                        <div class=" flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>

                        </div>

                    </div>
                    <div class="flex py-4 hidden flex-col mt-4">
                        <hr class="border-slate-300">
                        <ul class="flex py-6 flex-col space-y-6 products">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes1.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes2.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 p-2 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes3.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>

                                </div>
                            </li>
                            <hr class="border-slate-300">

                            <li class="font-semibold flex justify-between text-lg">
                                <div>TOTAL 109,99€</div>
                                <a class=" font-semibold text-red-700 text-center hover:underline" href="">Archiver la
                                    commande</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="rounded-lg  py-5 px-8 border border-stone-300">
                    <div class=" grid grid-cols-4 gap-x-3 "
                         style="grid-template-columns: 4fr 3fr 2fr 3fr">
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>N° de commande 408-6429147-4605908</div>
                            <div class="text-stone-500">Commande effectuée le 24 Septembre 2024</div>
                            <div class="text-lg pt-5">109,99€</div>
                        </div>
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>Livré à Karim Maskrot</div>
                            <div class="text-stone-500">11 rue du docteur Zamenhof</div>
                            <div class="text-stone-500">57300 Hagondange</div>
                        </div>

                        <a class=" font-semibold  hover:underline" href="">Télécharger la facture</a>


                        <div class=" flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>

                        </div>

                    </div>
                    <div class="flex py-4 flex-col mt-4">
                        <hr class="border-slate-300">
                        <ul class="flex py-6 flex-col space-y-6 products">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes1.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes2.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 p-2 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes3.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>

                                </div>
                            </li>
                            <hr class="border-slate-300">

                            <li class="font-semibold flex justify-between text-lg">
                                <div>TOTAL 109,99€</div>
                                <a class=" font-semibold text-red-700 text-center hover:underline" href="">Archiver la
                                    commande</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="rounded-lg  py-5 px-8 border border-stone-300">
                    <div class=" grid grid-cols-4 gap-x-3 "
                         style="grid-template-columns: 4fr 3fr 2fr 3fr">
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>N° de commande 408-6429147-4605908</div>
                            <div class="text-stone-500">Commande effectuée le 24 Septembre 2024</div>
                            <div class="text-lg pt-5">109,99€</div>
                        </div>
                        <div class="flex font-semibold flex-col space-y-1">
                            <div>Livré à Karim Maskrot</div>
                            <div class="text-stone-500">11 rue du docteur Zamenhof</div>
                            <div class="text-stone-500">57300 Hagondange</div>
                        </div>

                        <a class=" font-semibold  hover:underline" href="">Télécharger la facture</a>


                        <div class=" flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>

                        </div>

                    </div>
                    <div class="flex py-4 flex-col mt-4">
                        <hr class="border-slate-300">
                        <ul class=" hidden flex py-6 flex-col space-y-6 products">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes1.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes2.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>
                                </div>
                            </li>
                            <hr class="border-slate-300">
                            <li class="flex space-x-3 font-semibold text-stone-500">
                                <img class="size-60 p-2 bg-stone-100 rounded"
                                     src="{{ Vite::asset('resources/assets/shoes/shoes3.png') }}" alt="">
                                <div class="flex flex-col">
                                    <div class="text-black ">Nike Short Xl</div>
                                    <div>Chaussure</div>
                                    <div> Noir/Metallic Hematite/Max Orange/Noir</div>
                                    <div> Taille / Pointure 39</div>
                                    <div> Quantité - 1</div>
                                    <div> prix 130€</div>

                                </div>
                            </li>
                            <hr class="border-slate-300">

                            <li class="font-semibold flex justify-between text-lg">
                                <div>TOTAL 109,99€</div>
                                <a class=" font-semibold text-red-700 text-center hover:underline" href="">Archiver la
                                    commande</a>

                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </main>
    {{--                                <div class="flex  space-x-2 items-center">--}}
    {{--                                    <div>Quantité</div>--}}
    {{--                                    <select class="border-0">--}}
    {{--                                        <option value="1">1</option>--}}
    {{--                                        <option value="2">2</option>--}}
    {{--                                        <option value="3">3</option>--}}
    {{--                                        <option value="4">4</option>--}}
    {{--                                        <option value="5">5</option>--}}
    {{--                                        <option value="6">6</option>--}}
    {{--                                        <option value="7">7</option>--}}
    {{--                                        <option value="8">8</option>--}}
    {{--                                        <option value="9">9</option>--}}
    {{--                                        <option value="10">10</option>--}}
    {{--                                    </select>--}}
    {{--                                </div>--}}
@endsection