<?php

class Game_Model extends Model
{
		
	function update_time()
	{
		$this->db->where('username', $this->input->post('username'));
		$get = $this->db->get('users', 1);
		
		if ($get->num_rows() > 0)
		{
			foreach($get->result() as $row)
			{
				$user_data = array(
				'last_online' => date("Y-m-d h:i:s"));
				$this->db->where('id', $row->id);
				$this->db->update('users', $user_data);
			}
		} else {
			return FALSE;
		}
	}
}
