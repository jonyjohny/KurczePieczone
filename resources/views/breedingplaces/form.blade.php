<x-app-layout>
    <x-slot name="header">
        <h2 class="font-samibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.Breedingplace') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($breedingplace))
                    <livewire:breedingplaces.breedingplace-form :breedingplace="$breedingplace" :editMode="true" />
                @else
                    <livewire:breedingplaces.breedingplace-form :breeding="$breeding" :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
