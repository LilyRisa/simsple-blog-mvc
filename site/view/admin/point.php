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
                  Sửa điểm sinh viên
                <?php }else{ ?>
                Thêm điểm sinh viên
              <?php } ?>
              </div>
              <div class="card-body">
              <form action="">
                  <div class="form-group">
                    <label for="masv">Mã sinh viên:</label>
                    <!-- <input type="text" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('masv') ?>" <?php }else{ ?> placeholder="Mã sinh viên" <?php } ?> id="masv"> -->
                    <?php if(isset($stu)){ ?>
                      <select class="form-control" id="stu_id" disabled>
                        <?php foreach($list as $s){ 
                            if($stu->getColumnValue('student_id') == $s->getColumnValue('id')){
                          ?>
                          <option value="<?= $s->getColumnValue('id') ?>" selected><?= $s->getColumnValue('masv') ?> - <?= $s->getColumnValue('fullname') ?></option>
                         
                        <?php }else{
                          ?>
                          <option value="<?= $s->getColumnValue('id') ?>"><?= $s->getColumnValue('masv') ?> - <?= $s->getColumnValue('fullname') ?></option>
                          <?php
                        }
                        } ?>
                      </select>

                      <?php }else{ ?>

                    <select class="form-control" id="stu_id">
                      <?php foreach($list as $s){ ?>
                        

                        <option value="<?= $s->getColumnValue('id') ?>"><?= $s->getColumnValue('masv') ?> - <?= $s->getColumnValue('fullname') ?></option>
                       
                      <?php } ?>
                    </select>
                    <?php } ?>

                  </div>
                  <div class="form-group">
                    <label for="cnpm">Công nghệ phần mềm:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('cnpm') ?>" <?php } ?>  id="cnpm">
                  </div>
                  <div class="form-group">
                    <label for="ttnt">Trí tuệ nhân tạo:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('ttnt') ?>" <?php } ?>  id="ttnt">
                  </div>
                  <div class="form-group">
                    <label for="qtm">Quản trị mạng:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('qtm') ?>" <?php } ?> id="qtm">
                  </div>
                  <div class="form-group">
                    <label for="tanc">Tiếng anh nâng cao:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('tanc') ?>" <?php } ?> id="tanc">
                  </div>
                  <div class="form-group">
                    <label for="csdl">Cơ sở dữ liệu:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('csdl') ?>" <?php } ?> id="csdl">
                  </div>
                  <div class="form-group">
                    <label for="btht">Bảo trì hệ thống:</label>
                    <input type="number" step="0.1" class="form-control" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('btht') ?>" <?php } ?> id="btht">
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
                      <th>ID</th>
                      <th>Mã sinh viên</th>
                      <th>Công nghệ phần mềm</th>
                      <th>Trí tuệ nhân tạo</th>
                      <th>Quản trị mạng</th>
                      <th>Tiếng anh nâng cao</th>
                      <th>Cơ sở dữ liệu</th>
                      <th>Bảo trì hệ thống</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Mã sinh viên</th>
                      <th>Công nghệ phần mềm</th>
                      <th>Trí tuệ nhân tạo</th>
                      <th>Quản trị mạng</th>
                      <th>Tiếng anh nâng cao</th>
                      <th>Cơ sở dữ liệu</th>
                      <th>Bảo trì hệ thống</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($ls as $point){ ?>
                    <tr>
                      <td><a href="point@<?= $point->getColumnValue('id') ?>"><?= $point->getColumnValue('id') ?></a></td>
     
                      <td>
                        <a href="student@<?= $point->getColumnValue('student_id') ?>">
                          <?php 
                          foreach ($list as $s) {
                            if($s->getColumnValue('id') == $point->getColumnValue('student_id')){
                                echo $s->getColumnValue('masv').' - '.$s->getColumnValue('fullname');
                            } 
                          }

                          ?></a>
                    </td>

                      <td><?= $point->getColumnValue('cnpm') ?> - <?= pointAlpha($point->getColumnValue('cnpm')) ?> </td>
                      <td><?= $point->getColumnValue('ttnt') ?> - <?= pointAlpha($point->getColumnValue('ttnt')) ?> </td>
                      <td><?= $point->getColumnValue('qtm') ?> - <?= pointAlpha($point->getColumnValue('qtm')) ?> </td>
                      <td><?= $point->getColumnValue('tanc') ?> - <?= pointAlpha($point->getColumnValue('tanc')) ?> </td>
                      <td><?= $point->getColumnValue('csdl') ?> - <?= pointAlpha($point->getColumnValue('csdl')) ?> </td>
                      <td><?= $point->getColumnValue('btht') ?> - <?= pointAlpha($point->getColumnValue('btht')) ?> </td>
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
        url: <?php if(isset($stu)){ ?>'point/update' <?php }else{ ?> 'point/add' <?php } ?>,
        type: 'POST',
        data: {
          <?php if(isset($stu)){ ?> id: '<?= $stu->getColumnValue('id') ?>', <?php } ?>
          student_id: $('#stu_id :selected').val(),
          cnpm: $('#cnpm').val(),
          ttnt: $('#ttnt').val(),
          qtm: $('#qtm').val(),
          tanc: $('#tanc').val(),
          csdl: $('#csdl').val(),
          btht: $('#btht').val(),
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