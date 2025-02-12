<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once 'Src/Utils/SessionHelpers.php';

$router = new Src\Utils\Router();
//TODOobsługa błędów
$router->get('/access-denied', 'HomeController@accessDenied', 'Controllers');

//TODOlogowanie user
$router->get('/', 'LoginOperatorController@loginView', 'Controllers\\Operator');
$router->post('/', 'LoginOperatorController@login', 'Controllers\\Operator');

$router->get('/register', 'AddOperatorController@AddOperatorView', 'Controllers\\Admin');
$router->post('/register', 'AddOperatorController@AddOperator', 'Controllers\\Admin');

//TODO przerobić nemaspace na osobną funkcję
$router->get('/admin', 'LoginAdminController@loginView', 'Controllers\\Admin');
$router->post('/admin', 'LoginAdminController@login', 'Controllers\\Admin');

$router->get('/logout', 'LoginAdminController@logout', 'Controllers\\Admin');
$router->get('/logout-ope', 'LoginOperatorController@logout', 'Controllers\\Operator');

$router->get('/admin-dashboard', 'DashboardAdminController@DashboardAdminView', 'Controllers\\Admin');

$router->get('/operators', 'ManagementOperatorController@ManagementOperatorView', 'Controllers\\Admin');
$router->post('/operator-pwd-unlock', 'ManagementOperatorController@PwdUnlock', 'Controllers\\Admin');
$router->post('/operator-del-profile', 'ManagementOperatorController@accountDell', 'Controllers\\Admin');
$router->post('/operator-edit-profile', 'ManagementOperatorController@accountEdit', 'Controllers\\Admin');

$router->get('/admins', 'ManagementAdminController@ManagementAdminView', 'Controllers\\Admin');
$router->post('/admin-pwd-unlock', 'ManagementAdminController@PwdUnlock', 'Controllers\\Admin');
$router->post('/admin-del-profile', 'ManagementAdminController@accountDell', 'Controllers\\Admin');
$router->post('/admin-edit-profile', 'ManagementAdminController@accountEdit', 'Controllers\\Admin');

$router->get('/manager-dashboard', 'DashboardManagerController@DashboardManagerView', 'Controllers\\Operator\\Manager');


$router->get('/user-dashboard', 'DashboardUserController@DashboardUserView', 'Controllers\\Operator\\User');
$router->post('/user-dashboard/start', 'DashboardUserController@RouteStart', 'Controllers\\Operator\\User');
$router->post('/user-dashboard/stop', 'DashboardUserController@RouteStop', 'Controllers\\Operator\\User');
$router->post('/user-dashboard/reject', 'DashboardUserController@RejectOrder', 'Controllers\\Operator\\User');


$router->get('/manager/route', 'RouteManagerController@RouteManagerView', 'Controllers\\Operator\\Manager');
$router->get('/user/route', 'RouteUserController@RouteUserView', 'Controllers\\Operator\\User');

$router->get('/user/order', 'OrderUserController@OrderUserView', 'Controllers\\Operator\\User');
$router->post('/user/order', 'OrderUserController@orderAccept', 'Controllers\\Operator\\User');

$router->get('/user/fleet', 'FleetUserController@fleetUserView', 'Controllers\\Operator\\User');


$router->post('/user/route/castom-start', 'RouteUserController@startRoute', 'Controllers\\Operator\\User');
$router->post('/user/route/castom-next', 'RouteUserController@startNextRoute', 'Controllers\\Operator\\User');
$router->get('/user/route/castom-stop', 'RouteUserController@stopRoute', 'Controllers\\Operator\\User');
$router->get('/user/route/castom-end', 'RouteUserController@endRoute', 'Controllers\\Operator\\User');
$router->post('/user/route/cost', 'RouteUserController@addCost', 'Controllers\\Operator\\User');

$router->post('/manager/route/castom-start', 'RouteManagerController@startRoute', 'Controllers\\Operator\\Manager');
$router->post('/manager/route/castom-next', 'RouteManager`Controller@startNextRoute', 'Controllers\\Operator\\Manager');
$router->get('/manager/route/castom-stop', 'RouteManagerController@stopRoute', 'Controllers\\Operator\\Manager');
$router->get('/manager/route/castom-end', 'RouteManagerController@endRoute', 'Controllers\\Operator\\Manager');
$router->post('/manager/route/cost', 'RouteManagerController@addCost', 'Controllers\\Operator\\Manager');

$router->get('/manager/location', 'ManagementLocationController@ManagementLocationView', 'Controllers\\Operator\\Manager');
$router->post('/manager/location/add', 'ManagementLocationController@locationAdd', 'Controllers\\Operator\\Manager');
$router->post('/manager/location/del', 'ManagementLocationController@locationDell', 'Controllers\\Operator\\Manager');
$router->post('/manager/location/edit', 'ManagementLocationController@locationEdit', 'Controllers\\Operator\\Manager');

$router->get('/manager/order', 'RoutsOrderController@RoutsOrderView', 'Controllers\\Operator\\Manager');

$router->get('/manager/order/add', 'RoutsOrderController@RoutsOrderAddView', 'Controllers\\Operator\\Manager');
$router->get('/manager/order/clean', 'RoutsOrderController@RoutsOrderClean', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/add', 'RoutsOrderController@orderAdd', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/next', 'RoutsOrderController@orderAddNextPoint', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/end', 'RoutsOrderController@orderAddEndPoint', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/addLocation', 'RoutsOrderController@locationAdd', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/dell', 'RoutsOrderController@orderDell', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/edit', 'RoutsOrderController@orderEdit', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/routMain', 'RoutsOrderController@orderAddMain', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/dellMain', 'RoutsOrderController@orderDellMain', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/routeDellMain', 'RoutsOrderController@routeDellMain', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/routeEditMain', 'RoutsOrderController@routeEditMain', 'Controllers\\Operator\\Manager');
$router->post('/manager/order/orderEditMain', 'RoutsOrderController@orderEditMain', 'Controllers\\Operator\\Manager');

$router->get('/manager/fleet', 'FleetManagerController@fleetManagerView', 'Controllers\\Operator\\Manager');
$router->post('/manager/fleet/add', 'FleetManagerController@fleetAdd', 'Controllers\\Operator\\Manager');
$router->post('/manager/fleet/del', 'FleetManagerController@fleetDel', 'Controllers\\Operator\\Manager');
$router->post('/manager/fleet/edit', 'FleetManagerController@fleetEdit', 'Controllers\\Operator\\Manager');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);

