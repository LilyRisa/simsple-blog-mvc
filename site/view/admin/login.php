<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('sb-admin-2.min.css');
includeExternalStyle('https://unpkg.com/aos@2.3.1/dist/aos.css');
includeExternalScript('https://kit.fontawesome.com/395a09f10a.js');
includeExternalScript('https://unpkg.com/aos@2.3.1/dist/aos.js');

mixstyle(' 
  body{
    background-color: #4e73df;
    background-image: linear-gradient(180deg,#4e73df 10%,#224abe 100%);
    background-size: cover;
  }
  

  ');
includeScript('jquery.min.js');
endHeader();

mixscript('AOS.init();');
?>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome teacher!</h1>
                  </div>
                  <form class="user">
             
                      <div class="alert alert-danger" role="alert" id="noti" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine" style="display: none">
                        Sai tài khoản hoặc mật khẩu!
                    
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter username Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-user btn-block" id="submit">
                      Login
                    </a>
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<script>
  $(document).ready(function(){
    $('#submit').on('click',(e)=>{
      e.preventDefault();
      $.ajax({
        url: 'teacher/login',
        type: 'POST',
        data: {
          username: $('#username').val(),
          password: $('#password').val()
        }
      }).done((result)=>{
        result = JSON.parse(result);
          if(result.status == true){
            // location.reload();
            console.log(result);
          }else{
            console.log(result);
            $('#noti').attr('style',' ');
          }
          // console.log(result);
      }).fail();
    });
  });
</script>
<?php

componentFooter($footer);


includeScript('bootstrap.bundle.min.js');
includeScript('jquery.easing.min.js');
includeScript('sb-admin-2.min.js');

getFooter();
?>