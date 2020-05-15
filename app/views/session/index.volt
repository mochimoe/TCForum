<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      html,body{
        height:100%;
      }
      label{
        font-size: 14px;
      }
    </style>
</head>
</head>
<body class="bg-dark">
    <div class="d-flex justify-content-center h-100">
      <div class="my-auto">
        <div class="container">
          {{ flash.output() }}
        </div>
        <div class="card shadow w-125 border border-0">
          <div class="card-body">
              <h3 class="card-title font-weight-bolder p-3">MASUK KE AKUN TCForum</h3>
              <form action="/session/start" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <button type="submit" class="btn btn-sm btn-outline-dark">Masuk</button>
                  <small class="content-align-left"><a href="/signup">Daftar, jika belum memiliki akun</a></small>
                </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>