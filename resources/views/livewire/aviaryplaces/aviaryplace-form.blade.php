<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('aviaryplaces.labels.edit_form_title') }}
            @else
                {{ __('aviaryplaces.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('translations.attributes.name') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryplace.name" />
            </div>
            <div class="">
                <label for="remarks">{{ __('translations.attributes.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="aviaryplace.remarks" />
            </div>
            <div class="">
                <label for="id_user">{{ __('translations.attributes.patroness') }}</label>
            </div>
            <div class="">
                <x-select
                name="aviaryplace.users"
                placeholder="{{ __('translations.select') }}"
                wire:model.defer="aviaryplace.id_user"
                :async-data="route('users.allOpen')"
                option-label="name"
                option-value="id"
            />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('aviaryplaces.index', ($editMode ? $aviaryplace->id_aviary : $aviary)) }}" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>