<?php
class DIT_VisitorFilter_Block_Adminhtml_Filter_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("visitorfilter_form", array("legend"=>Mage::helper("visitorfilter")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("host", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Filter By Host"),
						"name" => "host",
						));
					
						$fieldset->addField("referer", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Filter By Referer"),
						"name" => "referer",
						));
									
						 $fieldset->addField('message_id', 'select', array(
						'label'     => Mage::helper('visitorfilter')->__('Message Template'),
						'values'   => DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getValueArray3(),
						'name' => 'message_id',
						));
						$fieldset->addField("cms_page_ids", "text", array(
						"label" => Mage::helper("visitorfilter")->__("CMS Pages"),
						"name" => "cms_page_ids",
						"note" => "Enter comma seperated CMS Page IDs."
						));
					
						$fieldset->addField("product_ids", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Product Pages"),
						"name" => "product_ids",
						"note" => "Enter comma seperated Product IDs."
						));
					
						$fieldset->addField("category_ids", "text", array(
						"label" => Mage::helper("visitorfilter")->__("Category Pages"),
						"name" => "category_ids",
						"note" => "Enter comma seperated Category IDs."
						));
					
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('block_at', 'date', array(
						'label'        => Mage::helper('visitorfilter')->__('Block From'),
						'name'         => 'block_at',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('unblock_at', 'date', array(
						'label'        => Mage::helper('visitorfilter')->__('Block To'),
						'name'         => 'unblock_at',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));				
						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('visitorfilter')->__('Status'),
						'values'   => DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getValueArray9(),
						'name' => 'status',
						));				
						 $fieldset->addField('country_ids', 'multiselect', array(
						'label'     => Mage::helper('visitorfilter')->__('Country'),
						'values'   => DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getValueArray13(),
						'name' => 'country_ids',
						"note" => "Select countries to block from accessing the pages."
						
						));

				if (Mage::getSingleton("adminhtml/session")->getFilterData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getFilterData());
					Mage::getSingleton("adminhtml/session")->setFilterData(null);
				} 
				elseif(Mage::registry("filter_data")) {
				    $form->setValues(Mage::registry("filter_data")->getData());
				}
				return parent::_prepareForm();
		}
}
