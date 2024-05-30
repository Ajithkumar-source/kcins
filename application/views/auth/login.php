<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?? ""; ?> | Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .gradient-custom-2 {
  /* fallback for old browsers */
  background: #fccb90;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
  .gradient-form {
    height: 100vh !important;
  }
}
@media (min-width: 769px) {
  .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
  }
}
.input[type="text"] {
  box-sizing: border-box;
  width: 100%;
  height: calc(3em + 2px);
  margin: 0 0 1em;
  padding: 6px;
  border: 1px solid #bababa;
  border-radius: 3px;
  background: #fff;
	font-size: 16px;
  resize: none;
  outline: none;
}
.input[type="text"]:focus {
  border-color: #00bafa;
}
.input[type="text"]:focus + label[placeholder]:before {
  color: #0091da;
}
.input[type="text"]:focus + label[placeholder]:before,
.input[type="text"]:valid + label[placeholder]:before {
  transition-duration: .2s;
  transform: translate(0, -1.6em) scale(0.9, 0.9);	
	font-weight: bold;
}
.input[type="text"]:valid {
	border-color: green;
}
.input[type="text"]:valid + label[placeholder]:before {
	color: green;
}
.input[type="text"]:invalid + label[placeholder][alt]:before {
  content: attr(alt);
}
.input[type="text"] + label[placeholder] {
  display: block;	
  pointer-events: none;
  line-height: 1.25em;
  margin-top: calc(-3em - 2px);
  margin-bottom: calc((3em - 1em) + 2px);
}
.input[type="text"] + label[placeholder]:before {
  content: attr(placeholder);
  display: inline-block;
  margin: 0 calc(0.5em + 2px);
  padding: 0 2px;
  color: #7d7d7d;
  white-space: nowrap;
  transition: 0.3s ease-in-out;
  background-image: linear-gradient(to bottom, #ffffff, #ffffff);
  background-size: 100% 5px;
  background-repeat: no-repeat;
  background-position: center;
}
        </style>
</head>

<body class="bg-gradient-spl">


		<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="<?= base_url('assets/'); ?>img/inslogo.png" style="width: 155px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">KC Insurance</h4>
                   
                </div>

                 <form class="user" method="POST" action="">
                    

                  <div class="form-outline mb-4">
                      <input type="text" id="name" name="username" class="form-control" placeholder="User Name"/>
                    
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Log in"/>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>


                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are here to cover you
You are safe with us</h4>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
