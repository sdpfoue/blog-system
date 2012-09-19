<?php

class ArticlePeer extends BaseArticlePeer
{
  static function getArticle($id)
  {
    $c=new Criteria();
    $c->add(ArticlePeer::ID,$id);
    $c->add(ArticlePeer::ISDRAFT,0);
    $c->addJoin(ArticlePeer::ID,ArticleTagPeer::ARTICLE_ID,Criteria::LEFT_JOIN);
    $c->addJoin(ArticleTagPeer::TAG_ID,TagPeer::ID,Criteria::LEFT_JOIN);
    return ArticlePeer::doSelectOne($c);
    
    /*$c=new Criteria();
    $c->add(ArticlePeer::ID,$id);
    $c->addJoin(ArticlePeer::ID,ArticleTagPeer::ARTICLE_ID,Criteria::LEFT_JOIN);
    $c->addJoin(ArticleTagPeer::TAG_ID,TagPeer::ID,Criteria::LEFT_JOIN);
    return ArticlePeer::doSelectone($c);*/  
  }
  
  static function jishiGetArticle($id)
  {
    $c=new Criteria();
    $c->add(ArticlePeer::ID,$id);
    //$c->add(ArticlePeer::ISDRAFT,0);
    $c->addJoin(ArticlePeer::ID,ArticleTagPeer::ARTICLE_ID,Criteria::LEFT_JOIN);
    $c->addJoin(ArticleTagPeer::TAG_ID,TagPeer::ID,Criteria::LEFT_JOIN);
    return ArticlePeer::doSelectOne($c);
  }
  
  static function retrieveByArchive($id)
  {
    $c=new Criteria();
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    $c->add(ArticlePeer::ARCHIVE_ID,$id);
    $c->add(ArticlePeer::ISDRAFT,0);
    return ArticlePeer::doSelect($c);
  }
  
  static function getArticles($num)
  {
    $c=new Criteria();
    $c->add(ArticlePeer::ISDRAFT,0);
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    $c->setLimit($num);
    return ArticlePeer::doSelect($c);
  }
  
  static function getAllArticles(Criteria $c)
  {    
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    return ArticlePeer::doSelect($c);
  }
  static function getLastUpdated()
  {
    $c=new Criteria();
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    $article= ArticlePeer::doSelectOne($c);
    return date('c',strtotime($article->getCreatedAt()));
  }
  
}