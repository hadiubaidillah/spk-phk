<!-- get karyawan -->
	<script type="text/javascript">
	$(document).ready(function () {
		$("select").select2();
	});
	</script>
	<?php
		$id_karyawan = $this->uri->segment(3);
		$tipe_form = "Tambah";
		if(isset($id_karyawan)) $tipe_form = "Update";
	?>
<div class="row">
	<?= form_open('Karyawan/'.(isset($id_karyawan)?'update/'.$id_karyawan:'create')); ?>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="">Nama Karyawan <?php echo form_error('nama_karyawan') ?></label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo (isset($karyawan)?$karyawan->nama_karyawan:""); ?>" />
		</div>
	</div>
</div><br>
<div class="row">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="">Jabatan Karyawan <?php echo form_error('jabatan_karyawan') ?></label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="jabatan_karyawan" id="jabatan_karyawan" placeholder="Jabatan Karyawan" value="<?php echo (isset($karyawan)?$karyawan->jabatan_karyawan:""); ?>" />
		</div>
	</div>
</div><br><br>
<div class="row">
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
					if($id_karyawan != null) {
						$subkriteria_value = $this->db->query("SELECT a.*, b.* FROM karyawan a LEFT JOIN karyawan_nilai b ON a.id_karyawan = b.id_karyawan WHERE a.id_karyawan=".$this->uri->segment(3))->result();
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
			<button type="submit" name="submit" class="btn btn-primary btn-flat"><?php echo $tipe_form; ?></button>
			<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
		<?php } ?>
		</div>
	</div>
	<?= form_close(); ?>
</div>
