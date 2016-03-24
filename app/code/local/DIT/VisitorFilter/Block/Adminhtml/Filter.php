<?php


class DIT_VisitorFilter_Block_Adminhtml_Filter extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_filter";
	$this->_blockGroup = "visitorfilter";
	$this->_headerText = Mage::helper("visitorfilter")->__("Filter Manager");
	$this->_addButtonLabel = Mage::helper("visitorfilter")->__("Add New Filter");
	parent::__construct();
	
	}

}