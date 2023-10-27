<x-app-layout>
@foreach ($content as $genre => $genreCollection)
<h3 class="font-weight-800 text-lg my-3 mx-1">{{ $genre }}</h3>
<div class="flex gap-4 overflow-x-scroll p-2">
@foreach ($genreCollection as $item)
    <div class="bg-white w-[200px] h-24 p-2 rounded overflow-hidden flex-none">
        {{ $item->title }}
    </div>
@endforeach
</div>
<br> 
@endforeach
</x-app-layout>
