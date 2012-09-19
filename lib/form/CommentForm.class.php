<?php

/**
 * Comment form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
    unset($this['article_id'],$this['replied_at'],$this['reply'],$this['created_at'],
      $this['updated_at'],$this['ip'],$this['ipaddr'],$this['isdel']);
      
    $this->widgetSchema['body']=new sfWidgetFormTextarea(array(),array('cols'=>60,'rows'=>8));
    
    $this->validatorSchema['web']=new sfValidatorUrl(array('required'=>false));
    $this->validatorSchema['email']=new sfValidatorEmail(array('required'=>false));
    
    $this->widgetSchema->setLabels(array('name'=>'Name (required) ','email'=>
      'Email (won\'t be published) ', 'web'=>'Website','body'=>'Content (required)'));
    
    
  }
}