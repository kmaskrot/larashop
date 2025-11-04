@extends('components.layouts.core', ['title' => 'Make your life Easier'])

@section('content')
    <main class="border-5  flex flex-col items-center h-dvh">
        <section class="w-1/3 pt-28">
            <h1 class="text-3xl">
                Quel est ton nouveau mot de passe ?
            </h1>


            <form method="POST" action="{{route('password.update')}}" class=" pt-10">
                <input type="hidden" name="token" value="{{request('token')}}">
                <input type="hidden" name="email" value="{{request('email')}}">
                @csrf
                    <small class="text-stone-500 text-base  font-medium">
                        {{request('email')}}
                    </small>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="bg-zinc-50 my-5 p-3 rounded-xl border border-red-300 text-red-600 font-medium">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <input type="password" name="password" class="placeholder:text-zinc-500 rounded-lg outline-none my-3 py-3 border-stone-700 w-full"
                       placeholder="Mot de passe*">

                <input type="password" name="password_confirmation" class="placeholder:text-zinc-500 rounded-lg outline-none my-3 py-3 border-stone-700 w-full"
                       placeholder="Confirmation*">


                <button
                        class="float-right mt-5 w-fit text-center px-5 py-2.5 bg-black text-white hover:bg-zinc-700 rounded-full"
                        type="submit">
                    Continuer
                </button>
            </form>
        </section>
    </main>
@endsection