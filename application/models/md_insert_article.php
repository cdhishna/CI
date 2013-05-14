<?php

class Insert_new_article extends CI_Model {

        public function __construct()
        {
                // Call the Model constructor
                parent::__construct();
        }

  public function insert_new_article($params)
	{
                // Assuming that $params is the string containing user info separated by ",".
  		// Separate it from "," and add it to the article table.
			// assuming that parameters are in the order: $articleid, $category_id,$sub_category_id,$userid,$article_header,$article_content
		$this->load->database();
		$array = explode(",",$params);
		$date = date('d.m.y');
        $query = $this->db->insert("INSERT INTO Article ( `article_id`,`article_cat_id`,`article_sub_cat_id`,`date_posted`,`posted_by`,`article_name`,
`article_content`, `article_approval`) values ('".$array[0]."','".$array[1]."','".$array[2]."','".$date."','".$array[3]."','".$array[4]."','".$array[5]."','"0"')");

		if($this->db->affected_rows() == 1))
			return 1;
		else
		return -1;
	}
}
