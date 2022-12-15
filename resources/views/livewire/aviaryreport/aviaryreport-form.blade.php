<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('aviaryreport.labels.edit_form_title') }}
            @else
                {{ __('aviaryreport.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="flex justify-center lg:justify-start">
                <label for="feeding">{{ __('aviaryreport.labels.feeding') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.feeding" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="cure">{{ __('aviaryreport.labels.cure') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.cure" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="hensExport">{{ __('aviaryreport.labels.hensExport') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.hensExport" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="roostersExport">{{ __('aviaryreport.labels.roostersExport') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.roostersExport" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="destination">{{ __('aviaryreport.labels.destination') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.destination" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="hensFalls">{{ __('aviaryreport.labels.hensFalls') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.hensFalls" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="roostersFalls">{{ __('aviaryreport.labels.roostersFalls') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.roostersFalls" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="remarksFalls">{{ __('aviaryreport.labels.remarksFalls') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.remarksFalls" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="remarks">{{ __('aviaryreport.labels.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryreport.remarks" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button
                href="{{ route('aviaryreport.index', $editMode ? $aviaryreport->aviaryplace_id : $aviaryplace) }}"
                secondary class="mr-2" label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
