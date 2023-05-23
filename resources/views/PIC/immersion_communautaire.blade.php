<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon2.ico') }}" />
	<title>Programmes Immersion Communautaire</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('PIC/css/style.css')}}">

</head>

<body>
	<section class="ftco-section">
		@include('sweetalert::alert')
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<a href="/"><img src="{{ asset('images/LOGO BENIANH.png') }}" width="250" title="retour accueil" /></a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-justify d-flex align-items-start order-md-last">
							<div class="text w-100">
								<h2>Programmes Immersion Communautaire</h2>
								<small>
									<hr size="30">
								</small>
								<p>
									A travers le programme immersion, vous aurez l'opportunité de faire des séjours dans les communautés
									à l'intérieur de la Côte d'Ivoire, de rencontrer les principaux acteurs politiques, administratifs et
									du développement économique des régions.Avec des déjeuners de travail, les visites d'infrastructures et
									de sites touristiques, ce programme vous permettra de vous inspirer des modèles de développement local,
									de mesurer les potentiels investissements et de découvrir les richesses culturelles des régions.
								</p>
								<p>Dans la région de la NAWA</p>
								<blockquote class="quote-danger">
									<h5 id="note">
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">Noter!</font>
										</font>
									</h5>
									<p>
										<font style="vertical-align: inherit;">
											<font style="vertical-align: inherit;">
												Date de l'évènement: Du 25 au 28 Août 2022<br>
												Adresse de l'évènement: Soubré<br>
												Contactez nous au 27 20 32 18 64 / 07 08 61 29 61 / 05 06 29 24 41
											</font>
										</font>
									</p>
								</blockquote>

							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Inscription</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="https://www.facebook.com/Benianh/?ref=pages_you_manage" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="https://www.linkedin.com/feed/" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-linkedin"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
										<a href="https://twitter.com/home" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<form class="signin-form" method="POST" action="{{ route('immersion') }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group mb-3">
									<label class="label" for="name">Nom et Prénom</label>
									<input type="text" name="name" class="form-control" placeholder="Votre réponse" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="email">Adresse mail</label>
									<input type="email" name="email" class="form-control" placeholder="Votre réponse" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="phone">Téléphone</label>
									<input type="number" name="phone" class="form-control" placeholder="Votre réponse" required>
								</div>

								<div class="form-group mb-3">
									<label class="label" for="profession">Profession</label>
									<input type="text" name="profession" class="form-control" placeholder="Votre réponse" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="organisation">Organisation ou Entreprise</label>
									<input type="text" name="organisation" class="form-control" placeholder="Votre réponse" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">S'inscrire</button>
								</div>
								<!--
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('pic/js/jquery.min.js') }}"></script>
	<script src="{{ asset('pic/js/popper.js') }}"></script>
	<script src="{{ asset('pic/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('pic/js/main.js') }}"></script>

</body>

</html>