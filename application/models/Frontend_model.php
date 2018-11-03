<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend_model extends CI_Model
{	
    function __construct()
    {
    	parent::__construct(); 
    	
    }
    
    function tampilkan_data(){
    	// $sql = " SELECT
					// karyawan.status,
					// karyawan.total,
					// karyawan.nama_karyawan,
					// karyawan.alamat_karyawan,
					// karyawan.id_karyawan,
					// karyawan.id_karyawan,
					// karyawan.id_karyawan
					// FROM
					// karyawan
					// INNER JOIN karyawan ON karyawan.id_karyawan = karyawan.id_karyawan ORDER BY total DESC ";
    	$sql = " SELECT
					karyawan.status,
					karyawan.total,
					karyawan.nama_karyawan,
					karyawan.alamat_karyawan,
					karyawan.id_karyawan,
					karyawan.id_karyawan,
					karyawan.id_karyawan
					FROM
					karyawan
					INNER JOIN karyawan ON karyawan.id_karyawan = karyawan.id_karyawan ORDER BY total DESC ";
    	return $this->db->query($sql);
    }

    function tampilkan_detail($id_karyawan){
  		// $param = array('id_karyawan' =>$id_karyawan);
		// return $this->db->get_where('karyawan', $param);
		$sql = " SELECT
					karyawan_nilai.id_karyawan_nilai,
					karyawan_nilai.id_karyawan,
					karyawan_nilai.id_kriteria,
					karyawan_nilai.id_subkriteria,
					karyawan.id_karyawan,
					karyawan.id_karyawan,
					karyawan.status,
					karyawan.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					karyawan.id_karyawan,
					karyawan.nama_karyawan,
					karyawan.nama_kepsek,
					karyawan.alamat_karyawan,
					karyawan.visi,
					karyawan.misi,
					karyawan.no_telpon
					FROM
					karyawan_nilai
					INNER JOIN karyawan ON karyawan_nilai.id_karyawan = karyawan.id_karyawan
					INNER JOIN kriteria ON karyawan_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND karyawan_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN karyawan ON karyawan.id_karyawan = karyawan.id_karyawan
					WHERE karyawan.id_karyawan = '$id_karyawan'
				 ";
				 return $this->db->query($sql);

    }

    function detail_kriteria($id_karyawan)
    {
    	$sql = " SELECT
					karyawan_nilai.id_karyawan_nilai,
					karyawan_nilai.id_karyawan,
					karyawan_nilai.id_kriteria,
					karyawan_nilai.id_subkriteria,
					karyawan.id_karyawan,
					karyawan.id_karyawan,
					karyawan.status,
					karyawan.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					karyawan.id_karyawan,
					karyawan.nama_karyawan,
					karyawan.nama_kepsek,
					karyawan.alamat_karyawan,
					karyawan.visi,
					karyawan.misi,
					karyawan.no_telpon
					FROM
					karyawan_nilai
					INNER JOIN karyawan ON karyawan_nilai.id_karyawan = karyawan.id_karyawan
					INNER JOIN kriteria ON karyawan_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND karyawan_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN karyawan ON karyawan.id_karyawan = karyawan.id_karyawan
					WHERE karyawan.id_karyawan = '$id_karyawan'
				 ";
				 return $this->db->query($sql);
    }
	
}