<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('reproductionreport.labels.edit_form_title') }}
            @else
                {{ __('reproductionreport.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="flex justify-center lg:justify-start">
                <label for="nicHens">{{ __('reproductionreport.labels.nicHens') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}" wire:model="reproductionreport.nicHens" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="nicRoosters">{{ __('reproductionreport.labels.nicRoosters') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.nicRoosters" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="cannibalismHens">{{ __('reproductionreport.labels.cannibalismHens') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.cannibalismHens" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="cannibalismRoosters">{{ __('reproductionreport.labels.cannibalismRoosters') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.cannibalismRoosters" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="debilityHens">{{ __('reproductionreport.labels.debilityHens') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.debilityHens" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="debilityRoosters">{{ __('reproductionreport.labels.debilityRoosters') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.debilityRoosters" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="otherHens">{{ __('reproductionreport.labels.otherHens') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.otherHens" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="otherRoosters">{{ __('reproductionreport.labels.otherRoosters') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.otherRoosters" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="fallsRemarks">{{ __('reproductionreport.labels.fallsRemarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="reproductionreport.fallsRemarks" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="goodEggs">{{ __('reproductionreport.labels.goodEggs') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.goodEggs" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="badEggs">{{ __('reproductionreport.labels.badEggs') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.badEggs" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="exportEggs">{{ __('reproductionreport.labels.exportEggs') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}"
                    wire:model="reproductionreport.exportEggs" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="prevention">{{ __('reproductionreport.labels.prevention') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="reproductionreport.prevention" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="reproductionreport.remarks" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('reproductionrows.index', $reproductionrow->id_reproduction) }}" secondary
                class="mr-2" label="{{ __('translations.rows') }}" />
            <x-button
                href="{{ route('reproductionreport.index', $editMode ? $reproductionreport->reproductionrow_id : $reproductionrow) }}"
                secondary class="mr-2" label="{{ __('translations.reports') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
