<x-app-layout>
@foreach ($content as $genre => $genreCollection)
<h3 class="font-weight-800 text-lg my-3 mx-1">{{ $genre }}</h3>
<div class="flex gap-4 overflow-x-scroll p-2">
@foreach ($genreCollection as $item)
    <div class="bg-white w-[200px] h-24 p-2 rounded overflow-hidden flex-none" x-data="" x-on:click="$dispatch('open-modal', 'content-metadata'); getMetadata({{$item->content_id}})">
        {{ $item->title }}
    </div>
@endforeach
</div>
<br> 
@endforeach
<x-modal name="content-metadata" :show="$errors->userDeletion->isNotEmpty()">
    <div class="p-6">

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Movie Title
        </h2>
  
    </div>
</x-modal>
<x-slot:scripts>
    <script>
        function getMetadata(contentId) {
        // Make an Ajax request using Axios
        axios.get('{{route("content.metadata")}}',{
            params: {
                contentId: contentId,
            }
        })
        .then(response => {
            // Set the data to a variable accessible in the component
            console.log(response);
            alert(response);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }
    </script> 
</x-slot>
</x-app-layout>
