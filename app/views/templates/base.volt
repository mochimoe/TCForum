<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Biblio - {% block title %}{% endblock %}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
        <script src="https://kit.fontawesome.com/f4dfdc0d09.js" crossorigin="anonymous"></script>
        {{ assets.outputCss() }}
    </head>
    <body class="">
        <section id="navbar">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 navbar-light shadow-sm">
                <span class="my-0 mr-md-auto "><a href="/" class="logo text-dark font-weight-bold">Biblio</a></span>
                <nav class=" my-2 my-md-0 mr-md-3">
                    <a class="p-3 text-dark" href="/">Beranda</a>
                    <a class="p-3 text-dark" href="/posts/show">Review</a>
                    <a class="p-3 text-dark" href="#">Kontak</a>
                </nav>
                <div class="dropdown-show">
                    <a class="fas fa-user dropdown-toggle" style="color: black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/profile">Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/posts/show">Buat Post</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/home/logout">Logout</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-3 ">
            <div class="container">
                {{ flash.output() }}
            </div>
            {% block content %}{% endblock %}
        </section>

        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $('.dropdown-toggle').dropdown()
        </script>
    </body>
</html>
