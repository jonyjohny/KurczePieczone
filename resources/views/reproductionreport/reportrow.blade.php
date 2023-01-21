<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.ReproductionReportsRow') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="flex justify-end pt-2">
                    <div class="px-2">
                        <x-button dark label="{{ __('translations.actions.back') }}"
                            href="{{ route('reproductionrowcages.index', [$reproductionrow]) }}" />
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <livewire:reproductionreport.reproductionreportrowall-table-view />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
