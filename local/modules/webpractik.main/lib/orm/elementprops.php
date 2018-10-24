<?php

namespace Webpractik\Main\Orm;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class ElementPropS1Table
 *
 * Fields:
 * <ul>
 * <li> IBLOCK_ELEMENT_ID int mandatory
 * <li> PROPERTY_1 double optional
 * </ul>
 *
 * @package Bitrix\Iblock
 **/
class ElementPropsTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock_element_prop_s1';
    }
    
    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            'IBLOCK_ELEMENT_ID' => [
                'data_type' => 'integer',
                'primary'   => true,
                'title'     => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_IBLOCK_ELEMENT_ID_FIELD'),
            ],
            'PROPERTY_PRICE'    => [
                'data_type'   => 'float',
                'column_name' => 'PROPERTY_1',
                'title'       => Loc::getMessage('ELEMENT_PROP_S1_ENTITY_PROPERTY_1_FIELD'),
            ],
        ];
    }
}