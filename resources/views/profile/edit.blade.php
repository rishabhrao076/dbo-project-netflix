<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1><b> Membership and Billing</b> </h1>
                    <p class="mt-1 block w-full" >{{$user->email}}   </p>
                    @if (count($cards)>0)                    

                    <div style="display:flex; overflow-x:scroll; width:100%"  >
                    @foreach ($cards as $card)
                    <a href="{{route('cards',['cardid'=>$card->uuid_column])}}">
                    <div  style="width: 300px; height: 150px;" class="p-4 bg-bg-gray-800 shadow border sm:rounded-lg mr-2 mb-2">
                        <span class="text-xs">CARD NUMBER</span>
                        <h1>xxxx xxxx xxxx  {{substr($card->card_number, 12,4)}}</h1>
                        
                        <h1 class="mt-2 mr-2 text-lg">{{$card->name}}</h1>
                        <span class="text-xs">EXPIRY</span>
                        <h1>{{date_format(date_create($card->expiry), "m/y")}}</h1>
                        
                    </div>
                    </a>                   
                    @endforeach
                    <div style="width: 100px; height:150px" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-card-deletion')" type="submit" class="mt-2">
                            <img height="25px" width="25px" src="{{asset('assets/add-icon.svg')}}" />
                            <h1>Add Card</h1>
                    </button>
                    </div>
                    </div>
                    @else
                    <p>No cards added</p>
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-card-deletion')" type="submit" class="mt-2">
                            <img height="25px" width="25px" src="{{asset('assets/add-icon.svg')}}" />
                            <h1>Add Card</h1>
                        </button>
                    <!-- <a href="{{route('cards')}}"> -->
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <x-modal class="modal-box mt-10" name="confirm-card-deletion" focusable>
                
            <div class="p-8">
            <h1>Add Card</h1>
                    @include('profile.partials.add-cardinfo')
            </div>
        </x-modal>

          
        </div>
    </div>
</x-app-layout>
