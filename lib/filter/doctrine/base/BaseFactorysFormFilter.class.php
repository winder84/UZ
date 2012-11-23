<?php

/**
 * Factorys filter form base class.
 *
 * @package    diem_uz
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseFactorysFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'     => new sfWidgetFormDmFilterInput(),
      'body'      => new sfWidgetFormDmFilterInput(),
      'image'     => new sfWidgetFormDoctrineChoice(array('model' => 'DmMedia', 'add_empty' => true)),
      'is_active' => new sfWidgetFormChoice(array('choices' => array('' => $this->getI18n()->__('yes or no', array(), 'dm'), 1 => $this->getI18n()->__('yes', array(), 'dm'), 0 => $this->getI18n()->__('no', array(), 'dm')))),
    ));

    $this->setValidators(array(
      'title'     => new sfValidatorPass(array('required' => false)),
      'body'      => new sfValidatorPass(array('required' => false)),
      'image'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Image'), 'column' => 'id')),
      'is_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));
    

    $this->widgetSchema->setNameFormat('factorys_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factorys';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'title'     => 'Text',
      'body'      => 'Text',
      'image'     => 'ForeignKey',
      'is_active' => 'Boolean',
    );
  }
}
