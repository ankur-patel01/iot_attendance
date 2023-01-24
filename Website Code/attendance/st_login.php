<?php 

if (isset($_POST['login'])) {

	require 'connectDB.php';

	$Usermail = $_POST['email']; 
	$Userpass = $_POST['pwd']; 
	$Userbranch= $_POST['brsel']; 

	if (empty($Usermail) || empty($Userpass) ) {
		header("location: login.php?error=emptyfields");
  		exit();
	}
	else if (!filter_var($Usermail,FILTER_VALIDATE_EMAIL)) {
          header("location: login.php?error=invalidEmail");
          exit();
    }
	else if ($Userbranch=="1") {
          header("location: login.php?error=emptybranch");
          exit();
    }
	else{
		$sql = "SELECT * FROM staff WHERE email=?";
		$result = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($result, $sql)) {
			header("location: login.php?error=sqlerror");
  			exit();
		}
		else{
			mysqli_stmt_bind_param($result, "s", $Usermail);
			mysqli_stmt_execute($result);
			$resultl = mysqli_stmt_get_result($result);

			if ($row = mysqli_fetch_assoc($resultl)) {
                $pwdhash=password_hash($row['password'],PASSWORD_ARGON2I);
				$pwdCheck = password_verify($Userpass, $pwdhash);
								if ($pwdCheck == true) {
                                    if($Userbranch==$row['branch']){

                                        session_start();
                                        $_SESSION['Staff-name'] = $row['name'];
                                        $_SESSION['Staff-email'] = $row['email'];
                                        $_SESSION['brselect'] = $row['branch'];
                                        header("location: index.php?login=success");
                                        exit();
                                    }
                                    else if($Userbranch!=$row['branch']){
                                        header("location: login.php?error=wrongbranch");
  					                    exit();
                                    }
				}
				else if ($pwdCheck == false) {
					header("location: login.php?error=wrongpassword");
  					exit();
				}
			}
			else{
				header("location: login.php?error=nouser");
  				exit();
			}
		}
	}
mysqli_stmt_close($result);    
mysqli_close($conn);
}
else{
  header("location: login.php");
  exit();
}
?>