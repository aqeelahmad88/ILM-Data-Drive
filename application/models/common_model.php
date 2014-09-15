<?php class Common_model extends CI_Model
{
	function __construct() {
		parent::__construct();	
	}
	function query($query){
		return $this->db->query($query);
	}
	function getAllRecords($from)
	{
		$this->db->select('*');
		$this->db->from($from);
		$result=$this->db->get();
		return $result;
	}  
	/*function getDepartments(){
		$query = "SELECT * FROM departments ORDER BY departments.name ASC";
		$result = $this->db->query($query);
		return $result;
	}*/
	function getRecord($select,$tbl_name,$columName,$where) 
	{

		$this->db->select($select);
		$this->db->from($tbl_name);
		$this->db->where($columName,$where);

		return $this->db->get();
	}
	function editRecord($columName,$where,$tbl_name,$data) {

		$this->db->where($columName,$where);
		$this->db->update($tbl_name,$data);
	}
	function editRecordWhere($columName,$where,$columName2,$where2,$tbl_name,$data) {

		$this->db->where($columName,$where);
		$this->db->where($columName2,$where2);
		$this->db->update($tbl_name,$data);
	}
	function getAllRecordsOrderBy($from,$orderby_colum,$asc_desc)
	{
		$this->db->select('*');
		$this->db->from($from);
		$this->db->order_by($orderby_colum,$asc_desc);
		$result=$this->db->get();
		return $result;
	}  
	function insert($tbl_name,$data)
	{
		$this->db->insert($tbl_name,$data);
	}
	function delete($where_colum,$where,$from)
	{
		$this->db->where($where_colum,$where);
		$this->db->delete($from);
	}
}
?>