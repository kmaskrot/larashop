@extends('components.layouts.base', ['title' => 'User Settings'])

@section('content')
    @include('components.products.carousel')
    <main class="h-fit w-full">
        <div class="flex py-28 px-40  flex-col gap-y-10 gap-x-5  container mx-auto">
            @include('components.users.presentation', ['user' => $user])


            <div class="flex justify-between items-center">
                <div class="flex flex-col ">
                    <div class="flex space-x-1 text-base items-center font-medium text-stone-500">
                        <a class="hover:text-stone-800 hover:underline align-middle"
                           href="{{route('user.detail', ['user' => $user])}}">
                            Votre Compte
                        </a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <div class="">Vos moyens de paiement</div>
                    </div>
                    <h1 class=" w-fit text-xl font-semibold">Vos moyens de paiement</h1>
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
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-red-300 text-red-600 font-medium">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            @if (session('status'))
                <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-green-300 text-green-600 font-medium">
                    {{session('status')}}
                </div>
            @endif
            <div class="grid grid-cols-3 gap-5">
                <a href="{{route('user.payments.create', ['user'=> $user])}}"
                   class="w-96 h-80 flex flex-col justify-center items-center font-semibold text-stone-500 border-dashed border-2 border-stone-300 rounded-xl border">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                         stroke="currentColor" class="size-16">
                        <path stroke-linecap="square" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>

                    <div class="text-2xl w-2/3 text-center">Ajouter un moyen  de paiement</div>
                </a>
                @foreach($user->payments as $payment)

                    <div class="w-96 h-80 shadow border px-4 flex py-4 flex-col justify-between border-stone-300 rounded-xl border">
                        <div>
                            <div class="flex justify-between">
                                <div class=" font-semibold ">{{$payment->name}}</div>
                                @if($payment->is_default)
                                    <div class=" bg-slate-700 text-white text-sm rounded-lg px-2 py-1">par défaut</div>

                                @endif
                            </div>
                            <div>numéro de carte : **** {{$payment->number}}</div>
                            <div>type de carte : {{$payment->type}}</div>
                            <div>date d'éxpiration : {{$payment->expiration_date?->format('m/Y')}}</div>
{{--                            <div>Numéro de téléphone: {{$payment->user->phone}}</div>--}}
                        </div>

                        <div class="flex text-sm text-cyan-500">
                            @if(!$payment->is_default)
                                <form action="{{route('user.payments.delete', ['user' => $user, 'payment' => $payment])}}"
                                      method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="hover:underline px-3">
                                        Supprimer
                                    </button>
                                </form>
                                <div class="text-black">|</div>
                                <a href="{{route('user.payments.default', ['user' => $user,'payment'=> $payment])}}"
                                   class="hover:underline px-3">
                                    Définir par défaut
                                </a>
                            @endif
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </main>
@endsection