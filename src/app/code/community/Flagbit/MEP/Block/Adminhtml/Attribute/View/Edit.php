<?php

class Flagbit_MEP_Block_Adminhtml_Attribute_View_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Class Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'mep';
        $this->_controller = 'adminhtml_attribute_view';
        $this->_mode = 'edit';

        $this->_updateButton('save', 'label', Mage::helper('mep')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('mep')->__('Delete'));

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * getHeaderText
     *
     * Returns the headline for the edit form
     *
     * @see Mage_Adminhtml_Block_Widget_Container::getHeaderText()
     *
     * @return string Headline
     */
    public function getHeaderText()
    {
        if (Mage::registry('mep_profile_data') && Mage::registry('mep_profile_data')->getId()) {
            return Mage::helper('mep')->__('Edit Attribute Mapping "%s"', $this->htmlEscape(Mage::registry('mep_profile_data')->getName()));
        } else {
            return Mage::helper('mep')->__('New Attribute Mapping');
        }
    }
}