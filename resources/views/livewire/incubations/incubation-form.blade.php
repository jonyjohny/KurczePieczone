<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('incubations.labels.edit_form_title') }}
            @else
                {{ __('incubations.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('translations.attributes.name') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="incubation.name" />
            </div>
            <div class="">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="incubation.remarks" />
            </div>
            @can('archive', $incubation)
            <div class="">
                <label for="closed">{{ __('translations.attributes.closed') }}</label>
            </div>
            <div class="">
                <x-toggle lg wire:model.defer="incubation.closed"/>
            </div>
            <div class="">
                <label for="archived">{{ __('translations.attributes.archived') }}</label>
            </div>
            <div class="">
                <x-toggle lg wire:model.defer="incubation.archived"/>
            </div>
            @endcan
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('incubations.index') }}?&filters[active-filter]=0" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
