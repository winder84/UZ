<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 04.04.13
 * Time: 0:19
 * To change this template use File | Settings | File Templates.
 */
namespace Uz\Model;

use Zend\Db\Sql\Sql;

class UzTable
{
	protected $tableGateway;

	public function __construct($dbad)
	{
		$this->adapter = $dbad;
	}

	public function fetchAll($table)
	{
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$select = $sql->select();
		$select->from($table);
		$selectString = $sql->getSqlStringForSqlObject($select);
		$results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
		return $results;
	}

	public function getOne($table, $aVal)
	{
		$adapter = $this->adapter;
		$sql = new Sql($adapter, $table);
		$select = $sql->select();
		$select->where($aVal);

		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute();

		return $results;
	}

	public function updateOne($id, $table,  $uzUpd)
	{
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$update = $sql->update($table);
		$update->where(array('id' => $id));
		$update->set($uzUpd);

		$statement = $sql->prepareStatementForSqlObject($update);
		$results = $statement->execute();
		return $results;
	}

	public function delOne($table, $id)
	{
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$delete = $sql->delete($table);
		$delete->where(array('id' => $id));

		$selectString = $sql->getSqlStringForSqlObject($delete);
		$results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
		return $results;
	}

	public function addOne($table, $aVals) {
		$adapter = $this->adapter;
		$sql = new Sql($adapter);
		$insert = $sql->insert($table);
		$insert->values($aVals);

		$selectString = $sql->getSqlStringForSqlObject($insert);
		$results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
		return $results;
	}
}