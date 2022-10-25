<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	private $id = 'id';
	private $verify = 'verify';
	private $user = 'NamaUser';
	private $pass = 'Password';

	public function __construct()
	{
		// load library database
		parent::__construct();
		$this->load->database();
	}

	public function view($last_id)
	{
		$this->db->select('*');
		$this->db->from('Pengaduan');
		$this->db->where($this->id,$last_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function read()
	{
		$nama = $this->session->userdata("username");
		$kotakmasuk = $this->session->userdata("kotakmasuk");
		$this->db->from('Pengaduan');
		$this->db->join('UserPengaduan', 'UserPengaduan.wbs = Pengaduan.wbs');
		$this->db->where('CONVERT(CHAR(20), Pengaduan.timeinit, 120) <',$kotakmasuk);
		$this->db->where('Pengaduan.verify','1');
		$this->db->where('UserPengaduan.NamaUser',$nama);
		$this->db->where('Pengaduan.wbs','1');
		$this->db->where('DATALENGTH(uraian) >','0');
		return $num_rows = $this->db->count_all_results();
	}

	function unread(){
	
		$nama = $this->session->userdata("username");
		$kotakmasuk = $this->session->userdata("kotakmasuk");
		$this->db->from('Pengaduan');
		$this->db->join('UserPengaduan', 'UserPengaduan.wbs = Pengaduan.wbs');
		$this->db->where('CONVERT(CHAR(20), Pengaduan.timeinit, 120) >',$kotakmasuk);
		$this->db->where('UserPengaduan.NamaUser',$nama);
		$this->db->where('Pengaduan.wbs','1');
		$this->db->where('Pengaduan.verify','1');
		$this->db->where('DATALENGTH(uraian) >','0');
		return $num_rows = $this->db->count_all_results();
	}


	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function logged_id()
    {
        return $this->session->userdata('username');
	}
	

	function check_login()
    {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        $this->db->select('*');
		$this->db->from('UserPengaduan');
        $this->db->where($this->user,$username);
        $this->db->where($this->pass,$password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
	}
	
	function delete($id){
        $hasil=$this->db->query("DELETE FROM Pengaduan WHERE id = '$id'");
        return $hasil;
	}

	function total(){
		$this->db->from('Pengaduan');
		$this->db->where('verify','1');
		$this->db->where('DATALENGTH(uraian) >','0');
		return $num_rows = $this->db->count_all_results();
	 }

	 function download($id){
		$query = $this->db->get_where('Pengaduan',array('id'=>$id));
		return $query->row_array();
	}

	public function get($id,$nik,$nama,$no_hp,$email){        
		$this->db->where('id', $id); 
		$this->db->where('nik', $nik); 
		$this->db->where('nama', $nama);
		$this->db->where('no_hp', $no_hp);
		$this->db->where('email', $email);
        $result = $this->db->get('Pengaduan')->row(); 
        return $result;
	}

	public function get_id($id){        
		$this->db->where('id', $id); 
        $result = $this->db->get('Pengaduan')->row(); 
        return $result;
	}
	

	
}
