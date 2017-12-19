<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

	/**
	 *
	 * create data 
	 * change true for get last id
	 * @param $data = array()
	 * ex for create : $this->m_global->store('table', $data)
	 * ex for last_id : $this->m_global->store('table', $data, true)
	 */
	public function store($table, $data, $last_id = FALSE) 
	{
		$this->db->insert($table, $data);
		if($last_id)
			return $this->db->insert_id();
	}

	/**
	 *
	 * update specified data
	 * @param int $id
	 * ex : $this->m_global->update('table', $data, array('id'=> $id))
	 */
	public function update($table, $data, $id)
	{
		$this->db->update($table, $data, $id);
	}

	/**
	 *
	 * delete specified data
	 * @param int $id
	 * ex : $this->m_global->destroy('table', array('id'=> $id))
	 */
	public function destroy($table, $id)
	{
		$this->db->delete($table, $id);
	}

	/**
	 *
	 * get data
	 * @param
	 * ex : $this->m_global->fetch('table',NULL, array('id'=> DESC))
	 */
	public function fetch($table, $where = NULL, $order_by = NULL, $select = NULL,$join = NULL, $start= NULL, $end=NULL)
	{
		if($where !== NULL)
			$this->db->where($where);

		if($order_by !== NULL)
			foreach ($order_by as $key => $value) {
				$this->db->order_by($key, $value);
			}


		if($select !== NULL)
			$this->db->select($select);


		if($join !== NULL)
			foreach ($join as $key => $value) {
				$this->db->join($key, $value);
			}

		if($start !== NULL && $end !== NULL)
			$this->db->limit($start , $end);

		return $this->db->get($table);
	}
	

}