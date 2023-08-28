

    <form class="form-signin text-center" action="<?php echo INDEX_PAGE; ?>user/check/" method="post">
      <img class="col-8 img-fluid" src="<?php echo CDN_URL;?>img/gold.png" alt="" heigt=>
        <h5 class="h5 mb-3 font-weight-normal mt-3">Inicia sesión para continuar</h5>
          
          <label for="inputEmail" class="sr-only">Email address</label>
          <input name="LSf47vWou0wNVEsEuT1i" type="email"    id="inputEmail"    class="form-control" placeholder="Email address" required autofocus>
          
          <label for="inputPassword" class="sr-only">Password</label>
          <input name="PHt0gjv8TbmLTQCWVB81" type="password" id="inputPassword" class="form-control" placeholder="Password"      required>
    
            <div class="checkbox mb-3"><label><input type="checkbox" name="Mbv2GRxrFw8vMe1P5Pgo" value="rememberme">Recordarme.</label></div>
  
            <button class="btn btn-lg btn-primary btn-block" type="submit">CONTINUAR</button>
            
            <div class="mb-3"><p><a href="password">Tengo problemas con mi password</a></p></div>  
              
              <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
              <h6 class="mt-5 mb-3 text-muted"><?php echo $sha1; ?></h6>
    </form>