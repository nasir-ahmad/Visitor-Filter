<?php
class DIT_VisitorFilter_Block_Adminhtml_Filter_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("filter_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("visitorfilter")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("visitorfilter")->__("Item Information"),
				"title" => Mage::helper("visitorfilter")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("visitorfilter/adminhtml_filter_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
