<?php

declare(strict_types=1);

namespace Resources\lang;

return [
    'dashboardAdmin' => [
        'title' => 'this is a test',
    ],
    'login' => [
        'title' => 'Login',
    ],
    'addUser' => [
        'title' => 'adding tenant and creating account',
        
        'label1' => 'Preliminary information',
        'name' => 'First Name(s)',
        'lastName' => 'Last Name',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Phone Number',
        'mail' => 'Email Address',
        'password' => 'Account Password',
        'accountStatus' => 'Account Status',
        'administrator' => 'Administrator',
        'loginAnnotation' => 'Login to the account is the email address,<br> password is the phone number',
        '' => '',

        'label2' => 'Contract details',
        'selectApart' => 'Select apartment',
        'startRent' => 'Start of rent',
        'stopRent' => 'End of rent',
        'rentAnnotation' => 'Apartment and details<br> can be added/edited later',

        'btnUser' => 'Add tenant'
    ],
    'admin' => [
        'title' => 'Home Page',

        'collectiveStatistics' => 'collective statistics',

        'collectiveStatistics1' => 'Apartments rented',
        'collectiveStatistics2' => 'Apartments available',
        'collectiveStatistics3' => 'Monthly revenue',
        'collectiveStatistics4' => 'Overdue payments',
        'collectiveStatistics5' => 'Average contract duration',

        'mostProfitableApartments' => 'most profitable apartments',
        'incomeGenerated' => 'generated income',
        'commentsAndBugs' => 'Reported comments and bugs',
        'endingContracts' => 'Ending contracts',
        'numberApartsAtEndYear' => 'Number of apartments at year-end',

        'totalInvestmentValue' => 'Total investment value -',
        'returnOnInvestment' => 'Return on investment to date -',

        'averagePriceApartment' => 'Average apartment price -',
        'annualRateReturn' => 'Annual rate of return on investment -',
    ],
    '404' => [
        'title' => '404',
    ],
    'addApartment' => [
        'title' => 'adding and assigning apartment',

        'label1' => 'Preliminary information',
        'nameApart' => 'Apartment Name',
        'country' => 'Country',
        'city' => 'City',
        'zipCode' => 'Zip Code',
        'street' => 'Street',
        'apartNumber' => 'Apartment Number',

        'label2' => 'Apartment details',
        'price' => 'Price',
        'area' => 'Area',
        'rent' => 'Rent',
        'selectGroup' => 'Select community',

        'label3' => 'Other information',
        'conditionRent' => 'Apartment condition',
        'note' => 'Comment',
        'img' => 'Photo',
        'imgAnnotation' => 'Apartment photos will be<br> visible in the tenant panel',

        'label4' => 'Tenant',
        'selectRentier' => 'Select tenant',
        'rentAnnotation' => 'Tenant can be added to<br> the apartment later',

        'btnApart' => 'Add apartment',
    ],
    'addGroup' => [
        'title' => 'adding housing community',
        'title2' => 'Edit community',
        'label1' => 'Preliminary information',
        'nameGroup' => 'Housing community name',
        'officeAddress' => 'Office address',
        'workHours' => 'Working hours',
        'phoneNumber' => 'Phone number',
        'btnGroup' => 'Add community',
        'groupAnnotation' => 'The housing community is<br> linked to the apartment',

        'edit' => 'Edition',
        'del' => 'Delete',

        'label2' => 'Communities',
        'id' => 'ID',
        'nameGroup' => 'Community name',
        'officeAddress' => 'Office address',
        'workHours' => 'Working hours',
        'phoneNumber' => 'Phone number',
        'action' => 'Action',
    ],
    'archives' => [
        'title' => 'archive',
        'dayRaport' => 'Report from the day:',
        'id' => 'ID',
        'raportName' => 'Report name',
        'Complexity' => 'Complexity',
        'start' => 'Period from:',
        'stop' => 'Period to:',
        'action' => 'Action',
    ],
    'manageApart' => [
        'title' => 'managing apartments',

        'searchApart' => 'Search apartment:',
        'searchRentier' => 'Tenant:',
        'id' => 'ID',
        'nameApart' => 'Apartment name',
        'city' => 'City',
        'streetAndAddress' => 'Street & Address',
        'price' => 'Price',
        'area' => 'Area',
        'rent' => 'Rent',
        'rentier' => 'Tenant',
        'statRent' => 'Start of rent',
        'stopRent' => 'End of rent',
        'action' => 'Action',

        'edit' => 'Edition',
        'del' => 'Delete',

        'label1' => 'Edit apartment details',
        'label2' => 'Introductory information',
        'name' => 'Name of the apartment',
        'country' => 'Country',
        'city' => 'City',
        'zipCode' => 'Zip code',
        'street' => 'Street',
        'apartNumber' => 'Apartment number',
        'label3' => 'Details of the apartment',
        'price' => 'Price',
        'area' => 'Surface',
        'rent' => 'Rent',
        'label4' => 'Other information',
        'selectGroup' => 'Condition of the apartment',
        'note' => 'Comment',
        'img' => 'Photo',
        'imgAnnotation' => 'Photos of the apartment will<br> be visible in the tenant panel',
        'btnApart' => 'Add an apartment',

    ],
    'manageUser' => [
        'title' => 'managing tenants',

        'searchRentier' => 'Search tenant:',
        'id' => 'ID',
        'name' => 'First Name',
        'lastName' => 'Last Name',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Phone Number',
        'mail' => 'Email Address',
        'accountStatus' => 'Account Status',
        'stopContract' => 'Contract expires',
        'action' => 'Action',

        'edit' => 'Edition',
        'del' => 'Delete',

        'label1' => 'Edit tenant accounts',
        'label2' => 'Introductory information',

        'name' => 'Name',
        'lastName' => 'Last name',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Phone number',
        'email' => 'E-mail adress',
        'accountStatus' => 'Account status',
        'rentAnnotation' => 'The login to the account is the e-mail address<br> and the password is the phone number',

        'btnUser' => 'Add a tenant',
    ],
    'notifiUser' => [
        'title' => 'notifications for tenants',

        'label1' => 'Preliminary information',
        'toStreet' => 'To whom: (street)',
        'toApartNumber' => 'To whom: (apartment number)',
        'notificationFrom' => 'Notification display from:',
        'notificationTo' => 'To',
        'messageContent' => 'Message content',
        'btnMessage' => 'send notification',
        'messageAnnotation' => 'Notification will be<br> visible to tenants',

        'label2' => 'Preliminary information',
        'id' => 'ID',
        'contents' => 'Content',
        'street' => 'Street',
        'apart' => 'Apartment',
        'from' => 'Period from:',
        'down' => 'To:',
        'action' => 'Action',

        'edit' => 'Edition',
        'del' => 'Delete',

    ],
    'reportMain' => [
        'title' => 'generate report',
    ],
    'settings' => [
        'title' => 'settings',

        'infoAccount' => 'Account information',
        'name' => 'First Name(s)',
        'lastName' => 'Last Name',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Phone Number',
        'btnSettings' => 'Confirm changes',

        'loginData' => 'Login data',
        'email' => 'Email Address',
        'changePassword' => 'Change password',
        'currentPassword' => 'Current password',
        'newPassword' => 'New password',
        'repeatPassword' => 'Repeat new password',
        'btnSettings' => 'Confirm changes',

        'bankDetalis' => 'Transfer details',
        'recipient' => 'Recipient',
        'address' => 'Address',
        'accountNumber' => 'Account number',
        'btnSettings' => 'Confirm changes',

        'appearanceAndLanguage' => 'Appearance and language',
        'chooseTheme' => 'Choose theme',
        'chooseLanguage' => 'Choose language:',
        'btnSettings' => 'Confirm changes',
    ],
    'user' => [
        'title' => 'Settings',
        'notesWarningsFailures' => 'Notes, warnings, and failures',
        'helloUser' => 'Hello',
        'helloUser1' => 'have a nice day!',

        'addressStreet' => 'Address, street, postal code',
        'city' => 'City:',
        'address' => 'Address:',
        'zipCode' => 'Zip Code:',
        'apartNumber' => 'Apartment number:',

        'contractualInformation' => 'Contract information',
        'statRent' => 'Start of rent:',
        'stopRent' => 'End of rent:',
        'lastrent' => 'Last payment:',

        'aboutApartment' => 'About the apartment',
        'area' => 'Area:',
        'rent' => 'Rent amount:',

        'group' => 'Housing community',
        'nameGroup' => 'Community name: ',
        'addressgroup' => 'Office address:',
        'workHoursGroup' => 'Office working hours:',
        'contactGroup' => 'Contact to the management:',

        'ownerInformation' => 'Owner information',
        'nameLastName' => 'First and last name:',
        'email' => 'Email address:',
        'phoneNumber' => 'Contact phone:',
    ],
    'faultsUser' => [
        'title' => 'Report a fault',

        'label1' => 'Preliminary information',
        'nameLastName' => 'First and last name',
        'street' => 'Street',
        'numberApart' => 'Apartment number',
        'messageContent' => 'Message content',
        'btnFaults' => 'Send notification',
        'faultsAnnotation' => 'The fault will be forwarded<br> to the apartment owner',
    ],
    'payUser' => [
        'title' => 'Pay rent',

        'label1' => 'Transfer information',
        'transferTitle' => 'Transfer title',
        'recipient' => 'Recipient',
        'address' => 'Address',
        'accountNumber' => 'Account number',
        'btnNumber' => 'Copy number to clipboard',

        'label2' => 'Transfer confirmation',
        'btnPay' => 'Confirm payment',
        'payAnnotation' => 'Confirm invoice<br> payment with the button',
    ],
    'historyUser' => [
        'title' => 'Payment history',

        'id' => 'ID',
        'Title' => 'Title',
        'recipient' => 'Recipient',
        'address' => 'Address',
        'accountNumber' => 'Account number',
        'price' => 'Amount',
        'transferDate' => 'Transfer date',
        'download' => 'Download',
    ],
    'settingsUser' => [
        'title' => 'Settings',

        'label1' => 'Account information',
        'name' => 'First Name(s)',
        'lastName' => 'Last Name',
        'pesel' => 'PESEL',
        'phoneNumber' => 'Phone Number',

        'label2' => 'Login data',
        'email' => 'Email Address',
        'changePassword' => 'Change password',
        'currentPassword' => 'Current password',
        'newPassword' => 'New password',
        'repeatPassword' => 'Repeat new password',
        'btnSettings' => 'Confirm changes',

        'label3' => 'Appearance and language',
        'chooseTheme' => 'Choose theme',
        'chooseLanguage' => 'Choose language:',
        'btnSettings' => 'Confirm changes',
    ],
    'navAdmin' => [
        'general' => 'General',
        'homePage' => 'Home page',
        'configuration' => 'Configuration',
        'addrent' => 'Add tenant',
        'addApart' => 'Add apartment',
        'addGroup' => 'Add community',

        'apartsRentiers' => 'Apartments & tenants',
        'manageRentiers' => 'Manage tenants',
        'manageAparts' => 'Manage apartments',
        'notifyRentiers' => 'Notify tenants',

        'management' => 'Management',
        'settings' => 'Settings',
    ],
    'navUser' => [
        'general' => 'General',
        'homePage' => 'Home page',

        'myApartment' => 'My apartment',
        'reportFaults' => 'Report faults',
        'payTheRent' => 'Pay rent',
        'paymentHistory' => 'Payment history',

        'management' => 'Management',
        'settings' => 'Settings',
    ],
];
