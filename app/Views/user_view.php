<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <link rel="stylesheet" href="/user.css">
   <title>User</title>
</head>

<body>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container ml-4 ">
         <a class="navbar-brand font-weight-bold" href="#">CRUD App<i class="fas fa-book-open ml-2" style="color: #4e5052;"></i></a>

         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         </div>

      </div>
      <a href="/login/logout" class="btn btn-danger mr-4">Logout</a>
   </nav>

   <!-- Button menambahkan data -->
   <div class="container mt-3 mb-8">
      <div class="row">
         <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdl">
               <a>Menambahkan data</a>
            </button>
         </div>
      </div>
   </div>


   <!-- Modal tambah data -->
   <div class="modal fade" id="mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Form Tambah data</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="modal-body">
                        <form action="/user/save" method="post">
                           <p>
                              <label for=" nama">Nama</label>
                              <input type="text" placeholder="masukan nama anda" name="user_nama" class="form-control mb-3" id="nama"">
                              <label for=" email">Email</label>
                              <input type="email" placeholder="masukan email anda" name="user_email" class="form-control mb-3" id="email"">
                              <br>
                              <button type=" submit" class="btn btn-primary">tambah</button>
                              <button type=" button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <!-- Table -->
   <div class="container mt-3">
      <div class="row">
         <div class="col">
            <table class="table table-striped text-center">
               <thead>
                  <tr>
                     <th>User ID</th>
                     <th>Nama</th>
                     <th>Email</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <!-- Memunculkan data dari database -->
                  <?php $i = 1; ?>
                  <?php foreach ($user as $u) : ?>
                     <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $u['user_nama']; ?></td>
                        <td><?= $u['user_email']; ?></td>
                        <td><a href="/user/edit/<?= $u['user_id']; ?>" class="btn btn-success">Edit</a>
                           <a href="/user/delete/<?= $u['user_id']; ?>" onclick="hapus(<?= $u['user_id']; ?>)" class="btn btn-danger hapus">Delete</a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
   <Script>
      function hapus(id) {
         message = confirm('Apakah anda yakin menghapus Data ini ?')

         if (message) {
            window.location.href = ("<?= base_url('user/delete'); ?>") + "/" + id
         } else return false
      }
   </Script>
   <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
   <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>