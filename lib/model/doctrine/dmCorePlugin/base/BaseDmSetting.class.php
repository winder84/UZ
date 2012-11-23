<?php

/**
 * BaseDmSetting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property enum $type
 * @property string $value
 * @property string $params
 * @property string $group_name
 * @property string $default_value
 * @property string $credentials
 * 
 * @method string    getName()          Returns the current record's "name" value
 * @method string    getDescription()   Returns the current record's "description" value
 * @method enum      getType()          Returns the current record's "type" value
 * @method string    getValue()         Returns the current record's "value" value
 * @method string    getParams()        Returns the current record's "params" value
 * @method string    getGroupName()     Returns the current record's "group_name" value
 * @method string    getDefaultValue()  Returns the current record's "default_value" value
 * @method string    getCredentials()   Returns the current record's "credentials" value
 * @method DmSetting setName()          Sets the current record's "name" value
 * @method DmSetting setDescription()   Sets the current record's "description" value
 * @method DmSetting setType()          Sets the current record's "type" value
 * @method DmSetting setValue()         Sets the current record's "value" value
 * @method DmSetting setParams()        Sets the current record's "params" value
 * @method DmSetting setGroupName()     Sets the current record's "group_name" value
 * @method DmSetting setDefaultValue()  Sets the current record's "default_value" value
 * @method DmSetting setCredentials()   Sets the current record's "credentials" value
 * 
 * @package    diem_uz
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmSetting extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_setting');
        $this->hasColumn('name', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 127,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'values' => 
             array(
              0 => 'text',
              1 => 'boolean',
              2 => 'select',
              3 => 'textarea',
              4 => 'number',
              5 => 'datetime',
             ),
             'default' => 'text',
             ));
        $this->hasColumn('value', 'string', 60000, array(
             'type' => 'string',
             'length' => 60000,
             ));
        $this->hasColumn('params', 'string', 60000, array(
             'type' => 'string',
             'length' => 60000,
             ));
        $this->hasColumn('group_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 255,
             ));
        $this->hasColumn('default_value', 'string', 60000, array(
             'type' => 'string',
             'default' => '',
             'length' => 60000,
             ));
        $this->hasColumn('credentials', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'description',
              1 => 'value',
              2 => 'default_value',
             ),
             ));
        $this->actAs($i18n0);
    }
}