<?php

/**
 * test actions.
 *
 * @package    blog
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    /*$mail=new sfMail();
    $mail->addAddress('stephen.j.tong@gmail.com','Jishi');
    $mail->setBody('it\'s <br/>a test');
    $mail->setSender('jishi@tjsweb.info','jishi');
    $mail->addReplyTo('jishi@tjsweb.info','jishi');
    $mail->send();*/
    mail('stephen.j.tong@gmail.com',"test","test","From:kjd@gmail.com\r\n");
    
  }
}