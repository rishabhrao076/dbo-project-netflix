<x-app-layout>
@foreach ($content as $genre => $genreCollection)
<h3 class="font-extrabold text-lg my-3 mx-1">{{ $genre }}</h3>
<div class="flex gap-4 overflow-x-scroll p-2">
@foreach ($genreCollection as $item)
    <div class="bg-white w-[200px] h-24 p-2 rounded overflow-hidden flex-none text-center" x-data="" x-on:click="$dispatch('open-modal', 'content-metadata'); $store.contentStore.getData({{$item->content_id}})">
        {{ $item->title }}
    </div>
@endforeach
</div>
<br> 
@endforeach
<x-modal name="content-metadata">
    <div class="p-6">
        <div class="grid grid-cols-2">
            <h2 class="text-2xl text-gray-900 dark:text-gray-100 col-span-2 mb-4" x-text="$store.contentStore.title">
                Movie Title
            </h2>
            <div class="text-medium col-span-1" x-text="$store.contentStore.description">
                Description
            </div>
            <div class="text-medium col-span-1 flex flex-col">
                <div>
                    <span class="font-bold">Director:</span><span x-text="$store.contentStore.director" ></span>
                </div>
                <div>
                    <span class="font-bold">Genre:</span><span x-text="$store.contentStore.genre"></span>
                </div>
                <div>
                    <span class="font-bold">Languages:</span><span x-text="$store.contentStore.language"></span>
                </div>
            </div>
            <div class="col-span-2 mb-4 flex flex-col">
                <h2 class="text-xl font-bold">Episodes</h2>
                <template x-for="media in $store.contentStore.medias" :key="media.media_id">
                    <div class="p-4 shadow-md">
                        <span class="text-xl font-bold" x-text="media.media_title"></span>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-modal>
@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('contentStore', {
            title: 'testing',
            description: '',
            director: '',
            genre: '',
            language: '',
            medias: {},
            getData(contentId) {
                // Make an Ajax request using Axios
                axios.get('{{route("content.metadata")}}',{
                    params: {
                        contentId: contentId,
                    }
                })
                .then(response => {
                    // Set the data to a variable accessible in the component
                    console.log(response);
                    this.title = response.data[0].title;
                    this.director = response.data[0].director;
                    this.description = response.data[0].description;
                    this.genre = response.data[0].genres;
                    this.language = response.data[0].languages;
                    this.medias = response.data;

                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
            }
        })
    });
</script> 
@endpush
</x-app-layout>
