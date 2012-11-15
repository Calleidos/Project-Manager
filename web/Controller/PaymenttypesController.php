<?php
App::uses('AppController', 'Controller');
/**
 * PaymentTypes Controller
 *
 * @property Address $Address
 */
class PaymentTypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function listTypes() {
		return $this->PaymentType->find('list', array('fields' => array('id', 'type')));
	}


}
