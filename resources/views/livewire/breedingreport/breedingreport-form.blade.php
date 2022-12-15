<div class='p-2'>
    <form wire:submit.prevent="save">
        <h3 class="text-x1 font-semibold leading-tight text-gray-80e">
            @if ($editMode)
                {{ __('breedingreport.labels.edit_form_title') }}
            @else
                {{ __('breedingreport.labels.create_form_title') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="id_user">{{ __('translations.attributes.patroness') }}</label>
            </div>
            <div class="">
                <x-select
                name="breedingreport.users"
                placeholder="{{ __('translations.select') }}"
                wire:model.defer="breedingreport.id_user"
                :async-data="route('users.allOpen')"
                option-label="name"
                option-value="id"
            />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('breedingreport.index', ($editMode ? $breedingreport->breedingplace_id : $breedingplace)) }}" secondary class="mr-2"
                label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>