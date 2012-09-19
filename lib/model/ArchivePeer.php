<?php

class ArchivePeer extends BaseArchivePeer
{
  static function archiveAdd($month){
    $c=new Criteria();
    $c->add(ArchivePeer::MONTH,$month); //查看是否已经有了此月的文章
    if($arch=ArchivePeer::doSelectOne($c)){
      $arch->setNb($arch->getNb()+1); //如果有，此项加1
      $arch->save();
      return $arch->getId();
    }
    else
    {
      $arch=new Archive();
      $arch->setMonth($month);
      $arch->setNb(1);
      $arch->setSlug(str_replace(' ','-',$month));
      $arch->save();
      return $arch->getId();
    }
    
  }
  
  static function archiveDel($id){
    $archive=ArchivePeer::retrieveByPk($id);
    $archive->setNb($archive->getNb()-1);
    $archive->save();
  }
  
  static function getArchives(){
    $c=new Criteria();
    $c->add(ArchivePeer::NB, 0, Criteria::NOT_EQUAL);
    $c->addDescendingOrderByColumn(ArchivePeer::ID);
    $c->setLimit(10); 
    return ArchivePeer::doSelect($c);
  }
    static function getAllArchives(){
    $c=new Criteria();
    $c->add(ArchivePeer::NB, 0, Criteria::NOT_EQUAL);
    $c->addDescendingOrderByColumn(ArchivePeer::ID);
//    $c->setLimit(10); 
    return ArchivePeer::doSelect($c);
  }
}
