<!-- get alternatif -->
	<script type="text/javascript">
	$(document).ready(function () {
		$("select").select2();
	});
	</script>
	<?php
		$id_alternatif = $this->uri->segment(3);
		$tipe_form = "Tambah";
		if(isset($id_alternatif)) $tipe_form = "Update";
	?>
<div class="row">
	<?= form_open('Alternatif/'.(isset($id_alternatif)?'update/'.$id_alternatif:'create')); ?>
	<div class="form-group required">
		<label class="col-sm-2 control-label" for="">Nama Karyawan</label>
		<div class="col-md-10">
			<select name="id_karyawan" class="form-control">
				<?php
				if (!empty($karyawan)) {
					foreach ($karyawan as $s) {
			 	?>
			 	<option value='<?php echo $s->id_karyawan ?>'><?php echo $s->nama_karyawan ?></option>
			 	<?php }}else{ ?>
				<option class="form-control"> Semua Karyawan sudah terdaftar</option>
			 	<?php } ?>
			</select>
		</div>
	</div>
	<br><br><br><br>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="">Penilaian</label>
		<div class="col-md-10">
			<table class="table table-bordered">
				<thead>
					<th>Kriteria</th>
					<th>Nilai</th>
				</thead>
				<tbody>
				<?php

				if(!empty($kriteria))
				{
					$subkriteria_value = null;
					if($id_alternatif != null) {
						$subkriteria_value = $this->db->query("SELECT a.*, b.* FROM alternatif a LEFT JOIN alternatif_nilai b ON a.id_alternatif = b.id_alternatif WHERE a.id_alternatif=".$this->uri->segment(3))->result();
					}
					foreach($kriteria as $rk)
					{
						$kriteriaid=$rk->id_kriteria;
						echo '<tr>';
						echo '<td>'.$rk->nama_kriteria.'</td>';
						echo '<td>';
						$dSub=$this->m_db->get_data('subkriteria',array('id_kriteria'=>$kriteriaid));
						if(!empty($dSub))
						{
							echo '<select name="kriteria['.$kriteriaid.']"  class="form-control" data-placeholder="Pilih Nilai" required style="width: 100%">';
							echo '<option></option>';
							foreach($dSub as $rSub)
							{
								$o='';
								if($rSub->tipe=="teks")
								{
									$o=$rSub->nama_subkriteria;
								}elseif($rSub->tipe=="nilai"){
									$op_min=$rSub->op_min;
									$op_max=$rSub->op_max;
									$nilai_minimum=$rSub->nilai_minimum;
									$nilai_maksimum=$rSub->nilai_maksimum;
									if($op_min==$op_max && $nilai_minimum==$nilai_maksimum)
									{
										$o=$o_pmax." ".$nilai_minimum;
									}else{
										$o=$op_min." ".$nilai_minimum." dan ".$op_max." ".$nilai_maksimum;
									}
								}
								$selected = "";
								foreach($subkriteria_value as $value) {
										if($rSub->id_subkriteria == $value->id_subkriteria) {
											$selected = "selected";
										}
								}
								echo '<option value="'.$rSub->id_subkriteria.'" '.$selected.'>'.$o.'</option>';
							}
							echo '</select>';
						}
						echo '</td>';
						echo '</tr>';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-md-6">
		<?php
		if (!empty($karyawan)) {
		 ?>
			<button type="submit" name="submit" class="btn btn-primary btn-flat"><?php echo $tipe_form; ?></button>
			<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
		<?php } else{ ?>
			<button type="submit" name="submit" class="btn btn-primary btn-flat" disabled><?php echo $tipe_form; ?></button>
			<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
		<?php } ?>
		</div>
	</div>
	<?= form_close(); ?>
</div>
