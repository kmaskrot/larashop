@extends('components.layouts.core', ['title' => 'Make your life Easier'])

@section('content')

    <main class="border-5  flex flex-col items-center h-dvh">
        <section class="w-1/3  pt-28">
            <h1 class="text-3xl">
                Quel est ton mot de passe ?
            </h1>


            <form method="POST" action="{{route('auth.login.post')}}" class=" pt-10">
                @csrf
                @if (session('email'))
                    <small class="text-stone-500 text-base  font-medium">
                        {{ session('email')[0] ?? ''}}
                    </small>
                @endif

                @if (session('status'))
                    <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-green-300 text-green-600 font-medium">
                        {{session('status')}}
                    </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-red-300 text-red-600 font-medium">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <input type="password" name="password" class="rounded-lg outline-none mt-3 py-3 border-stone-700 w-full"
                       placeholder="Mot de passe*">

                <a href="{{route('password.email.send', ['email' => session('email')[0] ?? ''])}}" class="underline font-medium my-5 block text-stone-500">
                    mot de passe oublié ?
                </a>
                <button
                        class="float-right w-fit text-center px-5 py-2.5 bg-black text-white hover:bg-zinc-700 rounded-full"
                        type="submit">
                    Continuer
                </button>
            </form>
        </section>


    </main>

@endsection