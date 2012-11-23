<?php
/**
 * Factorys components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class factorysComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->factorysPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->factorys = $this->getRecord($query);
  }


}
