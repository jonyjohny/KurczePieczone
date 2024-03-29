<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.Aviaryplaces') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="flex justify-end pt-2">
                    <div class="px-2">
                        <x-button dark label="{{ __('translations.actions.back') }}"
                            href="{{ route('aviaries.index') }}?&filters[active-filter]=0" />
                    </div>
                    <div class="px-2">
                        <x-button primary label="{{ __('translations.actions.create') }}"
                            href="{{ route('aviaryplaces.create', [$aviary]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button green label="{{ __('translations.actions.report') }}"
                            href="{{ route('aviaryreport.report', [$aviary]) }}" />
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <livewire:aviaryplaces.aviaryplaces-table-view />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
