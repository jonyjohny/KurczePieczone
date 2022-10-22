<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('breeding.labels.edit_form_title') }}
            @else
                {{ __('breeding.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('translations.attributes.name') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breeding.name" />
            </div>
            <div class="">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breeding.remarks" />
            </div>
            <div class="">
                <label for="closed">{{ __('translations.attributes.closed') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breeding.closed" />
            </div>
            <div class="">
                <label for="archived">{{ __('translations.attributes.archived') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breeding.archived" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('breeding.index') }}" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
