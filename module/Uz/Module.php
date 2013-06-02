<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 03.04.13
 * Time: 20:32
 * To change this template use File | Settings | File Templates.
 */

// module/Uz/Module.php
namespace Uz;
use Uz\Model\UzTable;
use Zend\Db\ResultSet\ResultSet;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getServiceConfig()
	{
		return array(
			'factories' => array(
				'UzModelUzTable' =>  function($sm) {
					$dbAdapter = $sm->get('ZendDbAdapterAdapter');
					$table = new UzTable($dbAdapter);
					return $table;
				},
			),
		);
	}
}