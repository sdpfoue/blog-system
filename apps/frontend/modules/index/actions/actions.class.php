<?php

/**
 * index actions.
 *
 * @package    blog
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class indexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  protected $max_per_page=5;
  public function executeIndex(sfWebRequest $request)
  {
    $this->query='';
    $c=new Criteria();
    $c->add(ArticlePeer::ISDRAFT,0);
    $c->addDescendingOrderByColumn(ArticlePeer::CREATED_AT);
    //$c->addJoin(ArticlePeer::ID,ArticleTagPeer::ARTICLE_ID,Criteria::LEFT_JOIN);
    //$c->addJoin(ArticleTagPeer::TAG_ID,TagPeer::ID);
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
  public function executeArticle(sfWebRequest $request)
  {
    $this->articleid=$articleid=$request->getParameter('id');
    if(!$this->getUser()->isAuthenticated())
      $this->forward404Unless($this->article=ArticlePeer::getArticle($articleid));
    else
      $this->forward404Unless($this->article=ArticlePeer::jishiGetArticle($articleid));
    $this->article->setViewednb($this->article->getViewednb()+1);
    $this->article->save();
    $this->form=new CommentForm();
    if($request->isMethod('post'))
    {
      $form=new CommentForm();
      $form->bind($request->getParameter('comment'));
      if($form->isValid()&&$request->getParameter('val'))
      {
        $ip=$request->getRemoteAddress();
        $ipaddr=Ip::getip($ip);
        $form->getObject()->setArticleId($articleid);
        $form->getObject()->setIp($ip);
        $form->getObject()->setIpaddr($ipaddr);
        if(!$request->getParameter('val')) $form->getObject()->setIsdel(1);
        $form->save();
        $article=ArticlePeer::retrieveByPk($articleid);
        $article->setCommentNb($article->getCommentNb()+1);
        $article->save();
        $newid=$form->getObject()->getId();
      }
      else{
        $this->form=$form;      
			}
    }
    $this->comments=$this->article->getUndelComments();
  }
  public function executeAbout()
  {    
  }
  public function executeDouban()
  {
    
  }
  public function executeTwitter()
  {
    
  }
  public function executeShare()
  {
    
  }
  public function executeTimetable()
  {
    
  }
  public function executeError()
  {
    
  }
	public function executeProjects()
  {
    
  }  
  public function executeSitemap()
  {
    
  }
}
