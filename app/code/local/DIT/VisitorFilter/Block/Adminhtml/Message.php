<?php


class DIT_VisitorFilter_Block_Adminhtml_Message extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_message";
	$this->_blockGroup = "visitorfilter";
	$this->_headerText = Mage::helper("visitorfilter")->__("Message Manager");
	$this->_addButtonLabel = Mage::helper("visitorfilter")->__("Add New Item");
	parent::__construct();
	
	}

}