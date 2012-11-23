<?php


class NewsTable extends myDoctrineTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('News');
    }
}