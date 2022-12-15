<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.BreedingReport') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="flex justify-end pt-2">
                    <div class="px-2">
                        <x-button dark label="{{ __('translations.actions.back') }}"
                            href="{{ route('breedingplaces.index', [$breedingplace->id_breeding]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button primary label="{{ __('translations.actions.create') }}"
                            href="{{ route('breedingreport.create', [$breedingplace]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button green label="{{ __('translations.actions.report') }}"
                            href="{{ route('breedingplaces.index', [$breedingplace->id_breeding]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button rose label="{{ __('translations.actions.chart') }}"
                            href="{{ route('breedingplaces.index', [$breedingplace->id_breeding]) }}" />
                    </div>
                </div>
                <livewire:breedingreport.breedingreport-table-view />
            </div>
        </div>
    </div>
</x-app-layout>
