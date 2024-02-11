<?php
include('config.php');

$idUtilisateur = $_GET['idUtilisateur'];

$ReadSql = "SELECT idUtilisateur, nom, prenom, email, motDePasse, telephone, sexe, dateDeNaissance, adresse, ville, pays, codePostal 
            FROM utilisateur 
            WHERE idUtilisateur= :idUtilisateur";

$stmt = $conn->prepare($ReadSql);
$stmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
$stmt->execute();

$res = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST) && !empty($_POST)) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$motDePasse = $_POST['motDePasse'];
	$telephone = $_POST['telephone'];
	$sexe = $_POST['sexe'];
	$dateDeNaissance = $_POST['dateDeNaissance'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$pays = $_POST['pays'];
	$codePostal = $_POST['codePostal'];

	$UpdateSql = "UPDATE utilisateur 
                      SET nom=:nom, prenom=:prenom, email=:email, motDePasse=:motDePasse, 
					  telephone=:telephone, sexe=:sexe, dateDeNaissance=:dateDeNaissance, adresse=:adresse , ville=:ville , pays=:pays , codePostal=:codePostal 
                      WHERE idUtilisateur=:idUtilisateur";

$updateStmt = $conn->prepare($UpdateSql);
	$updateStmt->bindParam(':nom', $nom);
	$updateStmt->bindParam(':prenom', $prenom);
	$updateStmt->bindParam(':email', $email);
	$updateStmt->bindParam(':motDePasse', $motDePasse);
	$updateStmt->bindParam(':telephone', $telephone);
	$updateStmt->bindParam(':sexe', $sexe);
	$updateStmt->bindParam(':dateDeNaissance', $dateDeNaissance);
	$updateStmt->bindParam(':adresse', $adresse);
	$updateStmt->bindParam(':ville', $ville);
	$updateStmt->bindParam(':pays', $pays);
	$updateStmt->bindParam(':codePostal', $codePostal);
	$updateStmt->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
	$res = $updateStmt->execute();

	if ($res) {
        // Rediriger vers la liste des produits après la mise à jour
        header("Location: listeAdmin.php");
        exit();
    } else {
        $erreur = "La mise à jour a échoué.";
    }
}
?>

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="assets/img/logo.png" alt="">
				<span class="d-none d-lg-block">AutoShopAdmin</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->

		<div class="search-bar">
			<form class="search-form d-flex align-items-center" method="POST" action="#">
				<input type="text" name="query" placeholder="Search" title="Enter search keyword">
				<button type="submit" title="Search"><i class="bi bi-search"></i></button>
			</form>
		</div><!-- End Search Bar -->

		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">

				<li class="nav-item d-block d-lg-none">
					<a class="nav-link nav-icon search-bar-toggle " href="#">
						<i class="bi bi-search"></i>
					</a>
				</li><!-- End Search Icon-->

				<li class="nav-item dropdown">

					<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
						<i class="bi bi-chat-left-text"></i>
						<span class="badge bg-success badge-number"></span>
					</a><!-- End Messages Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
						<li class="dropdown-header">
							You have new messages
							<a href="listecontact.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View
									all</span></a>
						</li>

					</ul><!-- End Messages Dropdown Items -->

				</li>

				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="assets/img/photo profile.jpg" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2">Ranim Jrad</span>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6>Ranim Jrad</h6>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>


						<li>
							<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
								<i class="bi bi-gear"></i>
								<span>Paramètres de compte</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>

					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->

			</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link " href="index.html">
					<i class="bi bi-grid"></i>
					<span>Tableau de bord</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-menu-button-wide"></i><span>Produit</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="ajouterProduit.html">
							<i class="bi bi-circle"></i><span>Ajouter produit</span>
						</a>
					</li>
					<li>
						<a href="listeProduit.php">
							<i class="bi bi-circle"></i><span>Liste des produits</span>
						</a>
					</li>
				</ul>
			</li><!-- End Components Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>Administrateur</span><i
						class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="ajouterAdmin.html">
							<i class="bi bi-circle"></i><span>Ajouter un admin</span>
						</a>
					</li>
					<li>
						<a href="listeAdmin.php">
							<i class="bi bi-circle"></i><span>Liste des Admins</span>
						</a>
					</li>
				</ul>
			</li><!-- End Forms Nav -->
			<li class="nav-item">
        <a class="nav-link collapsed" href="listeCommande.php">
          <i class="bi bi-person"></i>
          <span>Commandes</span>
        </a>
      </li>

			<li class="nav-heading">Paramètres</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="users-profile.html">
					<i class="bi bi-person"></i>
					<span>Profile</span>
				</a>
			</li><!-- End Profile Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="pages-login.html">
					<i class="bi bi-person"></i>
					<span>Déconnexion</span>
				</a>
			</li>


		</ul>

	</aside><!-- End Sidebar-->

	<main id="main" class="main">

		<div class="pagetitle">
			<h1>Ajouter Produit</h1>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
					<li class="breadcrumb-item active">Ajouter Produit</li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<section class="section">
			<div class="row">

				<div class="col-lg-12">
					<div class="card ">
						<div class="card-body ">
							<h5 class="card-title">Administrateur</h5>

							<!-- No Labels Form -->
							<form class="row g-3" method="post" action="">
								<div>
									<input type="hidden" name="idUtilisateur" value="<?= $res['idUtilisateur'] ?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" value="<?= $res['nom'] ?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="prenom" id="prenom" class="form-control"
										placeholder="Prenom" value="<?= $res['prenom'] ?>" >
								</div>
								<div class="col-md-6">
									<input type="text" name="email" id="email" class="form-control"
										placeholder="Email" value="<?= $res['email'] ?>" >
								</div>
								<div class="col-md-6">
									<input type="text" name="motDePasse" id="motDePasse" class="form-control"
										placeholder="Mot De Passe" value="<?= $res['motDePasse'] ?>" >
								</div>
								<div class="col-md-12">
									<input type="text" name="telephone" id="telephone" class="form-control"
										placeholder="Téléphone" value="<?= $res['telephone'] ?>">
								</div>
								<div class="col-12">
									<label class="form-label">Sexe </label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexe" id="femme"
											value="femme" <?php echo ($res['sexe'] == 'femme') ? 'checked' : ''; ?>>
										<label class="form-label" for="femme" value="femme">Femme</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="sexe" id="homme"
										value="homme" <?php echo ($res['sexe'] == 'homme') ? 'checked' : ''; ?>>
										<label class="form-label" for="homme" value="<?= $res['sexe'] ?>">Homme</label>
									</div>
								</div>

								<div class="col-12">
									<input type="date" name="dateDeNaissance" class="form-control" id="dateDeNaissance"
										placeholder="Date de naissance" value="<?= $res['dateDeNaissance'] ?>">
								</div>


								<div class="col-12">
									<input type="text" name="adresse" class="form-control" id="adresse"
										placeholder="Adresse" value="<?= $res['adresse'] ?>">
								</div>

								<div class="col-12">
									<input type="text" name="ville" class="form-control" id="ville" placeholder="ville" value="<?= $res['ville'] ?>">
								</div>

								<div class="col-12">
									<input type="text" name="pays" class="form-control" id="pays" placeholder="Pays" value="<?= $res['pays'] ?>">
								</div>

								<div class="col-12">
									<input type="text" name="codePostal" class="form-control" id="codePostal"
										placeholder="Code Postal" value="<?= $res['codePostal'] ?>">
								</div>

							

								<div class="text-center">
									<button type="submit" class="btn btn-primary">Envoyer</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
			&copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
		</div>
		<div class="credits">
			<!-- All the links in the footer should remain intact. -->
			<!-- You can delete the links only if you purchased the pro version. -->
			<!-- Licensing information: https://bootstrapmade.com/license/ -->
			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
			Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
			class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/chart.js/chart.umd.js"></script>
	<script src="assets/vendor/echarts/echarts.min.js"></script>
	<script src="assets/vendor/quill/quill.min.js"></script>
	<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="assets/vendor/tinymce/tinymce.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
	<script>
		function displaySelectedImage(event, elementId) {
			const selectedImage = document.getElementById(elementId);
			const fileInput = event.target;

			if (fileInput.files && fileInput.files[0]) {
				const reader = new FileReader();

				reader.onload = function (e) {
					selectedImage.src = e.target.result;
				};

				reader.readAsDataURL(fileInput.files[0]);
			}
		}
	</script>

</body>

</html>