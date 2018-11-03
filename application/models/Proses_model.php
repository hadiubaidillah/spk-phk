<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proses_model extends CI_Model
{
    function __construct()
    {
    	parent::__construct();
        $this->load->library('m_db');
        $this->load->model('Kriteria_model','mod_kriteria');
    }


	function proseshitung()
	{
		$dKriteria=$this->mod_kriteria->kriteria_data();
			$dKaryawan=$this->m_db->get_data('karyawan');
			if(!empty($dKaryawan))
			{

				foreach($dKaryawan as $rKaryawan)
				{
					$karyawanID=$rKaryawan->id_karyawan;
					$nama_karyawan=field_value('karyawan','id_karyawan',$karyawanID,'nama_karyawan');
					if(!empty($dKriteria))
					{
						$total=0;
						foreach($dKriteria as $rKriteria)
						{
							$kriteriaid=$rKriteria->id_kriteria;
							$subkriteria=karyawan_nilai($karyawanID,$kriteriaid);
							$nilaiID=field_value('subkriteria','id_subkriteria',$subkriteria,'id_nilai');
							$nilai=field_value('nilai_kategori','id_nilai',$nilaiID,'nama_nilai');
							$prioritas=ambil_prioritas($subkriteria);
							$total+=$prioritas;
						}
					}

					$shasil=array(
					'id_karyawan'=>$karyawanID,
					);
					$dhasil=array(
					'total'=>$total,
					);
					$this->m_db->edit_row('karyawan',$dhasil,$shasil);

					$dPH=$this->m_db->get_data('karyawan');
					$kuota = 100;
					$rank=0;
					foreach($dPH as $rPH)
					{
						$rank+=1;
						$d=array();
						if($rank <= $kuota)
						{
							$d=array(
							'status'=>'Unggulan',
							);
						}else{
							$d=array(
							'status'=>'Belum Unggulan',
							);
						}
						$this->m_db->edit_row('karyawan',$d,array('id_karyawan'=>$rPH->id_karyawan));
					}

					return true;
				}
			}else{
				return false;
			}

		}

}
