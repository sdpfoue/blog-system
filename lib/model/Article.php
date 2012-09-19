<?php

class Article extends BaseArticle
{
  function __toSrting()
  {
    return $this->getTitle();
  }
  function getUndelComments(){
    return CommentPeer::getComments($this->getId());
  }
}
