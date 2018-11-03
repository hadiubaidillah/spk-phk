<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan_model extends CI_Model
{

    public $table = 'karyawan';
    private $tb_karyawan='karyawan';
    public $id = 'id_karyawan';
    public $order = 'DESC';

	  private $tb_karyawan='karyawan';

    function __construct()
    {
         $this->load->library('M_db');
    }


	function karyawan_add($id_karyawan,$kriteriaData=array(), $sub=array(), $is_update=FALSE)
	{
        if($this->m_db->is_bof('karyawan')==FALSE)
        {
        	if(!empty($kriteriaData))
        	{
				$d=array(
				'id_karyawan'=>$id_karyawan,
				);
				if($this->m_db->add_row('karyawan',$d)==TRUE)
				{
					$karyawanID=$this->m_db->last_insert_id();
					foreach($kriteriaData as $rK=>$rV)
					{
						$d2=array(
						'id_karyawan'=>$karyawanID,
						'id_kriteria'=>$rK,
						'id_subkriteria'=>$rV,
						'id_nilai'=>$rV,
						);
						$this->m_db->add_row('karyawan_nilai',$d2);
					}
					if($is_update == FALSE) redirect('Karyawan','refresh');
          else return true;
				}else{
					//echo "GAGAL TAMBAH PESERTA";
					return false;
				}
			}else{
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}
		}else{
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}


	/*function karyawan_update($id_karyawan, $id_karyawan, $kriteriaData=array(), $sub=array())
	{
    if($this->m_db->is_bof('karyawan')==FALSE)
    {
    	if(!empty($kriteriaData))
    	{
				$d=array(
          'id_karyawan'=>$id_karyawan,
          'id_karyawan'=>$id_karyawan,
        );

				if($this->m_db->edit_row('karyawan',$d)==TRUE)
				{
					$karyawanID=$this->m_db->last_insert_id();
					foreach($kriteriaData as $rK=>$rV)
					{
						$d2=array(
						'id_karyawan'=>$karyawanID,
						'id_kriteria'=>$rK,
						'id_subkriteria'=>$rV,
						'id_nilai'=>$rV,
						);
						$this->m_db->edit_row('karyawan_nilai',$d2);
					}
					redirect('Karyawan','refresh');
				}
			}else{
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}
		}else{
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}*/

	function karyawan_delete($id_karyawan)
	{
		$s=array(
		'id_karyawan'=>$id_karyawan,
		);
		if($this->m_db->delete_row($this->tb_karyawan,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}



	// get data by id
	function get_by_id($id)
	{

			$this->db->where($this->id, $id);
			return $this->db->get($this->table)->row();
	}



}
