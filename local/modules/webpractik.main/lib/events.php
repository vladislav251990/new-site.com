<?php
/**
 * Created by PhpStorm.
 * User: vladislavnew
 * Date: 17.08.18
 * Time: 17:55
 */

namespace Webpractik\Main;

use Bitrix\Iblock\ElementTable;
use \Bitrix\Main\Application;


class Events
{
    public function responseHandler()
    {
        global $USER;
        $newName = Application::getInstance()->getContext()->getRequest()->getQuery('name');
        $id = Application::getInstance()->getContext()->getRequest()->getQuery('id');
        if ($id && $newName) {
            $chandedElement = new \CIBlockElement;
            $arLoadProductArray = Array(
                "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                "NAME" => $newName,
                "ACTIVE" => "Y",            // активен
            );
            $chandedElement->Update($id, $arLoadProductArray);

        }
    }
}