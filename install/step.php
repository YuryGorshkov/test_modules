<?if(!check_bitrix_sessid()) return;?>
<?
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
echo CAdminMessage::ShowNote(Loc::getMessage("TEST_MODULE_INSTALLATION_COMPLETED"));
?>