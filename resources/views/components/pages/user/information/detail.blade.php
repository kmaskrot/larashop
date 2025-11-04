@extends('components.layouts.base', ['title' => 'User Settings'])

@section('content')
    @include('components.products.carousel')

    <main class="h-fit w-full">
        <div class="flex py-28 px-40  flex-col gap-y-10 gap-x-5  container mx-auto">
            @include('components.users.presentation', ['user' => $user])

            <div class="flex justify-between items-center">
                <div class="flex flex-col font-semibold">
                    <h1 class=" w-fit text-lg ">Votre Compte</h1>
                    <small class="text-base text-stone-500 ">Modifier vos informations comme bon vous semble</small>
                </div>
                <div>
                    <a href="{{route('user.logout')}}"
                       class="flex justify-center items-center hover:underline  font-semibold rounded-lg px-3 py-2">
                        Se déconnecter
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5 ">
                <a href="{{route('user.orders', ['user' => $user])}}"
                   class="flex rounded-lg p-3  border border-stone-300 hover:bg-stone-200 space-x-3">
                    <div class="bg-red-200 rounded-full size-20 shrink-0"></div>
                    <div class="flex font-semibold flex-col space-y-3">
                        <div>Vos commandes</div>
                        <div class="text-stone-500">Suivre, retourner ou acheter à nouveau</div>
                    </div>
                </a>
                <a href="{{route('user.addresses.list', ['user' => $user])}}"
                   class="flex rounded-lg p-3  border border-stone-300 hover:bg-stone-200 space-x-3">
                    <div class="bg-red-200 rounded-full size-20 shrink-0"></div>
                    <div class="flex w-80 font-semibold flex-col gap-y-3">
                        <div>Vos addresses</div>
                        <div class="text-stone-500">
                            Modifier les adresses et les préférences de livraison de vos commandes

                        </div>
                    </div>
                </a>
                <a href="{{route('user.settings', ['user' => $user])}}"
                   class="flex rounded-lg p-3  border border-stone-300 hover:bg-stone-200 space-x-3">
                    <div class="bg-red-200 rounded-full size-20 shrink-0"></div>
                    <div class="flex font-semibold flex-col space-y-3">
                        <div>Vos informations</div>
                        <div class="text-stone-500">Modifier vos informations personelles</div>
                    </div>
                </a>
                <a href="{{route('user.payments.list', ['user' => $user])}}"
                   class="flex rounded-lg p-3  border border-stone-300 hover:bg-stone-200 space-x-3">
                    <div class="bg-red-200 rounded-full size-20 shrink-0"></div>
                    <div class="flex font-semibold flex-col space-y-3">
                        <div>Vos moyen de paiement</div>
                        <div class="text-stone-500">Suivre, retourner ou acheter à nouveau</div>
                    </div>
                </a>
            </div>
        </div>
    </main>

@endsection