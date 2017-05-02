<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');

class Tampil extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('Pagination','image_lib', 'session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->model('web_model');
	}
	
	public function index2() {
		$web['title']	= '.:: Selamat Datang di Website Website SD Negeri Sidoharjo  ::.';
		$web['haldep']	= $this->db->query("SELECT * FROM haldep")->row();
		$web['berita']	= $this->db->query("SELECT * FROM berita LIMIT 5")->result();
		
		$this->load->view('t_atas', $web);
		$this->load->view('t_main', $web);
		$this->load->view('t_footer');
	}
	public function index() {
		$data['title']=".:: Selamat Datang di Pondok Pesantren Darul Salam Amtsilati  ::.";
		$web['haldep']	= $this->db->query("SELECT * FROM haldep")->row();
		$data['who']=$web['haldep']->isi;
		$this->load->view('new/index',$data);
	}
	public function profil() {
		$web['title']	= '.:: Profil Website SD Negeri Sidoharjo  ::.';
		$id				= $this->uri->segment(3);
		$web['profil']	= $this->db->query("SELECT * FROM profil WHERE id = '$id'")->row();
		
		$this->load->view('t_atas', $web);
		$this->load->view('v_profil', $web);
		$this->load->view('t_footer');
	}

	public function data_siswa() {
		$web['title']	= '.:: Data Siswa Website SD Negeri Sidoharjo  ::.';
		$ke				= $this->uri->segment(3);
		$kelas			= $this->uri->segment(4);
		$web['data']	= $this->db->query("SELECT * FROM data_siswa WHERE kelas != 'L' ORDER BY kelas ASC")->result();
		
		$this->load->view('t_atas', $web);
		if ($ke == "per_kelas") {
			$web['data']	= $this->db->query("SELECT * FROM data_siswa WHERE kelas = '$kelas' ORDER BY nama ASC")->result();
		} else {
			$web['data']	= $this->db->query("SELECT * FROM data_siswa WHERE kelas != 'L' ORDER BY kelas ASC")->result();
		}
		$this->load->view('v_data_siswa', $web);
		$this->load->view('t_footer');
	}

	public function data_guru() {
		$web['title']	= '.:: Data Guru Website SD Negeri Sidoharjo  ::.';
		$ke				= $this->uri->segment(3);
		$kelas			= $this->uri->segment(4);
		$web['data']	= $this->db->query("SELECT * FROM data_guru ORDER BY nama ASC")->result();
		
		$this->load->view('t_atas', $web);
		$this->load->view('v_data_guru', $web);
		$this->load->view('t_footer');
	}

	public function blog() {
		$web['title']	= '.:: Berita Seputar Website SD Negeri Sidoharjo ::.';
		
		
		$ke				= $this->uri->segment(3);
		$id_berita		= $this->uri->segment(4);
		
		$this->load->library('pagination');
		$total_rows		= $this->db->query("SELECT * FROM berita WHERE publish = '1'")->num_rows();
		
		
		$config['base_url'] 	= base_URL().'index.php/tampil/blog/page/';
		$config['total_rows'] 	= $total_rows;
		$config['uri_segment'] 	= 4;
		$config['per_page'] 	= 5; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#"  style="background: #e3e3e3">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		
		$this->pagination->initialize($config); 
		
		
		$awal	= $this->uri->segment(4); 
		if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $config['per_page'];
		
		$web['blog'] 		= $this->db->query("SELECT * FROM berita WHERE publish = '1' ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$web['page']	= $this->pagination->create_links();

		if ($ke == "baca") {
			$this->db->query("UPDATE berita SET hits = hits + 1 WHERE id = '".$id_berita."'");
			$q_ambil_berita	= $this->db->query("SELECT * FROM berita WHERE id =  '$id_berita'");

			if ($q_ambil_berita->num_rows() == 0) {
				redirect('index.php/tampil/invalid');
			} else {
				$web['baca']	= $q_ambil_berita->row();
				
				$meta = array(
					array('name' => 'title', 'content' => $web['baca']->judul),
					array('name' => 'type', 'content' => 'article'),
					array('name' => 'url', 'content' => base_URL()),
					array('name' => 'image', 'content' => 'logo.jpg'),
					array('name' => 'site_name', 'content' => 'Nur Akhwan website -- '.$web['baca']->judul),
					array('name' => 'description', 'content' => 'Nur Akhwan website -- '.substr(addslashes(strip_tags($web['baca']->isi)), 0, 200))
				);
				
				$web['title']		= $web['baca']->judul." - Website Website SD Negeri Sidoharjo";
				$web['meta']		=  meta($meta);
				$this->load->view('t_atas', $web);
				
				$this->load->view('b_blog', $web);
			}
		} else {
			$this->load->view('t_atas', $web);
			$this->load->view('v_blog', $web);
		}
		
		$this->load->view('t_footer');
	}
	
	public function kategori() {
	
		
		$web['title']	= '.:: Berita Seputar Website SD Negeri Sidoharjo ::.';
		
		$this->load->library('pagination');
		$total_rows		= $this->db->query("SELECT * FROM berita WHERE kategori LIKE '%".$this->uri->segment(3)."%' AND publish = '1'")->num_rows();
		
		
		$config['base_url'] 	= base_URL().'index.php/tampil/kategori/'.$this->uri->segment(3).'/page/';
		$config['total_rows'] 	= $total_rows;
		$config['uri_segment'] 	= 5;
		$config['per_page'] 	= 5; 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close']= '</li>';
		$config['prev_link'] 	= '&lt;';
		$config['prev_tag_open']='<li>';
		$config['prev_tag_close']='</li>';
		$config['next_link'] 	= '&gt;';
		$config['next_tag_open']='<li>';
		$config['next_tag_close']='</li>';
		$config['cur_tag_open']='<li class="active disabled"><a href="#">';
		$config['cur_tag_close']='</a></li>';
		$config['first_tag_open']='<li>';
		$config['first_tag_close']='</li>';
		$config['last_tag_open']='<li>';
		$config['last_tag_close']='</li>';
		
		
		$this->pagination->initialize($config); 
		
		
		$awal	= $this->uri->segment(5); 
		if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $config['per_page'];
		
		$web['blog'] 		= $this->db->query("SELECT * FROM berita WHERE publish = '1' AND kategori LIKE '%".$this->uri->segment(3)."%' ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$web['page']	= $this->pagination->create_links();

		$this->load->view('t_atas', $web);
		$this->load->view('v_blog', $web);
		$this->load->view('t_footer');
	}
	
	public function post_komen() {
		$nama	= addslashes($this->input->post('nama'));
		$email	= addslashes($this->input->post('email'));
		$pesan	= addslashes($this->input->post('pesan'));
		$id		= addslashes($this->input->post('id'));
		
		if ($nama != "" || $email != "" || $pesan != "" || $id != "") {
			$this->db->query("INSERT INTO berita_komen VALUES ('', '$id', '$nama', '$email', '$pesan', NOW())");
			$this->session->set_flashdata("k", "<div class='alert alert-success'>Komentar terkirim</div>");
			redirect('index.php/tampil/blog/baca/'.$id."#komentar");
		} else {
			$this->session->set_flashdata("k", "<div class='alert alert-error'>Isikan isian dengan lengkap</div>");
			redirect('index.php/tampil/blog/baca/'.$id."#komentar");
		}
	}
		
	public function galeri() {
		$web['title']	= '.:: Album Foto Galeri Website SD Negeri Sidoharjo ::.';
		$ke				= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
		$web['data']	= $this->db->query("SELECT * FROM galeri_album ORDER BY id DESC")->result();		
		
		$this->load->view('t_atas', $web);
		if ($ke == "lihat") {
			$web['datdet']	= $this->db->query("SELECT * FROM galeri WHERE id_album = '$idu'")->result();
			$web['datalb']	= $this->db->query("SELECT * FROM galeri_album WHERE id = '$idu'")->row();
			$this->load->view('v_galeri_detil', $web);
		} else {
			$this->load->view('v_galeri', $web);
		}
		
		$this->load->view('t_footer');
	}
		
	public function bukutamu() {
		$web['buku_tamu']	= $this->db->query("SELECT * FROM pesan ORDER BY tgl DESC")->result();
		$web['title']		= ".:: Buku Tamu Website SD Negeri Sidoharjo ::.";
		$ke					= $this->uri->segment(3);
		
		
		$this->load->view('t_atas', $web);
		
		
		/*if ($ke == "edit") {
			$web['det_pesan']	= $this->db->query("SELECT * FROM pesan WHERE id = '".$this->uri->segment(4)."'")->row();
			$this->load->view('v_bukutamu', $web);
		} else */
		
		if ($ke == "simpan") {
			$nama	= $this->input->post('nama');
			$email	= $this->input->post('email');
			$pesan	= $this->input->post('pesan');
			
			if ($nama != "" || $email != "" || $pesan != "") {
				$this->db->query("INSERT INTO pesan VALUES ('', '".$nama."', '".$email."', '".$pesan."', NOW())");
				$this->session->set_flashdata("k", "<div class='alert alert-success'>Pesan terkirim</div>");
				redirect('index.php/tampil/bukutamu');
			} else {
				$this->session->set_flashdata("k", "<div class='alert alert-error'>Isian must be lengkap</div>");
				redirect('index.php/tampil/bukutamu');
			}
		} 
		

		else {		
			$this->load->view('v_bukutamu', $web);
		}		
		
		$this->load->view('t_footer');
	}
	
	public function post_poll() {
		$id_poll	= $this->input->post('id_poll');
		$pilih		= $this->input->post('poll');
		$pilih_poll	= $this->db->query("UPDATE poll SET j_".$pilih." = (j_".$pilih."+1) WHERE id = '".$id_poll."'");
		
		redirect('index.php/tampil/hasil_poll');
	}
	
	public function hasil_poll() {
		$web['title']		= ".:: Hasil Polling Website SD Negeri Sidoharjo ::. ";
		
		$this->load->view('t_atas', $web);	
		$this->load->view('v_poll');	
		$this->load->view('t_footer');	
	}

	public function cari() {
		$web['title']	= '.:: Hasil Pencarian Website Website SD Negeri Sidoharjo ::.';
		
		
		$ke				= $this->uri->segment(3);
		$id_berita		= $this->uri->segment(4);
		
		$q = $this->input->post('q');
		
		
		$web['cari_berita'] 		= $this->db->query("SELECT * FROM berita WHERE judul LIKE '%".$q."%' OR isi LIKE '%".$q."%' ")->result();
		$web['cari_download'] 		= $this->db->query("SELECT * FROM download WHERE nama LIKE '%".$q."%' OR ket LIKE '%".$q."%' ")->result();
		$web['cari_portofolio'] 	= $this->db->query("SELECT * FROM portofolio WHERE nama LIKE '%".$q."%' OR ket LIKE '%".$q."%' ")->result();
	
		$this->load->view('t_atas', $web);
		$this->load->view('v_cari', $web);
		$this->load->view('t_footer');
	}
		
	//invalid post id
	public function invalid() {
		$web['title']		= "Invalid ID ";
		$this->load->view('t_atas', $web);
		$this->load->view('invalid');
		$this->load->view('t_footer');
	}
	
	/* UNTUK LOGIN ADMIN */
	public function login() {
		$web['info']	= "";
		$this->load->view('login', $web);
	}
	
	public function do_login() {
		$web['info']	= "";
        $u = $this->security->xss_clean($this->input->post('u'));
        $p = md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT * FROM admin WHERE u = '".$u."' AND p = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		
		
        if($j_cek == 1) {
            $data = array(
                    'user' => $d_cek->u,
                    'pass' => $d_cek->p,
					'validated' => true
                    );
            $this->session->set_userdata($data);
            redirect('index.php/admin');
        } else {	
			$web['info']	= "<div style='margin: 15px 15px -10px 15px; background: red; padding: 5px 0 5px 0; text-align: center'>Upss.. Username atau Passwod Salah</div>";
			$this->load->view('login', $web);
		}
	}
	/* END LOGIN ADMIN */
	
	
	/* UNTUK LOGIN SISWA */
	public function do_login_siswa() {
		$web['info']	= "";
        $u = $this->security->xss_clean($this->input->post('user_siswa'));
        $p = md5($this->security->xss_clean($this->input->post('pass_siswa')));
         
		$q_cek	= $this->db->query("SELECT * FROM data_siswa WHERE nis = '".$u."' AND pass = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		
		
        if($j_cek == 1) {
            $data = array(
                    'siswa_id' => $d_cek->id,
                    'siswa_nis' => $d_cek->nis,
                    'siswa_nama' => $d_cek->nama,
					'siswa_validated' => true
                    );
            $this->session->set_userdata($data);
            redirect('index.php/tampil/halaman_siswa/');
        } else {	
			$this->session->set_flashdata("k", "<div class='alert alert-danger'>Maaf, anda gagal login. Username atau password Anda salah</div>");
			redirect('index.php/tampil');
		}
	}
	
	public function halaman_siswa() {
		if(! $this->session->userdata('siswa_validated')){
			$this->session->set_flashdata("k", "<div class='alert alert-danger'>Maaf, Anda HARUS Login dulu...!!!</div>");
            redirect('tampil');
        }
		
		$web['title']		= "Halaman setelah login siswa";
		$this->load->view('t_atas', $web);
		$this->load->view('v_halaman_siswa');
		$this->load->view('t_footer');
	}
	
	public function logout_siswa() {
		$array_items = array('siswa_id' => '', 'siswa_nis' => '', 'siswa_nama' => '', 'siswa_validated' => false);
		$this->session->unset_userdata($array_items);
		redirect('tampil');
	}
	
	/* SELESAI UNTUK LOGIN SISWA */
}