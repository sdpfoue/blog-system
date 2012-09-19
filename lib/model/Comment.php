<?php

class Comment extends BaseComment
{
  function editReply($reply)
  {
    $this->setReply($reply);
    $this->setRepliedAt(date("Y-m-d H:i:s"));
    //$this->getArticle()->set
    $this->save();
  }
  
  //保存同时article中的commentNB+1
  function save1(PropelPDO $con = null)
  {
    parent::save($con);
    $articleid=$this->getArticleId();
    $article=ArticlePeer::retrieveByPk($articleid);
    $article->setCommentNb($article->getCommentNb()+1);
    $article->save();
  }

  function setIsdel($v)
  {
    parent::setIsdel($v);
    if(!$v)
    {
      //parent::getArticle()->setCommentNb(parent::getArticle()->getCommentNb()+1);
    }
    else
      parent::getArticle()->setCommentNb(parent::getArticle()->getCommentNb()-2);//save时会自动加1
    parent::getArticle()->save();    
  }
}
