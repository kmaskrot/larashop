@extends('components.layouts.base', ['title' => 'Products List'])

@section('content')
    @include('components.products.carousel')


    <main class="w-full h-fit">
        @livewire('product-list', [
        'category' => $category,
        'collection' => $collection,
         'searchQuery' => $searchQuery,
          ])
</main>

@endsection