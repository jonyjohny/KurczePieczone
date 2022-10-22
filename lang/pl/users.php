<?php

return [
    'attributes' => [
        'name' => 'Imię i nazwisko',
        'email' => 'Email',
        'roles' => 'Role',
        'password' => 'Hasło',
        'email_verified_at' => 'Weryfikacja'
    ],
    'labels' => [
        'edit_form_title' => 'Edycja użytkownika',
        'create_form_title' => 'Tworzenie nowego użytkownika',
    ],
    'messages' => [ 
        'successes' => [ 
            'stored' => 'Dodano użytkownika :name',
            'updated' => 'Zaktualizowano użytkownika :name',
            'destroy' => 'Usunięto użytkownika :name',
            'update_title' => 'Zaktualizowano użytkownika',
            'stored_title' => 'Utworzono użytkownika',
            'restore' => 'Przywrócono użytkownika :name',
        ],
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Czy chcesz usunać użytkownika?',
            'description' => 'Czy chcesz usunać użytkownika :name?',
        ],
        'restore' => [
            'title' => 'Czy chcesz przywrócić użytkownika?',
            'description' => 'Czy chcesz przywrócić użytkownika :name?',
        ],
    ],
];