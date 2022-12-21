<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Letters extends CI_Controller {
    
    public function paymentDue(){
	    $this->load->view('letters/paymentDue');
	}

	public function CoverringLetter(){
	    $this->load->view('letters/coverring');
	}
	
	public function DiscountConfiramation(){
	    $this->load->view('letters/DiscountConfiramation');
	}
}
