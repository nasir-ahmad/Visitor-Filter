<?php

class DIT_VisitorFilter_Block_Adminhtml_Message_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("messageGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("visitorfilter/message")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("visitorfilter")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("visitorfilter")->__("Title"),
				"index" => "title",
				));
						$this->addColumn('status', array(
						'header' => Mage::helper('visitorfilter')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>DIT_VisitorFilter_Block_Adminhtml_Message_Grid::getOptionArray12(),				
						));
						

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		static public function getOptionArray12()
		{
            $data_array=array(); 
			$data_array[0]='Enabled';
			$data_array[1]='Disabled';
            return($data_array);
		}
		static public function getValueArray12()
		{
            $data_array=array();
			foreach(DIT_VisitorFilter_Block_Adminhtml_Message_Grid::getOptionArray12() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}