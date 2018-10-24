<?php

namespace Webpractik\Main\Orm;

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class AgentTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_agent';
    }
    
    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            'ID'             => [
                'data_type'    => 'integer',
                'primary'      => true,
                'autocomplete' => true,
                'title'        => Loc::getMessage('AGENT_ENTITY_ID_FIELD'),
            ],
            'MODULE_ID'      => [
                'data_type'  => 'string',
                'validation' => [__CLASS__, 'validateModuleId'],
                'title'      => Loc::getMessage('AGENT_ENTITY_MODULE_ID_FIELD'),
            ],
            'SORT'           => [
                'data_type' => 'integer',
                'title'     => Loc::getMessage('AGENT_ENTITY_SORT_FIELD'),
            ],
            'NAME'           => [
                'data_type' => 'text',
                'title'     => Loc::getMessage('AGENT_ENTITY_NAME_FIELD'),
            ],
            'ACTIVE'         => [
                'data_type' => 'boolean',
                'values'    => ['N', 'Y'],
                'title'     => Loc::getMessage('AGENT_ENTITY_ACTIVE_FIELD'),
            ],
            'LAST_EXEC'      => [
                'data_type' => 'datetime',
                'title'     => Loc::getMessage('AGENT_ENTITY_LAST_EXEC_FIELD'),
            ],
            'NEXT_EXEC'      => [
                'data_type' => 'datetime',
                'required'  => true,
                'title'     => Loc::getMessage('AGENT_ENTITY_NEXT_EXEC_FIELD'),
            ],
            'DATE_CHECK'     => [
                'data_type' => 'datetime',
                'title'     => Loc::getMessage('AGENT_ENTITY_DATE_CHECK_FIELD'),
            ],
            'AGENT_INTERVAL' => [
                'data_type' => 'integer',
                'title'     => Loc::getMessage('AGENT_ENTITY_AGENT_INTERVAL_FIELD'),
            ],
            'IS_PERIOD'      => [
                'data_type' => 'boolean',
                'values'    => ['N', 'Y'],
                'title'     => Loc::getMessage('AGENT_ENTITY_IS_PERIOD_FIELD'),
            ],
            'USER_ID'        => [
                'data_type' => 'integer',
                'title'     => Loc::getMessage('AGENT_ENTITY_USER_ID_FIELD'),
            ],
            'RUNNING'        => [
                'data_type' => 'boolean',
                'values'    => ['N', 'Y'],
                'title'     => Loc::getMessage('AGENT_ENTITY_RUNNING_FIELD'),
            ],
        ];
    }
    
    /**
     * Returns validators for MODULE_ID field.
     *
     * @return array
     */
    public static function validateModuleId()
    {
        return [
            new Main\Entity\Validator\Length(null, 50),
        ];
    }
}