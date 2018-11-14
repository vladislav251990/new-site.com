<?php

namespace Webpractik\Main\Orm;

use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\FileTable;
use Bitrix\Main\ORM\Query\Join;

class ArticleTable extends \Bitrix\Iblock\ElementTable
{
    protected static $SQL_GET_FILENAME = 'IF(!ISNULL(%s), CONCAT("http://new-site.com/upload/", %s, "/", %s) , NULL)';
    
    public static function getMap()
    {
        $arFields                    = parent::getMap();
        $arFields['PROPS']           = new ReferenceField('PROPS', AuthorPropsTable::class, Join::on('this.ID', 'ref.IBLOCK_ELEMENT_ID'));
        $arFields['PICTURE']         = new ReferenceField('PICTURE', FileTable::class, Join::on('this.PREVIEW_PICTURE', 'ref.ID'));
        $arFields['SOURCE_LIST']     = new ReferenceField('SOURCE_LIST', AuthorMultiPropertiesTable::class, Join::on('this.ID', 'ref.IBLOCK_ELEMENT_ID'));
        $arFields['SERIALIZED_NAME'] = new ReferenceField('SERIALIZED_NAME', AuthorPropsTable::class, Join::on('this.ID', 'ref.IBLOCK_ELEMENT_ID'));
        $arFields['IMAGE_PATH']      = new ExpressionField('IMAGE_PATH', 'CONCAT("/upload/",webpractik_main_orm_article_picture.SUBDIR,"/",webpractik_main_orm_article_picture.FILE_NAME )');
        return $arFields;
    }
}
