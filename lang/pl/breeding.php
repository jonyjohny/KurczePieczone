<?php

return [
    'labels' => [
        'edit_form_title' => 'Edycja stada do odchowu',
        'create_form_title' => 'Tworzenie nowego stada do odchowu',
    ],
    'messages' => [ 
        'successes' => [ 
            'stored' => 'Dodano stado :name',
            'updated' => 'Zaktualizowano stado :name',
            'destroy' => 'Usunięto stado :name',
            'update_title' => 'Zaktualizowano stado',
            'stored_title' => 'Utworzono stado',
            'restore' => 'Przywrócono stado :name',
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Czy chcesz usunać stado?',
            'description' => 'Czy chcesz usunać stado :name?',
        ],
        'restore' => [
            'title' => 'Czy chcesz przywrócić stado?',
            'description' => 'Czy chcesz przywrócić stado :name?',
        ],
    ],
];