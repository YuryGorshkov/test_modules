<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;
Loc::loadMessages(__FILE__);

Class test_module extends CModule
{
    var $MODULE_ID = "test_module";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = Loc::getMessage("TEST_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("TEST_MODULE_DESCRIPTION");
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/test_module/install/components",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/local/components/tcomp");
        return true;
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->InstallFiles();
        RegisterModule("test_module");
        $APPLICATION->IncludeAdminFile(Loc::getMessage("TEST_MODULE_INSTALL"), $DOCUMENT_ROOT."/local/modules/test_module/install/step.php");
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallFiles();
        UnRegisterModule("test_module");
        $APPLICATION->IncludeAdminFile(Loc::getMessage("TEST_MODULE_UNINSTALL"), $DOCUMENT_ROOT."/local/modules/test_module/install/unstep.php");
    }
}
?>