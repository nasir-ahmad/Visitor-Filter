<?php

class DIT_VisitorFilter_Model_Session extends Mage_Core_Model_Session_Abstract {

 public function __construct() {
   $namespace = 'visitorfilter';
   $namespace .= '_' . (Mage::app()->getStore()->getWebsite()->getCode());

   $this->init($namespace);
   Mage::dispatchEvent('visitorfilter_session_init', array('session' => $this));
 }



}