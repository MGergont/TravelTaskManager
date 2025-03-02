<?php

declare(strict_types=1);

namespace Src\Tools;

use Src\Controllers\EmailSendController;
use Src\Utils\Request;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../Src/Tools/bootstrap.php'; // Autoload przez Composer

$request = new Request($_GET, $_POST, $_SERVER);
$controller = new EmailSendController($request);

// echo $controller->EndInsurance();
echo $controller->EndTechInspect();