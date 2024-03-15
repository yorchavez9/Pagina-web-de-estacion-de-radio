<?php

$item = null;

$valor = null;

$noticias = ControladorNoticia::ctrMostrarNoticias($item, $valor);
$galerias = ControladorGaleria::ctrMostrarGaleria($item, $valor);
$videos = ControladorVideo::ctrMostrarVideos($item, $valor);
$eventos = ControladorEvento::ctrMostrarEvento($item, $valor);


$totalNoticias = count($noticias);
$totalGalerias = count($galerias);
$totalVideos = count($videos);
$totolEventos = count($eventos);

?>

<div class="page-wrapper">
	<div class="page-content">

		<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
			<div class="col">
				<div class="card radius-10 border-start border-0 border-4 border-info">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-secondary">Total Noticias</p>
								<h4 class="my-1 text-info"><?php echo $totalNoticias?></h4>
							</div>
							<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 border-start border-0 border-4 border-danger">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-secondary">Total videos</p>
								<h4 class="my-1 text-danger"><?php echo $totalVideos?></h4>
							</div>
							<div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
								<i class='bx bxs-wallet'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 border-start border-0 border-4 border-success">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-secondary">Total Imágenes</p>
								<h4 class="my-1 text-success"><?php echo $totalGalerias?></h4>
							</div>
							<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
								<i class='bx bxs-bar-chart-alt-2'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card radius-10 border-start border-0 border-4 border-warning">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div>
								<p class="mb-0 text-secondary">Total Eventos</p>
								<h4 class="my-1 text-warning"><?php echo $totolEventos?></h4>
							</div>
							<div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end row-->

		<div class="row">
			<div class="col-12 col-lg-8 d-flex">
				<div class="card radius-10 w-100">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Visitas al radio</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Acción</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Otra acción</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">algo mas aqui</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
							<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Sales</span>
							<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Visitas</span>
						</div>
						<div class="chart-container-1">
							<canvas id="chart1"></canvas>
						</div>
					</div>
					<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
						<div class="col">
							<div class="p-3">
								<h5 class="mb-0">24.15M</h5>
								<small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							</div>
						</div>
						<div class="col">
							<div class="p-3">
								<h5 class="mb-0">12:38</h5>
								<small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							</div>
						</div>
						<div class="col">
							<div class="p-3">
								<h5 class="mb-0">639.82</h5>
								<small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4 d-flex">
				<div class="card radius-10 w-100">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Contenido</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Acción</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Otras acción</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">algo mas aqui</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="chart-container-2">
							<canvas id="chart2"></canvas>
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
							Noticias <span class="badge bg-success rounded-pill"><?php echo $totalNoticias?></span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							Videos <span class="badge bg-danger rounded-pill"><?php echo $totalVideos?></span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							Imágenes <span class="badge bg-primary rounded-pill"><?php echo $totalGalerias?></span>
						</li>
						<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
							Eventos <span class="badge bg-warning text-dark rounded-pill"><?php echo $totolEventos?></span>
						</li>
					</ul>
				</div>
			</div>
		</div><!--end row-->

	</div>
</div>
