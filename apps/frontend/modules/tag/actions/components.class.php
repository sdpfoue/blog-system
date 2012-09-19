<?php

class tagComponents extends sfComponents
{
  function executeSidebar()
  {
    $c=new Criteria();
    $c->addDescendingOrderByColumn(TagPeer::NB);
    $c->add(TagPeer::NB,0,Criteria::NOT_EQUAL);
    //$c->addJoin(TagPeer::ID,ArticleTagPeer::TAG_ID,Criteria::LEFT_JOIN);
    if(TagPeer::doCount($c)>10)
    {
      $c->setLimit(10);     
      $this->more=true;
    }
    else
      $this->more=false;
    $this->tags=TagPeer::doSelect($c);
    
  }
}
