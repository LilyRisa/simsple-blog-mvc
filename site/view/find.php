<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('clean-blog.css');
includeStyle('clean-blog.min.css');
includeExternalScript('https://kit.fontawesome.com/395a09f10a.js');
includeScript('jquery.min.js');
mixstyle("#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }");
    mixstyle(".emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}");
endHeader();

    

componentMenu($menu);
componentHeader($textheading);

?>
<div class="container">
  <div class="row">
    <h2>Tìm kiếm mã sinh viên</h2>
           <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" id="seach_msv" placeholder="Tìm kiếm mã sinh viên" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
  </div>
</div>
<div class="container emp-profile" id="student_show" style="display: none">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img id="avatar" src="" alt="" style="width:275px; height:183px;object-fit: cover"/>
                            <div class="file btn btn-lg btn-primary">
                               Avatar
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5 id="fullname">
                                        
                                    </h5>
                                    <h6>
                                        Sinh viên TDU
                                    </h6>
                                    <p class="proile-rating" >Ngày sinh : <span id="daytime"></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Thông tin điểm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mã sinh viên:</label>
                                            </div>
                                            <div class="col-md-6" id="masv">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Họ và tên:</label>
                                            </div>
                                            <div class="col-md-6" id="fullname_tl">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ngày tháng năm sinh:</label>
                                            </div>
                                            <div class="col-md-6" id="dateday">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Quê quán:</label>
                                            </div>
                                            <div class="col-md-6" id="location_tl">
                                                
                                            </div>
                                        </div>
                                        
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                      <?php foreach ($subject as $value) {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?= $value->getColumnValue('name') ?>:</label>
                                            </div>
                                            <div class="col-md-6 " id="subject<?= $value->getColumnValue('id') ?>"  data-id="<?= $value->getColumnValue('id') ?>">
                                                
                                            </div>
                                        </div>
                                        <?php
                                      } ?>
                                        
                                        
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>B</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        <script>
          $(document).ready(()=>{
            var input = $('#seach_msv');
            input.on("keypress", (e)=> {
              if (e.which == 13) {
                  e.preventDefault();
                  $.ajax({
                      url: 'find/search',
                      type: 'POST',
                      data: {
                        text: input.val()
                      }
                    }).done((result)=>{
                      $('#student_show').attr('style',' ')
                        result = JSON.parse(result);
                        console.log(result);
                        $('#fullname').html(result.student.fullname);
                        $('#avatar').attr('src',result.student.image);
                        $('#daytime').html(result.student.birthday);
                        $('#masv').html('<p>'+result.student.masv+'</p>');
                        $('#fullname_tl').html('<p>'+result.student.fullname+'</p>');
                        $('#location_tl').html('<p>'+result.student.location+'</p>');
                        $('#dateday').html('<p>'+result.student.birthday+'</p>');
                        $('.subject').attr('data-name',result.student.id);
                        <?php foreach ($subject as $value) {
                          ?>
                        $.ajax({
                              url: 'point/getfont',
                              type: 'POST',
                              data: {
                                student_id: result.student.id,
                                point_id: <?= $value->getColumnValue('id') ?>,
                              }
                            }).done((result)=>{
                                console.log(result);
                                result = JSON.parse(result);
                                $('#subject<?= $value->getColumnValue('id') ?>').html('<p>'+result.value_point+' - '+result.point_alpha+'</p>');
                            });
                          <?php
                         } ?>
                    });
              }
            });
          });
        </script>

<?php

componentFooter($footer);

includeScript('bootstrap.bundle.min.js');
includeScript('clean-blog.min.js');

getFooter();
?>