<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('sb-admin-2.min.css');
includeExternalStyle('https://unpkg.com/aos@2.3.1/dist/aos.css');
includeExternalScript('https://kit.fontawesome.com/395a09f10a.js');
includeExternalScript('https://unpkg.com/aos@2.3.1/dist/aos.js');
includeExternalScript('https://unpkg.com/sweetalert/dist/sweetalert.min.js');

includeScript('jquery.min.js');
includeScript('bootstrap-notify.js');
endHeader();

mixscript('AOS.init();');
mixscript('AOS.init();');
?>
<div id="wrapper">
<?php includeTemplate('admin/component','silebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php includeTemplate('admin/component','navbar'); ?>

      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>


          <!-- Content Row -->

          <div class="row">
            <div class="col-lg-6 mb-4">
            <div class="card lg-12 md-12">
              <div class="card-header">
                <?php if(isset($sb)){ ?>
                  Sửa điểm sinh viên
                <?php }else{ ?>
                Thêm điểm sinh viên
              <?php } ?>
              </div>
              <div class="card-body">
              <form action="">
                
                  <div class="form-group">
                    <label for="cnpm">Tên môn:</label>
                    <input type="text" step="0.1" class="form-control" <?php if(isset($sb)){ ?> value ="<?= $sb->getColumnValue('name') ?>" <?php } ?>  id="name">
                  </div>
                  
      
                  <button type="submit" id="submit" class="btn btn-primary"><?php if(isset($sb)){ ?>Update <?php }else{ ?> Submit <?php } ?></button>
                </form>
                </div>
            </div>
            </div>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body" >
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên môn</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tên môn</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($list as $sj){ ?>
                    <tr>
                      <td><a href="subject@<?= $sj->getColumnValue('id') ?>"><?= $sj->getColumnValue('id') ?></a></td>

                      
                      <td><?= $sj->getColumnValue('name') ?> </td>
                    </tr>
                  <?php } ?>
                    
                  </tbody>
                </table>
              </div>
                </div>
              </div>


            </div>

          </div>

        </div>

      <?php includeTemplate('admin/component','footer'); ?>
    </div>
  </div>
</div>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
  <i class="fas fa-angle-up"></i>
</a>

<script>
  $(document).ready(() =>{
    $('#submit').on('click',(e)=>{
      e.preventDefault();
      $.ajax({
        url: <?php if(isset($sb)){ ?>'subject/update' <?php }else{ ?> 'subject/add' <?php } ?>,
        type: 'POST',
        data: {
          <?php if(isset($sb)){ ?> id: '<?= $sb->getColumnValue('id') ?>', <?php } ?>
          name: $('#name').val(),
        }
      }).done((result)=>{
        result = JSON.parse(result);
          if(result.status == true){
            $.notify({
              icon: 'pe-7s-gift',
              message: <?php if(isset($sb)){ ?> "Cập nhật thành công" <?php }else{ ?> "Thêm thành công" <?php } ?>
              },{
            type: 'success',
            timer: 4000
        });
            setTimeout(function() {
                location.reload();
            },4000);
            console.log(result);

          }else{
            $.notify({
              icon: 'pe-7s-gift',
              message: "Môn học đã tồn tại"
              },{
            type: 'danger',
            timer: 4000
        });
            
          }
          
          console.log(result);
      });
    });


  });



 
  
</script>
<?php




includeScript('bootstrap.bundle.min.js');
includeScript('jquery.easing.min.js');
includeScript('sb-admin-2.min.js');
includeScript('Chart.min.js');
includeScript('chart-area-demo.js');
includeScript('chart-pie-demo.js');

getFooter();
?>