<?php
/**
 * Podrazdelenia components
 * 
 * No redirection nor database manipulation ( insert, update, delete ) here
 */
class podrazdeleniaComponents extends myFrontModuleComponents
{

  public function executeList()
  {
    $query = $this->getListQuery();
    
    $this->podrazdeleniaPager = $this->getPager($query);
  }

  public function executeShow()
  {
    $query = $this->getShowQuery();
    
    $this->podrazdelenia = $this->getRecord($query);
  }


}
