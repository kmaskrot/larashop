<div class="flex w-full justify-center h-fit">
    <div class="bg-stone-200 size-28  rounded-full"></div>
    <div class=" flex justify-center font-semibold pl-4  flex-col">
        <div class="text-xl" >
            {{ $user->full_name }}
        </div>
        <div class=" text-stone-500">Membre Larashop depuis
            {{\Carbon\Carbon::create($user->created_at)->format('F Y')}}
        </div>
    </div>
</div>
<hr class=" w-1/3  mx-auto border-zinc-200">