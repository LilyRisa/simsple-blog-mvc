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

                    <select class="form-control" id="stu_id" onchange="fetch_data()">
                      <?php foreach($list as $s){ ?>
                        

                        <option value="<?= $s->getColumnValue('id') ?>"><?= $s->getColumnValue('masv') ?> - <?= $s->getColumnValue('fullname') ?></option>
                       
                      <?php } ?>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="sb">Môn học:</label>
                    <select class="form-control" id="sb" onchange="fetch_data()">
                      <?php foreach($sb as $sba){ ?>
                        

                        <option value="<?= $sba->getColumnValue('id') ?>"><?= $sba->getColumnValue('name') ?></option>
                       
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group" id="isData">
                    <label for="diemmonhoc">Điểm môn học:</label>
                    <input type="number" step="0.1" class="form-control" id="diemmonhoc" <?php if(isset($stu)){ ?> value ="<?= $stu->getColumnValue('csdl') ?>" <?php } ?>>
                  </div>
                  <div class="form-group" id="noneData" style="display: none">
                    <label for="themdiemmonhoc">Thêm điểm môn học:</label>
                    <input type="number" step="0.1" class="form-control" id="themdiemmonhoc" >
                  </div>
                 
      
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </form>
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
  function fetch_data(){
      $.ajax({
        url: 'point/get',
        type: 'POST',
        data: {
          student_id: $('#stu_id :selected').val(),
          point_id: $('#sb :selected').val(),
        }
      }).done((result)=>{
        console.log(result);
        result = JSON.parse(result);
        if(result.value_point == null){
          $('#isData').attr('style','display: none');
          $('#noneData').attr('style','');
          $('#diemmonhoc').val(result.value_point);
          $('#themdiemmonhoc').val(null);
        }else{
          $('#diemmonhoc').val(result.value_point);
          $('#isData').attr('style','');
          $('#noneData').attr('style','display: none');
        }
        
      });
    }
  function push_data(data){
      $.ajax({
        url: 'point/add',
        type: 'POST',
        data: {
          student_id: data.student_id,
          point_id: data.point_id,
          value_point: data.value_point,
        }
      }).done((result)=>{
        console.log(result);
        result = JSON.parse(result);
        if(result.status == true){
          $.notify({
                icon: 'pe-7s-gift',
                message: 'Thêm thành công'
                },{
              type: 'success',
              timer: 4000
          });
        }else{
          $.notify({
                icon: 'pe-7s-gift',
                message: 'Đã tồn tại'
                },{
              type: 'danger',
              timer: 4000
          });
        }
        
      });
  }
  function push_update_data(data){
      $.ajax({
        url: 'point/update',
        type: 'POST',
        data: {
          student_id: data.student_id,
          point_id: data.point_id,
          value_point: data.value_point,
        }
      }).done((result)=>{
        result = JSON.parse(result);
        if(result.status == true){
          $.notify({
                icon: 'pe-7s-gift',
                message: 'cập nhật thành công'
                },{
              type: 'success',
              timer: 4000
          });
        }else{
          $.notify({
                icon: 'pe-7s-gift',
                message: 'Đã tồn tại'
                },{
              type: 'danger',
              timer: 4000
          });
        }
          
        });
  }

  $(document).ready(() =>{
    fetch_data();
    $('#submit').on('click',(e)=>{
      e.preventDefault();
      if($('#diemmonhoc').val() == ''){
        var data = {
          student_id: $('#stu_id :selected').val(),
          point_id: $('#sb :selected').val(),
          value_point: $('#themdiemmonhoc').val(),
        };
        push_data(data);
      }else{
        var data = {
          student_id: $('#stu_id :selected').val(),
          point_id: $('#sb :selected').val(),
          value_point: $('#diemmonhoc').val(),
        };
        
        push_update_data(data);
      }
    });


    
      






    // $('#submit').on('click',(e)=>{
    //   e.preventDefault();
    //   $.ajax({
    //     url: <?php if(isset($stu)){ ?>'point/update' <?php }else{ ?> 'point/add' <?php } ?>,
    //     type: 'POST',
    //     data: {
    //       <?php if(isset($stu)){ ?> id: '<?= $stu->getColumnValue('id') ?>', <?php } ?>
    //       student_id: $('#stu_id :selected').val(),
    //       point_id: $('#sb :selected').val(),
    //       value: $('#diemmonhoc').val(),

    //     }
    //   }).done((result)=>{
    //     result = JSON.parse(result);
    //       if(result.status == true){
    //         $.notify({
    //           icon: 'pe-7s-gift',
    //           message: <?php if(isset($stu)){ ?> "Cập nhật thành công" <?php }else{ ?> "Thêm thành công" <?php } ?>
    //           },{
    //         type: 'success',
    //         timer: 4000
    //     });
    //         setTimeout(function() {
    //             location.reload();
    //         },4000);
    //         console.log(result);

    //       }else{
    //         $.notify({
    //           icon: 'pe-7s-gift',
    //           message: "Điểm đã tồn tại"
    //           },{
    //         type: 'danger',
    //         timer: 4000
    //     });
            
    //       }
          
    //       console.log(result);
    //   });
    // });


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