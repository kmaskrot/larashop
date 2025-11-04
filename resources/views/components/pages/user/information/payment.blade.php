@extends('components.layouts.base', ['title' => 'User Settings'])

@section('content')
    @include('components.products.carousel')
    <main class="h-fit w-full">
        <div class="flex py-28 px-40 flex-col gap-y-10 gap-x-5  container mx-auto">
            @include('components.users.presentation', ['user' => $user])
            <div class="flex  justify-between items-center">
                <div class="flex flex-col ">
                    <div class="flex space-x-1 text-base items-center font-medium text-stone-500">
                        <a class="hover:text-stone-800 hover:underline align-middle"
                           href="{{route('user.detail', ['user' => $user])}}">Votre Compte</a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <a class="hover:text-stone-800 hover:underline align-middle"
                           href="{{route('user.payments.list', ['user' => $user])}}">Vos moyens de paiement</a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <div class="">Nouveau moyen de paiement</div>
                    </div>
                    <h1 class=" w-fit text-xl font-semibold">Nouveau moyen de paiement</h1>
                </div>
            </div>
            <div class="flex  gap-6">
                <div class="w-full border  px-10 py-7 border border-zinc-200  bg-white rounded-lg ">
                    <h2 class="font-medium text-lg mb-10">Formulaire de création</h2>
                    @if (session('status'))
                        <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-green-300 text-green-600 font-medium">
                            {{session('status')}}
                        </div>
                    @endif

                    <div id="card-errors" role="alert"></div>
                    <form id="form-add-payment-method"
                          data-key="{{config('stripe.public_key')}}"
                          action="{{ route('user.payments.save', ['user' => $user]) }}"
                          method="POST"
                          class="flex flex-col gap-y-4 ">
                        @csrf
                        <div class="flex flex-col gap-y-1">
                            <label class="font-medium text-zinc-800" for="card-number">Numéro de Carte</label>
                            <div id="card-number" class="border px-1 py-2 border-zinc-200 rounded"></div>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <label class="font-medium text-zinc-800" for="card-name">Nom sur la carte</label>
                            <input type="text" id="card-name" name="card_name"
                                   value="{{old('card_name')}}"
                                   placeholder="Votre nom complet"
                                   class="border placeholder:text-zinc-500 text-lg focus:ring-0 px-1 py-2 border-zinc-200 rounded">
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <label class="text-zinc-800 font-medium" for="card-number">Date d'éxpiration</label>
                            <div id="card-expiry" class="border px-1 py-2 border-zinc-200 rounded"></div>
                        </div>
                        <div class="flex flex-col gap-y-1">
                            <label class="text-zinc-800 font-medium" for="card-number">CVC</label>
                            <div id="card-cvc" class="border px-1 py-2 border-zinc-200 rounded"></div>
                        </div>
                        <div class="form-group flex items-center space-x-3">
                            <input name="default"
                                   type="checkbox"
                                   @if((old('default') || $user->payments()->count() <= 0))
                                       checked
                                   @endif
                                   @if($user->payments()->count() <= 0)
                                       onclick="return false;"
                                    @endif

                            >
                            <label class="text-zinc-800 font-medium" for="default">
                                faire de cette addresse mon addresse par défaut
                            </label>
                        </div>
                        <button class="mt-10 px-3 w-fit flex font-semibold items-center py-2 bg-black text-white hover:bg-zinc-500 rounded">
                            Enregistrer
                        </button>
                    </form>



                </div>
                <div class="px-10 py-7 flex h-fit flex-col bg-white border border-zinc-200 grow w-full rounded-lg">
                    <div class="font-medium">
                        Larashop accepte la plupart des cartes de paiement. Vos informations de paiement sont encryptées
                        et sécurisées.
                    </div>
                    <div class="flex mt-5 space-x-5">
                        <div class="p-1 w-14 rounded-sm h-10 border border-zinc-200">
                            <img class="h-full"
                                 src="{{\Illuminate\Support\Facades\Vite::asset('resources/assets/credit-cards/cb.svg')}}"
                                 alt="">
                        </div>

                        <div class="p-1 w-14 rounded-sm h-10 border border-zinc-200">
                            <img class="h-full"
                                 src="{{\Illuminate\Support\Facades\Vite::asset('resources/assets/credit-cards/mastercard.svg')}}"
                                 alt="">
                        </div>

                        <div class="p-1 w-14 rounded-sm h-10 border border-zinc-200">
                            <img class="h-full"
                                 src="{{\Illuminate\Support\Facades\Vite::asset('resources/assets/credit-cards/visa.svg')}}"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection