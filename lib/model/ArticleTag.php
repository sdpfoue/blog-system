<?php

class ArticleTag extends BaseArticleTag
{
  //给文章加tag，如果tag存在插入article_tag，如果不存在，先创建tag,再插入，tag nb+1
  //$id: 文章id
  //$name: tag name
  function addTag($id,$name)
  {
    $name=trim($name); //去掉前后多余空格
    $name=ucfirst($name); //大写第一个字母
    $c=new Criteria();
    $c->add(TagPeer::NAME,$name);
    $tag=TagPeer::doSelectOne($c);
    if($tag) //两个可合并
    {
      $tagid=$tag->getId();
      $article_tag=new ArticleTag();
      $article_tag->setTagId($tagid);
      $article_tag->setArticleId($id);
      $article_tag->savetag($tag);
      //$tag->setNb($tag->getNb()+1);
      //$tag->save();
    }
    else
    {
      $tag=new Tag();
      $tag->setNb(1);
      $tag->setName($name);
      $name=str_replace('.','-',$name);
      $tag->setSlug(str_replace(' ','-',$name));
      $tag->save();
      $tagid=$tag->getId();
      $article_tag=new ArticleTag();
      $article_tag->setTagId($tagid);
      $article_tag->setArticleId($id);
      
      $article_tag->save();
    }
  }
  function getSlug(){
    return $this->getTag()->getSlug();
  }
  public function delete(PropelPDO $con = null){
    $c=new Criteria();
    $c->add(TagPeer::ID,$this->getTagId());
    $tag=TagPeer::doSelectOne($c);
    $tag->setNb($tag->getNb()-1);
    $tag->save();
    parent::delete($con);
  }
  public function savetag(Tag $tag){
    $this->save();

    $tag->setNb($tag->getNb()+1);
    $tag->save();
  }
}
