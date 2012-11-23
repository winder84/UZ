<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version4 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('factorys', 'factorys_image_dm_media_id', array(
             'name' => 'factorys_image_dm_media_id',
             'local' => 'image',
             'foreign' => 'id',
             'foreignTable' => 'dm_media',
             ));
        $this->addIndex('factorys', 'factorys_image', array(
             'fields' => 
             array(
              0 => 'image',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('factorys', 'factorys_image_dm_media_id');
        $this->removeIndex('factorys', 'factorys_image', array(
             'fields' => 
             array(
              0 => 'image',
             ),
             ));
    }
}