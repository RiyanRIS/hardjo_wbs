<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// load base_url
		$this->load->helper(array('form', 'url','file','download'));
		$this->load->model('m_dashboard');
		$this->load->library('email','upload','session','encrypt');
	}

	public function index()
	{
		if($this->session->userdata('identitas') != 1){
			//$this->session->sess_destroy();
			$this->load->view('dashboard');

		}
		else if($this->session->userdata('kode') != 1){
			redirect ('pengaduan/proses_kode');
		}
		else {
			redirect ('pengaduan/pengaduan');
		}
	}

	public function verifyemail(){
		
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$kode = rand (10000, 99999);
		$verify = 0;
		$wbs = 1;

		//memasukan ke array
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'no_hp' => $no_hp,
			'email' => $email,
			'kode' => $kode,
			'verify' => $verify,
			'wbs' => $wbs,
			
			);

		$this->db->insert('Pengaduan', $data);
		$id = $this->db->insert_id();
	
		$key = 'rspaudrshardjolukito123455136423'; //Key 32 character   
		
		//enkripsi id
		$encrypted_id = $this->encrypt->encode($id, $key); 
		/* $encrypted_kode = $this->encrypt->encode($kode, $key);   */

	$config = array();
	$config['charset'] = 'utf-8';
	$config['useragent'] = 'Codeigniter';
	$config['protocol']= "smtp";
	$config['mailtype']= "html";
	$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
	$config['smtp_port']= "465";
	$config['smtp_timeout']= "400";
	$config['smtp_user']= "infolahtarspau@gmail.com"; // isi dengan email kamu
	$config['smtp_pass']= "safe54321!"; // isi dengan password kamu
	$config['crlf']="\r\n"; 
	$config['newline']="\r\n"; 
	$config['wordwrap'] = TRUE;
   
	$this->email->initialize($config);
	//konfigurasi pengiriman
	$this->email->from($config['smtp_user'],'RSPAU dr. S. HARDJOLUKITO');
	$this->email->to($email);
	$this->email->subject("[Pengaduan] Kode Verifikasi");
	$this->email->message(
	 "
	 <html>
	 <head>
	 <title>Verification Code</title>
	 </head>
	 <body>
	<table width='55%'>
	<tr style='background-color:#00B0E4'>
	<td>
	<h3 style='color:black'>
	<center>
	Pengaduan Pelanggaran
	</center>
	</h3>
	<h3 style='color:black'>
	<center>
	RSPAU dr. S. Hardjolukito
	</center>
	</h3>
	</td>
	</tr>
	<tr style='background-color:#00BCD4'>
	<td>
	<h3 style='color:black'>
	<center>
	Kode Verifikasi Anda adalah :
	</center>
	</h3>
	<h2 style='color:black'>
	<center>
	".$kode ."
	</center>
	</h2>
	<center><b>
	Klik <a href='".base_url()."pengaduan/kode/".$encrypted_id."/".$kode."'>disini</a> untuk memasukkan kode.</b>
	</center>
	</td>
	</tr>
	<tr style='background-color:#00B0E4'>
	<td style='font-size:10px;'>
	<center>
	Anda menerima pesan ini karena adanya permintaan kode verifikasi, silahkan menggunakan kode tersebut untuk mengirim pengaduan melalui website kami. Jika Anda merasa tidak pernah melakukan permintaan kode ini, silahkan mengabaikan/menghapus pesan ini.
	</center>
	</td>
	</tr>
	</table>
	 </body>
	 </html>
	  
	  "

	);
	
	if($this->email->send())
	{
		//bikin session pakai id
		$session = array(
			'id' => $id,
			'identitas' => '1'
		);
		$this->session->set_userdata($session);
	   
	   $this->session->set_flashdata('msg', '<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
	   Berhasil mengirim kode verifikasi, silahkan cek kotak masuk email Anda</div>');
	  // echo '<script>window.history.back();</script>';
	  redirect ('pengaduan/proses_kode');
	}else
	{
	   /* echo "Gagal mengirim kode verifikasi, pastikan email yang anda masukkan aktif"; */
	   $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
	   Gagal mengirim kode verifikasi lewat email</div>');
	 /*   echo '<br />';
	   echo $this->email->print_debugger(); */
	   redirect ('pengaduan');
	}
 
}

public function proses_kode(){
	if($this->session->userdata('identitas') == ''){
		redirect (base_url());
}
else if($this->session->userdata('kode') != 1){
	
	$last_id = $this->session->userdata('id');

	$data['data'] = $this->m_dashboard->view($last_id);

	$this->load->view('kode', $data);
}else{
	redirect ('pengaduan/pengaduan');
}

}

