<x-app-layout>
    <x-slot name="header">
        <h2 class="font-samibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.Breeding') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    <x-button primary label="{{ __('translations.actions.create')}}"
                        href="{{ route('breeding.create')}}"  class="justify-self-end" />
                </div>
                <livewire:breeding.breeding-table-view />
            </div>
        </div>
    </div>
</x-app-layout>
