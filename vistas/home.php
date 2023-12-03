<link rel="stylesheet" type="text/css"href="./css/home.css">
<meta>
<div class="container is-fluid">
	<h1 class="title">FARMACIA COPO</h1>
	<h2 class="subtitle">¡Bienvenido <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>!</h2>
</div>
<body>
<div class="menu">
	<div class="Datos-de-medicamento">
		<img src="./img/medicamento.png" alt="">
		<div class="boton-medicamento">
			<a href="index.php?vista=drug_list" class="button is-link is-rounded">Lista de medicamentos</a>
		</div>
	</div>
	
	<div class="Registro-de-medicamento">
		<img src="./img/registromedicamento.png" alt="">
		<div class="boton-nuevo">
			<a href="index.php?vista=drug_new" class="button is-link is-rounded">Registro de  medicamento</a>
		</div>
	</div>

	<div class="Datos-de-vacuna">
		<img src="./img/VACUNA.jpg.png" alt="">
		<div class="boton-vacuna">
			<a href="index.php?vista=product_list" class="button is-link is-rounded">Lista de vacunas</a>
		</div>
	</div>

	<div class="Registro-de-vacuna">
		<img src="./img/buscarmedicamento.png" alt="">
		<div class="boton-nueva">
			<a href="index.php?vista=product_new" class="button is-link is-rounded">Registro de vacuna</a>
		</div>
	</div>

	<div class="Administrador-de-usuarios">
		<img src="./img/LOGOTIPO.jpeg" alt="">
		<div class="boton-usuario">
			<a href="index.php?vista=user_list" class="button is-link is-rounded">Administrar usuario</a>
		</div>
	</div>
</div>
</body>