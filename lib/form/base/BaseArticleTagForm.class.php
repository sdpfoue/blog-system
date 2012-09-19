<?php

/**
 * ArticleTag form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseArticleTagForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'     => new sfWidgetFormInputHidden(),
      'article_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'tag_id'     => new sfValidatorPropelChoice(array('model' => 'Tag', 'column' => 'id', 'required' => false)),
      'article_id' => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ArticleTag';
  }


}
