<?php

/**
 * Comment form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => false)),
      'name'       => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'web'        => new sfWidgetFormInput(),
      'body'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'ip'         => new sfWidgetFormInput(),
      'ipaddr'     => new sfWidgetFormInput(),
      'reply'      => new sfWidgetFormTextarea(),
      'replied_at' => new sfWidgetFormDateTime(),
      'isdel'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Comment', 'column' => 'id', 'required' => false)),
      'article_id' => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id')),
      'name'       => new sfValidatorString(array('max_length' => 15)),
      'email'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'web'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'body'       => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'ip'         => new sfValidatorString(array('max_length' => 20)),
      'ipaddr'     => new sfValidatorString(array('max_length' => 100)),
      'reply'      => new sfValidatorString(),
      'replied_at' => new sfValidatorDateTime(),
      'isdel'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }


}
