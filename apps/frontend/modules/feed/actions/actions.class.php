<?php

/**
 * feed actions.
 *
 * @package    blog
 * @subpackage feed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class feedActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  protected $tables=array('&nbsp;'=>'&#160;','&hellip;'=>'&#8230;','&ldquo;'=>'&#8220;','&rdquo;'=>'&#8221;',
    '&copy;'=>'&#211;','&middot;'=>'&#183;','&mdash;'=>'&#8212;');
  public function executeIndex(sfWebRequest $request)
  {
    $request->setRequestFormat('atom');
    $this->articles=ArticlePeer::getArticles(10);
    $this->lastUpdated=ArticlePeer::getLastUpdated();
    $this->table=$this->tables;
  }
  public function executeComment(sfWebRequest $request)
  {
    $request->setRequestFormat('atom');
    $this->articles=CommentPeer::getLastComments(10);
    $this->lastUpdated=ArticlePeer::getLastUpdated();
    $this->table=$this->tables;
  }
  public function executeWtt(sfWebRequest $request)
  {
    require('/home2/tjswebin/etc/lib/simplepie/simplepie.inc');
    $feed = new SimplePie();
    $feed->set_feed_url('http://twitter.com/statuses/user_timeline/43442504.rss');
    $feed->handle_content_type();
    $feed->enable_cache(false);
    $feed->init();

    $this->items=$feed->get_items();
    $request->setRequestFormat('atom');
    //$this->articles=CommentPeer::getLastComments(10);
    //$this->lastUpdated=ArticlePeer::getLastUpdated();
    //$this->table=$this->tables;
  }
}
