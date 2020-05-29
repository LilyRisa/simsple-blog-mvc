<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('sb-admin-2.min.css');
includeExternalStyle('https://unpkg.com/aos@2.3.1/dist/aos.css');
includeExternalScript('https://kit.fontawesome.com/395a09f10a.js');
includeExternalScript('https://unpkg.com/aos@2.3.1/dist/aos.js');

includeScript('jquery.min.js');
endHeader();

mixscript('AOS.init();');
?>
<div id="wrapper">
<?php includeTemplate('admin/component','silebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php includeTemplate('admin/component','navbar'); ?>

      <div class="container-fluid" style="height:100%; background-image: url('<?=  staticfile('site/images/tdu.jpeg') ?>'); background-repeat: no-repeat; ">
          <!-- Content Row -->
<div class="row" style="">
  
</div>
        </div>

      <?php includeTemplate('admin/component','footer'); ?>
    </div>
  </div>
</div>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
  <i class="fas fa-angle-up"></i>
</a>
<?php




includeScript('bootstrap.bundle.min.js');
includeScript('jquery.easing.min.js');
includeScript('sb-admin-2.min.js');
includeScript('Chart.min.js');
includeScript('chart-area-demo.js');
includeScript('chart-pie-demo.js');

getFooter();
?>