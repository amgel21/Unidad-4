<?php
include_once "app/ProductController.php";
$productController = new ProducController();

if (!isset($_GET['slug']) || $_GET['slug'] == "") {
    header('Location: home.php');
    exit();
}

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
    $product = $productController->getBySlug($_GET['slug']);
} else {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0 m-0 d-none d-md-block">
                <div class="d-flex sticky-top flex-column min-vh-100 flex-shrink-0 p-3 text-white bg-dark">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4">Tienda virtual</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">Inicio</a>
                        </li>
                        <li><a href="#" class="nav-link text-white">Panel de control</a></li>
                        <li><a href="#" class="nav-link text-white">Pedidos</a></li>
                        <li><a href="#" class="nav-link text-white">Productos</a></li>
                        <li><a href="#" class="nav-link text-white">Clientes</a></li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>Usuario</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
                            <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col p-0 m-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
                    <div class="container">
                        <a class="navbar-brand" href="#">Tienda Online</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Características</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Precios</a></li>
                                <li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Deshabilitado</a></li>
                            </ul>
                        </div>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                               id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong>Usuario</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
                                <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div id="main">
                    <div class="container p-3">
                        <h2>Detalle</h2>
                        <div class="card mb-3">
                            <div class="card-header"><?= htmlspecialchars($product->name) ?></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4 mb-2">
                                        <div id="productCarousel" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="<?= htmlspecialchars($product->cover) ?>" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="<?= htmlspecialchars($product->cover) ?>" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="<?= htmlspecialchars($product->cover) ?>" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title"><?= htmlspecialchars($product->name) ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($product->description) ?></p>
                                        <h3>$100.00 MXN</h3>
                                        <a href="#" class="btn btn-primary">Comprar</a>
                                        <button type="button" class="btn btn-danger">Cancelar</button>
                                        <button type="button" class="btn btn-warning" id="editButton" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Características</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>BROCK LESNEAR</td>
                                            <td>BESTIA ENCARNADA</td>
                                            <td><button class="btn btn-info">Ver</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>JOHN CENA</td>
                                            <td>NO ME PUEDES VER</td>
                                            <td><button class="btn btn-info">Ver</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                       
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm">
                                            <div class="mb-3">
                                                <label for="productName" class="form-label">Nombre del Producto</label>
                                                <input type="text" class="form-control" id="productName" value="<?= htmlspecialchars($product->name) ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productDescription" class="form-label">Descripción</label>
                                                <textarea class="form-control" id="productDescription"><?= htmlspecialchars($product->description) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productPrice" class="form-label">Precio</label>
                                                <input type="text" class="form-control" id="productPrice" value="100.00">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>