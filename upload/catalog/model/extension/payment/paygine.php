<?php

class ModelExtensionPaymentPaygine extends Model {

  	public function getMethod($address, $total) {
		$this->load->language('extension/payment/paygine');
  		$method_data = array(
    		'code'       => 'paygine',
    		'title'      => $this->language->get('text_title'),
    		'terms'      => '',
			'sort_order' => $this->config->get('payment_paygine_sort_order')
  		);
    	return $method_data;
  	}

}