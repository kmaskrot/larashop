<nav class="bg-stone-100 h-10 items-center flex justify-end">
    <div class="flex space-x-3 container mx-auto text-xs justify-end  items-center">
        <a class="font-bold hover:text-zinc-500">Trouver un magasin</a>
        <div>|</div>
        <a class="font-bold hover:text-zinc-500">Aide</a>
        <div>|</div>

        @if(\Illuminate\Support\Facades\Auth::user())
            <a href="{{route('user.detail', ['user'=> \Illuminate\Support\Facades\Auth::user()])}}" class="flex items-center space-x-3  hover:text-zinc-500">
                <div class="font-bold">Bonjour Karim</div>
                <svg aria-hidden="true" class="icon-btn" focusable="false" viewBox="0 0 24 24" role="img" width="24px"
                     height="24px" fill="none" aria-label="Profile">
                    <path stroke="currentColor" stroke-width="2"
                          d="M3.75 21v-3a3.75 3.75 0 013.75-3.75h9A3.75 3.75 0 0120.25 18v3m-4.5-13.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path>
                </svg>
            </a>
        @else
            <a href="{{route('auth.lookup')}}" class="font-bold  hover:text-zinc-500">Rejoins-nous</a>
            <div>|</div>
            <a href="{{route('auth.lookup')}}" class="font-bold  hover:text-zinc-500">S'identifier</a>
        @endif

    </div>
</nav>

<header class="container mx-auto  grid grid-rows-1 grid-cols-4 grid-flow-col">
    <a href="{{route('home')}}">
        <img class="size-16 "
             src="{{Vite::asset('resources/assets/logo.svg')}}"
             alt="running logo">
    </a>
    <nav class="flex  col-span-2 justify-center text-center">
        <ul class="flex pt-2 space-x-3 font-semibold items-center text-lg">
            <li class="hover:border-b">Nouveau en ce moment</li>
            <li class="hover:border-b">
                <a href="{{route('products.categories', ['category' => 'men'])}}">Homme</a>
            </li>
            <li class="hover:border-b">
                <a href="{{route('products.categories', ['category' => 'women'])}}">Femme</a>
            </li>
            <li class="hover:border-b">
                <a href="{{route('products.categories', ['category' => 'kids'])}}">Enfant</a>
            </li>

            <li class="hover:border-b">Offres</li>
        </ul>
    </nav>
    <div class="flex  justify-end space-x-3 items-center">

        @livewire("search")
        @livewire("cart")

{{--        <svg class="border" aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">--}}
{{--            <path stroke="currentColor" stroke-width="1.5"--}}
{{--                  d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5"></path>--}}
{{--        </svg>--}}

    </div>
</header>