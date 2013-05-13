<?php
Class update_user_details extends CI_Model
{
	 function __construct()
    {
        parent::__construct();
    }
	function check_params($params)
	{
		
		//the validation of all params can be checked in controller

	}
	function update_record($param,$userid)
	{
		$this->load->database();
		// Assuming that $params is the string containing user info separated by ",".
  		// Separate it from "," and add it to the user_detail table.	
		
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
		'verify' => $array[10],
		'contact_no' => $array[11],
  		'lang_known'=> $array[12],
 		'profile_image'=> $array[13],
  		'communication_address'=> $array[14],
  		'Membership'=> $array[15],
  		'other_details'=> $array[16]

		);
		
		$query = $this->db->query("UPDATE user_detail SET user_name='$array[1]',email='$array[2]',display_name='$array[3]',age='$array[4]',gender='$array[5]',date_of_birth='$array[6]',home_town='$array[7]',date_of_join='$array[8]',password='$array[9]',verify='$array[10]',contact_no='$array[11]',lang_known='$array[12]',profile_image='$array[13]',communication_address='$array[14]',Membership='$array[15]',other_details=s'$array[16]' WHERE id='$userid'");

		

		if($this->db->affected_rows())
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
	function update_profile_picture($picture_name,$userid)
	{
		$this->load->database();
		
		//will be implemented. Not cleared yet

	}
}
?>