@if ($searchBy)
  @component('laravel-views::components.form.input-group', [
    'placeholder' => __('search.search_placeholder'),
    'model' => 'search',
    'onClick' => 'clearSearch',
    'icon' => $search ? 'x-circle' : 'search',
    ])
  @endcomponent
@endif
