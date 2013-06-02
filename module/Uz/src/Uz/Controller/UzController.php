<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 03.04.13
 * Time: 20:36
 * To change this template use File | Settings | File Templates.
 */

namespace Uz\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UzController extends AbstractActionController
{
	protected $uztable;

	public function indexAction()
	{
	}

	public function strukturaAction()
	{
	}

	public function prodAction()
	{
		$oBuy = $this->getUzTable()->fetchAll('buy');
		foreach($oBuy as $Buy)
		{
			$aBuy[$Buy->id]['title'] = $Buy->title;
			$aBuy[$Buy->id]['sum'] = $Buy->sum;
			$aBuy[$Buy->id]['bazis'] = $Buy->bazis;
			$aBuy[$Buy->id]['price'] = $Buy->price;
			$aBuy[$Buy->id]['buy_date'] = $Buy->buy_date;
			$aBuy[$Buy->id]['delivery_date'] = $Buy->delivery_date;
		}

		$oSold = $this->getUzTable()->fetchAll('sold');
		foreach($oSold as $Sold)
		{
			$aSold[$Sold->id]['title'] = $Sold->title;
			$aSold[$Sold->id]['sum'] = $Sold->sum;
			$aSold[$Sold->id]['bazis'] = $Sold->bazis;
			$aSold[$Sold->id]['price'] = $Sold->price;
			$aSold[$Sold->id]['buy_date'] = $Sold->buy_date;
			$aSold[$Sold->id]['delivery_date'] = $Sold->delivery_date;
		}
		return new ViewModel(array(
			'aSold' => $aSold,
			'aBuy' => $aBuy,
		));
	}

	public function contactsAction()
	{
	}


