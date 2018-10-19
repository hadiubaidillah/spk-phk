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
					// alternatif.status,
					// alternatif.total,
					// karyawan.nama_karyawan,
					// karyawan.alamat_karyawan,
					// karyawan.id_karyawan,
					// alternatif.id_karyawan,
					// alternatif.id_alternatif
					// FROM
					// alternatif
					// INNER JOIN karyawan ON karyawan.id_karyawan = alternatif.id_karyawan ORDER BY total DESC ";
    	$sql = " SELECT
					alternatif.status,
					alternatif.total,
					karyawan.nama_karyawan,
					karyawan.alamat_karyawan,
					karyawan.id_karyawan,
					alternatif.id_karyawan,
					alternatif.id_alternatif
					FROM
					alternatif
					INNER JOIN karyawan ON karyawan.id_karyawan = alternatif.id_karyawan ORDER BY total DESC ";
    	return $this->db->query($sql);
    }

    function tampilkan_detail($id_karyawan){
  		// $param = array('id_karyawan' =>$id_karyawan);
		// return $this->db->get_where('karyawan', $param);
		$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_karyawan,
					alternatif.status,
					alternatif.total,
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
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN karyawan ON alternatif.id_karyawan = karyawan.id_karyawan
					WHERE karyawan.id_karyawan = '$id_karyawan'
				 ";
				 return $this->db->query($sql);

    }

    function detail_kriteria($id_karyawan)
    {
    	$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_karyawan,
					alternatif.status,
					alternatif.total,
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
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN karyawan ON alternatif.id_karyawan = karyawan.id_karyawan
					WHERE karyawan.id_karyawan = '$id_karyawan'
				 ";
				 return $this->db->query($sql);
    }
	
}