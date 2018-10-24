<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
$arComponentDescription = [
	"NAME"        => GetMessage("Текущая дата"),
	"DESCRIPTION" => GetMessage("Выводим текущую дату"),
	"PATH"        => [
		"ID"    => "dv_components",
		"CHILD" => [
			"ID"   => "curdate",
			"NAME" => "Текущая дата"
		]
	],
	"ICON"        => "/images/icon.gif",
];
