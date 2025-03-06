<?php

declare(strict_types=1);

namespace Resources\lang;

return [
    //admin

    'dashboardAdmin' => [
        'title' => 'Admin Panel',

        'stats1' => 'Number of operators',
        'stats2' => 'Number of database queries',
        'stats3' => 'Number of active and blocked operators',
        'stats4' => 'Inactive users',
        'stats5' => 'Failed login attempts',
        'stats6' => 'Emails sent (last 7 days)',
    ],
    
    'profileAdmin' => [
        'title' => 'Admin Profile',

    ],

    'loginAdmin' => [],

    'loginOperator' => [],

    'managementAdmin' => [
        'title' => 'Administrators',

        'table1' => 'First Name',
        'table2' => 'Last Name',
        'table3' => 'Login',
        'table4' => 'Phone',
        'table5' => 'Email',
        'table6' => 'Status',
        'table7' => 'Last Login',
        'table8' => 'Permissions',
        'table9' => 'Options',

        'modalEditTitle' => 'Edit Account',
        'modalEdit1' => 'Login',
        'modalEdit2' => 'First Name',
        'modalEdit3' => 'Last Name',
        'modalEdit4' => 'Phone Number',
        'modalEdit5' => 'Email Address',
        'modalEdit6' => 'Account Status',

        'modalEdit7' => 'Blocked',
        'modalEdit8' => 'Active',

        'modalLockTitle' => 'Account Status',
        'modalLock1' => 'Failed login attempts',
        'modalLock2' => 'Unlock Account',
        'modalLock3' => 'Change Password',
        'modalLock4' => 'New Password:',
        'modalLock5' => 'Repeat Password:',

        'modalDelTitle' => 'Delete Account',
        'modalInfo' => '! The account will be permanently deleted, do you want to confirm? !',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'managementOperator' => [
        'title' => 'Operators',

        'table1' => 'First Name',
        'table2' => 'Last Name',
        'table3' => 'Login',
        'table4' => 'Phone',
        'table5' => 'Email',
        'table6' => 'Status',
        'table7' => 'Last Login',
        'table8' => 'Permissions',
        'table9' => 'Options',

        'modalEditTitle' => 'Edit Account',
        'modalEdit1' => 'Login',
        'modalEdit2' => 'First Name',
        'modalEdit3' => 'Last Name',
        'modalEdit4' => 'Phone Number',
        'modalEdit5' => 'Email Address',

        'modalEdit6' => 'House Number',
        'modalEdit7' => 'Street',
        'modalEdit8' => 'City',
        'modalEdit9' => 'Postal Code',
        'modalEdit10' => 'Town',
        'modalEdit11' => 'Permissions',

        'modalEdit12' => 'Manager',
        'modalEdit13' => 'Operator',

        'modalEdit14' => 'Account Status',

        'modalEdit15' => 'Blocked',
        'modalEdit16' => 'Active',

        'modalLockTitle' => 'Account Status',
        'modalLock1' => 'Failed login attempts:',
        'modalLock2' => 'Unlock Account',
        'modalLock3' => 'Change Password',
        'modalLock4' => 'New Password:',
        'modalLock5' => 'Repeat Password:',

        'modalDelTitle' => 'Delete Account',
        'modalInfo' => '! The account will be permanently deleted, do you want to confirm? !',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'registerAdmin' => [
        'title' => 'Add User',

        'AddUser1' => 'Login',
        'AddUser2' => 'First Name',
        'AddUser3' => 'Last Name',
        'AddUser4' => 'Phone Number',
        'AddUser5' => 'Email Address',

        'AddUser6' => 'House Number',
        'AddUser7' => 'Street',
        'AddUser8' => 'City',
        'AddUser9' => 'Postal Code',
        'AddUser10' => 'Town',
        'AddUser11' => 'Permissions',

        'AddUser12' => 'Manager',
        'AddUser13' => 'Operator',
        'AddUser14' => 'Administrator',

        'AddUser15' => 'Password',
        'AddUser16' => 'Repeat Password',

        'btmConf' => 'Confirm',
    ],

    //manager

    'dashboardManager' => [
        'title' => 'Manager Panel',

        'status1' => 'Order fulfillment status',
        'status2' => 'Cars with the highest operating costs (last 6 months)',
        'status3' => 'Number of active cars',
        'status4' => 'Order fulfillment status',
    ],

    'profileManager' => [
        'title' => 'Manager profile',
    ],

    'fleetManager' => [
        'title' => 'Fleet Management',

        'table1' => 'Brand/Model',
        'table2' => 'License Plate',
        'table3' => 'Year of Production',
        'table4' => 'Last Service',
        'table5' => 'Insurance Expiry',
        'table6' => 'Technical Inspection Expiry',
        'table7' => 'Owner',
        'table8' => 'Status',
        'table9' => 'Options',

        'modalTitle' => 'Edit Vehicle Data',
        'modal1' => 'License Plate',
        'modal2' => 'Brand',
        'modal3' => 'Model',
        'modal4' => 'Year of Production',
        'modal5' => 'Mileage',
        'modal6' => 'Last Service',
        'modal7' => 'Insurance Expiry',
        'modal8' => 'Technical Inspection Expiry',
        'modal9' => 'Add Photo',
        'modal10' => 'Status',
        'modal11' => 'User (Login/Name)',
        'modal12' => 'Free',
        'modal13' => 'Occupied',
        'modal14' => 'In Service',

        'editTitle' => 'Add Vehicle',
        'edit1' => 'License Plate',
        'edit2' => 'Brand',
        'edit21' => 'Model',
        'edit3' => 'Year of Production',
        'edit4' => 'Mileage',
        'edit5' => 'Last Service',
        'edit6' => 'Insurance Expiry',
        'edit7' => 'Technical Inspection Expiry',
        'edit8' => 'Add Photo',

        'modalDelTitle' => 'Delete Vehicle',
        'modalInfo' => '! The vehicle will be permanently deleted, do you want to confirm? !',

        'btnAdd' => 'Status',

        'btmAdd' => 'Add Vehicle',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'fleetUseManager' => [
        'title' => 'Car',

        'info1' => 'Year of Production:',
        'info2' => 'Mileage:',
        'info3' => 'Status:',
        'info4' => 'Information',
        'info5' => 'Last Service Date:',
        'info6' => 'Insurance Expiry Date:',
        'info7' => 'Technical Inspection Expiry Date:',

        'title2' => 'Category',
        'title3' => 'Report Date',
        'title4' => 'Amount',
        'title5' => 'Options',

        'modalTitle' => 'Edit Costs',
        'modal1' => 'Cost Date',
        'modal2' => 'Cost Category',
        'modal3' => 'Cost',
        'modal4' => 'Vehicle Description',

        'addTitle' => 'Add Costs',
        'add1' => 'Cost Date',
        'add2' => 'Cost Category',

        'add3' => 'Service',
        'add4' => 'Fuel',
        'add5' => 'Operation',

        'add6' => 'Cost',
        'add7' => 'Description',

        'modalDelTitle' => 'Delete Cost',
        'modalInfo' => '! The registered cost will be permanently deleted, do you want to confirm? !',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
        'btmAddError' => 'Report a Breakdown',
        'btmCost' => 'Add Cost',
    ],

    'locationManager' => [
        'title' => 'Location Management',

        'table1' => 'Name',
        'table2' => 'City',
        'table3' => 'Postal Code',
        'table4' => 'Street',
        'table5' => 'Options',

        'modalTitle' => 'Edit Location',
        'modal1' => 'Name',
        'modal2' => 'House Number',
        'modal3' => 'Street',
        'modal4' => 'City',
        'modal5' => 'Postal Code',
        'modal6' => 'Town',
        'modal7' => 'Latitude',
        'modal8' => 'Longitude',

        'modalDelTitle' => 'Delete Location',
        'modalInfo' => '! The location will be permanently deleted, do you want to confirm? !',

        'AddLocationTitle' => 'Add Location',
        'AddLocation1' => 'Name',
        'AddLocation2' => 'House Number',
        'AddLocation3' => 'Street',
        'AddLocation4' => 'City',
        'AddLocation5' => 'Postal Code',

        'AddLocation6' => 'Town',
        'AddLocation7' => 'Latitude',
        'AddLocation8' => 'Longitude',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
        'btmAdd' => 'Add',
    ],

    'routeManager' => [
        'title' => 'Add a Custom Delegation',

        'AddRouteTitle1' => 'Starting Location',
        'AddRouteTitle2' => 'Distance',
        'AddRouteTitle3' => 'Destination Location',
        'AddRouteTitle10' => 'Next Starting Location',
        'AddRouteTitle20' => 'Next Distance',
        'AddRouteTitle4' => 'Start the route to add costs',
        'AddRouteTitle5' => 'Route in Progress...',
        'AddRouteTitle6' => 'Add Costs',
        'AddRouteTitle7' => 'Cost',
        'AddRouteTitle8' => 'Description',

        'btmStart' => 'Start',
        'btmStop' => 'Stop',
        'btmAdd' => 'Add',
        'btmNext' => 'Next Point',
    ],

    'routsOrderAddManager' => [
        'title' => 'Add Delegation Order',

        'AddRoute1' => 'Enter Order Details',
        'AddRoute2' => 'Order Name',
        'AddRoute3' => 'User (Login/Name)',
        'AddRoute4' => 'Execution Date',

        'AddRoute5' => 'Enter Location A Details',
        'AddRoute6' => 'Home Address',
        'AddRoute7' => 'Starting Point',
        'AddRoute8' => 'Departure Date (Optional)',

        'AddRoute9' => 'Enter Location B Details',
        'AddRoute10' => 'Destination Point',
        'AddRoute11' => 'Arrival Date (Optional)',
        'AddRoute12' => 'Departure Date (Optional)',

        'AddRoute13' => 'Previous Route End Point A',
        'AddRoute14' => 'Enter Location B Details',

        'AddRoute15' => 'Address',

        'table1' => 'Location A | Name | Address',
        'table2' => 'Location B | Name | Address',
        'table3' => 'Options',

        'AddLocationTitle' => 'Add Location',
        'AddLocation1' => 'Name',
        'AddLocation2' => 'House Number',
        'AddLocation3' => 'Street',
        'AddLocation4' => 'City',
        'AddLocation5' => 'Postal Code',

        'AddLocation6' => 'Town',
        'AddLocation7' => 'Latitude',
        'AddLocation8' => 'Longitude',

        'modalTitle' => 'Edit Route',
        'modal1' => 'Location A | Name | Address',
        'modal2' => 'Departure Date (Optional)',
        'modal3' => 'Location B | Name | Address',
        'modal4' => 'Arrival Date (Optional)',

        'modalDelTitle' => 'Delete Route',
        'modalInfo' => '! The route will be permanently deleted, do you want to confirm? !',

        'btmAdd' => 'Add',
        'btmEnd' => 'End',
        'btmAddLocation' => 'Add Location',
        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'routsOrderManager' => [
        'title' => 'Manage Delegation Orders',
        
        'table1' => 'Name',
        'table2' => 'Execution Date',
        'table3' => 'Creation/Modification Date',
        'table4' => 'Status',
        'table5' => 'Location A | Name | Address',
        'table6' => 'Location B | Name | Address',
        'table7' => 'Options',

        'modalAdd' => 'Add Location',
        'modalAdd1' => 'Enter Location B Details',
        'modalAdd2' => 'Destination Point',
        'modalAdd3' => 'Arrival Date (Optional)',
        'modalAdd4' => 'Departure Date (Optional)',

        'modalDelTitle' => 'Delete Order',
        'modalInfo' => '! The order will be permanently deleted, do you want to confirm? !',

        'DelTitle' => 'Delete Point',
        'DelInfo' => '! The point will be permanently deleted, do you want to confirm? !',

        'modalEditPoint' => 'Edit Route',
        'modal1' => 'Name',
        'modal2' => 'City',
        'modal3' => 'Postal Code',
        'modal4' => 'Town',
        'modal5' => 'Street',
        'modal6' => 'House Number',

        'modalEdit' => 'Edit Order',
        'modalEdit1' => 'Order Name',
        'modalEdit2' => 'User (Login/Name)',
        'modalEdit3' => 'Execution Date',

        'modalEdit4' => 'Status',
        'modalEdit5' => 'New',
        'modalEdit6' => 'In Progress',
        'modalEdit7' => 'Completed',
        'modalEdit8' => 'Accepted',

        'btmAdd' => 'Add Delegation Order',
        'btmAddPoint' => 'Add Point',
        'btmDel' => 'Delete Order',
        'btmEdit' => 'Edit Order',
        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'profileUser' => [
        'title' => 'Operator Profile',

    ],

    'dashboardUser' => [
        'title' => 'Operator Panel',

        'status1' => 'Delegations',
        'del1' => 'Active Delegation',
        'del2' => 'Delegation Name:',
        'del3' => 'Execution Date:',
        'del4' => 'Creation Date:',
        'del5' => 'Current Destination',
        'del6' => 'End of Route',
        'del7' => 'Status',

        'status2' => 'No delegations at the moment',
        'status3' => 'Add cost to delegation',
        'status4' => 'Add cost description to delegation',
        'status5' => 'Add amount',
        'status6' => 'Your Car',
        'status7' => 'License Plate:',
        'status8' => 'Brand:',
        'status9' => 'Model:',
        'status10' => 'Mileage:',
        'status11' => 'Insurance Valid Until:',
        'status12' => 'Operating Costs (last 30 days)',
        'status13' => 'Upcoming Routes',
        'status14' => 'Order:',
        'status15' => 'Route Statistics (last 30 days)',
        'status16' => 'Distance Traveled:',
        'status17' => 'Number of Routes:',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
    ],

    'fleetUser' => [
        'title' => 'Car',

        'info1' => 'Year of Production:',
        'info2' => 'Mileage:',
        'info3' => 'Status:',
        'info4' => 'Information',
        'info5' => 'Last Service Date:',
        'info6' => 'Insurance Expiry Date:',
        'info7' => 'Technical Inspection Expiry Date:',

        'title2' => 'Category',
        'title3' => 'Report Date',
        'title4' => 'Amount',
        'title5' => 'Options',

        'modalTitle' => 'Edit Costs',
        'modal1' => 'Cost Date',
        'modal2' => 'Cost Category',
        'modal3' => 'Cost',
        'modal4' => 'Vehicle Description',

        'addTitle' => 'Add Costs',
        'add1' => 'Cost Date',
        'add2' => 'Cost Category',

        'add3' => 'Service',
        'add4' => 'Fuel',
        'add5' => 'Operation',

        'add6' => 'Cost',
        'add7' => 'Description',

        'modalDelTitle' => 'Delete Cost',
        'modalInfo' => '! The registered cost will be permanently deleted, do you want to confirm? !',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
        'btmAddError' => 'Report a Breakdown',
        'btmCost' => 'Add Cost',
    ],

    'orderUser' => [
        'title' => 'Delegation Orders',

        'table1' => 'Name',
        'table2' => 'Execution Date',
        'table3' => 'Creation/Modification Date',
        'table4' => 'Status',
        'table5' => 'Location A | Name | Address',
        'table6' => 'Location B | Name | Address',
        'table7' => 'Options',

        'modalTitle' => 'Delegation Details',
        'modal1' => 'Name:',
        'modal2' => 'City:',
        'modal3' => 'Postal Code:',
        'modal4' => 'Town:',
        'modal5' => 'Street:',
        'modal6' => 'House Number:',
        'modal7' => 'Departure Date:',

        'modal8' => 'Arrival Date:',

        'modalAccept' => 'Accept Order',
        'modalAccept1' => 'Order Name:',
        'modalAccept2' => 'Execution Date:',

        'btmConf' => 'Confirm',
        'btmCancel' => 'Cancel',
        'btmAddError' => 'Accept Order',
    ],

    'routeUser' => [
        'title' => 'Add a Custom Delegation',

        'AddRouteTitle1' => 'Starting Location',
        'AddRouteTitle2' => 'Distance',
        'AddRouteTitle3' => 'Destination Location',
        'AddRouteTitle10' => 'Next Starting Location',
        'AddRouteTitle20' => 'Next Distance',
        'AddRouteTitle4' => 'Start the route to add costs',
        'AddRouteTitle5' => 'Route in Progress...',
        'AddRouteTitle6' => 'Add Costs',
        'AddRouteTitle7' => 'Cost',
        'AddRouteTitle8' => 'Description',

        'btmStart' => 'Start',
        'btmStop' => 'Stop',
        'btmAdd' => 'Add',
        'btmNext' => 'Next Point',
    ],

    'navAdmin' => [
        'homePage' => 'Home Page',
        'user' => 'Operators',
        'admin' => 'Administration',
        'addUser' => 'Add User',

        'userProfil' => 'Profile',
        'settings' => 'Settings',
        'logOut' => 'Log Out',
    ],

    'navUser' => [
        'homePage' => 'Home Page',
        'order' => 'Delegation Orders',
        'route' => 'Delegation',
        'location' => 'Locations',
        'cars' => 'Fleet',
        'car' => 'Car',

        'userProfil' => 'Profile',
        'settings' => 'Settings',
        'logOut' => 'Log Out',
    ],
];
