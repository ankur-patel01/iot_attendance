<?php
session_start();
if (isset($_SESSION['Admin-name'])) {
  header("location: index.php");
}
else if (isset($_SESSION['Staff-name'])) {
  header("location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>SRI Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/png" href="imgg/logosri.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.message', function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
            $('h1').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });

        $(".adbtn").click(function() {
            $(".adminbtn").toggle("slow", function() {});
            $(".staffbtn").css("display", "none");
        });
        $(".stbtn").click(function() {
            $(".staffbtn").toggle("slow", function() {});
            $(".adminbtn").css("display", "none");
        });
    });
    </script>
    <style>
    * {
        margin: 0;
        padding: 0;
        /* border: 2px solid red; */
    }

    .contain1 {
        background: url("imgg/Campus\ View\ of\ Shri\ Rawatpura\ Sarkar\ Snatak\ Mahavidyalaya\ Datia_Campus-View.png") no-repeat center center/cover;
        width: 70%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        font-weight: 1000;
        text-align: center;
    }

    .centralbox {
        width: 30%;
        display: flex;
        height: 100vh;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        background: url("imgg/wallpaperflare.com_wallpaper.jpg") no-repeat center center/cover;
    }

    @media (max-width:990px) {
        .centralbox {
            background: none;
            width: 100%;
            margin-top: 3rem;
            justify-content: start;
            height: 70vh;
        }

        .form11 {
            justify-content: unset;
        }

        .headin11 {
            padding: 1rem;
            box-shadow: 0px 3rem 7rem 2rem #0000009c;
        }

        .contained {
            flex-direction: column;
            background: url("imgg/Campus\ View\ of\ Shri\ Rawatpura\ Sarkar\ Snatak\ Mahavidyalaya\ Datia_Campus-View.png") no-repeat center center/cover;
            width: 100%;
            height: 100vh;
        }

        .contain1 {
            background: none;
            width: 100%;
            height: 30vh;
        }
    }

    .form11 {}

    .staff {
        display: flex;
        flex-direction: column;
        /* border: 2px solid black; */
        padding: 2rem;
        margin: 1rem;
        color: white;
        border-radius: 10px;
        background-image: linear-gradient(rgb(255, 0, 85), rgb(0 18 126));
        box-shadow: 10px 12px 14px -2px rgb(5 5 5);
    }

    .admin {
        display: flex;
        flex-direction: column;
        /* border: 2px solid black; */
        color: white;
        padding: 2rem;
        margin: 1rem;
        border-radius: 10px;
        background-image: linear-gradient(rgb(255, 0, 85), rgb(0 18 126));
        box-shadow: 10px 12px 14px -2px rgb(5 5 5);
    }

    .button-64 {
        align-items: center;
        background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
        border: 0;
        border-radius: 8px;
        box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
        box-sizing: border-box;
        color: #FFFFFF;
        display: flex;
        font-family: Phantomsans, sans-serif;
        font-size: 20px;
        justify-content: center;
        line-height: 1em;
        max-width: 100%;
        min-width: 140px;
        padding: 3px;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        cursor: pointer;
    }

    .button-64:active,
    .button-64:hover {
        outline: 0;
    }

    .button-64 span {
        background-color: rgb(5, 6, 45);
        padding: 0.8rem 1.5rem;
        border-radius: 6px;
        width: 100%;
        height: 100%;
        transition: 300ms;
    }

    .button-64:hover span {
        background: none;
    }

    @media (min-width: 768px) {
        .button-64 {
            font-size: 24px;
            min-width: 196px;
        }
    }

    .contained {
        display: flex;
    }

    .headin11 {
        background: #0000008f;
        color: white;
        padding: 1rem;
        box-shadow: 0px 3rem 7rem 2rem #0000009c;
    }
    </style>

</head>

<body>
    <?php include'hed_login.php'; ?>


    <div class="contained">
        <div class="contain1">
            <div class="headin11">
                SRI ATTENDANCE PORTAL
            </div>
        </div>

        <div class="centralbox slideInDown animated">

            <div class="container form form11 slideInDown animated login-page">
                <?php  
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidEmail") {
                echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
            }
            elseif ($_GET['error'] == "sqlerror") {
                echo '<div class="alert alert-danger">
                        There a database error!!
                        </div>';
                      }
                      elseif ($_GET['error'] == "wrongpassword") {
                        echo '<div class="alert alert-danger">
                        Wrong password!!
                        </div>';
                      }
                      elseif ($_GET['error'] == "emptybranch") {
                        echo '<div class="alert alert-danger">
                        Select Access Branch!!
                        </div>';
                      }
                      elseif ($_GET['error'] == "wrongbranch") {
                        echo '<div class="alert alert-danger">
                        Select Your Right Branch!!
                        </div>';
                      }
            elseif ($_GET['error'] == "nouser") {
              echo '<div class="alert alert-danger">
              This E-mail does not exist!!
              </div>';
            }
          }
          if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
              echo '<div class="alert alert-success">
              Check your E-mail!
              </div>';
            }
          }
          if (isset($_GET['account'])) {
            if ($_GET['account'] == "activated") {
                echo '<div class="alert alert-success">
                        Please Login
                      </div>';
            }
          }
          if (isset($_GET['active'])) {
            if ($_GET['active'] == "success") {
                echo '<div class="alert alert-success">
                        The activation link has been sent!
                      </div>';
            }
          }
          
        ?>


                <div class="d-flex" style=" flex-direction: column;   justify-content: space-around;  ">
                    <button class="button-64 adbtn" style="margin-bottom:1rem; " role="button"><span class="text">Admin
                            Login</span></button>
                    <button class="button-64 stbtn" style="margin-bottom:1rem; " role="button"><span class="text">Staff
                            Login</span></button>
                </div>



                <div class="alert1"></div>

                <form class="admin adminbtn login-form slideInDown animated" action="ad_login.php" method="post"
                    enctype="multipart/form-data" style="display:none">

                    <legend>Admin Login</legend>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input type="email" class="form-control" placeholder="Email Address" name="email" id="email"
                            aria-describedby="emailHelp" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd"
                            required />
                    </div>

                    <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                    <p class="message">Forgot your Password? <a href="#">Reset your password</a></p>

                </form>

                <form class="staff staffbtn login-form slideInDown animated" action="st_login.php" method="post"
                    enctype="multipart/form-data" style="display:none">

                    <legend>Staff Login</legend>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input type="email" class="form-control" placeholder="Email Address" name="email" id="email1"
                            aria-describedby="emailHelp" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd1"
                            required />
                    </div>
                    <div class="mb-3 mt-3">
                        <select class="form-select" name="brsel" id="brsel" aria-label="Default select example" required>
                            <option selected value="1">Access Branch</option>
                            <option value="0">All</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="CE">CE</option>
                            <option value="ME">ME</option>
                        </select>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="login" id="log_in">Login</button>
                    <p class="message">Forgot your Password? <a href="#">Reset your password</a></p>
                </form>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->
</body>

</html>