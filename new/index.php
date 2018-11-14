<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('');
$APPLICATION->IncludeComponent(
    'mynews',
    '',
    []
);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
