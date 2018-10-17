                <nav class="navbar navbar-expand-lg navbar-custom">
                  <a class="navbar-brand" href="../index.php">TABLO  <!--<span class="fa fa-utensils" style="font-size: 1em !important; color: white !important;"></span>--></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse">
                    <ul class="navbar-nav nav mr-auto">
                      <li style="padding: 15px"><a href="../about.php">About</a></li>
                      <li style="padding: 15px "><a href="../contact.php">Contact</a></li>
                    </ul>
                    <ul class="navbar-nav nav navbar-right">
                        <li class="reg_form">
                        <?php if(!$_SESSION['user_logged_in']): ?>    
                        <a href="../csignup/rform.php" class="btn btn-primary">Signup</a>
                        <a class="btn btn-warning" a href="../clogin/login.php">Login</a>
                        
                        <?php else: ?>
                        <a class="btn btn-primary" href="../cprofile/profile.php">Profile</a>
                        <a class="btn btn-warning" href="../logout.php" >Logout</a>
                        
                        <?php endif; ?>
                        
                        <!--<img style="margin-left: 20px;margin-right: 0;padding-right: 0;" src="../images/table (1).png">-->
                        </li>
                    </ul>   
                  </div>
                </nav>
