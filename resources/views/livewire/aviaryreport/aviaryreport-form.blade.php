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
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="id_user">{{ __('translations.attributes.patroness') }}</label>
            </div>
            <div class="">
                <x-select
                name="aviaryreport.users"
                placeholder="{{ __('translations.select') }}"
                wire:model.defer="aviaryreport.id_user"
                :async-data="route('users.allOpen')"
                option-label="name"
                option-value="id"
            />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('aviaryreport.index', ($editMode ? $aviaryreport->aviaryplace_id : $aviaryplace)) }}" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>