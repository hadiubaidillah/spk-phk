<?php $pag= $this->uri->segment(1); ?>
<?php $page= $this->uri->segment(2); ?>
<?php $pages= $this->uri->segment(3); ?>

		<header class="navbar navbar-fixed-top">

			<div class="navbar-inner">
				<!-- logo -->
				<div class="navbar-brand">
					<a href="<?= base_url('admin/Dashboard') ?>">
						<img src="<?= base_url() ?>assets/images/logo@2x.png" width="88" alt="" />
					</a>
				</div>


				<ul id="main-menu" class="navbar-nav">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					<!--<li><a href=" <?php echo base_url() ?> " target="_blank"><i class="entypo-monitor"></i><span>Halaman Depan</span></a></li>-->
					<li <?php if($page=="Dashboard") echo 'class="active opened active" '; ?> ><?= anchor('admin/Dashboard','<i class=entypo-gauge></i><span>Dashboard</span>'); ?></li>
					<li <?php if($pag =="Kriteria" || $pag =="kriteria" || $pag =="Subkriteria" || $pag =="subkriteria") echo 'class="active opened active multiple-expanded" '; ?>>
						<a href="#">
							<i class="entypo-layout"></i>
							<span>Kriteria</span>
						</a>
						<ul>
							<li <?php if($pag=="Kriteria" || $pag=="kriteria" ) echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Kriteria','<span class=entypo-layout>Kriteria</span>'); ?></li>
							<li <?php if($pag=="Subkriteria" || $pag=="subkriteria") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Subkriteria','<span class=entypo-menu> Subkriteria</span>'); ?></li>
						</ul>
					</li>
					<li <?php if($pag=="Karyawan" || $pag=="Karyawan") echo 'class="active opened active" '; ?>><?= anchor('Karyawan','<i class=entypo-doc-text></i><span>Karyawan</span>'); ?></li>
					<li <?php if($pag=="Alternatif" || $pag=="alternatif" || $page=="Banding" || $page=="banding" || $page=="Hasil" || $page=="hasil") echo 'class="active opened active multiple-expanded" '; ?>>
						<a href="#">
							<i class="entypo-book"></i>
							<span>Perhitungan</span>
						</a>
						<ul>
							<li <?php if($pag=="alternatif" || $pag=="Alternatif") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Alternatif','<span class=entypo-direction>Alternatif</span>'); ?></li>
							<li <?php if($page=="banding" || $page=="Banding") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Perbandingan/banding','<span class=entypo-switch> Perbandingan</span>'); ?></li>
							<li <?php if($page=="hasil" || $page=="Hasil") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('Perbandingan/hasil','<span class=entypo-chart-bar>Hasil Perhitungan</span>'); ?></li>
						</ul>
					</li>
					<!--<li <?php if($page=="pesan" || $page=="Pesan") echo 'class="active opened active" '; ?>><?= anchor('pesan','<i class=entypo-mail></i><span>Pesan</span>'); ?></li>-->
					<li <?php if($page=="Auth" ||$page=="auth") echo 'class="active opened active multiple-expanded" '; ?>>
						<a href="#">
							<i class="entypo-tools"></i>
							<span>Pengaturan</span>
						</a>
						<ul>
							<li <?php if($page=="Auth" || $page=="auth") echo 'class="active opened active multiple-expanded" '; ?>><?= anchor('admin/Auth','<span class=entypo-user> Users</span>'); ?></li>
						</ul>
					</li>
					<li><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');"><i class="entypo-help"></i><span>Tentang</span></a></li>
				</ul>


				<!-- notifications and other links -->
				<ul class="nav navbar-right pull-right">
					<li>
						<a href="#">
    					<!--<img src="<?= base_url() ?>assets/images/thumb-1@2xx.png" alt="" class="img-circle" width="44" />-->
    					<?php echo$this->session->userdata('identity'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/Auth/logout">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>



				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</div>
		</header>


	<!-- Modal 1 (Basic)-->
	<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Tentang Aplikasi</h4>
				</div>

				<div class="modal-body">
					<strong>Tentang Aplikasi</strong><br>
		            <i class="glyphicon glyphicon-ok"></i> Bismillah<br>
		            <i class="glyphicon glyphicon-ok"></i> Tugas SPK PHK dengan metode AHP<br>
		            <i class="glyphicon glyphicon-ok"></i> Selesai dengan cepat<br>
		            <i class="glyphicon glyphicon-ok"></i> Kelompok 2<br><br>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
