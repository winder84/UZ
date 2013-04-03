<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 04.04.13
 * Time: 0:17
 * To change this template use File | Settings | File Templates.
 */
namespace Uz\Model;

class Uz
{
	public $id;
	public $title;

	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->title  = (isset($data['title'])) ? $data['title'] : null;
	}
}