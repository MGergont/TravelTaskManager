<?php

declare(strict_types=1);

namespace Src\Views;

use Src\Utils\Lang;
class View
{	
	private Lang $lang;
	private array $langTemplate;
	private array $langTemplateNav;

	public function __construct()
    {
    	$this->lang = new Lang();
    }

	public function renderAdmin(string $page, array $params, $path): void
	{
		$params = $this->escape($params);
		$this->LangParams($params, $page);

		switch ($path) {
			case 'admin':
				$this->LangParamsNav($params, "navAdmin");
				require_once("./Src/Views/Template/admin/$page.php");
				break;
			default:
				require_once("./Src/Views/Template/404.php");
				break;
		}
	}

	public function renderOperator(string $page, array $params, $path): void
	{
		$params = $this->escape($params);
		$this->LangParams($params, $page);

		switch ($path) {
			case 'manager':
				$this->LangParamsNav($params, "navUser");
				require_once("./Src/Views/Template/operator/manager/$page.php");
				break;
			case 'user':
				$this->LangParamsNav($params, "navUser");
				require_once("./Src/Views/Template/operator/user/$page.php");
				break;
			case '':
				require_once("./Src/Views/Template/operator/$page.php");
				break;
			default:
				require_once("./Src/Views/Template/404.php");
				break;
		}
	}


	private function LangContents(string $prefix) : void {
		echo $this->langTemplate[$prefix];
	}

	private function LangContentsNav(string $prefix) : void {
		echo $this->langTemplateNav[$prefix];
	}

	private function LangParams(array $params, $page) : void {
		$this->lang->setLanguage($params['lang']);
		$this->lang->setTamplate($page);
		$this->langTemplate = $this->lang->get();
	}

	private function LangParamsNav(array $params, $path) : void {
		$this->lang->setLanguage($params['lang']);
		$this->lang->setTamplate($path);
		$this->langTemplateNav = $this->lang->get();
	}

	private function escape($params)
	{
		$clearParams = [];
		
		foreach ($params as $key => $param) {
		switch (true) {
			case is_array($param):
				$clearParams[$key] = $this->escape($param);
				break;
			case is_object($param):
                if ($param instanceof \stdClass) {
                    $clearParams[$key] = $this->escapeObject($param);
                } else {
                    $clearParams[$key] = $param;
                }
                break;
			case is_int($param):
				$clearParams[$key] = $param;
			case is_float($param):
				$clearParams[$key] = $param;
				break;
			case $param:
				$clearParams[$key] = htmlentities($param, ENT_QUOTES, 'UTF-8');
				break;
			default:
				$clearParams[$key] = $param;
				break;
		}
		}

		return $clearParams;
	}

	private function escapeObject($object)
{
    $escapedObject = new \stdClass();

    foreach ($object as $key => $value) {
        if (is_array($value)) {
            $escapedObject->$key = $this->escape($value);
        } elseif (is_object($value)) {
            $escapedObject->$key = $this->escapeObject($value);
        } elseif (is_int($value) || is_float($value)) {
            $escapedObject->$key = $value;
        } elseif (is_string($value)) {
            $escapedObject->$key = htmlentities($value, ENT_QUOTES, 'UTF-8');
        } else {
            $escapedObject->$key = $value;
        }
    }

    return $escapedObject;
}
}