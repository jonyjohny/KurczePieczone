<?php

return [
    'menu' => [
        'dictionaries' => 'Słowniki',
        'administration' => 'Administracja',
        'users' => 'Użytkownicy',
        'log-viewer' => 'Logi',
        'profile' => 'Profil',
        'settings' => 'Ustawienia'
    ],
    'labels' => [
        'select2-placeholder' => 'Wybierz opcję'
    ],
    'buttons' => [
        'cancel' => 'Anuluj',
        'store' => 'Dodaj',
        'update' => 'Aktualizuj',
        'yes' => 'Tak',
        'no' => 'Nie',
        'close' => 'Zamknij'
    ],
    'attribute' => [
        'created_at' => 'utworzono',
        'updated_at' => 'zaktualizowano',
        'deleted_at' => 'usunięto'
    ],
    'manufacturers' => [
        'title' => 'Producenci',
        'attribute' => [
            'name' => 'nazwa',
            'address' => 'adres'
        ]
    ],
    'customers' => [
        'title' => 'Klienci',
        'labels' => [
            'create' => 'Dodanie nowego klienta',
            'edit' => 'Edycja danych klienta',
            'destroy' => 'Usunięcie klienta',
            'destroy-question' => 'Czy na pewno usunąć klienta :name?',
            'restore' => 'Anulowanie usunięcia klienta',
            'restore-question' => 'Czy anulować usunięcie klienta :name?'
        ],
        'attribute' => [
            'name' => 'nazwa',
            'address' => 'adres',
            'email' => 'mail',
            'telephone' => 'telefon'
        ],
        'flashes' => [
            'success' => [
                'stored' => 'Dodano klienta :name',
                'updated' => 'Zaktualizowano klienta :name',
                'nothing-changed' => 'Dane klienta :name nie zmieniły się',
                'destroy' => 'Klient :name została usunięty',
                'restore' => 'Usunięcie klienta :name zostało anulowane'
            ]
        ]
        ],
    'categories' => [
        'title' => 'Kategorie',
        'attribute' => [
            'name' => 'nazwa',
            'count_products' => 'ilość produktów'
        ]
        ],
    'polls' => [
        'title' => 'Ankiety',
        'labels' => [
            'create' => 'Dodanie nowej ankiety',
            'edit' => 'Edycja danych ankiety',
            'open' => 'Udziel odpowiedzi',
            'editopen' => 'Zmień odpowiedzi',
            'value' => 'Sprawdz odpowiedzi',
            'destroy' => 'Usunięcie ankiety',
            'destroy-question' => 'Czy na pewno usunąć ankietę :name?',
            'restore' => 'Anulowanie usunięcia ankiety',
            'restore-question' => 'Czy anulować usunięcie ankiety :name?'
        ],
        'attribute' => [
            'description' => 'Opis',
            'type' => 'Typ',
            'customerid' => 'Klient',
            'customerdata' => 'Wybierz Klienta',
            'question' => 'pytanie',
            'answer' => 'ilość odpowiedzi',
            'questions' => "Pytania",
            'questionsdata' => "Wybierz pytania"
        ],
        'flashes' => [
            'success' => [
                'stored' => 'Dodano ankiete :name',
                'updated' => 'Zaktualizowano ankietę :name',
                'nothing-changed' => 'Dane ankiety :name nie zmieniły się',
                'destroy' => 'Ankieta :name została usunięty',
                'restore' => 'Usunięcie ankiety :name zostało anulowane',
                'answers-poll' => 'Przesłano odpowiedzi ankiety :name'
            ]
        ]
    ]
];
