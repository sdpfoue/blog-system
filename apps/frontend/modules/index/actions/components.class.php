<?php

class indexComponents extends sfComponents
{
  function executeRecentpost()
  {
    $this->articles=ArticlePeer::getArticles(7);
  }
}
