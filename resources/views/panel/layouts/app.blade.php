<!DOCTYPE html>
<html>
	<head>
		<title>Panel EspecializaTi</title>

        {{-- <title>{{$title ?? '' or 'Panel EspecializaTi'}}</title> --}}

		<!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <!--CSS Person-->

        <link rel="stylesheet" href="{{url('assets/panel/css/especializati.css')}}">
		<link rel="stylesheet" href="{{url('assets/panel/css/especializati-reset.css')}}">

		<!--Favicon-->
		<link rel="icon" type="image/png" href="{{url('assets/panel/imgs/favicon.png')}}">
	</head>
<body>

<section class="menu">

	<div class="logo">
		<img src="{{url('assets/panel/imgs/icone-especializati.png')}}" alt="EspecializaTi" class="logo-painel">
	</div>

	<div class="list-menu">
		<ul class="menu-list">
			<li>
				<a href="?pag=home">
					<i class="fa fa-home" aria-hidden="true"></i>
					Home
				</a>
			</li>

			<li>
				<a href= "{{ route('brands.index')}}">
					<i class="far fa-copyright"  aria-hidden="true"></i>
					Listagem
				</a>
			</li>

			<li>
				{{-- <a href="?pag=forms">
					<i class="fas fa-landmark" aria-hidden="true"></i>
					Forms
				</a> --}}
			</li>
		</ul>
	</div>

</section><!--End Menu-->

<section class="content">
	<div class="top-dashboard">

		<div class="dropdown user-dash">
            <div class="dropdown-toggle" id="dropDownCuston" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="{{url('assets/panel/imgs/user-carlos-ferreira.png')}}" alt="Carlos Ferreira" class="user-dashboard img-circle">
                <p class="user-name">Nome User</p>
                <span class="caret"></span>

            </div>
            <div>
                <ul class="dropdown-menu dp-menu" aria-labelledby="dropDownCuston">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
		    </div>
        </div>
    </div><!--Top Dashboard-->

	<div class="content-ds">

		@yield('content')


	</div><!--End Content DS-->

</section><!--End Content-->



	<!--jQuery-->
	<script src="{{url('assets/panel/js/jquery-3.1.1.min.js')}}"></script>

    {{-- Font awesome --}}

    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>

</body>
</html>
