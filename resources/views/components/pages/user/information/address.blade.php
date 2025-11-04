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
                           href="{{route('user.detail', ['user' => $user])}}">Votre Compte</a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <a class="hover:text-stone-800 hover:underline align-middle"
                           href="{{route('user.addresses.list', ['user' => $user])}}">Vos adresses</a>
                        <svg class=" font-bold size-4 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                        <div class="">Nouvelle adresse</div>
                    </div>
                    <h1 class=" w-fit text-xl font-semibold">Nouvelle adresse</h1>
                </div>
            </div>
            <div class="w-2/3  px-10 py-7 border border-zinc-200  bg-white rounded-lg ">
                <h2 class="font-medium text-lg mb-10">Formulaire de création</h2>
                <form action="{{route('user.addresses.save', ['user' => $user])}}" method="POST"
                      class="w-2/3 h-fit flex flex-col space-y-7">
                    @csrf
                    <input type="hidden" name="address_key" value="{{$address->uuid ?? null}}">
                    <div class="form-group flex flex-col space-y-1">
                        <label class="text-zinc-800 font-medium" for="">Address
                            <span class="align-middle">*</span>
                        </label>
                        <input name="address"
                               class="border border-zinc-200 placeholder:text-zinc-400  rounded focus:ring-0"
                               value="{{$address->address ?? old('address')}}"
                               placeholder="{{fake()->address()}}"
                               type="text" required>
                    </div>
                    <div class="form-group flex flex-col space-y-1">
                        <label class="text-zinc-800 font-medium" for="">Complément</label>
                        <input name="complement"
                               value="{{$address->complement ?? old('complement')}}"
                               class="border border-zinc-200 placeholder:text-zinc-400  rounded focus:ring-0"
                               placeholder="Apt, suite, unité, nom de l'entreprise (facultatif)."
                               type="text">
                    </div>

                    <div class="form-group flex flex-col space-y-1">
                        <label class="text-zinc-800 font-medium" for="">Ville
                            <span class="align-middle">*</span>
                        </label>
                        <input name="city"
                               value="{{$address->city ?? old('city')}}"
                               class="border border-zinc-200 placeholder:text-zinc-400  rounded focus:ring-0"
                               type="text"
                               required>
                    </div>
                    <div class="form-group flex flex-col space-y-1">
                        <label class="text-zinc-800 font-medium" for="">Code postal
                            <span class="align-middle">*</span>

                        </label>
                        <input class="border border-zinc-200 placeholder:text-zinc-400  rounded focus:ring-0"
                               name="zip_code"
                               value="{{$address->zip_code ?? old('zip_code')}}"
                               type="text"
                               required>
                    </div>
                    <div class="form-group flex flex-col space-y-1">
                        <label class="text-zinc-800 font-medium" for="">Pays
                            <span class="align-middle">*</span>
                        </label>
                        <input class="border border-zinc-200 placeholder:text-zinc-400  rounded focus:ring-0"
                               name="country"
                               value="{{$address->country ?? old('country')}}"
                               type="text"
                               required>
                    </div>

                    <div class="form-group flex items-center space-x-3">
                        <input name="default"
                               type="checkbox"
                               @if(($address && $address->is_default) ||
                                     old('default') ||
                                     $user->addresses()->count() <= 0)
                                   checked
                               @endif
                               @if(($address && $address->is_default) || $user->addresses()->count() <= 0)
                                   onclick="return false;"
                                @endif

                        >
                        <label class="text-zinc-800 font-medium" for="default">
                            faire de cette addresse mon addresse par défaut
                        </label>
                    </div>
                    <button class="mt-10 px-3 w-fit flex font-semibold items-center py-2 bg-black text-white hover:bg-zinc-500 rounded"
                            type="submit">
                        Enregister
                    </button>
                </form>

            </div>
        </div>
    </main>
@endsection