<?php

namespace Webpractik\Main\Orm;

use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\FileTable;

class ArticleTable extends \Bitrix\Iblock\ElementTable
{
    protected static $SQL_GET_FILENAME = 'IF(!ISNULL(%s), CONCAT("http://new-site.com/upload/", %s, "/", %s) , NULL)';
    
    public static function getMap()
    {
        $arFields                    = parent::getMap();
        $arFields['PROPS']           = new ReferenceField('PROPS', authorpropstable::class, ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID']);
        $arFields['PICTURE']         = new ReferenceField('PICTURE', FileTable::class, ['=this.PREVIEW_PICTURE' => 'ref.ID']);
        $arFields['SOURCE_LIST']     = new ReferenceField('SOURCE_LIST', authormultipropertiestable::class, ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID']);
        $arFields['SERIALIZED_NAME'] = new ReferenceField('SERIALIZED_NAME', authorpropstable::class, ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID']);
        $arFields['IMAGE_PATH']      = new ExpressionField('IMAGE_PATH', 'CONCAT("/upload/",webpractik_main_orm_article_picture.SUBDIR,"/",webpractik_main_orm_article_picture.FILE_NAME )');
        return $arFields;
    }
}
