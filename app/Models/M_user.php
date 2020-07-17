<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
	protected $table = 'user';
	public function get_data($email, $password)
	{
		return $this->db->table('user')
			->where(array('user_email' => $email, 'user_pass' => $password))
			->get()->getRowArray();
	}

	public function getUser($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}
		return $this->getWhere(['user_id' => $id]);
	}

	public function saveUser($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $query;
	}

	public function updateUser($data, $id)
	{
		$query = $this->db->table($this->table)->update($data, array('user_id' => $id));
		return $query;
	}

	public function deleteUser($id)
	{
		$query = $this->db->table($this->table)->delete(array('user_id' => $id));
		return $query;
	}
	//--------------------------------------------------------------------

}
