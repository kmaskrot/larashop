@extends('components.layouts.core', ['title' => 'Make your life Easier'])

@section('content')
    <main class="  flex flex-col pt-10 items-center  h-dvh">
        <div class=" w-1/4 h-fit ">
            <img class="size-16  p-1 rounded-full bg-zinc-200" src="{{Vite::asset('resources/assets/logo.svg')}}"
                 alt="">
            <h1 class="text-3xl">
                Saisis ton adresse e-mail pour nous rejoindre ou te connecter.
            </h1>
            <form method="POST" action="{{route('auth.lookup.post')}}" class="pt-16">
                @csrf
                <input type="email" name="email" class="rounded-lg outline-none py-3 border-stone-700 w-full"
                       placeholder="Email*" required>

                <div class="font-medium my-10 text-stone-500">
                    En continuant, tu acceptes les conditions d'utilisation et tu confirmes avoir lu la politique de
                    confidentialité de Nike.
                </div>
                <button class="border float-right text-right px-5 py-2.5 bg-black text-white hover:bg-zinc-700 rounded-full"
                        type="submit">Continuer
                </button>
            </form>
        </div>
    </main>

@endsection