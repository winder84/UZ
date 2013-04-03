<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 03.04.13
 * Time: 20:33
 * To change this template use File | Settings | File Templates.
 */
return array(
	'controllers' => array(
		'invokables' => array(
			'Uz\Controller\Uz' => 'Uz\Controller\UzController',
		),
	),
	'router' => array(
		'routes' => array(
			'uz' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Uz\Controller\Uz',
						'action'     => 'index',
					),
				),
			),
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'uz' => __DIR__ . '/../view',
		),
	),
);