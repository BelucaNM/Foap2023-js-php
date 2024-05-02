<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
        <title>bootstrap - demo</title>    
    </head>
    <body>

    
   
        <div class="container mt-3">
          <h3>Form Validation</h3>
          
          <?php
            $error = ''; 
            if (isset($_GET['err']) && ($_GET['err'] == 1)) { $error = 'Error en validación. Reintroduzca datos';}
            if (isset($_GET['err']) && ($_GET['err'] == 2)) { $error = 'Error en Sesión.';}
          ?>
          
          <h3><?=$error ?></h3>
          <p>Try to submit the form.</p>  
          <form action="action_page.php" class="was-validated" method="post">
              <div class="mb-3">
                <label for="uname" class="form-label">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="psw" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="myCheck"  name="remember" >
                <label class="form-check-label" for="myCheck">I agree on blabla.</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
              </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
    </body>

</html>