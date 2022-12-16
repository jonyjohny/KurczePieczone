<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.Incubationincubators') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="flex justify-end pt-2">
                    <div class="px-2">
                        <x-button dark label="{{ __('translations.actions.back') }}"
                            href="{{ route('incubations.index') }}" />
                    </div>
                    <div class="px-2">
                        <x-button primary label="{{ __('translations.actions.create') }}"
                            href="{{ route('incubationincubators.create', [$incubation]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button green label="{{ __('translations.actions.report') }}"
                            href="{{ route('incubationincubators.index', [$incubation]) }}" />
                    </div>
                    <div class="px-2">
                        <x-button rose label="{{ __('translations.actions.chart') }}"
                            href="{{ route('incubationincubators.index', [$incubation]) }}" />
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <livewire:incubationincubators.incubationincubators-table-view />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
