<?php
class DIT_VisitorFilter_Block_Adminhtml_Message_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("visitorfilter_form", array("legend"=>Mage::helper("visitorfilter")->__("Item information")));

				
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Title"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "title",
						));
					
						$fieldset->addField("body", "textarea", array(
						"label" => Mage::helper("visitorfilter")->__("Body"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "body",
						));
									
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('visitorfilter')->__('Status'),
						'values'   => DIT_VisitorFilter_Block_Adminhtml_Message_Grid::getValueArray12(),
						'name' => 'status',
						));

				if (Mage::getSingleton("adminhtml/session")->getMessageData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getMessageData());
					Mage::getSingleton("adminhtml/session")->setMessageData(null);
				} 
				elseif(Mage::registry("message_data")) {
				    $form->setValues(Mage::registry("message_data")->getData());
				}
				return parent::_prepareForm();
		}
}
