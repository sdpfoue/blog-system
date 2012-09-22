<?php

/**
 * tag actions.
 *
 * @package    blog
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class tagActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  
  protected $max_per_page=20;
  public function executeIndex(sfWebRequest $request)
  {
    $tag=$this->getRoute()->getObject();
    $this->tag=$tag->getName();
    $id=$tag->getId();
    $c=new Criteria();
    $c->add(ArticleTagPeer::TAG_ID,$id);
    $c->add(ArticlePeer::ISDRAFT,0);
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    $c->addJoin(ArticlePeer::ID,ArticleTagPeer::ARTICLE_ID,Criteria::LEFT_JOIN);
    $this->pager = new sfPropelPager(
      'Article',
      $this->max_per_page
    );
    $this->pager->setCriteria($c);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->setPeerMethod('doSelect');
    $this->pager->init();
    $this->articles=$this->pager->getResults();
  }
  public function executeAll()
  {
    $this->tags=TagPeer::getAllTags();
  }
}
