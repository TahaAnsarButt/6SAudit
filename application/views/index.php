<?php

?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>6S Audit System - Forward Sports Pvt Ltd.</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/Dlogo.png' />
  <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/toastr/toastr.css">
  
  <script src="<?php echo base_url() ?>assets/js/crypto-js.min.js"></script>
  
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
      
        <?php
      
        if($this->session->flashdata('info')){ 
      
       
      
        ?>
      <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('info');?>
                      </div>
                    </div>
                    <?php
        }

                    ?>
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>6S Audit System Login</h4>
              </div>
              <div class="card-body">
                <!-- <form method="POST" action="<?php echo base_url('loginController/process_login')?>" class="needs-validation" novalidate=""> -->
                  <div class="form-group">
                    <label for="number">Enter Card No</label>
                    <input id="username" type="number" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Card No
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Enter Password</label>
                      <div class="float-right">
                        
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <button  class="btn btn-primary btn-lg btn-block" tabindex="4" onclick="login()">
                      Login
                    </button>
                  </div>
                <!-- </form> -->
                
               
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/js/notifications/toastr/toastr.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
<?php



?>

<script>
	$(document).ready(function() {
		// login();
	})

	function login() {
		// let LOGIN_ACCESS_BY_GRADE_ID = [1, 2, 3, 4, 18, 19];
    // alert('clk')

		url = "http://10.10.100.4:8010/api/login/check_credentials/";
		let cardno = $('input[id=username]');
		let password = $('input[id=password]');

		if (cardno.val().length <= 0) {
			cardno.addClass('is-invalid')
			is_valid = false
		} else {
			cardno.removeClass('is-invalid')
			is_valid = true
		}

		if (password.val().length <= 0) {
			password.addClass('is-invalid')
			is_valid = false
		} else {
			password.removeClass('is-invalid')
			is_valid = true
		}

		if (!is_valid) {
			return;
		}


		var fd = new FormData();
		fd.append("username", cardno.val());
		fd.append("password", password.val());
		$.ajax({
			url: url,
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(data, status) {
				if (data && data.error) {
					alert(data.error);
				} else {
					console.log("all data", data);


          sessionStorage.setItem("Login_id",data.id)
          sessionStorage.setItem("user_name",data.picture.name)
          sessionStorage.setItem("deptid",data['companyInfo']['Department']['id'])
          sessionStorage.setItem("deptname",data['companyInfo']['Department']['name'])
          sessionStorage.setItem("sect_id",data['companyInfo']['Section']['id'])
          sessionStorage.setItem("sectname",data['companyInfo']['Section']['name'])
          sessionStorage.setItem("rights",data['selfservice_manager_permissions'])
          sessionStorage.setItem("subrights",data['subRequests'])

					const encryptedData = data.encypt;
					const decryptedBytes = CryptoJS.AES.decrypt(encryptedData, 'Password@2022').toString(CryptoJS.enc.Utf8);

					// if (data.gradeID == 1 || data.gradeID == 2 || data.gradeID == 3 || data.gradeID == 4 || data.gradeID == 18 || data.gradeID == 19) {
					if (!(decryptedBytes.replace(/"/g, "") === password.val())) {
						toastr["error"]("Password is incorrect")
						toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": true,
							"progressBar": true,
							"positionClass": "toast-top-center",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"timeOut": 0,
						}
						$('input[id=password]').val('');
						return true;
					} else {
						window.location.href = "<?php echo base_url(''); ?>Main";
					}
				}

			},
			error: function() {
				alert("Error: Server is not responding.");

			}
		});
	}
</script>