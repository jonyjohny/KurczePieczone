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
                                        <th
                                            class="border-r border-l text-sm font-medium text-gray-900 px-6 py-4 text-center last:border-r-0">
                                            {{ $i }}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reproductionrows as $reproductionrow)
                                    <tr class="border-b text-center">
                                        <td
                                            class="px-2 py-1 whitespace-nowrap text-sm font-medium text-left text-gray-900">
                                            {{ $reproductionrow->name }}</td>
                                        @foreach ($reproductionrow->reproductionrowcage as $cage)
                                            <td
                                                class="border px-2 py-1 whitespace-nowrap text-sm font-medium text-gray-900">
                                                @php
                                                    $hens = 0;
                                                    $nicHens = 0;
                                                    $cannibalismHens = 0;
                                                    $debilityHens = 0;
                                                    $otherHens = 0;
                                                    $roosters = 0;
                                                    $nicRoosters = 0;
                                                    $cannibalismRoosters = 0;
                                                    $debilityRoosters = 0;
                                                    $otherRoosters = 0;
                                                    foreach ($cage->reproductionreport as $report) {
                                                        $hens += $report->nicHens + $report->cannibalismHens + $report->debilityHens + $report->otherHens;
                                                        $roosters = $report->nicRoosters + $report->cannibalismRoosters + $report->debilityRoosters + $report->otherRoosters;
                                                        $nicHens += $report->nicHens;
                                                        $cannibalismHens += $report->cannibalismHens;
                                                        $debilityHens += $report->debilityHens;
                                                        $otherHens += $report->otherHens;
                                                        $nicRoosters += $report->nicRoosters;
                                                        $cannibalismRoosters += $report->cannibalismRoosters;
                                                        $debilityRoosters += $report->debilityRoosters;
                                                        $otherRoosters += $report->otherRoosters;
                                                    }
                                                @endphp
                                                <div class="flex justify-between mx-2">
                                                    <div class="text-red-700"><abbr
                                                            title="Kury-> Nicowanie: {{ $nicHens }}, Kanibalizm: {{ $cannibalismHens }}, Wycieńczenie: {{ $debilityHens }}, Inne: {{ $otherHens }}">{{ $hens }}</abbr>
                                                    </div>
                                                    <div class="text-sky-600"><abbr
                                                            title="Koguty-> Nicowanie: {{ $nicRoosters }}, Kanibalizm: {{ $cannibalismRoosters }}, Wycieńczenie: {{ $debilityRoosters }}, Inne: {{ $otherRoosters }}">{{ $roosters }}</abbr>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
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
