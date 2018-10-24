<?
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use \Bitrix\Main\Application;
use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\EventManager;
use \Bitrix\Main\Event;
use \Webpractik\Main\Events;


Class webpractik_main extends CModule
{
    public $MODULE_ID;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $MODULE_GROUP_RIGHTS;
    public $PARTNER_NAME;
    public $PARTNER_URI;
    
    function __construct()
    {
        $arModuleVersion = [];
        include(dirname(__FILE__) . "/version.php");
        
        $this->MODULE_NAME         = "Основной модуль для сайта";
        $this->MODULE_DESCRIPTION  = "Модуль для выполнения задач по проекту";
        $this->MODULE_ID           = 'webpractik.main';
        $this->MODULE_VERSION      = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME        = 'Webpractik';
        $this->PARTNER_URI         = 'https://webpractik.ru';
    }
    
    function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $eventManager = EventManager::getInstance();
        $eventManager->registerEventHandler(
            'main',
            'OnPageStart',
            $this->MODULE_ID,
            Events::class,
            'responseHandler'
        );
        return true;
    }
    
    function DoUninstall()
    {
        ModuleManager::unregisterModule($this->MODULE_ID);
        return true;
    }
}

?>