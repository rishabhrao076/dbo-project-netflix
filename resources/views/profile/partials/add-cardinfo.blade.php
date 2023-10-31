<section>

    <form method="post" action="{{ route('cards.add') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Card Holder Name')" />
            <x-text-input id="name" name="name" type="name" class="mt-1 block w-full" 
                required />
        </div>
        <div>
            <x-input-label for="number" :value="__('Card Number')" />
            <x-text-input id="number" name="number" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" class="mt-1 block w-full"
                 required />
        </div>
        <div class="flex">
            <div class="block w-6/12">
                <x-input-label for="cvv" :value="__('Card CVV')" />
                <x-text-input id="cvv" name="cvv" type="cvv" class="mt-1 block w-6/12" 
                    required />
            </div>
            <div class="block w-6/12">
                <x-input-label for="expiry" :value="__('Card expiry')" />
                <x-text-input id="expiry" name="expiry" pa type="date" class="mt-1 block w-6/12"
                     required />
            </div>
        </div>
        <div>
            <button type="submit" class="p-2 bg-green-600 text-white rounded">Save Changes</button>
    </form>
</section>