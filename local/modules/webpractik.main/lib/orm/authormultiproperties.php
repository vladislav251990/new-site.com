<?php
/**
 * Created by PhpStorm.
 * User: Владислав
 * Date: 21.10.2018
 * Time: 14:24
 */

namespace Webpractik\Main\Orm;


use Bitrix\Main,
	Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class ElementPropM12Table
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> IBLOCK_ELEMENT_ID int mandatory
 * <li> IBLOCK_PROPERTY_ID int mandatory
 * <li> VALUE string mandatory
 * <li> VALUE_ENUM int optional
 * <li> VALUE_NUM double optional
 * <li> DESCRIPTION string(255) optional
 * </ul>
 *
 * @package Bitrix\Iblock
 **/

class authormultipropertiestable extends Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'b_iblock_element_prop_m12';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_ID_FIELD'),
			),
			'IBLOCK_ELEMENT_ID' => array(
				'data_type' => 'integer',
				'required' => true,
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_IBLOCK_ELEMENT_ID_FIELD'),
			),
			'IBLOCK_PROPERTY_ID' => array(
				'data_type' => 'integer',
				'required' => true,
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_IBLOCK_PROPERTY_ID_FIELD'),
			),
			'VALUE' => array(
				'data_type' => 'text',
				'required' => true,
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_VALUE_FIELD'),
			),
			'VALUE_ENUM' => array(
				'data_type' => 'integer',
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_VALUE_ENUM_FIELD'),
			),
			'VALUE_NUM' => array(
				'data_type' => 'float',
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_VALUE_NUM_FIELD'),
			),
			'DESCRIPTION' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validateDescription'),
				'title' => Loc::getMessage('ELEMENT_PROP_M12_ENTITY_DESCRIPTION_FIELD'),
			),
		);
	}
	/**
	 * Returns validators for DESCRIPTION field.
	 *
	 * @return array
	 */
	public static function validateDescription()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
}
