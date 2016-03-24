<?php

class DIT_VisitorFilter_Model_Observer
{
    /*
	****************************** SAMPLE **************************
	
	array(2) {
	  ["controller_action"] => object(Mage_Catalog_ProductController)#212 (11) {
		["_designProductSettingsApplied":protected] => array(0) {
		}
		["_currentArea":protected] => string(8) "frontend"
		["_sessionNamespace":protected] => string(8) "frontend"
		["_request":protected] => object(Mage_Core_Controller_Request_Http)#23 (27) {
		  ["_originalPathInfo":protected] => string(60) "/size-8-princess-diamond-engagement-ring-white-gold-14k.html"
		  ["_storeCode":protected] => NULL
		  ["_requestString":protected] => string(60) "/size-8-princess-diamond-engagement-ring-white-gold-14k.html"
		  ["_rewritedPathInfo":protected] => NULL
		  ["_requestedRouteName":protected] => NULL
		  ["_routingInfo":protected] => array(0) {
		  }
		  ["_route":protected] => string(7) "catalog"
		  ["_directFrontNames":protected] => NULL
		  ["_controllerModule":protected] => string(12) "Mage_Catalog"
		  ["_isStraight":protected] => bool(false)
		  ["_beforeForwardInfo":protected] => array(0) {
		  }
		  ["_internallyForwarded":protected] => bool(false)
		  ["_paramSources":protected] => array(2) {
			[0] => string(4) "_GET"
			[1] => string(5) "_POST"
		  }
		  ["_requestUri":protected] => string(30) "/catalog/product/view/id/37401"
		  ["_baseUrl":protected] => string(0) ""
		  ["_basePath":protected] => string(0) ""
		  ["_pathInfo":protected] => string(29) "catalog/product/view/id/37401"
		  ["_params":protected] => array(1) {
			["id"] => string(5) "37401"
		  }
		  ["_rawBody":protected] => NULL
		  ["_aliases":protected] => array(1) {
			["rewrite_request_path"] => string(59) "size-8-princess-diamond-engagement-ring-white-gold-14k.html"
		  }
		  ["_dispatched":protected] => bool(true)
		  ["_module":protected] => string(7) "catalog"
		  ["_moduleKey":protected] => string(6) "module"
		  ["_controller":protected] => string(7) "product"
		  ["_controllerKey":protected] => string(10) "controller"
		  ["_action":protected] => string(4) "view"
		  ["_actionKey":protected] => string(6) "action"
		}
		["_response":protected] => object(Mage_Core_Controller_Response_Http)#94 (8) {
		  ["_body":protected] => array(0) {
		  }
		  ["_exceptions":protected] => array(0) {
		  }
		  ["_headers":protected] => array(2) {
			[0] => array(3) {
			  ["name"] => string(12) "Content-Type"
			  ["value"] => string(24) "text/html; charset=UTF-8"
			  ["replace"] => bool(false)
			}
			[1] => array(3) {
			  ["name"] => string(15) "X-Frame-Options"
			  ["value"] => string(10) "SAMEORIGIN"
			  ["replace"] => bool(true)
			}
		  }
		  ["_headersRaw":protected] => array(0) {
		  }
		  ["_httpResponseCode":protected] => int(200)
		  ["_isRedirect":protected] => bool(false)
		  ["_renderExceptions":protected] => bool(false)
		  ["headersSentThrowsException"] => bool(true)
		}
		["_realModuleName":protected] => NULL
		["_flags":protected] => array(0) {
		}
		["_cookieCheckActions":protected] => array(0) {
		}
		["_isLayoutLoaded":protected] => bool(false)
		["_titles":protected] => array(0) {
		}
		["_removeDefaultTitle":protected] => bool(false)
	  }
	  ["name"] => string(29) "controller_action_predispatch"
	}
	*/
	public function controllerFrontInitBeforeHandler($observer){
		
		$host = $_SERVER['REMOTE_HOST'];		
		if($host === $_SERVER['REMOTE_ADDR']){
			$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		}
		
		
		
		$collection = Mage::getModel('visitorfilter/filter')->getCollection()
							->addFieldToFilter('status', 0);
							
		foreach($collection as $c){			
			if (($_SERVER['REMOTE_ADDR'] == $c->getHost()) || (stripos($host, $c->getHost()) !== false)){	
				header("Location: http://mail.com");
				exit();
			}
			if (stripos($_SERVER['HTTP_REFERER'], $c->getReferer()) !== false){
				header("Location: http://mail.com");
				exit();
			}		
		}
	}
}
	 