<?php

/**
 * Article form.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
    unset($this['user_id'],$this['created_at'],$this['updated_at'],$this['comment_nb'],
      $this['article_tag_list'],$this['isdraft'],$this['viewednb']);
    $this->widgetSchema['title']=new sfWidgetFormInput(array(),array('size'=>50));
    $this->widgetSchema['body']=new sfWidgetFormTextarea(array(),array('cols'=>60,
      'rows'=>50,));
    
    $this->widgetSchema['isdraft']= new sfWidgetFormInputCheckbox();
    
  }
}
