<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link href="css/styles.css" rel="stylesheet" />
    <style>
        html,body{
            height: 100%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="d-flex justify-content-center h-100">
      <div class="my-auto" style="width: 25%;">
        <div class="container">
          <?= $this->flash->output() ?>
        </div>
        <div class="card shadow " >
          <div class="card-body">
              <h3 class="card-title font-weight-bolder p-3 text-center">DAFTAR AKUN</h3>
              <form action="/signup/regist" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" name="kpassword" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <small class="content-align-left"><a href="/session">Masuk, jika memiliki akun</a></small>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>