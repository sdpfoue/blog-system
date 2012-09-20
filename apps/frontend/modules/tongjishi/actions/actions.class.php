<?php

/**
 * tongjishi actions.
 *
 * @package    blog
 * @subpackage tongjishi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class tongjishiActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */

	protected $max_per_page=7;
	public function executeIndex(sfWebRequest $request)
	{
		//$this->forward('default', 'module');
	}

	public function executeSignin(sfWebRequest $request)
	{
		if($this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		if($request->isMethod('post'))
		{
			$c=new Criteria;      
			$c->add(UserPeer::ID,1);
			$c->add(UserPeer::PASSWORD,$request->getParameter('pwd'));
			if(UserPeer::doCount($c))
			{
				$this->getUser()->setAuthenticated(true);
				$this->redirect($request->getReferer());
			}
		}
	}
	public function executeArticle(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/signin');
		$request->setParameter('page',$request->getParameter('page'));
		$this->pager = new sfPropelPager(
			'Article',
			$this->max_per_page
		);
		$this->pager->setPage($request->getParameter('page', 1));
		$this->pager->setPeerMethod('getAllArticles');
		$this->pager->init();
		$this->articles=$this->pager->getResults();    
	}
	public function executeNewarticle(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$article=new Article();
		//$article->setBody('text');
		$this->article="";
		$this->checked="";
		$this->form=new ArticleForm($article);
		$form=new ArticleForm();
		$form->bind($request->getParameter('article'));
		if($request->isMethod('post')&&$form->isValid())
		{
			$month=date("M Y");
			$archiveid=ArchivePeer::archiveAdd($month);
			$form->getObject()->setUserId(1);
			$form->getObject()->setArchiveId($archiveid);
			if($request->getParameter('isdraft'))
				$form->getObject()->setIsdraft(1);
			$form->save();
			$id=$form->getObject()->getId();
			if($tags=$request->getParameter('tag')){
				$tags=split(',',$tags);
				$id=$form->getObject()->getId();
				foreach($tags as $tag)
				{
					$tag_a=new ArticleTag();
					try{
						$tag_a->addTag($id,$tag);
					}
					catch(Exception $e)
					{
					}
				}
			}
			if($request->getParameter('commit')=='submit')
				$this->redirect('tongjishi/article');
			else
				$this->redirect('tongjishi/edit?id='.$id);
		}
		else if($request->isMethod('post'))
			$this->form=$form;

	}
	public function executeEdit(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$this->setTemplate('newarticle');
		$this->article=$articleid=$request->getParameter('id');
		$article=ArticlePeer::retrieveByPk($articleid);
		$this->form=new ArticleForm($article);
		$this->checked=$article->getIsdraft();
		$form=new ArticleForm($article);

		$form->bind($request->getParameter('article'));
		$form->getObject()->setId($articleid);
		if($request->isMethod('post')&&$form->isValid())
		{
			$form->getObject()->setUserId(1);
			if($request->getParameter('isdraft'))
				$form->getObject()->setIsdraft(1);
			else
				$form->getObject()->setIsdraft(0);
			$form->save();
			if($tags=$request->getParameter('tag')){
				$tags=split(',',$tags);
				$id=$articleid;
				foreach($tags as $tag)
				{
					$tag_a=new ArticleTag();
					try{
						$tag_a->addTag($id,$tag);
					}
					catch(Exception $e)
					{
					}
				}
			}
			if($request->getParameter('commit')=='submit')
				$this->redirect('tongjishi/article');
			else
				$this->form=$form;
		}
		else if($request->isMethod('post'))
			$this->form=$form;

	}

	public function executeDelPwd(sfwebRequest $request){
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$articleid = $request->getParameter('id');
		$article = ArticlePeer::retrieveByPk($articleid);
		$article->setPwd(null);
		$article->save();
		$this->redirect($request->getReferer());
	}

	public function executeGeneratePwd(sfwebRequest $request){
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$articleid = $request->getParameter('id');
		$article = ArticlePeer::retrieveByPk($articleid);
		$article->setPwd($this->_randString(10));
		$article->save();
		$this->redirect($request->getReferer());
	}

	private function _randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghipqrstuvwxyz0123456789')
	{
		$str = '';
		$count = strlen($charset);
		while ($length--) {
			$str .= $charset[mt_rand(0, $count-1)];
		}
		return $str;
	}

	public function executeDel(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$articleid=$request->getParameter('id');
		$article=ArticlePeer::retrieveByPk($articleid);
		ArchivePeer::archiveDel($article->getArchiveId());
		$article->delete();
		$this->redirect($request->getReferer());
	}
	public function executeDeltag(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$articleid=$request->getParameter('articleid');
		$tagid=$request->getParameter('tagid');
		$articletag=ArticleTagPeer::delTag($articleid,$tagid);
		$this->redirect('tongjishi/article');
	}
	public function executeDelcomment(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/article');
		$ids=$request->getParameter('id');
		CommentPeer::delById($ids);
		$this->redirect($request->getReferer());
	}
	public function executeComment(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/signin');

		$ip=$request->getParameter('ip');
		$articleid=$request->getParameter('aid');
		$c=new Criteria();
		if($ip) $c->add(CommentPeer::IP,$ip);
		if($articleid) $c->add(CommentPeer::ARTICLE_ID,$articleid);
		if($request->getParameter('isdel')) $c->add(CommentPeer::ISDEL,1);
		else $c->add(CommentPeer::ISDEL,0);

		$request->setParameter('page',$request->getParameter('page'));
		$this->pager = new sfPropelPager(
			'Comment',
			15
		);
		$this->pager->setPage($request->getParameter('page', 1));

		$this->pager->setPeerMethod('getAllComments');
		$this->pager->setCriteria($c);
		$this->pager->init();
		$this->articles=$this->pager->getResults();    
	}
	public function executeReply(sfwebRequest $request)
	{
		if(!$this->getUser()->isAuthenticated())
			$this->redirect('tongjishi/signin');

		$this->comment=CommentPeer::retrieveByPk($request->getParameter('id'));
		if($request->isMethod('post'))
		{
			$reply=$request->getParameter('reply');
			$this->comment->editReply($reply);
			$this->redirect('tongjishi/comment');
		}
	}

	public function executeSignout()
	{
		$this->getUser()->setAuthenticated(false);
		$this->redirect('index/index');
	}


}
