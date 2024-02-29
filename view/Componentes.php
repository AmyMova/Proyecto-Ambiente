<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<?php
function MostrarFooter(){
    echo
        '
        <footer class="bg-dark text-center text-white">
        <div class="container p-4 pb-0">
      
          <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/Mahoniastore" role="button"
              ><i class="fa-brands fa-square-facebook"></i></a>
      
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/mahoniastore/?hl=en" role="button"
              ><i class="fa-brands fa-square-instagram"></i></a>
      
            <a class="btn btn-outline-light btn-floating m-1" href="https://api.whatsapp.com/send?
            phone=50670247268&app=facebook&entry_point=page_cta&fbclid=IwAR0R1oJ9jQpXm2aXwV1NLsaxQBAKJE678vxbBPXJDD1PDKm1oIoSURS5Lt4" role="button"
              ><i class="fa-brands fa-square-whatsapp"></i></a>
      
          </section>
      
        </div>
      
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);" >
          © 2024 Copyright:
          <a class="text-white" href="principal.php">Rosa y Añil</a>
        </div>
      
      </footer>
      ';
}
function MostrarMenu(){
  echo
      '
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

            <div class="hola">
                <div class="dropdown pb-4">
                        <img src="../imagenes/Logo.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Admin</span>
                </div>
                
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="Clientes.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none>
                                <i class="fs-4 bi-house"></i> <span class="mx-1 d-none d-sm-inline">Clientes</span>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="Categorias.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none>
                                <i class="fs-4 bi-house"></i> <span class="mx-1 d-none d-sm-inline">Categorias</span> 
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                        <a href="Productos.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none>
                            <i class="fs-4 bi-house"></i> <span class="mx-1 d-none d-sm-inline">Productos</span> 
                        </a>
                    </li>
                    <br>

                    <a href="Principal.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Salir</span>
                    </a>
                </div>
            
            </div>
        </div>
    ';
}


?>