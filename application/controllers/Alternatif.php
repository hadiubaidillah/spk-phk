<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
    		$this->load->model('Karyawan_model','mod_karyawan');
    		$this->load->model('Kriteria_model','mod_kriteria');
    		$this->load->model('Alternatif_model','mod_alternatif');
    		$this->load->library('Ion_auth');
    		ceklogin();

    }

    function index()
    {

    	$sql="SELECT alternatif.id_alternatif,karyawan.id_karyawan,karyawan.nama_karyawan,karyawan.alamat_karyawan, karyawan.no_telpon, alternatif.status FROM alternatif LEFT JOIN karyawan ON alternatif.id_karyawan = karyawan.id_karyawan ";
        $data['data']=$this->m_db->get_query_data($sql);
        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_list', $data);
    }

    function create()
    {

			$id_karyawan=$this->input->post('id_karyawan');
			$kriteria=$this->input->post('kriteria');
			$this->mod_alternatif->alternatif_add($id_karyawan,$kriteria);

			$d2=$this->m_db->get_data('alternatif');
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
	        	$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
			}else{

	        $d['karyawan']=$this->mod_karyawan->karyawan_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
	    }

	}

  public function update($id)
  {



      $id_karyawan=$this->input->post('id_karyawan');
      $kriteria=$this->input->post('kriteria');
      if(isset($id_karyawan) && isset($kriteria)) {
        //$dSub=$this->m_db->get_data('subkriteria',array('id_karyawan'=>$id_karyawan));
        $dSub=$this->db->query("SELECT a.*, b.* FROM alternatif a LEFT JOIN alternatif_nilai b ON a.id_alternatif = b.id_alternatif WHERE a.id_alternatif=".$id)->result();
        //echo $this->db->last_query();
        //die();
        if($this->mod_alternatif->alternatif_add($id_karyawan,$kriteria,null,true)) {
          echo "asdf";
          //die();
          foreach($dSub as $rSub)
          {
              $s=array( 'id_alternatif'=>$id );
              if($this->mod_alternatif->alternatif_delete($rSub->id_alternatif) && $this->m_db->delete_row('alternatif_nilai',$s)==TRUE) {
                echo "bisa";
                redirect('Alternatif');
              }
          }
        } else {
          echo "gagal";
          die();
        }
      }

      $this->db->where('id_alternatif', $id);
      $row = $this->db->get('alternatif')->row();

      $alternatif = $this->mod_alternatif->get_by_id($id);

			$d2=$this->m_db->get_data('alternatif');
			if(!empty($d2))
			{
				$listKaryawan="";
				foreach($d2 as $r)
				{
					$listKaryawan.=$r->id_karyawan.",";
				}
				$listKaryawan=substr($listKaryawan,0,-1);

				$sql="select * from karyawan Where id_karyawan = '".$alternatif->id_karyawan."'";
				$d['karyawan']=$this->m_db->get_query_data($sql);
				$d['kriteria']=$this->mod_kriteria->kriteria_data();
	        	$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
			}else{

	        $d['karyawan']=$this->mod_karyawan->karyawan_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
	    }

  }

	function hapus()
	{
		$id=$this->input->get('alternatif');
		if($this->mod_alternatif->alternatif_delete($id)==TRUE)
		{
			redirect('alternatif');
		}else{
			redirect('alternatif');
		}
	}

}
