<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/delete-card-modal.css'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- <a href="/profile" >  
            <img src="/assets/arrow-back.svg" alt="back" />
            </a>   -->
        <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-2 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a x-data="" href="/profile">
                            <img height="25px" width="25px" src="{{asset('assets/arrow-back.svg')}}" />
                        </a>
                        <h1 class="p-2">Card Information</h1>
                    </div>
                    <div class="flex justify-between">

                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-card-deletion')" type="submit" class="ml-2">
                            <img height="25px" width="25px" src="{{asset('assets/delete.svg')}}" />
                        </button>
                    </div>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.update-cardinfo-form')
                </div>
            </div>
        </div>

        <x-modal class="modal-box mt-10" name="confirm-card-deletion" focusable>
            <form method="post" action="{{route('cards.delete')}}" class="p-6">
                @csrf
                @method('delete')
                <input type="hidden" name="cardid" value="{{$card->uuid_column}}">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete your card?') }}
                </h2>

                <div class="mt-6 flex justify-center">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Card') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>


    </div>
</body>

</html>