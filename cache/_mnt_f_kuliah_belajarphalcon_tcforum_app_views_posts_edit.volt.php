<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $this->tag->getTitle() ?></title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <?= $this->assets->outputCss() ?>
       
    </head>
    <body class="bg-dark">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg shadow-sm bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/"><>ForumTC</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/posts/show">Posts</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"></i><a class="bg-danger nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/home/logout"><i class="fas fa-user mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="mb-3 mt-lg-5 bg-dark" style="padding-top: 100px;">
            <div class="container">
                <?= $this->flash->output() ?>
            </div>
            
<div class="p-3 d-flex justify-content-center">
    <div class="card bg-dark shadow mb-3 text-white" style="width:35%;">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            <form action="/posts/update/<?= $posts->id ?>" method="post">
                <div class="form-group">
                    <label for="judul" class="">Judul Buku</label>
                    <input type="text" name="judul"class="form-control bg-dark text-white" value="<?= $posts->judul ?>">
                </div>
                <div class="form-group">
                    <label for="judul" class=" ">Isi Post</label>
                    <textarea class="form-control bg-dark text-white" name="isi" value=""><?= $posts->isi ?></textarea>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select name="kategori">
                        <?php if (($posts->kategori) === ('Kuliah')) { ?>
                        <option value="Kuliah" selected>Kuliah</option>
                        <option value="Serba-Serbi">Serba-Serbi</option>
                        <?php } else { ?>
                        <option value="Kuliah">Kuliah</option>
                        <option value="Serba-Serbi" selected>Serba-Serbi</option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
            </form>
        </div>
    </div>
    
</div>

        </section>

       <!-- Footer-->
       <footer class="footer text-center" id="about">
            <div class="container">
                <div class="row">
                <!-- Footer Location-->
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Developer</h4>
                        <p class="lead mb-0">I Gede Agung K.P</p>
                        <p class="lead mb-0">Tria Nur Aisyah A.</p>
                    </div>
               
                    <div class="col-lg-6">
                        <h4 class="text-uppercase mb-4">About This</h4>
                        <p class="lead mb-0">Website ini dibuat dalam rangka menyelesaikan tugas akhir mata kuliah PBKK</p>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Copyright Section-->
    <section class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </section>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Third party plugin JS-->
    
</body>
</html>