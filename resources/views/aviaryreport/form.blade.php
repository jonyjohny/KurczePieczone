<x-app-layout>
    <x-slot name="header">
        <h2 class="font-samibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.AviaryReport') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($aviaryreport))
                    <livewire:aviaryreport.aviaryreport-form :aviaryreport="$aviaryreport" :editMode="true" />
                @else
                    <livewire:aviaryreport.aviaryreport-form :aviaryplace="$aviaryplace" :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
