<x-app-layout>
    <x-slot name="header">
        <h2 class="font-samibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.BreedingReport') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($breedingreport))
                    <livewire:breedingreport.breedingreport-form :breedingreport="$breedingreport" :editMode="true" />
                @else
                    <livewire:breedingreport.breedingreport-form :breedingplace="$breedingplace" :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
