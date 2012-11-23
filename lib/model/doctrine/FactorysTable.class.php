<?php


class FactorysTable extends myDoctrineTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Factorys');
    }
}