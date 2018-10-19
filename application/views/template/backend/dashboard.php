<?php $this->load->view('template/backend/partials/header'); ?>
<body class="page-body page-fade-only skin-blue" data-url="http://neon.dev">

    <div class="page-container horizontal-menu">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    	<?php $this->load->view('template/backend/partials/menu'); ?>
    	<div class="main-content">

        <div class="row" style="height: 0px;"></div>

	        <hr />

			<!-- konten disini -->
    		<?= $contents; ?>

      <!--   </div>
      </div> -->
    <br />

<?php $this->load->view('template/backend/partials/footer'); ?>
