<?php
	
class DIT_VisitorFilter_Block_Adminhtml_Filter_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "visitorfilter";
				$this->_controller = "adminhtml_filter";
				$this->_updateButton("save", "label", Mage::helper("visitorfilter")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("visitorfilter")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("visitorfilter")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("filter_data") && Mage::registry("filter_data")->getId() ){

				    return Mage::helper("visitorfilter")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("filter_data")->getId()));

				} 
				else{

				     return Mage::helper("visitorfilter")->__("Add Item");

				}
		}
}