<?php

class DIT_VisitorFilter_Block_Adminhtml_Filter_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("filterGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("visitorfilter/filter")->getCollection();
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
                
				$this->addColumn("name", array(
				"header" => Mage::helper("visitorfilter")->__("Name"),
				"index" => "name",
				));
				$this->addColumn("host", array(
				"header" => Mage::helper("visitorfilter")->__("Host"),
				"index" => "host",
				));
				$this->addColumn("referer", array(
				"header" => Mage::helper("visitorfilter")->__("Referer"),
				"index" => "referer",
				));
						$this->addColumn('message_id', array(
						'header' => Mage::helper('visitorfilter')->__('Message Template'),
						'index' => 'message_id',
						'type' => 'options',
						'options'=>DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getOptionArray3(),				
						));
						
				$this->addColumn("category_ids", array(
				"header" => Mage::helper("visitorfilter")->__("Category Pages"),
				"index" => "category_ids",
				));
					$this->addColumn('block_at', array(
						'header'    => Mage::helper('visitorfilter')->__('Block From'),
						'index'     => 'block_at',
						'type'      => 'datetime',
					));
					$this->addColumn('unblock_at', array(
						'header'    => Mage::helper('visitorfilter')->__('Block To'),
						'index'     => 'unblock_at',
						'type'      => 'datetime',
					));
						$this->addColumn('status', array(
						'header' => Mage::helper('visitorfilter')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getOptionArray9(),				
						));
						

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_filter', array(
					 'label'=> Mage::helper('visitorfilter')->__('Remove Filter'),
					 'url'  => $this->getUrl('*/adminhtml_filter/massRemove'),
					 'confirm' => Mage::helper('visitorfilter')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray3()
		{
            $data_array=array(); 
            return($data_array);
		}
		static public function getValueArray3()
		{
            $data_array=array();
            return($data_array);
		}
		
		static public function getOptionArray9()
		{
            $data_array=array(); 
			$data_array[0]='Deny';
			$data_array[1]='Allow';
            return($data_array);
		}
		static public function getValueArray9()
		{
            $data_array=array();
			foreach(DIT_VisitorFilter_Block_Adminhtml_Filter_Grid::getOptionArray9() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray13()
		{
            $data_array=array(); 
            return($data_array);
		}
		static public function getValueArray13()
		{
            $data_array=array();
            return($data_array);
		}
		

}