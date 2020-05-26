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
                <?php if(isset($stu)){ ?>
                  Sửa sinh viên
                <?php }else{ ?>
                Thêm sinh viên
              <?php } ?>
              </div>
              <div class="card-body">
              <form action="">
                  <div class="form-group">
                    <label for="masv">Mã sinh viên:</label>
                    <input type="text" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('masv') ?>" <?php }else{ ?> placeholder="Mã sinh viên" <?php } ?> id="masv">
                  </div>
                  <div class="form-group">
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('fullname') ?>" <?php }else{ ?> placeholder="họ và tên" <?php } ?> id="fullname">
                  </div>
                  <div class="form-group">
                    <label for="birthday">Ngày tháng năm sinh:</label>
                    <input type="date" min="1000-01-01" max="3000-12-31" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('birthday') ?>" <?php } ?> id="birthday">
                  </div>
                  <div class="form-group">
                    <label for="avatar">Href avatar:</label>
                    <input type="text" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('image') ?>" <?php }else{ ?> placeholder="Link ảnh đại diện" <?php } ?> id="avatar">
                  </div>
                  <div class="form-group">
                    <label for="location">Quê quán:</label>
                    <input type="text" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('location') ?>" <?php }else{ ?> placeholder="Quê quán"<?php } ?> id="location">
                  </div>
                  
                 
                  <button type="submit" id="submit" class="btn btn-primary"><?php if(isset($stu)){ ?>Update <?php }else{ ?> Submit <?php } ?></button>
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
                      <th>Mã sinh viên</th>
                      <th>Họ và tên</th>
                      <th>Ngày tháng năm sinh</th>
                      <th>Ảnh đại diện</th>
                      <th>Quê quán</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Mã sinh viên</th>
                      <th>Họ và tên</th>
                      <th>Ngày tháng năm sinh</th>
                      <th>Ảnh đại diện</th>
                      <th>Quê quán</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($list as $s){ ?>
                    <tr>
                      <td><a href="student@<?= $s->getColumnValue('id') ?>"><?= $s->getColumnValue('masv') ?></a></td>
                      <td><?= $s->getColumnValue('fullname') ?></td>
                      <td><?= $s->getColumnValue('birthday') ?></td>
                      <td><img src="<?= $s->getColumnValue('image') ?>" class="img-responsive" style="vertical-align: middle;width:70px;height:70px;object-fit: cover;border-radius: 50%;"></td>
                      <td><?= $s->getColumnValue('location') ?></td>
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
        url: <?php if(isset($stu)){ ?>'student/update' <?php }else{ ?> 'student/add' <?php } ?>,
        type: 'POST',
        data: {
          <?php if(isset($stu)){ ?> id: '<?= $stu->getColumnValue('id') ?>', <?php } ?>
          masv: $('#masv').val(),
          fullname: $('#fullname').val(),
          birthday: $('#birthday').val(),
          image: $('#avatar').val(),
          location: $('#location').val(),

        }
      }).done((result)=>{
        result = JSON.parse(result);
          if(result.status == true){
            $.notify({
              icon: 'pe-7s-gift',
              message: <?php if(isset($stu)){ ?> "Cập nhật thành công" <?php }else{ ?> "Thêm thành công" <?php } ?>
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
              message: "Trùng mã sinh viên"
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