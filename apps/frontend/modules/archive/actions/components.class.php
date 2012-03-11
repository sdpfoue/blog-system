<?php

class archiveComponents extends sfComponents
{
  function executeArchive()
  {
    $this->archives=ArchivePeer::getArchives();
    if(ArchivePeer::doCount(new Criteria())>10)
      $this->more=true;
    else
      $this->more=false;    
  }
}