public function kode(){

	if($this->session->userdata('kode') != 1){

	$encrypted_id = $this->uri->segment(3);

	$key = 'rspaudrshardjolukito123455136423'; //Key 32 character 

	$id = $this->encrypt->decode($encrypted_id, $key); 

	$data['data'] = $this->m_dashboard->view($id);

	$this->load->view('kode_verifikasi', $data);

	}else{
		redirect ('pengaduan/pengaduan');
	}

}

public function verifykode(){
	$confkode = $this->input->post('confkode');

	$last_id = $this->input->post('id');

	$cek = $this->m_dashboard->view($last_id);

	foreach ($cek as $ceks) {
		if($ceks['kode'] == $confkode) {

			$data = array(
				'verify' => 1
			);
		 
			$where = array(
				'id' => $ceks['id']
			);
		 
			$this->m_dashboard->update($where,$data,'Pengaduan');
			
			$session = array(
				'kode' => '1'
			);

			$this->session->set_userdata($session);

			$this->session->set_flashdata('msg', '<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
			 Verifikasi email berhasil, silahkan tulis uraian pengaduan Anda.</div>');
			
			 redirect ('pengaduan/pengaduan');
		}
		else {
			 /* kode beda, kembali ke halaman kode */
			 $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
			 Kode verifikasi tidak sesuai.</div>');
			 echo '<script>window.history.back();</script>';
		}
	}
}

	public function pengaduan(){

		if($this->session->userdata('identitas') == ''){
			$this->session->unset_userdata('uraian');
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
						Laporan pengaduan berhasil terkirim.</div>');
			redirect (base_url());

		}else if($this->session->userdata('kode') != 1){
			redirect ('pengaduan/proses_kode');

		}else{
			$last_id = $this->session->userdata('id');
	
			$data['data'] = $this->m_dashboard->view($last_id);

			$this->load->view('pengaduan', $data);
		}
	}

	
	function simpan_pengaduan(){

        $uraian = $this->input->post('uraian');
        
		$session = array('uraian' => $uraian);
			
		$this->session->set_userdata($session);

			if(!empty($uraian)){

            $nama_file = $_FILES['userfile']['name'];

			    if(!empty($nama_file)){

                $ukuran_file = $_FILES['userfile']['size']; 

                    if($ukuran_file <= 5048000){

					    $nama = $this->input->post('nama');

					    $nma = str_replace(" ", "-", $nama);
					
					    $newName = "Pengaduan-".$nma."-".date('d-m-yy')."-".time().".".pathinfo($nama_file, PATHINFO_EXTENSION); 
					
					    $format = pathinfo($nama_file, PATHINFO_EXTENSION); 
					
					    if( ($format == "jpg") or ($format == "jpeg") or ($format == "png") or ($format == "JPG") or ($format == "JPEG") or ($format == "PNG")or ($format == "doc") or ($format == "pdf") or ($format == "zip") ){
                            $config['upload_path']        = './uploads/';
                            $config['allowed_types']      = 'jpg|jpeg|png|JPG|JPEG|png|doc|pdf|zip';
                            $config['file_name']          = $newName;
                            $config['max_size']           = 2048; /* 2MB */
                            $config['remove_spaces']      = FALSE;
                            $config['overwrite']          = FALSE;
                
                            
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                                        
                                    if ( ! $this->upload->do_upload('userfile'))
                                    {
                                            $error = array('error' => $this->upload->display_errors());
                                            print_r($error);
                                    }
                                    else
                                    {
                                            $data = array('upload_data' => $this->upload->data());
                                    }
                
                            //end upload file area 
                            $id = $this->input->post('id');
                            $uraian = $this->input->post('uraian');
                            $nama_berkas=$newName;
                            
                            $data = array(
                                'uraian' => $uraian,
                                'nama_berkas' => $nama_berkas,
                            );
                        
                            $where = array(
                                'id' => $id
                            );
                        
                            $this->m_dashboard->update($where,$data,'Pengaduan');

                            $this->session->sess_destroy();

                            redirect ('pengaduan/berhasil');
                        
                        } else {
                            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"><i class="fas fa-times"></i><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a> Jenis file tidak diperbolehkan</div>');
                            echo "<script>window.history.back()</script>";
                        }

					} else {
						
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a> Ukuran file terlalu besar</div>');
						echo '<script>window.history.back();</script>';
                    }
                    
				} else {
					
					$id = $this->input->post('id');
					$uraian = $this->input->post('uraian');
					
					$data = array(
						'uraian' => $uraian,
					);
				
					$where = array(
						'id' => $id
					);
				
					$this->m_dashboard->update($where,$data,'Pengaduan');

					$this->session->sess_destroy();
					
					redirect ('pengaduan/berhasil');
			    }

			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>Uraian tidak boleh kosong</div>');
                
                echo '<script>window.history.back();</script>';
			}
	}//fungsi simpan_pengaduan

	function berhasil(){
		$this->session->unset_userdata('uraian');
		$this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
						Laporan pengaduan berhasil terkirim. Terimakasih.</div>');
		$this->load->view('dashboard');
	}

	function admin(){
		if($this->m_dashboard->logged_id())
		{
			//jika memang session sudah terdaftar, maka redirect ke halaman dashboard
			redirect("pengaduan/dashboard_admin");

		}else{

		$this->load->view('login');

		}
	}

	public function auth()
	{
		
			//jika session belum terdaftar

			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
				<div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

			//cek validasi
			if ($this->form_validation->run() == TRUE) {

			//get data dari FORM
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//checking data via model

			$checking = $this->m_dashboard->check_login();
			/* $checking = $this->logins->check_login('DBpass', array('NamaUser' => $username), array('Password' => $password)); */

			//jika ditemukan, maka create session
			if ($checking != FALSE) {
				foreach ($checking as $apps) {

					$session_data = array(
						'username' => $apps->NamaUser,
						'keterangan' => $apps->Keterangan,
						'kotakmasuk' => $apps->KotakMasuk,
						'admin' => TRUE,
					);
					//set session userdata
					$this->session->set_userdata($session_data);

					date_default_timezone_set('Asia/Jakarta');

					$sekarang = date('Y-m-d H:i:s');
					$nama = $apps->NamaUser;
					$this->db->query("UPDATE UserPengaduan SET Login = '$sekarang' WHERE NamaUser = '$nama'"); 
					redirect('pengaduan/dashboard_admin');

				}
			}else{

			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
			Username atau password salah.</div>');
			redirect('admin');
			}

		}else{
			$this->session->set_flashdata('msg', '<<div class="alert alert-danger text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
			Username atau password salah.</div>');
			redirect('admin');
		}
	}

	function dashboard_admin(){
		if($this->m_dashboard->logged_id())
        {
			$data['total'] =  $this->m_dashboard->total();
			$data['read'] =  $this->m_dashboard->read();
			$data['unread'] =  $this->m_dashboard->unread();
			$this->load->view('dashboard_admin',$data);
		}else{

		//jika session belum terdaftar, maka redirect ke halaman login
		redirect('pengaduan/admin');

		}
	}

	function logout()
    {
        $this->session->sess_destroy();
        redirect('pengaduan/admin');
	}
	
	function kotak_masuk(){
		if($this->m_dashboard->logged_id())
        {
		date_default_timezone_set('Asia/Jakarta');

		$sekarang = date('Y-m-d H:i:s');

		$session_data = array(
		
			'kotakmasuk' => $sekarang,
			
		);
		//set session userdata
		$this->session->set_userdata($session_data);

		$nama = $this->session->userdata('username');

		$this->db->query("UPDATE UserPengaduan SET KotakMasuk = '$sekarang' WHERE NamaUser = '$nama'"); 
		
		$data['data'] = $this->db->query("SELECT * FROM Pengaduan WHERE verify = '1' AND DATALENGTH(uraian) > 0 ORDER BY Timeinit DESC")->result();
		
		$data['unread'] =  $this->m_dashboard->unread();

		$this->load->view('kotak_masuk', $data);

		}else{

		//jika session belum terdaftar, maka redirect ke halaman login
		redirect('pengaduan/admin');

		}
	}

	function delete(){
		if($this->m_dashboard->logged_id())
        {
		$id=$this->input->post('id');
		$nama_berkas=$this->input->post('nama_berkas');
		unlink("./uploads/$nama_berkas");
		$this->m_dashboard->delete($id);
		$this->session->set_flashdata('msg', 
                '<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil dihapus</div>');    
		redirect('pengaduan/kotak_masuk');
		} 
		else {
			echo "Anda tidak diizinkan mengakses ini";
		}
	}

	function download($id){
		if($this->m_dashboard->logged_id())
        {
		$this->load->helper('download');
		$fileinfo = $this->m_dashboard->download($id);
		$file = './uploads/'.$fileinfo['nama_berkas'];
		force_download($file, NULL);
		} else {
			echo "Anda tidak diizinkan mengakses ini";
		}
	}

	function print($id){
		if($this->m_dashboard->logged_id())
        {
			$data['data'] = $this->db->query("SELECT * FROM Pengaduan WHERE id = '$id'")->result();
		
			$this->load->view('print', $data);
		} else {
			echo "Anda tidak diizinkan mengakses ini";
		}
	}

	function updateidentitas(){
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		$cek = $this->m_dashboard->get($id,$nik,$nama,$no_hp,$email);

		if(empty($cek)){ //ada yang diubah
			$id = $this->session->userdata('id');

			$cek = $this->m_dashboard->get_id($id);

			if($email == $cek->email){
			$data = array(
				'nik' => $nik,
				'nama' => $nama,
				'no_hp' => $no_hp,
			);
		
			$where = array(
				'id' => $id
			);
		
			$this->m_dashboard->update($where,$data,'Pengaduan');

			$this->session->set_flashdata('msg','<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>Data identitas berhasil diubah</div>');    
			redirect('pengaduan/proses_kode');

			}
			else {

				$id = $this->session->userdata('id');

				$data = array(
					'nik' => $nik,
					'nama' => $nama,
					'no_hp' => $no_hp,
					'email' => $email,
				
				);
			
				$where = array(
					'id' => $id
				);
			
				$this->m_dashboard->update($where,$data,'Pengaduan');
	
		$key = 'rspaudrshardjolukito123455136423'; //Key 32 character   
		
		//enkripsi id
		$encrypted_id = $this->encrypt->encode($id, $key); 
		
	$config = array();
	$config['charset'] = 'utf-8';
	$config['useragent'] = 'Codeigniter';
	$config['protocol']= "smtp";
	$config['mailtype']= "html";
	$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
	$config['smtp_port']= "465";
	$config['smtp_timeout']= "400";
	$config['smtp_user']= "infolahtarspau@gmail.com"; // isi dengan email kamu
	$config['smtp_pass']= "safe54321!"; // isi dengan password kamu
	$config['crlf']="\r\n"; 
	$config['newline']="\r\n"; 
	$config['wordwrap'] = TRUE;
   
	$this->email->initialize($config);
	//konfigurasi pengiriman
	$this->email->from($config['smtp_user'],'RSPAU dr. S. HARDJOLUKITO');
	$this->email->to($cek->email);
	$this->email->subject("[Pengaduan] Kode Verifikasi");
	$this->email->message(
	 "
	 <html>
	 <head>
	 <title>Verification Code</title>
	 </head>
	 <body>
	<table width='55%'>
	<tr style='background-color:#00B0E4'>
	<td>
	<h3 style='color:black'>
	<center>
	Pengaduan Pelanggaran
	</center>
	</h3>
	<h3 style='color:black'>
	<center>
	RSPAU dr. S. Hardjolukito
	</center>
	</h3>
	</td>
	</tr>
	<tr style='background-color:#00BCD4'>
	<td>
	<h3 style='color:black'>
	<center>
	Kode Verifikasi Anda adalah :
	</center>
	</h3>
	<h2 style='color:black'>
	<center>
	".$cek->kode ."
	</center>
	</h2>
	<center><b>
	Klik <a href='".base_url()."pengaduan/kode/".$encrypted_id."/".$cek->kode."'>disini</a> untuk memasukkan kode.</b>
	</center>
	</td>
	</tr>
	<tr style='background-color:#00B0E4'>
	<td style='font-size:10px;'>
	<center>
	Anda menerima pesan ini karena adanya permintaan kode verifikasi, silahkan menggunakan kode tersebut untuk mengirim pengaduan melalui website kami. Jika Anda merasa tidak pernah melakukan permintaan kode ini, silahkan mengabaikan/menghapus pesan ini.
	</center>
	</td>
	</tr>
	</table>
	 </body>
	 </html>
	  
	  "

	);
	
	if($this->email->send())
	{
		//bikin session pakai id
		$session = array(
			'id' => $id,
			'identitas' => '1'
		);
		$this->session->set_userdata($session);
	   
	   $this->session->set_flashdata('msg', '<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
	   Berhasil mengirim kode verifikasi, silahkan cek kotak masuk email Anda</div>');
	  // echo '<script>window.history.back();</script>';
	  redirect ('pengaduan/proses_kode');
	}else
	{
	   /* echo "Gagal mengirim kode verifikasi, pastikan email yang anda masukkan aktif"; */
	   $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>
	   Gagal mengirim kode verifikasi lewat email</div>');
	   echo '<br />';
	   echo $this->email->print_debugger();
	   echo '<script>window.history.back();</script>';
	}
				
			}
		

		}else{      //tidak ada yang diubah
			
			$this->session->set_flashdata('msg','<div class="alert alert-info text-center"><a href="#" class="close" style="text-decoration:none;" data-dismiss="alert" aria-label="close">&times;</a>Tidak ada data identitas yang diubah</div>');    
			redirect('pengaduan/proses_kode');
		}
		
	
	
	}//function


}//controller
