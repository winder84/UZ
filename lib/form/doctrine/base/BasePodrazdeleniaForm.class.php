<?php

/**
 * Podrazdelenia form base class.
 *
 * @method Podrazdelenia getObject() Returns the current form's model object
 *
 * @package    diem_uz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BasePodrazdeleniaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInputText(),
      'body'      => new sfWidgetFormTextarea(),
      'image'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'add_empty' => true)),
      'is_active' => new sfWidgetFormInputCheckbox(),

    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 120)),
      'body'      => new sfValidatorString(array('required' => false)),
      'image'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Image'), 'required' => false)),
      'is_active' => new sfValidatorBoolean(array('required' => false)),
    ));

    /*
     * Embed Media form for image
     */
    $this->embedForm('image_form', $this->createMediaFormForImage());
    unset($this['image']);

    $this->widgetSchema->setNameFormat('podrazdelenia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
    
    // Unset automatic fields like 'created_at', 'updated_at', 'position'
    // override this method in your form to keep them
    parent::unsetAutoFields();
  }

  /**
   * Creates a DmMediaForm instance for image
   *
   * @return DmMediaForm a form instance for the related media
   */
  protected function createMediaFormForImage()
  {
    return DmMediaForRecordForm::factory($this->object, 'image', 'Image', $this->validatorSchema['image']->getOption('required'));
  }

  protected function doBind(array $values)
  {
    $values = $this->filterValuesByEmbeddedMediaForm($values, 'image');
    parent::doBind($values);
  }
  
  public function processValues($values)
  {
    $values = parent::processValues($values);
    $values = $this->processValuesForEmbeddedMediaForm($values, 'image');
    return $values;
  }
  
  protected function doUpdateObject($values)
  {
    parent::doUpdateObject($values);
    $this->doUpdateObjectForEmbeddedMediaForm($values, 'image', 'Image');
  }

  public function getModelName()
  {
    return 'Podrazdelenia';
  }

}