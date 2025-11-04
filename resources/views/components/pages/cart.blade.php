@extends('components.layouts.base', ['title' => 'Panier'])

@section('content')
    @include('components.products.carousel')
{{--    @dump($products)--}}
    <main class="h-fit w-full">

        @livewire('cart-management')
    </main>
@endsection