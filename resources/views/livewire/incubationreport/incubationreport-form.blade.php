<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('incubationreport.labels.edit_form_title') }}
            @else
                {{ __('incubationreport.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="flex justify-center lg:justify-start">
                <label for="impregnation">{{ __('translations.attributes.impregnation') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="incubationreport.impregnation" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="eggTest">{{ __('translations.attributes.eggTest') }}</label>
            </div>
            <div class="">
                <x-datetime-picker without-time placeholder="{{ __('translations.enter') }}" wire:model="incubationreport.eggTest" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="incubationreport.remarks" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('incubationreport.index', ($editMode ? $incubationreport->incubationincubator_id : $incubationincubator)) }}" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>