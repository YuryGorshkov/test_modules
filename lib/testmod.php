<?
use Bitrix\Main\Config\Option;

class Testmod{
    
    public function getPhone(){
        $module_id = pathinfo(dirname(__DIR__))["basename"];
        if(!defined("ADMIN_SECTION") && $ADMIN_SECTION !== true){            
                $phone = Option::get($module_id, "phone");        
            }
        return $phone;
    }
    public function getWhatsApp(){
        $module_id = pathinfo(dirname(__DIR__))["basename"];
        if(!defined("ADMIN_SECTION") && $ADMIN_SECTION !== true){ 
            $whatsapp = Option::get($module_id, "whatsapp");        
        }
        return $whatsapp;
    }
    public function getTelegram(){
        $module_id = pathinfo(dirname(__DIR__))["basename"];
        if(!defined("ADMIN_SECTION") && $ADMIN_SECTION !== true){            
            $telegram = Option::get($module_id, "telegram");            
        }
        return $telegram;
    }
    public function getEmail(){
        $module_id = pathinfo(dirname(__DIR__))["basename"];
        if(!defined("ADMIN_SECTION") && $ADMIN_SECTION !== true){            
            $email = Option::get($module_id, "email");          
        }
        return $email;
    }
}
?>