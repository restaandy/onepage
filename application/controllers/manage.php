<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');

class Manage extends CI_Controller {
	public function index() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		$m['page']		= "awal";
		$this->load->view('manage/tampil', $m);
	}
	
	public function haldep() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$id						= $this->uri->segment(4);
		
		//view tampilan website\
		$m['haldep']		= $this->db->query("SELECT * FROM haldep")->row();
		$m['page']			= "v_haldep";		
		
		if ($mau_ke == "act_edit") {
			$this->db->query("UPDATE haldep SET isi = '".addslashes($this->input->post('isi'))."' WHERE id = '1'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Berhasil diupdate </div>");
			redirect('index.php/manage/haldep');
		} else {
			$m['page']	= "v_haldep";
		}

		$this->load->view('manage/tampil', $m);
	}
		
	public function blog() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//konfigurasi upload file
		$config['upload_path'] 		= 'upload/post';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']			= '2000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		
		$this->load->library('upload', $config);

		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$id						= $this->uri->segment(4);
		
		//view tampilan website\
		$m['blog']		= $this->db->query("SELECT * FROM berita ORDER BY id DESC")->result();
		$m['page']		= "v_berita";		
		
		if ($mau_ke == "del") {
			$q_gbr		= get_value("berita", "id", $id);
			$gbr		= $q_gbr->gambar;
			$this->db->query("DELETE FROM berita WHERE id = '$id'");
			$path 		= './upload/post/'.$gbr;
			@unlink($path);
			@unlink('./upload/post/small/S_'.$gbr);
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil dihapuskan </div>");
			redirect('index.php/manage/blog');
		} else if ($mau_ke == "pub") {
			$this->db->query("UPDATE berita SET publish = '1' WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Status postingan : Dipublikasikan </div>");
			redirect('index.php/manage/blog');
		} else if ($mau_ke == "unpub") {
			$this->db->query("UPDATE berita SET publish = '0' WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Status postingan : Draft </div>");
			redirect('index.php/manage/blog');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_berita";
		} else if ($mau_ke == "edit") {
			$id_news			= $this->uri->segment(4);
			$m['berita_pilih']	= $this->db->query("SELECT * FROM berita WHERE id = '".$id_news."'")->row();	
			$m['page']			= "f_berita";
		} else if ($mau_ke == "act_add") {
			$q_get_kat	= $this->db->query("SELECT * FROM kat ORDER BY id ASC")->result();
					
			$kat	= "";
			foreach($q_get_kat as $qk) {
				$kat .= $this->input->post('kat_'.$qk->id);
			}		
			
			if ($_FILES['file_gambar']['name'] != "") {	
				if ($this->upload->do_upload('file_gambar')) {
					$up_data	 	= $this->upload->data();
					gambarSmall($up_data, "post");

					$this->db->query("INSERT INTO berita VALUES (NULL, '".addslashes($this->input->post('judul'))."', '".$up_data['file_name']."', '".addslashes($this->input->post('isi'))."', '0', NOW(), '".$kat."', 'admin', '1')");
					
					$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil ditambahkan bersama gambarnya</div>");
					redirect('index.php/manage/blog');
				} else {
					$this->session->set_flashdata("k", "<div class=\"alert alert-success\">".$this->upload->display_errors()."</div>");
				}
			} else {
				$this->db->query("INSERT INTO berita VALUES (NULL, '".$this->input->post('judul')."', '', '".addslashes($this->input->post('isi'))."', '0', NOW(), '".$kat."', 'admin', '1')");
				
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil ditambahkan tanpa gambarnya</div>");
				redirect('index.php/manage/blog');
			}
			
		} else if ($mau_ke == "act_edit") {
			$q_get_kat	= $this->db->query("SELECT * FROM kat ORDER BY id ASC")->result();
			
			$kat	= "";
			foreach($q_get_kat as $qk) {
				$kat .= $this->input->post('kat_'.$qk->id);
			}
			
			if (trim($kat) == "") {
				$kat_update = "";
			} else {
				$kat_update = ", kategori = '$kat'";
			}			
			
			if ($_FILES['file_gambar']['name'] != "") {	
				if ($this->upload->do_upload('file_gambar')) {
					$up_data	 	= $this->upload->data();
					gambarSmall($up_data, "post");
					
					$q_gbr		= get_value("berita", "id", $this->input->post('id_data'));
					$gbr		= $q_gbr->gambar;
					$path 		= './upload/post/'.$gbr;
					@unlink($path);
					@unlink('./upload/post/small/S_'.$gbr);

					
					$this->db->query("UPDATE berita SET  judul = '".addslashes($this->input->post('judul'))."', gambar = '".$up_data['file_name']."', isi = '".addslashes($this->input->post('isi'))."' $kat_update WHERE id = '".$this->input->post('id_data')."'");
					
					$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil diupdate bersama gambarnya</div>");
					redirect('index.php/manage/blog');
				} else {
					$this->session->set_flashdata("k", "<div class=\"alert alert-error\">".$this->upload->display_errors()."</div>");
					redirect('index.php/manage/blog/edit/'.$this->input->post('id_data'));
				}
			} else {
				$this->db->query("UPDATE berita SET  judul = '".addslashes($this->input->post('judul'))."', isi = '".addslashes($this->input->post('isi'))."' $kat_update WHERE id = '".$this->input->post('id_data')."'");
				
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil diedit tanpa gambarnya</div>");
				redirect('index.php/manage/blog');
			}

			
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil diedit</div>");
			
			
			
			redirect('index.php/manage/blog');
		} else {
			$m['page']	= "v_berita";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function carousel(){
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
        $ke			= $this->uri->segment(3);
        if($ke=="add"){
        	
        	$config['upload_path'] 		= 'upload/karosel';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '500';
			$config['min_width']  		= '160';
			$config['min_height']  		= '160';
			$this->load->library('upload', $config);
			if ($_FILES['file']['name'] != "") {
				if ($this->upload->do_upload('file')) {
					$up_data = $this->upload->data();
					$datainput=array(
		        		"judul"=>$this->input->post("judul"),
		        		"ket"=>$this->input->post("ket"),
		        		"foto"=>$up_data["file_name"]
		        	);
		        	$this->db->insert("carousel",$datainput);
		        	$this->session->set_flashdata('k', "<div class=\"alert alert-success\">Gambar berhasil diupload</div>");
					redirect('manage/carousel');
				}else{
					$this->session->set_flashdata('k', "<div class=\"alert alert-error\">".$this->upload->display_errors()."</div>");
					redirect('manage/carousel');
				}
			}		
        }
        $m['page']	= "v_carousel";
        $this->load->view('manage/tampil', $m);
	}
	public function galeri() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		//konfigurasi upload file
		$config['upload_path'] 		= 'upload/galeri';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '2000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';

		$this->load->library('upload', $config);
		
		$ke			= $this->uri->segment(3);
		$idu		= $this->uri->segment(4);
			
		$m['data']	= $this->db->query("SELECT * FROM galeri_album")->result();
		
		$m['page']	= "v_galeri";
		
		if ($ke == "add_album") {
			$nama_album	= addslashes($this->input->post('nama_album'));
			$this->db->query("INSERT INTO galeri_album (nama) VALUES ($nama_album')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Album berhasil ditambahkan</div>");
			redirect('manage/galeri');
		} else if ($ke == "del_album") {
			$gambar	= $this->db->query("SELECT file FROM galeri WHERE id_album = '$idu'")->result();
			foreach ($gambar as $g) {
				@unlink('./upload/galeri/'.$g->file);
				@unlink('./upload/galeri/small/S_'.$g->file);
			}
			$this->db->query("DELETE FROM galeri WHERE id_album = '$idu'");
			$this->db->query("DELETE FROM galeri_album WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Album berhasil dihapus</div>");
			redirect('manage/galeri');
		} else if ($ke == "atur") {
			$m['datdet']	= $this->db->query("SELECT * FROM galeri WHERE id_album = '$idu'")->result();
			$m['detalb']	= $this->db->query("SELECT * FROM galeri_album WHERE id = '$idu'")->row();
			
			$m['page']		= "v_galeri_detil";
		} else if ($ke == "rename_album") {
			$id_alb1		= $this->input->post('id_alb1');
			$nama_album		= addslashes($this->input->post('nama_album'));
			$this->db->query("UPDATE galeri_album SET nama = '$nama_album' WHERE id = '$id_alb1'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Album berhasil diubah namanya</div>");
			redirect('manage/galeri/atur/'.$id_alb1);
		} else if ($ke == "upload_foto") {
			$id_alb2		= $this->input->post('id_alb2');
			$ket			= addslashes($this->input->post('ket'));

			if ($_FILES['foto']['name'] != "") {
				
				if ($this->upload->do_upload('foto') == TRUE) {
					$this->upload->do_upload('foto');
					$up_data	 	= $this->upload->data();
					gambarSmall($up_data, "galeri");
				
					$this->db->query("INSERT INTO galeri (id_album,file,ket) VALUES ('$id_alb2', '".$up_data['file_name']."', '$ket')");
				} else {
					$this->session->set_flashdata('k', "<div class=\"alert alert-error\">".$this->upload->display_errors()."</div>");
					redirect('manage/galeri/atur/'.$id_alb2);
				}
				
				$this->session->set_flashdata('k', "<div class=\"alert alert-success\">Gambar berhasil diupload</div>");
				redirect('manage/galeri/atur/'.$id_alb2);		
			} else {
				$this->session->set_flashdata('k', "<div class=\"alert alert-error\">Gambar masih kosong</div>");
				redirect('manage/galeri/atur/'.$id_alb2);		
			}
		} else if ($ke == "del_foto") {
			$id_foto		= $this->uri->segment(5);
			
			$q_ambil_foto	= $this->db->query("SELECT file FROM galeri WHERE id = '$id_foto'")->row();
			
			@unlink('./upload/galeri/'.$q_ambil_foto->file);
			@unlink('./upload/galeri/small/S_'.$q_ambil_foto->file);
			
			$this->db->query("DELETE FROM galeri WHERE id = '$id_foto'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Foto berhasil dihapus</div>");
			redirect('manage/galeri/atur/'.$idu);
		} else {
			$m['page']	= "v_galeri";
		}
		
		$this->load->view('manage/tampil', $m);
	}

	public function data_siswa() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		//variabel post
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$nis					= addslashes($this->input->post('nis'));
		$kelas					= addslashes($this->input->post('kelas'));
		$jk						= addslashes($this->input->post('jk'));
		$alamat					= addslashes($this->input->post('alamat'));
		$password				= md5(addslashes($this->input->post('nis')));
		
		//view tampilan website\
		$m['data']		= $this->db->query("SELECT * FROM data_siswa")->result();
		$m['page']		= "v_kategori";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM data_siswa WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('manage/data_siswa');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_data_siswa";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM data_siswa WHERE id = '$idu'")->row();	
			$m['page']			= "f_data_siswa";
		} else if ($mau_ke == "act_add") {
			$cek_sudah_ada_nis	= $this->db->query("SELECT nis FROM data_siswa WHERE nis = '$nis'")->num_rows();
			if ($cek_sudah_ada_nis < 1) {
				$this->db->query("INSERT INTO data_siswa VALUES (NULL, '$nama', '$nis', '$kelas', '$jk', '$alamat', '', '$password')");
				$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
				redirect('manage/data_siswa');
			} else {
				$this->session->set_flashdata("k", "<div class='alert alert-danger'>NIS tersebut telah dimasukkan, tidak bisa ganda, bro..</div>");
				redirect('manage/data_siswa/add');			
			}
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE data_siswa SET nama = '$nama', nis = '$nis', kelas = '$kelas', jk = '$jk', alamat = '$alamat', pass = '$password' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/data_siswa');
		} else {
			$m['page']	= "v_data_siswa";
		}

		$this->load->view('manage/tampil', $m);
	}

	public function data_guru() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		//variabel post
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$nip					= addslashes($this->input->post('nip'));
		$mapel					= addslashes($this->input->post('mapel'));
		$jk						= addslashes($this->input->post('jk'));
		$alamat					= addslashes($this->input->post('alamat'));
		
		//view tampilan website\
		$m['data']		= $this->db->query("SELECT * FROM data_guru")->result();
		$m['page']		= "v_data_guru";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM data_guru WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('manage/data_guru');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_data_guru";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM data_guru WHERE id = '$idu'")->row();	
			$m['page']			= "f_data_guru";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO data_guru VALUES (NULL, '$nama', '$nip', '$mapel', '$jk', '$alamat', '')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
			redirect('manage/data_guru');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE data_guru SET nama = '$nama', nip = '$nip', mapel = '$mapel', jk = '$jk', alamat = '$alamat' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/data_guru');
		} else {
			$m['page']	= "v_data_guru";
		}

		$this->load->view('manage/tampil', $m);
	}

	public function link() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		//variabel post
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$alamat					= addslashes($this->input->post('alamat'));
		
		//view tampilan website\
		$m['data']		= $this->db->query("SELECT * FROM link")->result();
		$m['page']		= "v_link";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM link WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('manage/link');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_link";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM link WHERE id = '$idu'")->row();	
			$m['page']			= "f_link";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO link VALUES (NULL, '$nama', '$alamat')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
			redirect('manage/link');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE link SET nama = '$nama',  alamat = '$alamat' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/link');
		} else {
			$m['page']	= "v_link";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	public function agenda() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		
		//variabel post
		$idp					= addslashes($this->input->post('idp'));
		$tgl					= addslashes($this->input->post('tgl'));
		$ket					= addslashes($this->input->post('ket'));
		$tempat					= addslashes($this->input->post('tempat'));
		
		//view tampilan website\
		$m['data']		= $this->db->query("SELECT * FROM agenda")->result();
		$m['page']		= "v_agenda";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM agenda WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('manage/agenda');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_agenda";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM agenda WHERE id = '$idu'")->row();	
			$m['page']			= "f_agenda";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO agenda VALUES (NULL, '$tgl', '$ket', '$tempat')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
			redirect('manage/agenda');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE agenda SET tgl = '$tgl',  ket = '$ket' tempat = '$tempat' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/agenda');
		} else {
			$m['page']	= "v_agenda";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	
	public function kategori() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$id						= $this->uri->segment(4);
		
		//view tampilan website\
		$m['kategori']	= $this->db->query("SELECT * FROM kat")->result();
		$m['page']		= "v_kategori";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM kat WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Kategori berhasil dihapuskan </div>");
			redirect('index.php/manage/kategori');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_kategori";
		} else if ($mau_ke == "edit") {
			$id_kategori		= $this->uri->segment(4);
			$m['kat_pilih']		= $this->db->query("SELECT * FROM kat WHERE id = '".$id_kategori."'")->row();	
			$m['page']			= "f_kategori";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO kat VALUES (NULL, '".$this->input->post('nama')."')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Kategori berhasil ditambahkan</div>");
			redirect('index.php/manage/kategori');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE kat SET  nama = '".addslashes($this->input->post('nama'))."' WHERE id = '".$this->input->post('id_data')."'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Kategori berhasil diedit</div>");
			redirect('index.php/manage/kategori');
		} else {
			$m['page']	= "v_kategori";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	public function profil() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		//var post 
		$idp		= addslashes($this->input->post('idp'));
		$judul		= addslashes($this->input->post('judul'));
		$isi		= addslashes($this->input->post('isi'));
		//view tampilan website\
		$m['data']	= $this->db->query("SELECT * FROM profil")->result();
		$m['page']		= "v_profil";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM profil WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('manage/profil');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_profil";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM profil WHERE id = '".$idu."'")->row();	
			$m['page']			= "f_profil";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO profil VALUES (NULL, '$judul', '$isi')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
			redirect('manage/profil');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE profil SET  judul = '$judul', isi = '$isi' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/profil');
		} else {
			$m['page']	= "v_profil";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	
	public function interaktif() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$id						= $this->uri->segment(4);
		
		//view tampilan website\
		$m['komen']		= $this->db->query("SELECT * FROM interaktif")->result();
		$m['page']		= "v_komen";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM interaktif WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapuskan </div>");
			redirect('index.php/manage/interaktif');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_komen";
		} else if ($mau_ke == "edit") {
			$id			= $this->uri->segment(4);
			$m['komen_pilih']	= $this->db->query("SELECT * FROM interaktif WHERE id = '".$id."'")->row();	
			$m['page']			= "f_komen";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO interaktif (ket,link) VALUES ('".addslashes($this->input->post('ket'))."', '".addslashes($this->input->post('link'))."')");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambahkan</div>");
			redirect('index.php/manage/interaktif');			
		} else if ($mau_ke == "act_edit") {
			
			$this->db->query("UPDATE interaktif SET  ket = '".addslashes($this->input->post('ket'))."', link = '".addslashes($this->input->post('link'))."' WHERE id = '".$this->input->post('id_data')."'");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diupdate</div>");
			redirect('index.php/manage/interaktif');
		} else {
			$m['page']	= "v_komen";
		}
		
		$this->load->view('manage/tampil', $m);
	}
	
	public function komentar_by_post() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//ambil variabel URL
		$id						= $this->uri->segment(3);
		
		//view tampilan website\
		$m['komen']		= $this->db->query("SELECT * FROM berita_komen WHERE id_berita = '$id'")->result();
		$m['page']		= "v_komen";		
		$this->load->view('manage/tampil', $m);
	}
	
	
	public function bukutamu() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		$id						= $this->uri->segment(4);
		
		//view tampilan website\
		$m['pesan']		= $this->db->query("SELECT * FROM pesan")->result();
		$m['page']		= "v_bukutamu";		
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM pesan WHERE id = '$id'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil dihapuskan </div>");
			redirect('index.php/manage/bukutamu');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_bukutamu";
		} else if ($mau_ke == "edit") {
			$id			= $this->uri->segment(4);
			$m['pesan_pilih']	= $this->db->query("SELECT * FROM pesan WHERE id = '".$id."'")->row();	
			$m['page']			= "f_bukutamu";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO pesan VALUES (NULL, '".addslashes($this->input->post('nama'))."', '".addslashes($this->input->post('email'))."', '".addslashes($this->input->post('pesan'))."', NOW())");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Bukutamu berhasil ditambahkan</div>");
			redirect('index.php/manage/bukutamu');			
		} else if ($mau_ke == "act_edit") {
			$this->db->query("UPDATE pesan SET  nama = '".addslashes($this->input->post('nama'))."', email = '".addslashes($this->input->post('email'))."', pesan = '".addslashes($this->input->post('pesan'))."' WHERE id = '".$this->input->post('id_data')."'");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Postingan berhasil diupdate</div>");
			redirect('index.php/manage/bukutamu');
		} else {
			$m['page']	= "v_bukutamu";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	public function passwod() {
		if(! $this->session->userdata('validated')){
            redirect('tampil/login');
        }
		
		//ambil variabel URL
		$mau_ke					= $this->uri->segment(3);
		
		//view tampilan website\
		$m['user']		= $this->db->query("SELECT * FROM admin WHERE id = '1'")->row();
		$m['page']		= "f_passwod";		
		
		if ($mau_ke == "simpan") {
			$this->db->query("UPDATE admin SET  u = '".$this->input->post('u3')."', p = '".$this->input->post('p3')."' WHERE id = '1'");
					
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Passwod berhasil diupdate</div>");
			redirect('index.php/manage/passwod');
		} else {
			$m['page']	= "f_passwod";
		}

		$this->load->view('manage/tampil', $m);
	}
	
	public function logout(){
        $this->session->sess_destroy();
        redirect('tampil/login');
    }
}
