<?php

/**
 * BaseDmTestFruit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * 
 * @method string      getTitle() Returns the current record's "title" value
 * @method DmTestFruit setTitle() Sets the current record's "title" value
 * 
 * @package    retest
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmTestFruit extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_test_fruit');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $dmtaggable0 = new Doctrine_Template_DmTaggable();
        $dmblameable0 = new Doctrine_Template_DmBlameable();
        $this->actAs($dmtaggable0);
        $this->actAs($dmblameable0);
    }
}