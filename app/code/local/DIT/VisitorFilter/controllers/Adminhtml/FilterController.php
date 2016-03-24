<?php

class DIT_VisitorFilter_Adminhtml_FilterController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("visitorfilter/filter")->_addBreadcrumb(Mage::helper("adminhtml")->__("Filter  Manager"),Mage::helper("adminhtml")->__("filter Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("VisitorFilter"));
			    $this->_title($this->__("Manager Filter"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("VisitorFilter"));
				$this->_title($this->__("Filter"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("visitorfilter/filter")->load($id);
				if ($model->getId()) {
					Mage::register("filter_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("visitorfilter/filter");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Filter Manager"), Mage::helper("adminhtml")->__("Filter Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Filter Description"), Mage::helper("adminhtml")->__("Filter Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("visitorfilter/adminhtml_filter_edit"))->_addLeft($this->getLayout()->createBlock("visitorfilter/adminhtml_filter_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("visitorfilter")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("VisitorFilter"));
		$this->_title($this->__("Filter"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("visitorfilter/filter")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("filter_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("visitorfilter/filter");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Filter Manager"), Mage::helper("adminhtml")->__("Filter Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Filter Description"), Mage::helper("adminhtml")->__("Filter Description"));


		$this->_addContent($this->getLayout()->createBlock("visitorfilter/adminhtml_filter_edit"))->_addLeft($this->getLayout()->createBlock("visitorfilter/adminhtml_filter_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						
					$post_data['country_ids']=implode(',',$post_data['country_ids']);

						$model = Mage::getModel("visitorfilter/filter")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Filter was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setFilterData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setFilterData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("visitorfilter/filter");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("visitorfilter/filter");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
}
