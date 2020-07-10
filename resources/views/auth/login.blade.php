<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login PPDB BTKL</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('klorofil/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('klorofil/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('klorofil/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('klorofil/assets/img/logo-smkn-btkl.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('klorofil/assets/img/logo-smkn-btkl.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<!-- additional style, cause the main.css of this element isn't working good -->
						<div class="content" style="padding-top: 20px;">
							<div class="header">
                                
                                <div class="logo text-center"><img src="{{ asset('klorofil/assets/img/logo-smkn-btkl.png') }}"
                                    alt="SMKN Bantarkalong's Logo" style="height: 100px; width: 100px"></div>

								<p class="lead">Silahkan Login sebagai Administrator</p>
							</div>
                            <form method="POST" action="{{ route('login') }}" class="form-auth-small">
                                @csrf
								<div class="form-group">
                                    <label for="email" class="text-left">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
								<div class="form-group">
									<label for="password" class="">Password</label>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group clearfix">
									
								</div>
								<button type="submit" class="btn btn-success btn-lg btn-block">LOGIN</button>
								
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Aplikasi Penerimaan Peserta Didik Baru</h1>
							<p>&copy; Muhammad Rydwan</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

