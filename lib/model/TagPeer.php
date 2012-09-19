<?php

class TagPeer extends BaseTagPeer
{
  static function getAllTags()
  { 
    $c=new Criteria();
    $c->addDescendingOrderByColumn(TagPeer::NB);
    $c->add(TagPeer::NB,0,Criteria::NOT_EQUAL);
    return TagPeer::doSelect($c);
  }
}
