<script type="text/javascript">
function proseshitung()
{
	$.ajax({
		type:'get',
		dataType:'json',
		url:"<?=base_url('Perbandingan/proseshitung');?>",
		error:function(){
			$("#respon").html('Proses hitung seleksi karyawan gagal');
			$("#error").show();
		},
		beforeSend:function(){
			$("#error").hide();
			$("#respon").html("Sedang bekerja, tunggu sebentar");
		},
		success:function(x){
			if(x.status=="ok")
			{
				alert('Proses seleksi berhasil. Halaman akan direfresh');
				window.location=window.location;
			}else{
				$("#respon").html('Proses hitung seleksi Karyawan gagal');
				$("#error").show();
			}
		},
	});
}
</script>

<div id="respon" class="hidden-print"></div>
<?php
$sql="Select COUNT(*) as m FROM karyawan WHERE status IN ('unggulan','belum unggulan')";
$c=$this->m_db->get_query_row($sql,'m');
if($c < 1)
{
	echo '<div class="alert alert-warning hidden-print" id="error">Seleksi belum diproses. Klik <a href="javascript:;" onclick="proseshitung();">di sini</a> untuk proses</div>';
}else{
?>

<h2 style="margin-top:0px">Hasil Perhitungan</h2>

<div class="table-responsive">

<table class="table table-bordered ">
<thead>
	<th>Nama Karyawan</th>
	<?php
	$dKriteria=$this->mod_kriteria->kriteria_data();
	if(!empty($dKriteria))
	{
		foreach($dKriteria as $rKriteria)
		{
			echo '<th>'.$rKriteria->nama_kriteria.'</th>';
		}
	}
	?>
	<th>Total</th>
	<th>Status</th>
</thead>
<?php


	$dKaryawan=$this->m_db->get_data('karyawan');
	if(!empty($dKaryawan))
	{

		foreach($dKaryawan as $rKaryawan)
		{
			$karyawanID=$rKaryawan->id_karyawan;
			$karyawanID=$rKaryawan->id_karyawan;
			$nama_karyawan=field_value('karyawan','id_karyawan',$karyawanID,'nama_karyawan');

			?>
			<tr>
				<td><?=$nama_karyawan;?></td>
				<?php
				$total=0;
				if(!empty($dKriteria))
				{
					foreach($dKriteria as $rKriteria)
					{
						$kriteriaid=$rKriteria->id_kriteria;
						$subkriteria=karyawan_nilai($karyawanID,$kriteriaid);
						$nilaiID=field_value('subkriteria','id_subkriteria',$subkriteria,'id_nilai');
						$nilai=field_value('nilai_kategori','id_nilai',$nilaiID,'nama_nilai');
						$prioritas=ambil_prioritas($subkriteria);
						$total+=$prioritas;
					    echo '<td>'.number_format((float)$prioritas,2).'</td>';
					}
				}
				?>
				<td><?=number_format($total,2);?></td>
				<!-- <td><?=ucwords($rKaryawan->status);?></td> -->
				<td>
					<?php
					if ($total >= 3) {
						echo "Karyawan unggulan";
					}else{
						echo "Belum unggulan";
						}
					 ?>
				</td>
			</tr>
			<?php

		}

	}else{
		return false;
	}

}
?>

</table>
</div>
<a href="javascript:;" onclick="proseshitung();" class="btn btn-primary btn-md"> Hitung</a>
