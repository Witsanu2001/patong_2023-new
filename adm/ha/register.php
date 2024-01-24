
<!DOCTYPE html>
<html>
<head>
<title>สมัครสมาชิก</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script type="text/javascript" src="./lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="./dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Latform styles -->
<link rel="stylesheet" href="./dist/css/latform-style-12.min.css" type="text/css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<div class="page-header">
<div class="alert alert-info" role="alert">
<center><h3>สมัครสมาชิก</h3></center>
</div>
</div>


<div class="panel panel-default">


<div class="panel-body">
<form id="signupForm" action="signup_db.php" method="post" class="form-horizontal" action>


<div class="form-group">
<label class="col-sm-4 control-label" for="firstname">ชื่อ</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="lastname">นามสกุล</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="nickname">ชื่อเล่น</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="telephone">เบอร์โทรศัพท์</label>
<div class="col-sm-5">
<input type="number" class="form-control" id="telephone" name="telephone" placeholder="Telephone Number" />
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label" for="username">ชื่อผู้ใช้</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="password">รหัสผ่าน</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="confirm_password">ยืนยันรหัสผ่าน</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
</div>
</div>

<div class="form-group">
<div class="col-sm-9 col-sm-offset-4">
<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>

<a href="index.php" class="btn btn-danger">back</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					nickname: "required",
					address: "required",
					username: {
					required: true,
					minlength: 2,
					// Add the URL of your username check script here
					remote: {
					url: "check_username.php",
					type: "post"
					}},
					telephone: {
						required: true,
						minlength: 10,
    					maxlength: 10
					},
					password: {
						required: true,
						minlength: 5,
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your firstname",
					lastname: "Please enter your lastname",
					nickname: "Please enter your nickname",
					address: "Please enter your address",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters",
						remote: "มีบัญชีนี้อยู่แล้ว!!"
					},
					telephone: {
						required: "กรุณากรอกเบอร์โทรศัพท์",
						minlength: "หมายเลขโทรศัพท์ของคุณต้องครบ 10 หลัก"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
		
		
	</script>
</body>
</html>
