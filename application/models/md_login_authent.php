<?php

class Check_User_Authentication extends CI_Model {

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	public function check_user_authentication($username, $password, $college_name) {
		// Check the authentication of user. If the username and passeord matches, get the user id 
                // and fetch the college name using user id. If it matches the college name provided by user, 
                // the function returns the id of user otherwise -1.

		$this->load->database();
		$array = array('user_name' => $username, 'password' => $password);
		$query = $this->db->get_where('user_detail', $array);
		$row = $query->result();
			$id = $row->id;
		if (!$id)
			return -1;
		$array = array('id' => $id);
		$query = $this->db->get_where('user_academics', $array);
 		$row = $query->result();
			$college = $row->college_name;
		if ($college != $college_name)
			return -1;

		return $id;

	}

	public function is_user_verified($userid){
                // Check whether the user has verified his account or not.

		$this->load->database();
		$array = array('id' => $userid);
		$query = $this->db->get_where('user_detail', $array);

		$row = $query->result();
		$status = $row->verify;

		if ($status == 1)
			return 1;

		return -1;

	}

	public function load_percent_profile_complete($userid){
		// I think we can find the percentage of profile completed by counting the non-null fields.
                // I am not sure about it.
		$this->load->database();
                $array   = array('id' => $userid);
                $query = $this->db->get_where('user_detail', $array);
		$row = $query->result_array()	
		$not_null = 0;
   		$len = sizeof($row);
		for($i=0; $i<$len; $i++){
			if($row[$i] != NULL)
				$not_null++;
		}
		
		$percent = ($not_null/11)*100;
		return $percent;

	}

	public function is_birthday_today($userid){
                // Retrieves the birthdate of user from userid and checks it with today's date.
                // If it is equal, it will return 1 otherwise -1.

		$this->load->database();
		$array	 = array('id' => $userid);
		$query = $this->db->get_where('user_detail', $array);

		$row = $query->result();
		$birthday = $row->date_of_birth;
		$today = date(Y-m-d);
		if ($today == $birthday){
			return 1
		}
		return -1;
	}

