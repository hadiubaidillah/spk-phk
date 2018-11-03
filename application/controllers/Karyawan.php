<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
    		$this->load->model('Karyawan_model','mod_karyawan');
    		$this->load->model('Kriteria_model','mod_kriteria');
    		$this->load->library('Ion_auth');
    		ceklogin();

    }

    function index()
    {

    	$sql="SELECT * FROM karyawan ORDER BY nama_karyawan";
        $data['data']=$this->m_db->get_query_data($sql);
        $this->template->load('template/backend/dashboard', 'karyawan/karyawan_list', $data);
    }

    function create()
    {

			$id_karyawan=$this->input->post('id_karyawan');
      $nama_karyawan=$this->input->post('nama_karyawan');
      $jabatan_karyawan=$this->input->post('jabatan_karyawan');
			$kriteria=$this->input->post('kriteria');
			$this->mod_karyawan->karyawan_add($id_karyawan,$nama_karyawan,$jabatan_karyawan,$kriteria);

			$d2=$this->m_db->get_data('karyawan');
			if(!empty($d2))
			{
				$listKaryawan="";
				foreach($d2 as $r)
				{
					$listKaryawan.=$r->id_karyawan.",";
				}
				$listKaryawan=substr($listKaryawan,0,-1);

				$sql="Select * from karyawan Where id_karyawan NOT IN ($listKaryawan)";
				$d['karyawan']=$this->m_db->get_query_data($sql);
				$d['kriteria']=$this->mod_kriteria->kriteria_data();
	        	$this->template->load('template/backend/dashboard', 'karyawan/karyawan_form', $d);
			}else{

	        $d['karyawan']=$this->mod_karyawan->karyawan_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'karyawan/karyawan_form', $d);
	    }

	}

  public function update($id)
  {

      $nama_karyawan=$this->input->post('nama_karyawan');
      $jabatan_karyawan=$this->input->post('jabatan_karyawan');
      $kriteria=$this->input->post('kriteria');
      if(isset($nama_karyawan) && isset($kriteria)) {
        echo "<script>alert('disini')</script>";
        //$dSub=$this->m_db->get_data('subkriteria',array('id_karyawan'=>$id_karyawan));
        $dSub=$this->db->query("SELECT a.*, b.* FROM karyawan a LEFT JOIN karyawan_nilai b ON a.id_karyawan = b.id_karyawan WHERE a.id_karyawan=".$id)->result();
        //echo $this->db->last_query();
        //die();
        if($this->mod_karyawan->karyawan_add($id_karyawan,$nama_karyawan,$jabatan_karyawan,$kriteria,null,true)) {
          echo "<h1>asdf</h1>";
          //die();
          foreach($dSub as $rSub)
          {
              $s=array( 'id_karyawan'=>$id );
              if($this->mod_karyawan->karyawan_delete($rSub->id_karyawan) && $this->m_db->delete_row('karyawan_nilai',$s)==TRUE) {
                echo "<h1>bisa</h1>";
                redirect('Karyawan');
              }
          }
        } else {
          echo "<h1>gagal</h1>";
          die();
        }
      }

      $this->db->where('id_karyawan', $id);
      $row = $this->db->get('karyawan')->row();

      $karyawan = $this->mod_karyawan->get_by_id($id);

			$d2=$this->m_db->get_data('karyawan');
			if(!empty($d2))
			{
				$listKaryawan="";
				foreach($d2 as $r)
				{
					$listKaryawan.=$r->id_karyawan.",";
				}
				$listKaryawan=substr($listKaryawan,0,-1);

				$sql="select * from karyawan Where id_karyawan = '".$karyawan->id_karyawan."'";
				$d['karyawan']=$karyawan;
				$d['kriteria']=$this->mod_kriteria->kriteria_data();
	        	$this->template->load('template/backend/dashboard', 'karyawan/karyawan_form', $d);
			}else{

	        $d['karyawan']=$this->mod_karyawan->karyawan_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'karyawan/karyawan_form', $d);
	    }

  }

	function hapus()
	{
		$id=$this->input->get('karyawan');
		if($this->mod_karyawan->karyawan_delete($id)==TRUE)
		{
			redirect('karyawan');
		}else{
			redirect('karyawan');
		}
	}

}
