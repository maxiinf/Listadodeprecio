 <!-- barra de navegacion -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La Nube Informatica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Sublimacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artLibreria.php">Libreria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artRemeras.php">Remeras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artHojas.php">Hojas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Producto
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="agregarSublimacion.php">Agregar Subli</a></li>
                            <li><a class="dropdown-item" href="agregarLibreria.php">Agregar Libre</a></li>
                            <li><a class="dropdown-item" href="agregarRemeras.php">Agregar Reme</a></li>
                            <li><a class="dropdown-item" href="agregarHojas.php">Agregar Hojas</a></li>
                            <li><a class="dropdown-item" href="#"> Modificar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                   
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar Producto" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
            </div>
    </nav>