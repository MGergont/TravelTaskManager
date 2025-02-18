<?php

declare(strict_types=1);

namespace Resources\lang;

return [
    'dashboardAdmin' => [
        'title' => 'to jest test',
    ],
    'login' => [
        'title' => 'Logowanie',
    ],
    'addUser' => [
        'title' => 'dodawanie najemcy i tworzenie konta',

        'label1' => 'Informacje wstępne',
        'name' => 'Imie / Imiona',
        'lastName' => 'Nazwisko',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Numer telefonu',
        'mail' => 'Adres e-mail',
        'password' => 'Hasło do konta',
        'accountStatus' => 'Status konta',
        'administrator' => 'Administrator', 
        '' => '',
        'loginAnnotation' => 'Login do konta to adres e-maila<br> hasło to numer telefonu',

        'label2' => 'Dane umowne',
        'selectApart' => 'Wybierz mieszkanie',
        'startRent' => 'Start najmu',
        'stopRent' => 'Koniec najmu',
        'rentAnnotation' => 'Mieszkanie i dane można<br> dodać/edytować później',

        'btnUser' => 'Dodaj najemce'
    ],
    'admin' => [
        'title' => 'Strona główna',

        'collectiveStatistics' => 'statystyki zbiorowe',
        'collectiveStatistics1' => 'Mieszkania wynajęte',
        'collectiveStatistics2' => 'Mieszkania wolne',
        'collectiveStatistics3' => 'Miesięczne przychody',
        'collectiveStatistics4' => 'Zaległe płatności',
        'collectiveStatistics5' => 'Średni czas umowy',

        'mostProfitableApartments' => 'najbardziej dochodowe mieszkania',
        'incomeGenerated' => 'generowany dochód',
        'commentsAndBugs' => 'Zgłoszone uwagi i usterki',
        'endingContracts' => 'Kończące się umowy',
        'numberApartsAtEndYear' => 'Ilość mieszkań na koniec roku',

        'totalInvestmentValue' => 'Całkowita wartość inwestycji -',
        'returnOnInvestment' => 'Dotychczasowy zwrot inwestycji -',

        'averagePriceApartment' => 'Średnia cena mieszkania -',
        'annualRateReturn' => 'Roczna stopa zwrotu z inwesycji -',
    ],
    '404' => [
        'title' => '404',
    ],
    'addApartment' => [
        'title' => 'dodawanie i przypisywanie mieszkania',

        'label1' => 'Informacje wstępne',
        'nameApart' => 'Nazwa mieszkania',
        'country' => 'Państwo',
        'city' => 'Miasto',
        'zipCode' => 'Kod pocztowy',
        'street' => 'Ulica',
        'apartNumber' => 'Numer mieszkania',

        'label2' => 'Szczegóły mieszkania',
        'price' => 'Cena',
        'area' => 'Powierzchnia',
        'rent' => 'Czynsz',
        'selectGroup' => 'Wybierz wspólnote',

        'label3' => 'Pozostałe informacje',
        'conditionRent' => 'Stan mieszkania',
        'note' => 'Komentarz',
        'img' => 'Zdjęcie',
        'imgAnnotation' => 'Zdjęcia mieszkania będą<br> widoczne w panelu najemcy',

        'label4' => 'Najemca',
        'selectRentier' => 'Wybierz najemce',
        'rentAnnotation' => 'Najemce można dodać<br> do mieszkania później',

        'btnApart' => 'Dodaj mieszkanie',
    ],
    'addGroup' => [
        'title' => 'Dodawanie wspólnoty mieszkaniowej',
        'title2' => 'Edytuj wspólnote',
        'label1' => 'Informacje wstępne',
        'nameGroup' => 'Nazwa wspólnoty mieszkaniowej',
        'officeAddress' => 'Adres biura',
        'workHours' => 'Godziny pracy',
        'phoneNumber' => 'Numer telefonu',
        'btnGroup' => 'Dodaj wspólnote',
        'groupAnnotation' => 'Wspólnotę mieszkaniową<br> wiąże się z mieszkaniem',

        'edit' => 'Edycja',
        'del' => 'Usuń',

        'label2' => 'Wspólnoty',
        'id' => 'ID',
        'nameGroup' => 'Nazwa wspólnoty',
        'officeAddress' => 'Adres biura',
        'workHours' => 'Godziny pracy',
        'phoneNumber' => 'Numer telefonu',
        'action' => 'Akcja',
    ],
    'archives' => [
        'title' => 'archiwum',
        'dayRaport' => 'Raport z dnia:',
        'id' => 'ID',
        'raportName' => 'Nazwa raportu',
        'Complexity' => 'Złożoność',
        'start' => 'Okres od:',
        'stop' => 'Okres do:',
        'action' => 'Akcja',
    ],
    'manageApart' => [
        'title' => 'zarządzanie mieszkaniami',

        'searchApart' => 'Wyszukaj mieszkanie:',
        'searchRentier' => 'Najemca:',
        'id' => 'ID',
        'nameApart' => 'Nazwa mieszkania',
        'city' => 'Miasto',
        'streetAndAddress' => 'Ulica & Adress',
        'price' => 'Cena',
        'area' => 'Metrarz',
        'rent' => 'Czynsz',
        'rentier' => 'Najemca',
        'statRent' => 'Początek najmu',
        'stopRent' => 'Koniec najmu',
        'action' => 'Akcja',

        'edit' => 'Edycja',
        'del' => 'Usuń',

        'label1' => 'Edytuj dane mieszkania',
        'label2' => 'Informacje wstępne',
        'name' => 'Nazwa mieszkania',
        'country' => 'Państwo',
        'city' => 'Miasto',
        'zipCode' => 'Kod pocztowy',
        'street' => 'Ulica',
        'apartNumber' => 'Numer mieszkania',
        'label3' => 'Szczegóły mieszkania',
        'price' => 'Cena',
        'area' => 'Powierzchnia',
        'rent' => 'Czynsz',
        'label4' => 'Pozostałe informacje',
        'selectGroup' => 'Stan mieszkania',
        'note' => 'Komentarz',
        'img' => 'Zdjęcie',
        'imgAnnotation' => 'Zdjęcia mieszkania będą <br> widoczne w panelu najemcy',
        'btnApart' => 'Dodaj mieszkanie',

    ],
    'manageUser' => [
        'title' => 'zarządzanie najemcami',

        'searchRentier' => 'Wyszukaj najemce:',
        'id' => 'ID',
        'name' => 'Imie',
        'lastName' => 'Nazwisko',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Numer Telefonu',
        'mail' => 'Adres e-mail',
        'accountStatus' => 'Status konta',
        'stopContract' => 'Umowa wygasa',
        'action' => 'Akcja',
        'edit' => 'Edycja',
        'del' => 'Usuń',

        'label1' => 'Edytuj konta najemcy',
        'label2' => 'Informacje wstępne',

        'name' => 'Imie / Imiona',
        'lastName' => 'Nazwisko',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Numer telefonu',
        'email' => 'Adres e-mail',
        'accountStatus' => 'Status konta',
        'rentAnnotation' => 'Login do konta to adres e -mail<br> a hasło to numer telefonu',

        'btnUser' => 'Dodaj najemce',
        
    ],
    'notifiUser' => [
        'title' => 'powiadomienia dla najemców',

        'label1' => 'Informacje wstępne',
        'toStreet' => 'Do kogo: (ulica)',
        'toApartNumber' => 'Do kogo: (numer mieszkania)',
        'notificationFrom' => 'Wyświetlenie powiadomienia od:',
        'notificationTo' => 'Do',
        'messageContent' => 'Treść wiadomości',
        'btnMessage' => 'wyślij ogłoszenie',
        'messageAnnotation' => 'Powiadomienie będzie<br> widoczne u najemców',

        'label2' => 'Informacje wstępne',
        'id' => 'ID',
        'contents' => 'Treść',
        'street' => 'Ulica',
        'apart' => 'Mieszkanie',
        'from' => 'Okres od:',
        'down' => 'Do:',
        'action' => 'Akcja',

        'edit' => 'Edycja',
        'del' => 'Usuń',

        'label3' => 'Edytuj powiadomienie',


    ],
    'reportMain' => [
        'title' => 'generuj raport',
    ],
    'settings' => [
        'title' => 'ustawienia',

        'infoAccount' => 'Informacje o koncie',
        'name' => 'Imie / Imiona',
        'lastName' => 'Nazwisko',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Numer telefonu',
        'btnSettings' => 'Zatwierdź zmiany',

        'loginData' => 'Dane logowania',
        'email' => 'Adres e-mail',
        'changePassword' => 'Zmień hasło',
        'currentPassword' => 'Obecne hasło',
        'newPassword' => 'Nowe hasło',
        'repeatPassword' => 'Powtórz nowe hasło',
        'btnSettings' => 'Zatwierdź zmiany',

        'bankDetalis' => 'Dane do przelewu',
        'recipient' => 'Odbiorca',
        'address' => 'Adres',
        'accountNumber' => 'Numer konta',
        'btnSettings' => 'Zatwierdź zmiany',

        'appearanceAndLanguage' => 'Wygląd i język',
        'chooseTheme' => 'Wybierz motyw',
        'chooseLanguage' => 'Wybierz język:',
        'btnSettings' => 'Zatwierdź zmiany',
    ],
    'user' => [
        'title' => 'Ustawienia',
        'notesWarningsFailures' => 'Uwagi ostrzeżenia i awarie',
        'helloUser' => 'Witaj',
        'helloUser1' => 'miłego dnia!',

        'addressStreet' => 'Adres, ulica, poczta',
        'city' => 'Miasto:',
        'address' => 'Adres:',
        'zipCode' => 'Kod pocztowy:',
        'apartNumber' => 'Numer mieszkania:',

        'contractualInformation' => 'Informacje umowne',
        'statRent' => 'Początek najmu:',
        'stopRent' => 'Koniec najmu:',
        'lastrent' => 'Ostatnia płatność:',

        'aboutApartment' => 'O mieszkaniu',
        'area' => 'Powierzchnia:',
        'rent' => 'Kwota czynszu:',

        'group' => 'Wspólnota mieszkaniowa',
        'nameGroup' => 'Nazwa wspólnoty: ',
        'addressgroup' => 'Adres biura zarządu:',
        'workHoursGroup' => 'Godziny pracy biura:',
        'contactGroup' => 'Kontakt do zarządu:',

        'ownerInformation' => 'Informacje o właścicielu',
        'nameLastName' => 'Imie i nazwisko:',
        'email' => 'Adres mail:',
        'phoneNumber' => 'Telefon kontaktowy:',
    ],
    'faultsUser' => [
        'title' => 'Zgłoszenie usterki',

        'label1' => 'Informacje wstępne',
        'nameLastName' => 'Imie nazwisko',
        'street' => 'Ulica',
        'numberApart' => 'Numer mieszkania',
        'messageContent' => 'Treść wiadomości',
        'btnFaults' => 'Wyślij ogłoszenie',
        'faultsAnnotation' => 'Usterka zostanie przekazana<br> do właściciela mieszkania',
    ],
    'payUser' => [
        'title' => 'Opłać czynsz',

        'label1' => 'Informacje do przelewu',
        'transferTitle' => 'Tytuł przelewu',
        'recipient' => 'Odbiorca',
        'address' => 'Adres',
        'accountNumber' => 'Numer konta',
        'btnNumber' => 'Kopiuj numer do schowka',

        'label2' => 'Potwierdzenie przelewu',
        'btnPay' => 'Potwierdź płatność',
        'payAnnotation' => 'Opłacenie faktury<br> potwierdź przyciskiem',
    ],
    'historyUser' => [
        'title' => 'Historia płatności',

        'id' => 'ID',
        'Title' => 'Tytuł',
        'recipient' => 'Odbiorca',
        'address' => 'Adres',
        'accountNumber' => 'Numer konta',
        'price' => 'Kwota',
        'transferDate' => 'Data przelewu',
        'download' => 'Pobierz',
    ],
    'settingsUser' => [
        'title' => 'Ustawienia',

        'label1' => 'Informacje o koncie',
        'name' => 'Imie / Imiona',
        'lastName' => 'Nazwisko',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Numer telefonu',

        'label2' => 'Dane logowania',
        'email' => 'Adres e-mail',
        'changePassword' => 'Zmień hasło',
        'currentPassword' => 'Obecne hasło',
        'newPassword' => 'Nowe hasło',
        'repeatPassword' => 'Powtórz nowe hasło',
        'btnSettings' => 'Zatwierdź zmiany',


        'label3' => 'Wygląd i język',
        'chooseTheme' => 'Wybierz motyw',
        'chooseLanguage' => 'Wybierz język:',
        'btnSettings' => 'Zatwierdź zmiany',
    ],
    'navAdmin' => [
        'general' => 'Ogólne',
        'homePage' => 'Strona główna',
        'configuration' => 'Konfiguracja',
        'addrent' => 'Dodaj najemce',
        'addApart' => 'Dodaj mieszkanie',
        'addGroup' => 'Dodaj wspólnote',

        'apartsRentiers' => 'Mieszkania & najemcy',
        'manageRentiers' => 'Zarządzaj najemcami',
        'manageAparts' => 'Zarządzaj mieszkaniami',
        'notifyRentiers' => 'Powiadom najemców',

        'management' => 'Zarządzanie',
        'settings' => 'Ustawienia',
    ],
    'navUser' => [
        'general' => 'Ogólne',
        'homePage' => 'Strona główna',

        'myApartment' => 'Moje mieszkanie',
        'reportFaults' => 'Zgłoszenie usterek',
        'payTheRent' => 'Opłać czynsz',
        'paymentHistory' => 'Historia płatności',

        'management' => 'Zarządzanie',
        'settings' => 'Ustawienia',
    ],
];