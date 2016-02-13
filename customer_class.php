<?php

class Customer{
	private $customerId ; 
	private $email ; 
	private $password;
	private $roomNo;
	private $customerName ;
	private $customerImage;
	private $ext;


	// constructor
	public function __construct( var $customer_Id , var $email , var $password ,
		 var $room_no ,  var  $customer_name , var $customer_image , var $ext)
		  {

        $this->customerId = $customer_Id;
        $this->email = $email ;
        $this->password = $password ; 
        $this->roomNo = $room_no ; 
        $this->customerName= $customer_name;
        $this->customerImage = $customer_image;
        $this->ext = $ext;
    } // end  constructor

    public function getfirstName() {
		return $this->firstName();
	}
	public function setfirstName($firstName) {
		$this->firstName = $firstName;
	}
}

?>