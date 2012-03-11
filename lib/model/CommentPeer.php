<?php

class CommentPeer extends BaseCommentPeer
{
  //得到某文章下的所有未被删除的评论
  static function getComments($articleid){
    $c=new Criteria();
    $c->add(CommentPeer::ARTICLE_ID,$articleid);
    $c->add(CommentPeer::ISDEL,0);
    return CommentPeer::doSelect($c);
  }
  
  static function getAllComments(Criteria $c){
    $c->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
    //$c->add(CommentPeer::ISDEL,0);
    return CommentPeer::doSelect($c);
  }
  
  //得到所有的未被删除的评论
  static function getLastComments($num){
    $c=new Criteria();
    $c->setLimit($num);
    $c->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
    $c->add(CommentPeer::ISDEL,0);
    return CommentPeer::doSelect($c);
  }
  static function delByIp($ip){
    $c=new Criteria();
   
  }
  
  //根据id删除
  static function delById($id)
  {
    $c=new Criteria();
    $c->add(CommentPeer::ID,$id,Criteria::IN);
    $comments=CommentPeer::doSelect($c);
    foreach($comments as $comment){
      if($comment->getIsdel())
        continue;
      $comment->setIsdel(1);
      //$comment->getArticle()->setCommentNb($comment->getArticle()->getCommentNb()-1);
      $comment->save();
    }
  }
  
  //取得最后一条未被删除评论的更新的时间
  static function getLastUpdated()
  {
    $c=new Criteria();
    $c->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
    $c->add(CommentPeer::ISDEL,0);
    $article= CommentPeer::doSelectOne($c);
    return date('c',strtotime($article->getCreatedAt()));
  }
}
