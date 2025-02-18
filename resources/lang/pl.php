<?php

declare(strict_types=1);

namespace Resources\lang;

return [
    //admin

    'dashboardAdmin' => [
        'title' => 'Panel administracyjny',

        'stats1' => 'Ilość operatorów',
        'stats2' => 'Liczba zapytań do bazy',
        'stats3' => 'Liczba aktywnych i zablokowanych operatorów',
        'stats4' => 'Nieaktywni użytkownicy',
        'stats5' => 'Błędne próby logowania',
        'stats6' => 'Wiadomości email (7 dni)',
    ],

    'loginAdmin' => [
        
    ],

    'managementAdmin' => [
        'title' => 'Administratorzy',

        'table1' => 'Imię',
        'table2' => 'Nazwisko',
        'table3' => 'Login',
        'table4' => 'Telefon',
        'table5' => 'Email',
        'table6' => 'Status',
        'table7' => 'Ostatnie Logowanie',
        'table8' => 'Uprawnienia',
        'table9' => 'Opcje',

        'modalEditTitle' => 'Edycja konta',
        'modalEdit1' => 'Login',
        'modalEdit2' => 'Imię',
        'modalEdit3' => 'Nazwisko',
        'modalEdit4' => 'Nume telefonu',
        'modalEdit5' => 'Adres email',
        'modalEdit6' => 'Status Konta',

        'modalEdit7' => 'Blokada',
        'modalEdit8' => 'Aktywny',

        'modalLockTitle' => 'Status konta',
        'modalLock1' => 'Błędne próby logowania',
        'modalLock2' => 'Odblokuj konto',
        'modalLock3' => 'Zmień hasło',
        'modalLock4' => 'Nowe hasło:',
        'modalLock5' => 'Powtórz hasło:',

        'modalDelTitle' => 'Usuń konto',
        'modalInfo' => '! Konto zostanie trwale usunięte, czy chcesz potwierdzić !',

        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',

    ],

    'managementOperator' => [
        'title' => 'Operatorzy',

        'table1' => 'Imię',
        'table2' => 'Nazwisko',
        'table3' => 'Login',
        'table4' => 'Telefon',
        'table5' => 'Email',
        'table6' => 'Status',
        'table7' => 'Ostatnie Logowanie',
        'table8' => 'Uprawnienia',
        'table9' => 'Opcje',

        'modalEditTitle' => 'Edycja konta',
        'modalEdit1' => 'Login',
        'modalEdit2' => 'Imię',
        'modalEdit3' => 'Nazwisko',
        'modalEdit4' => 'Nume telefonu',
        'modalEdit5' => 'Adres email',

        'modalEdit6' => 'Numer domu',
        'modalEdit7' => 'Ulica',
        'modalEdit8' => 'Miejscowość',
        'modalEdit9' => 'Kod pocztowy',
        'modalEdit10' => 'Miasto',
        'modalEdit11' => 'Uprawnienia',

        'modalEdit12' => 'Menedżer',
        'modalEdit13' => 'Operator',

        'modalEdit14' => 'Status Konta',

        'modalEdit15' => 'Blokada',
        'modalEdit16' => 'Aktywny',

        'modalLockTitle' => 'Status konta',
        'modalLock1' => 'Błędne próby logowania:',
        'modalLock2' => 'Odblokuj konto',
        'modalLock3' => 'Zmień hasło',
        'modalLock4' => 'Nowe hasło:',
        'modalLock5' => 'Powtórz hasło:',

        'modalDelTitle' => 'Usuń konto',
        'modalInfo' => '! Konto zostanie trwale usunięte, czy chcesz potwierdzić !',

        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',

    ],

    'registerAdmin' => [
        'title' => 'Dodaj użytkownika',

        'AddUser1' => 'Login',
        'AddUser2' => 'Imię',
        'AddUser3' => 'Nazwisko',
        'AddUser4' => 'Nume telefonu',
        'AddUser5' => 'Adres email',

        'AddUser6' => 'Numer domu',
        'AddUser7' => 'Ulica',
        'AddUser8' => 'Miejscowość',
        'AddUser9' => 'Kod pocztowy',
        'AddUser10' => 'Miasto',
        'AddUser11' => 'Uprawnienia',

        'AddUser12' => 'Menedżer',
        'AddUser13' => 'Operator',
        'AddUser14' => 'Administrator',

        'AddUser15' => 'Hasło',
        'AddUser16' => 'Powtórz hasło',

        'btmConf' => 'Potwierdź',
    ],

    //manager

    'dashboardManager' => [
        'title' => 'dodawanie i przypisywanie mieszkania',

    ],

    'fleetManager' => [

    ],

    'fleetUseManager' => [

    ],

    'locationManager' => [
        'title' => 'zarządzanie mieszkaniami',

    ],

    'routeManager' => [
        'title' => 'zarządzanie najemcami',
        
    ],

    'routsOrderAddManager' => [
        'title' => 'powiadomienia dla najemców',

    ],

    'routsOrderManager' => [
        'title' => 'generuj raport',
    ],

    //operator

    'dashboardUser' => [
        'title' => 'ustawienia',

    ],

    'fleetUser' => [
        'title' => 'Ustawienia',
    ],

    'orderUser' => [
        'title' => 'Zgłoszenie usterki',

    ],

    'routeUser' => [
        'title' => 'Opłać czynsz',

    ],

    'navAdmin' => [
        'homePage' => 'Strona główna',
        'user' => 'Operatorzy',
        'admin' => 'Administracja',
        'addUser' => 'Dodaj użytkownika',

        'userProfil' => 'Profil',
        'settings' => 'Ustawienia',
        'logOut' => 'Wyloguj się',
    ],

    'navUser' => [
        'homePage' => 'Strona główna',
        'user' => 'Operatorzy',
        'admin' => 'Administracja',
        'addUser' => 'Dodaj użytkownika',

        'userProfil' => 'Profil',
        'settings' => 'Ustawienia',
        'logOut' => 'Wyloguj się',
    ],
];