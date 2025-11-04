<a href="{{route('cart')}}" class="relative hover:bg-stone-200  overflow-hidden  rounded-full size-9 flex justify-end items-center" >
        <svg class=" p-0.5 size-full" aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
            <path stroke="currentColor" stroke-width="1.3"
                  d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5"></path>
        </svg>

    @if($cart)
    <div class=" w-full  text-center mt-1 text-[10px]  absolute">{{ array_sum($cart) > 9 ?  '9+' : array_sum($cart)}}</div>
    @endif
</a>
