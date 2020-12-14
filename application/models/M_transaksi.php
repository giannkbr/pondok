<?php

class M_transaksi extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('transaksi');
    }

    public function detail_transaksi($id = null)
    {
        $query = $this->db->get_where('transaksi', array('id' => $id))->row();
        return $query;
    }
public function transaksiWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    public function delete_transaksi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_transaksi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function test()
	{
		# code...
		$query = $this->db->get('transaksi');
		return $query->row();
	}
}
