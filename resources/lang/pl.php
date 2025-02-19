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

    'loginOperator' => [
        
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
        'title' => 'Panel menedżera',

        'status1' => 'Status realizacji zamówień',
        'status2' => 'Samochody z największymi kosztami eksploatacji (ostatnie 6 miesięcy)',
        'status3' => 'Liczba aktywnych samochodów',
        'status4' => 'Status realizacji zamówień',
    ],

    'fleetManager' => [
        'title' => 'Zarządzanie flotą',

        'table1' => 'Marka/Model',
        'table2' => 'Tablice rejestracyjne',
        'table3' => 'Rok produkcji',
        'table4' => 'Ostatni serwis',
        'table5' => 'Koniec ubezpieczenia',
        'table6' => 'Koniec badania technicznego',
        'table7' => 'Właściciel',
        'table8' => 'Status',
        'table9' => 'Options',

        'modalTitle' => 'Edycja danych pojazdu',
        'modal1' => 'Tablice rejestracyjne',
        'modal2' => 'Marka',
        'modal3' => 'Model',
        'modal4' => 'Rok produkcji',
        'modal5' => 'Przebieg',
        'modal6' => 'Ostatni serwis',
        'modal7' => 'Koniec ubezpieczenia',
        'modal8' => 'Koniec badania technicznego',
        'modal9' => 'Dodaj zdjęcie',
        'modal10' => 'Status',
        'modal11' => 'Użytkownik (Login/Name)',
        'modal12' => 'Wolny',
        'modal13' => 'Zajęty',
        'modal14' => 'W serwisie',

        'editTitle' => 'Dodawanie pojazdu',
        'edit1' => 'Tablice rejestracyjne',
        'edit2' => 'Marka',
        'edit21' => 'Model',
        'edit3' => 'Rok produkcji',
        'edit4' => 'Przebieg',
        'edit5' => 'Ostatni serwis',
        'edit6' => 'Koniec ubezpieczenia',
        'edit7' => 'Koniec badania technicznego',
        'edit8' => 'Dodaj zdjęcie',

        'modalDelTitle' => 'Usuń pojazd',
        'modalInfo' => '! Pojazd zostanie trwale usunięty, czy chcesz potwierdzić !',

        'btnAdd' => 'Status',

        'btmAdd' => 'Dodaj pojazd',

        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',
    ],

    'fleetUseManager' => [
        'title' => 'Samochód',

        'info1' => 'Rok produkcji:',
        'info2' => 'Przebieg:',
        'info3' => 'Status:',
        'info4' => 'Informacje',
        'info5' => 'Data ostatniego serwisu:',
        'info6' => 'Data końca ważności ubezpieczenia:',
        'info7' => 'Data końca ważności przeglądu:',

        'title2' => 'Kategoria',
        'title3' => 'Data zgłoszenia',
        'title4' => 'Kwota',
        'title5' => 'Options',

        'modalTitle' => 'Edycja kosztów',
        'modal1' => 'Data kosztów',
        'modal2' => 'Kategoria kosztów',
        'modal3' => 'Koszt',
        'modal4' => 'Opis pojazdu',

        'addTitle' => 'Dodawanie kosztów',
        'add1' => 'Data kosztów',
        'add2' => 'Kategoria kosztów',

        'add3' => 'Serwis',
        'add4' => 'Paliwo',
        'add5' => 'Eksploatacja',

        'add6' => 'Koszt',
        'add7' => 'Opis',

        'modalDelTitle' => 'Usuń koszt',
        'modalInfo' => '! Zarejestrowany koszt zostanie trwale usunięte, czy chcesz potwierdzić !',

        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',
        'btmAddError' => 'Dodaj zgłoszenie awarii',
        'btmCost' => 'Dodaj koszt',
    ],

    'locationManager' => [
        'title' => 'Zarządzanie lokalizacjami',

        'table1' => 'Nazwa',
        'table2' => 'Miejscowość',
        'table3' => 'Kod pocztowy',
        'table4' => 'Ulica',
        'table5' => 'Options',

        'modalTitle' => 'Edycja lokalizacji',
        'modal1' => 'Nazwa',
        'modal2' => 'Numer domu',
        'modal3' => 'Ulica',
        'modal4' => 'Miejscowość',
        'modal5' => 'Kod pocztowy',
        'modal6' => 'Miasto',
        'modal7' => 'Wysokość geograficzna',
        'modal8' => 'Szerokość geograficzna',

        'modalDelTitle' => 'Usuń lokalizacje',
        'modalInfo' => '! Lokalizacja zostanie trwale usunięte, czy chcesz potwierdzić !',

        'AddLocationTitle' => 'Dodawanie lokalizacji',
        'AddLocation1' => 'Nazwa',
        'AddLocation2' => 'Numer domu',
        'AddLocation3' => 'Ulica',
        'AddLocation4' => 'Miejscowość',
        'AddLocation5' => 'Kod pocztowy',

        'AddLocation6' => 'Miasto',
        'AddLocation7' => 'Wysokość geograficzna',
        'AddLocation8' => 'Szerokość geograficzna',

        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',
        'btmAdd' => 'Dodaj',
    ],

    'routeManager' => [
        'title' => 'Dodaj własną delegację',

        'AddRouteTitle1' => 'Lokalizacja startowa',
        'AddRouteTitle2' => 'Dystans',
        'AddRouteTitle3' => 'Lokalizacja końcowa',
        'AddRouteTitle10' => 'Kolejna lokalizacja startowa',
        'AddRouteTitle20' => 'Kolejny dystans',
        'AddRouteTitle4' => 'Rozpocznij trasę, aby dodać koszty',
        'AddRouteTitle5' => 'Trasa trwa...',
        'AddRouteTitle6' => 'Dodaj koszty',
        'AddRouteTitle7' => 'Koszt',
        'AddRouteTitle8' => 'Opis',

        'btmStart' => 'Start',
        'btmStop' => 'Stop',
        'btmAdd' => 'Dodaj',
        'btmNext' => 'Następny punkt',
    ],

    'routsOrderAddManager' => [
        'title' => 'Dodawanie zlecenia delegacji',

        'AddRoute1' => 'Wprowadź dane zlecenia',
        'AddRoute2' => 'Nazwa zlecenia',
        'AddRoute3' => 'Użytkownik (Login/Name)',
        'AddRoute4' => 'Data realizacji',

        'AddRoute5' => 'Wprowadź dane lokalizacji A',
        'AddRoute6' => 'Adres zamieszkania',
        'AddRoute7' => 'Punkt startowy',
        'AddRoute8' => 'Data wyjazdu(opcjonalnie)',

        'AddRoute9' => 'Wprowadź dane lokalizacji B',
        'AddRoute10' => 'Punkt końcowy',
        'AddRoute11' => 'Data przyjazdu(opcjonalnie)',
        'AddRoute12' => 'Data odjazdu(opcjonalnie)',

        'AddRoute13' => 'Poprzedni punkt końca trasy A',
        'AddRoute14' => 'Wprowadź dane lokalizacji B',

        'AddRoute15' => 'Adres',

        'table1' => 'Lokalizacja A | Nazwa | Adres	',
        'table2' => 'Lokalizacja B | Nazwa | Adres',
        'table3' => 'Options',

        'AddLocationTitle' => 'Dodawanie lokalizacji',
        'AddLocation1' => 'Nazwa',
        'AddLocation2' => 'Numer domu',
        'AddLocation3' => 'Ulica',
        'AddLocation4' => 'Miejscowość',
        'AddLocation5' => 'Kod pocztowy',

        'AddLocation6' => 'Miasto',
        'AddLocation7' => 'Wysokość geograficzna',
        'AddLocation8' => 'Szerokość geograficzna',

        'modalTitle' => 'Edycja trasy',
        'modal1' => 'Lokalizacja A | Nazwa | Adres',
        'modal2' => 'Data wyjazdu(opcjonalnie)',
        'modal3' => 'Lokalizacja B | Nazwa | Adres',
        'modal4' => 'Data przyjazdu(opcjonalnie)',

        'modalDelTitle' => 'Usuń trase',
        'modalInfo' => '! Trasa zostanie trwale usunięte, czy chcesz potwierdzić !',

        'btmAdd' => 'Dodaj',
        'btmEnd' => 'Koniec',
        'btmAddLocation' => 'Dodaj lokalizacje',
        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',
    ],

    'routsOrderManager' => [
        'title' => 'Zarządzanie zleceniami delegacji',
        
        'table1' => 'Nazwa',
        'table2' => 'Data wykonania',
        'table3' => 'Data utworzenia/modyfikacji',
        'table4' => 'Status',
        'table5' => 'Lokalizacja A | Nazwa | Adres',
        'table6' => 'Lokalizacja B | Nazwa | Adres',
        'table7' => 'Options',

        'modalAdd' => 'Dodawanie lokalizacji',
        'modalAdd1' => 'Wprowadź dane lokalizacji B',
        'modalAdd2' => 'Punkt końcowy',
        'modalAdd3' => 'Data przyjazdu(opcjonalnie)',
        'modalAdd4' => 'Data wyjazdu(opcjonalnie)',

        'modalDelTitle' => 'Usuń zlecenie',
        'modalInfo' => '! Zlecenie zostanie trwale usunięte, czy chcesz potwierdzić !',

        'DelTitle' => 'Usuń punkt',
        'DelInfo' => '! Punkt zostanie trwale usunięte, czy chcesz potwierdzić !',

        'modalEditPoint' => 'Edycja trasy',
        'modal1' => 'Nazwa',
        'modal2' => 'Miejscowość',
        'modal3' => 'Kod pocztowy',
        'modal4' => 'Miasto',
        'modal5' => 'Ulica',
        'modal6' => 'Numer domu',

        'modalEdit' => 'Edycja zlecenie',
        'modalEdit1' => 'Nazwa zlecenia',
        'modalEdit2' => 'Użytkownik (Login/Name)',
        'modalEdit3' => 'Data realizacji',

        'modalEdit4' => 'Status',
        'modalEdit5' => 'Nowy',
        'modalEdit6' => 'W realizacji',
        'modalEdit7' => 'Ukończony',
        'modalEdit8' => 'Zakceptowany',

        'btmAdd' => 'Dodaj zlecenie delegacji',
        'btmAddPoint' => 'Dodaj punkt',
        'btmDel' => 'Usuń zlecenie',
        'btmEdit' => 'Edytuj zlecenie',
        'btmConf' => 'Potwierdź',
        'btmCancel' => 'Anuluj',
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
        'order' => 'Zlecenia Delegacji',
        'route' => 'Delegacja',
        'location' => 'Lokalizacje',
        'cars' => 'Flota',
        'car' => 'Samochód',

        'userProfil' => 'Profil',
        'settings' => 'Ustawienia',
        'logOut' => 'Wyloguj się',
    ],
];