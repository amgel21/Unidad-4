<?php

class ProductController
{
    private $apiUrl = "https://api.example.com/products"; 

    public function getProducts()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error en la solicitud: ' . curl_error($ch);
            return [];
        }
        
        curl_close($ch);
        return json_decode($response, true);
    }
}

$productController = new ProductController();
$products = $productController->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Detail</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body> 

	<div class="container-fluid min-vh-100 d-flex flex-column">
		<header class="row">
			<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">Product Detail</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarScroll">
			      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
			        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
			        <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
			        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
			      </ul>
			      <form class="d-flex" role="search">
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        <button class="btn btn-outline-success" type="submit">Search</button>
			      </form>
			    </div>
			  </div>
			</nav>
		</header>

		<div class="row flex-grow-1">
			<div class="col-2 g-0">
				<div class="d-flex flex-column min-vh-100 p-3 text-white bg-dark">
				    <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
				      <span class="fs-4">Sidebar</span>
				    </a>
				    <hr>
				    <ul class="nav nav-pills flex-column mb-auto">
				      <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
				      <li><a href="#" class="nav-link text-white">Dashboard</a></li>
				      <li><a href="#" class="nav-link text-white">Orders</a></li>
				      <li><a href="#" class="nav-link text-white">Products</a></li>
				      <li><a href="#" class="nav-link text-white">Customers</a></li>
				    </ul>
				    <hr>
				    <div class="dropdown">
				      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown">
				        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
				        <strong>mdo</strong>
				      </a>
				      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
				        <li><a class="dropdown-item" href="#">New project...</a></li>
				        <li><a class="dropdown-item" href="#">Settings</a></li>
				        <li><a class="dropdown-item" href="#">Profile</a></li>
				        <li><hr class="dropdown-divider"></li>
				        <li><a class="dropdown-item" href="#">Sign out</a></li>
				      </ul>
				    </div>
				</div>
			</div>

			<div class="col-10">
				<div class="main p-4">
					
					  
					<?php foreach ($products as $product): ?>
						<div class="card mb-3" style="max-width: 800px;">
						  <div class="row g-0">
						    <div class="col-md-6">
						      <img src="<?= htmlspecialchars($product['image_url']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($product['name']) ?>">
						    </div>
						    <div class="col-md-6">
						      <div class="card-body">
						        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
						        <h6 class="card-subtitle mb-2 text-muted">Category: <?= htmlspecialchars($product['category']) ?></h6>
						        <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
						        <h5 class="card-title">$<?= number_format($product['price'], 2) ?></h5>
						        <div class="d-flex justify-content-between">
						        	<a href="#" class="btn btn-primary">Add to Cart</a>
						        	<a href="#" class="btn btn-success">Buy Now</a>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
