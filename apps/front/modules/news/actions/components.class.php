<?php
/**
 * News components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class newsComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->newsPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->news = $this->getRecord($query);
  }


}
