<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('reproductionrowcages.labels.edit_form_title') }}
            @else
                {{ __('reproductionrowcages.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="flex justify-center lg:justify-start">
                <label for="number">{{ __('reproductionrowcages.labels.number') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}" wire:model="reproductionrowcage.number" />
            </div>
              <div class="flex justify-center lg:justify-start">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="reproductionrowcage.remarks" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button
                href="{{ route('reproductionrowcages.index', $editMode ? $reproductionrowcage->reproductionrow_id : $reproductionrow) }}"
                secondary class="mr-2" label="{{ __('translations.navigation.Cages') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
