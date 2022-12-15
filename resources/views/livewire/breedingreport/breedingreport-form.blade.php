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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="flex justify-center lg:justify-start">
                <label for="falls">{{ __('breedingreport.labels.falls') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.falls" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="selection">{{ __('breedingreport.labels.selection') }}</label>
            </div>
            <div class="">
                <x-inputs.number placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.selection" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="mainTemperature">{{ __('breedingreport.labels.mainTemperature') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.mainTemperature" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="hallTemperature">{{ __('breedingreport.labels.hallTemperature') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.hallTemperature" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="humidity">{{ __('breedingreport.labels.humidity') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.humidity" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="fodder">{{ __('breedingreport.labels.fodder') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.fodder" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="water">{{ __('breedingreport.labels.water') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.water" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="lighting">{{ __('breedingreport.labels.lighting') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.lighting" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="lightingRemarks">{{ __('breedingreport.labels.lightingRemarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.lightingRemarks" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="ventilation">{{ __('breedingreport.labels.ventilation') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.ventilation" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="animalsTaken">{{ __('breedingreport.labels.animalsTaken') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.animalsTaken" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="destination">{{ __('breedingreport.labels.destination') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.destination" />
            </div>
            <div class="flex justify-center lg:justify-start">
                <label for="remarks">{{ __('breedingreport.labels.remarks') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translations.enter') }}" wire:model="breedingreport.remarks" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button
                href="{{ route('breedingreport.index', $editMode ? $breedingreport->breedingplace_id : $breedingplace) }}"
                secondary class="mr-2" label="{{ __('translations.back') }}" />
            <x-button type="submit" primary label="{{ __('translations.save') }}" spinner />
        </div>
    </form>
</div>
