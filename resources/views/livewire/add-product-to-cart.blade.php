<div class="pt-5">
    @if($alertMessage)
        <div class="border py-3 px-2 text-red-700 border-red-700 rounded bg-slate-100">
            {{$alertMessage}}
        </div>
    @endif
    <div class="grid grid-cols-4 gap-1 mt-4">
        @foreach($sizes as $size)
            <div   wire:click="selectSize({{$size}})"
                    class="flex border @if(!in_array($size->size, $availableSizes, true)) bg-zinc-50 text-zinc-300 @endif border-slate-300 rounded py-2 hover:border-black justify-center items-center text-lg">
                {{$size->size}}
            </div>
        @endforeach

    </div>
    <button @if($buttonDisabled) disabled @endif
    wire:click="addToCart"
            class="mt-10  px-3 py-3 text-lg text-white bg-black rounded-full hover:bg-zinc-500 @if($buttonDisabled) bg-zinc-500 @endif">
        Ajouter au panier
    </button>
</div>