<?php
class DIT_VisitorFilter_Model_Mysql4_Filter extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("visitorfilter/filter", "id");
    }
}