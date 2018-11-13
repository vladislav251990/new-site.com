<?php

use Bitrix\Main\Loader;
use Webpractik\Main\Orm;
use \Bitrix\Main\Entity\ExpressionField;

Loader::includeModule("webpractik.main");

\CModule::IncludeModule('iblock');

class MyNews extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->getAllData();
        $this->includeComponentTemplate();
    }
    
    private function getAllData()
    {
        \Bitrix\Main\HttpApplication::getConnection()->startTracker();
        $dbResult = Orm\ArticleTable::getList([
            'select'  => [
                'NAME',
                'AUTHOR' => 'PROPS.AUTHOR',
                'CREATED_BY_USER.NAME',
                'PICTURE',
                'CREATED_BY_USER.SECOND_NAME',
                'IMAGE_PATH', /*'SOURCES_VALUES'*/
                'SERIALIZED_NAME',
                // 'SOURCE_LIST',
                'SOURCES_VALUES'
            ],
            'filter'  => [
                'IBLOCK_ID' => 12,
                '=ACTIVE'   => 'Y',
            ],
            'runtime' => [
                new ExpressionField('SOURCES_VALUES', 'GROUP_CONCAT(%s)', 'SOURCE_LIST.VALUE')
            ],
            'group'   => ['ID'],
        ]);
        
        
        $this->arResult = $dbResult->fetchAll();
        
        echo '<pre>', $dbResult->getTrackerQuery()->getSql(), '</pre>';
        
    }
}
