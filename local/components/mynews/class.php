<?php

use \Bitrix\Iblock\ElementTable;
use Webpractik\Main\Orm;
use \Webpractik\Main\Orm\authorpropstable;
use \Webpractik\Main\Orm\authormultipropertiestable;
use Bitrix\Main\Loader;
use \Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\FileTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Highloadblock\HighloadBlockTable;

Loader::includeModule("webpractik.main");

\CModule::IncludeModule('iblock');

class mynews extends CBitrixComponent
{
	public function executeComponent() {
		$this->getAllData();
		$this->includeComponentTemplate();
	}

	private function getAllData() {
		$this->arResult = Orm\articleTable::getList([
			'select'  => [
				'NAME',
				'PROPS.AUTHOR',
				'CREATED_BY_USER.NAME',
				'PICTURE',
				'CREATED_BY_USER.SECOND_NAME',
				'IMAGE_PATH', /*'SOURCES_VALUES'*/
				'SERIALIZED_NAME',
				/*'SOURCE_LIST',*/
				'SOURCES_VALUES'
			],
			'filter'  => [
				'IBLOCK_ID' => 12,
				'=ACTIVE'    => 'Y',
			],
			'runtime' => [
				new ExpressionField('SOURCES_VALUES', 'GROUP_CONCAT(webpractik_main_orm_article_source_list.VALUE)')
			],
			'group'   => ['ID']
		])->fetchAll();
	}
}
