<?php

/**
 * Article form base class.
 *
 * @package    blog
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormInput(),
      'title'            => new sfWidgetFormInput(),
      'body'             => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'viewednb'         => new sfWidgetFormInput(),
      'comment_nb'       => new sfWidgetFormInput(),
      'isdraft'          => new sfWidgetFormInputCheckbox(),
      'article_tag_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Tag')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id', 'required' => false)),
      'user_id'          => new sfValidatorInteger(),
      'title'            => new sfValidatorString(array('max_length' => 255)),
      'body'             => new sfValidatorString(),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'viewednb'         => new sfValidatorInteger(),
      'comment_nb'       => new sfValidatorInteger(),
      'isdraft'          => new sfValidatorBoolean(),
      'article_tag_list' => new sfValidatorPropelChoiceMany(array('model' => 'Tag', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['article_tag_list']))
    {
      $values = array();
      foreach ($this->object->getArticleTags() as $obj)
      {
        $values[] = $obj->getTagId();
      }

      $this->setDefault('article_tag_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveArticleTagList($con);
  }

  public function saveArticleTagList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['article_tag_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(ArticleTagPeer::ARTICLE_ID, $this->object->getPrimaryKey());
    ArticleTagPeer::doDelete($c, $con);

    $values = $this->getValue('article_tag_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new ArticleTag();
        $obj->setArticleId($this->object->getPrimaryKey());
        $obj->setTagId($value);
        $obj->save();
      }
    }
  }

}
