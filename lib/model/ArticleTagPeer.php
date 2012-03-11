<?php

class ArticleTagPeer extends BaseArticleTagPeer
{
  static function delTag($articleid,$tagid)
  {
    $c=new Criteria();
    $c->add(ArticleTagPeer::ARTICLE_ID,$articleid);
    $c->add(ArticleTagPeer::TAG_ID,$tagid);
    $tag_article=ArticleTagPeer::doSelectone($c);
    
    $tag_article->delete();

  }
}
