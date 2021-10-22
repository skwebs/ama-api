<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

   <title>Hello, world!</title>
</head>

<body>
   <header class="py-3 px-3 px-md-5 bg-primary">
      <h2 class="text-light">Anshu Memorial Academy</h2>
   </header>
   <main class="py-5 container-fluid">
      <form id="reg-form" action="<?= site_url('reg') ?>" method="post">
         <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">

               <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
               </div>


               <div class="mb-3">
                  <label for="father-name" class="form-label">Father's Name</label>
                  <input type="text" class="form-control" name="father_name" id="father-name" placeholder="Father's Name">
               </div>

               <div class="mb-3">
                  <label for="mother-name" class="form-label">Mother's Name</label>
                  <input type="text" class="form-control" name="mother_name" id="mother-name" placeholder="Mother's Name">
               </div>

               <div class="mb-3">
                  <label for="gaurdian-name" class="form-label">Gaurdian's Name</label>
                  <input type="text" class="form-control" name="gaurdian_name" id="gaurdian-name" placeholder="Gaurdian Name">
               </div>

               <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender">
               </div>

               <div class="mb-3">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
               </div>

               <div class="mb-3">
                  <label for="aadhaar" class="form-label">Aadhaar Number</label>
                  <input type="number" class="form-control" name="aadhaar" id="aadhaar" min="99999999999" max="999999999999" placeholder="Aadhaar Number">
               </div>

               <div class="mb-3">
                  <label for="contact" class="form-label">Contact Number</label>
                  <input type="tel" class="form-control" name="contact" id="contact" maxlength="10" placeholder="Contact Number">
               </div>

               <div class="mb-3">
                  <label for="email" class="form-label">Contact Number</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
               </div>

               <!-- <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="Address">
               </div>

               <div class="mb-3">
                  <label for="name" class="form-label">Email address</label>
                  <input type="text" class="form-control" id="name" placeholder="Name">
               </div>

               <div class="mb-3">
                  <label for="name" class="form-label">Email address</label>
                  <input type="text" class="form-control" id="name" placeholder="Name">
               </div> -->

               <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" name="address" id="address" rows="3"></textarea>
               </div>
               <input type="submit">
            </div>
         </div>
      </form>
   </main>
   <footer class="py-2 bg-dark text-light text-center">
      <div>
         &copy; Copyright <strong>Anshu Memorial Academy</strong>
      </div>
   </footer>
   <!-- Optional JavaScript; choose one of the two! -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
   <script src="<?= base_url("src/reg-jq.js") ?>"></script>
</body>

</html>