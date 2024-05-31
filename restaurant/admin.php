<?php include('header.php');?>
<?php include('nav.php');?>
       
            <div class="content">
            <div class="content">

                  <h1>Welcome to Local Restaurant</h1>
                  <h2>ADMIN PANEL</h2>
                  <h3>** Login as ADMIN using ADMIN Username and Password</h3>
                  <p>** Only authorized person can login as admin, so there is no registration for admin. </p>

                  <form method="post" action="processing/admin-login.php">
                        <table>
                              <tr>
                                    <td>Admin Username: *</td>
                                    <td><input type="text" name="admin_username" id="admin_username" value="admin" required="required"></td>
                              </tr>
                              <tr>
                                    <td>Admin Password: *</td>
                                    <td><input type="password" name="admin_password" id="admin_password" value="admin" required="required"></td>
                              </tr>
                              <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="ADMIN LOGIN" id="submit"></td>
                              </tr>
                        </table>
                  </form>
            
                  
            </div>


        </div>

<?php include('footer.php');?>
       
        
                  