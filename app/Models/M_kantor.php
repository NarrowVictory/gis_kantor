<?php namespace App\Models;
use CodeIgniter\Model;

class M_Kantor extends Model
{
	public function getdata(){
    return $this->db->table('tb_kantor')->get()->getResultArray();
	}

	public function simpan($data)
	{
	     return $this->db->table('tb_kantor')->insert($data);
	}

	public function detail_data($id_kantor)
	{
	    return $this->db->table('tb_kantor')->where('id_kantor', $id_kantor)->get()->getRowArray();
	}

	public function update_data($data)
	{
	    return $this->db->table('tb_kantor')
	    	->where('id_kantor', $data['id_kantor'])
	    	->update($data);
	}

	public function delete_data($id_kantor)
	{
	    return $this->db->table('tb_kantor')->delete(array('id_kantor' => $id_kantor));

	}
}