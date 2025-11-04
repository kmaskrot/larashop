@extends('components.layouts.core', ['title' => 'Welcome ! Member Access'])

@section('content')
    <main class="flex flex-col pt-10 items-center h-dvh">
        <div class=" w-1/4 h-fit ">
            <img class="size-16  p-1 rounded-full bg-zinc-200" src="{{Vite::asset('resources/assets/logo.svg')}}" alt="">
            <h1 class="text-3xl">
                Faisons de toi un membre Larashop.
            </h1>
            <small class=" text-base/8 font-medium  text-left">Nous avons envoyé un code à <br>
                @if (session('email'))
                      <span>  {{ session('email')[0] ?? ''}}</span>
                @endif
                <a class="text-zinc-500 underline " href="{{route('auth.lookup')}}">Modifier</a>
            </small>
{{--            @if (session('email'))--}}
{{--                <small class="text-stone-500 text-base  font-medium">--}}
{{--                    {{ session('email')[0] ?? ''}}--}}
{{--                </small>--}}
{{--            @endif--}}
            <form method="POST" action="{{route('auth.register.post')}}" class="pt-7 space-y-6">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-red-300 text-red-600 font-medium">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                @csrf

                <input type="text" name="code" class="rounded-lg outline-none py-3 border-stone-700 w-full" placeholder="Code*">
                <div class="flex justify-between space-x-3">
                    <input type="text" name="firstname" class="rounded-lg outline-none py-3 border-stone-700 w-full" placeholder="prénom*" >
                    <input type="text" name="lastname" class="rounded-lg outline-none py-3 border-stone-700 w-full" placeholder="nom*" >
                </div>
                <input type="password" name="password" class="rounded-lg outline-none py-3 border-stone-700 w-full" placeholder="Mot de passe*" >
                <input type="password" name="password_confirmation" class="rounded-lg outline-none py-3 border-stone-700 w-full" placeholder="Confirmation*" >
                <div class="flex justify-between space-x-3">
                    <input type="number" name="day" class="rounded-lg outline-none py-3 border-stone-700 w-full" min="1" max="31" placeholder="Jour*" >
                    <input type="number" name="month" class="rounded-lg outline-none py-3 border-stone-700 w-full"  min="1" max="12" placeholder="Mois*" >
                    <input type="number" name="year" class="rounded-lg outline-none py-3 border-stone-700 w-full" min="1950" max="{{date('Y')}}" placeholder="Année*">
                </div>
                <div class="flex justify-between items-center space-x-3">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter" class="font-medium">
                        Inscris-toi pour recevoir par e-mail les dernières infos sur les produits et offres de Nike, et et sur tes avantages membre.
                    </label>
                </div>

                <div class="flex justify-between items-center space-x-3">
                    <input type="checkbox" id="general_terms" name="general_terms">
                    <label for="general_terms" class=" font-medium">
                        J'accepte les conditions d'utilisation et je confirme avoir lu la politique de confidentialité de Larashop.
                    </label>
                </div>
                <button class="border float-right text-right px-5 py-2.5 bg-black text-white hover:bg-zinc-700 rounded-full" type="submit">Continuer</button>
            </form>
        </div>

    </main>


@endsection