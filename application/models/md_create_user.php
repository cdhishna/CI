<?php

class Create_new_user extends CI_Model {

        public function __construct()
        {
                // Call the Model constructor
                parent::__construct();
        }

	public function insert_record($params)
	{
                // Assuming that $params is the string containing user info separated by ",".
  		// Separate it from "," and add it to the user_detail table.	
		$this->load->database();
		$array = explode(",",$params);
                $data = array(
		'id' => $array[0],
		'user_name' => $array[1],
		'email' => $array[2],
		'display_name' => $array[3],
		'age' => $array[4],
		'gender' => $array[5],
		'date_of_birth' => $array[6],
		'home_town' => $array[7],
		'date_of_join' => $array[8],
		'password' => $array[9],
		'verify' => $array[10]
		);
		
		if($this->db->insert('user_detail',$data))
			return 1;

		return -1;
	}

	public function insert_record_from_facebook($params)
	{
		//Needs to be implemented. Not clear why we need $params as arguments. I don't think, it will need any arguments.
	}

	public function send_verification_mail($userid, $user_email)
	{	
		// Send the confirmation link to the user on his provided email.
			
		$url = "http://localhost:";	 //temporary url link. (Should be modified later)
                $browseboard_email = "";         // Email address of browseboard or sender. Needs to be filled.
		$activation = md5(uniqid(rand(), true));
		$message = "To activate your account, please click on this link:\n\n"; // Confirmayion message
		$message .= $url . '/activate.php?email=' . urlencode($user_email1) . "&key=$activation"; //Confirmation message
		
		mail($user_email, 'Registration Confirmation', $message, 'From:'.$browseboard_mail);
	}		
