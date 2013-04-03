<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 04.04.13
 * Time: 0:19
 * To change this template use File | Settings | File Templates.
 */
namespace Uz\Model;

use Zend\Db\TableGateway\TableGateway;

class UzTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function getUz($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveUz(Uz $uz)
	{
		$data = array(
			'artist' => $uz->artist,
			'title'  => $uz->title,
		);

		$id = (int)$uz->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getUz($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteUz($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}