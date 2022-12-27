<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translations.navigation.Chart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="flex justify-end pt-2">
                    <div class="px-2">
                        <x-button dark label="{{ __('translations.actions.back') }}"
                            href="{{ route('reproductionrows.index', [$reproduction]) }}" />
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <div class="px-12 mt-5 mb-10">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">
                                <tr>
                                    <th class="border-r text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                                    @for ($i = 1; $i <= $cages; $i++)
                                        <th class="border-r border-l text-sm font-medium text-gray-900 px-6 py-4 text-left last:border-r-0">
                                            {{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reproductionrows as $reproductionrow)
                                    <tr class="border-b text-center">
                                        <td class="px-2 py-1 whitespace-nowrap text-sm font-medium text-left text-gray-900">
                                            {{ $reproductionrow->name }}</td>
                                        @for ($i = 1; $i <= $reproductionrow->cages; $i++)
                                            <td class="border px-2 py-1 whitespace-nowrap text-sm font-medium text-gray-900">
                                                test</th>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