	public function addAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}
		$id = (int) $this->params()->fromRoute('id');
		if($id==1)
		{
			$msg = 'Закупка товара';
			$table = 'buy';
		} else
		{
			$msg = 'Реализация товара';
			$table = 'sold';
		}

		if($_POST['sub_btn'] == 'Отмена')
		{
			return $this->redirect()->toUrl('/admin');
		} else
		{
			if (isset($_POST['changed']))
			{
				$aVals['title'] = $_POST['title'];
				$aVals['sum'] = $_POST['sum'];
				$aVals['bazis'] = $_POST['bazis'];
				$aVals['price'] = $_POST['price'];
				$aVals['buy_date'] = $_POST['buy_date'];
				$aVals['delivery_date'] = $_POST['delivery_date'];
				$this->getUzTable()->addOne($table, $aVals);
				return $this->redirect()->toUrl('/admin');
			}
		}

		return new ViewModel(array(
			'msg' => $msg,
		));
	}

	public function adminAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity()) {
			return $this->redirect()->toRoute('zfcuser/login');
		}

		$oBuy = $this->getUzTable()->fetchAll('buy');
		foreach($oBuy as $Buy)
		{
			$aBuy[$Buy->id]['title'] = $Buy->title;
			$aBuy[$Buy->id]['sum'] = $Buy->sum;
			$aBuy[$Buy->id]['bazis'] = $Buy->bazis;
			$aBuy[$Buy->id]['price'] = $Buy->price;
			$aBuy[$Buy->id]['buy_date'] = $Buy->buy_date;
			$aBuy[$Buy->id]['delivery_date'] = $Buy->delivery_date;
		}

		$oSold = $this->getUzTable()->fetchAll('sold');
		foreach($oSold as $Sold)
		{
			$aSold[$Sold->id]['title'] = $Sold->title;
			$aSold[$Sold->id]['sum'] = $Sold->sum;
			$aSold[$Sold->id]['bazis'] = $Sold->bazis;
			$aSold[$Sold->id]['price'] = $Sold->price;
			$aSold[$Sold->id]['buy_date'] = $Sold->buy_date;
			$aSold[$Sold->id]['delivery_date'] = $Sold->delivery_date;
		}
		return new ViewModel(array(
			'aSold' => $aSold,
			'aBuy' => $aBuy,
		));
	}

	public function buyAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity())
		{
			return $this->redirect()->toRoute('zfcuser/login');
		}
		if($_POST['sub_btn'] == 'Закрыть')
		{
			return $this->redirect()->toUrl('/admin');
		} else
		{
			if (isset($_POST['changed']))
			{
				$aBuyUpd['title'] = $_POST['title'];
				$aBuyUpd['sum'] = $_POST['sum'];
				$aBuyUpd['bazis'] = $_POST['bazis'];
				$aBuyUpd['price'] = $_POST['price'];
				$aBuyUpd['buy_date'] = $_POST['buy_date'];
				$aBuyUpd['delivery_date'] = $_POST['delivery_date'];
				$this->getUzTable()->updateOne($_POST['id'], 'buy', $aBuyUpd);
			}
		}

		$id = (int) $this->params()->fromRoute('id');
		$oBuy = $this->getUzTable()->getOne('buy', array('id' => $id));
		foreach($oBuy as $Buy)
		{
			$aBuy['title'] = $Buy['title'];
			$aBuy['sum'] = $Buy['sum'];
			$aBuy['bazis'] = $Buy['bazis'];
			$aBuy['price'] = $Buy['price'];
			$aBuy['buy_date'] = $Buy['buy_date'];
			$aBuy['delivery_date'] = $Buy['delivery_date'];
			$aBuy['id'] = $id;
		}

		return new ViewModel(array(
			'aBuy' => $aBuy,
		));
	}

	public function soldAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity())
		{
			return $this->redirect()->toRoute('zfcuser/login');
		}
		if($_POST['sub_btn'] == 'Закрыть')
		{
			return $this->redirect()->toUrl('/admin');
		} else
		{
			if (isset($_POST['changed']))
			{
				$aSoldUpd['title'] = $_POST['title'];
				$aSoldUpd['sum'] = $_POST['sum'];
				$aSoldUpd['bazis'] = $_POST['bazis'];
				$aSoldUpd['price'] = $_POST['price'];
				$aSoldUpd['buy_date'] = $_POST['buy_date'];
				$aSoldUpd['delivery_date'] = $_POST['delivery_date'];
				$this->getUzTable()->updateOne($_POST['id'], 'sold', $aSoldUpd);
			}
		}

		$id = (int) $this->params()->fromRoute('id');
		$oSold = $this->getUzTable()->getOne('sold', array('id' => $id));
		foreach($oSold as $Sold)
		{
			$aSold['title'] = $Sold['title'];
			$aSold['sum'] = $Sold['sum'];
			$aSold['bazis'] = $Sold['bazis'];
			$aSold['price'] = $Sold['price'];
			$aSold['buy_date'] = $Sold['buy_date'];
			$aSold['delivery_date'] = $Sold['delivery_date'];
			$aSold['id'] = $id;
		}

		return new ViewModel(array(
			'aSold' => $aSold,
		));
	}

	public function solddelAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity())
		{
			return $this->redirect()->toRoute('zfcuser/login');
		}
		$id = (int) $this->params()->fromRoute('id');
		if(isset($_POST['sub_btn']))
		{
			if($_POST['sub_btn'] == 'Да')
			{
				$this->getUzTable()->delOne('sold', $id);
				return $this->redirect()->toUrl('/admin');
			} else
			{
				return $this->redirect()->toUrl('/admin');
			}
		}

		$oSold = $this->getUzTable()->getOne('sold', array('id' => $id));
		foreach($oSold as $Sold)
		{
			$aSold['title'] = $Sold['title'];
			$aSold['id'] = $id;
		}

		return new ViewModel(array(
			'aSold' => $aSold,
		));
	}

	public function buydelAction()
	{
		if (!$this->zfcUserAuthentication()->hasIdentity())
		{
			return $this->redirect()->toRoute('zfcuser/login');
		}
		$id = (int) $this->params()->fromRoute('id');
		if(isset($_POST['sub_btn']))
		{
			if($_POST['sub_btn'] == 'Да')
			{
				$this->getUzTable()->delOne('buy', $id);
				return $this->redirect()->toUrl('/admin');
			} else
			{
				return $this->redirect()->toUrl('/admin');
			}
		}

		$oBuy = $this->getUzTable()->getOne('buy', array('id' => $id));
		foreach($oBuy as $Buy)
		{
			$aBuy['title'] = $Buy['title'];
			$aBuy['id'] = $id;
		}

		return new ViewModel(array(
			'aBuy' => $aBuy,
		));
	}

	public function getUzTable()
	{
		if (!$this->uztable) {
			$sm = $this->getServiceLocator();
			$this->uztable = $sm->get('Uz\Model\UzTable');
		}
		return $this->uztable;
	}
}