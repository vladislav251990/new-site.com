<?php

namespace Webpractik\Main\Orm;

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

/**
 * Class ElementPropS12Table
 *
 * Fields:
 * <ul>
 * <li> IBLOCK_ELEMENT_ID int mandatory
 * <li> PROPERTY_62 string optional
 * </ul>
 *
 * @package Bitrix\Iblock
 **/
class authorpropstable extends Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName() {
		return 'b_iblock_element_prop_s12';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap() {
		return [
			new Entity\IntegerField('IBLOCK_ELEMENT_ID', ['primary' => true, 'title' => Loc::getMessage('ELEMENT_PROP_S12_ENTITY_IBLOCK_ELEMENT_ID_FIELD')])
			,
			new Entity\StringField('AUTHOR', [
				'column_name' => 'PROPERTY_62',
			]),
			new Entity\StringField('SERIALIZED_NAME', [
				'column_name'             => 'PROPERTY_63',
				'save_data_modification' => function () {
					return array(
						function ($value) {
							return serialize($value);
						}
					);
				},
				'fetch_data_modification' => function() {
					return [
						function($value) {
							return unserialize($value);
						}
					];
				}
			])
		];
	}
}

