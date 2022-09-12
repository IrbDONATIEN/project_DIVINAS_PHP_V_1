<?php
    require_once 'assets/php/headerindex.php';
?>
    <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card border-primary shadow-lg">
                        <div class="card-header bg-primary">
                            <h3 class="m-0 text-white"><i class="fas fa-sign"></i>&nbsp;DIVINAS | Officier </h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="px-3" id="login-form">
                                <div id="LoginAlert"></div>
                                <div class="form-group">
                                    <input type="text" name="login" class="form-control rounded-pill form-control-lg" placeholder="Login" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="motdepasse" class="form-control rounded-pill form-control-lg" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-group">
                                    <select name="typeUser" id="typeUser" class="form-control rounded-pill form-control-lg" required>
                                        <?php $req=$db->query("SELECT * FROM typeuser");
                                            while ($tab=$req->fetch()){?>
                                                <option value="<?php echo $tab['id'];?>"><?php echo $tab['typeUser'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="valider" class="btn btn-primary btn-block rounded-pill btn-lg" value="Se connecter" id="LoginBtn" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-botton">
                &copy; 2020 Bnd Mobetisoft| DIVINAS
            </div>
        </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
        $("#LoginBtn").click(function(e){
          if($("#login-form")[0].checkValidity()){
              e.preventDefault();
              
              $(this).val('Veuillez patientier...');
              $.ajax({
                  url : 'assets/php/action.php',
                  method : 'post',
                  data : $("#login-form").serialize()+'&action=login_logs',
                  success:function(response){
                      if(response ==='login_logs'){
                          window.location ='rapport_officier.php';
                      }
                      else{
                          $("#LoginAlert").html(response);
                      }
                      window.location = 'rapport_officier.php';
                      $("#LoginBtn").val('Se connecter');
                  }
              });
          }  
        });
     });
 </script>
</body>
</html>