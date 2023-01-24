<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel="shortcut icon" type="image/png" href="imgg/logosri.png" />

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="js/bootbox.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/ad_hm.js"></script>
    <title>Present Strength</title>
    <style>
        * {
            /* border:2px solid red; */
            margin: 0;
            padding: 0;
        }

        .stform {
            width: 100%;
            margin: 1rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ff {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .coursee {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2rem;

        }

        .contain {
            background: url('imgg/Campus View of Shri Rawatpura Sarkar Snatak Mahavidyalaya Datia_Campus-View.png') no-repeat center center/cover;
            height: 100vh;
        }

        .table-info {
            --bs-table-bg: #00e4cde3;
            --bs-table-striped-bg: #ffffff6b;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #badce3;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #bfe2e9;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #badce3;
        }

        .fln {
            display: flex;
            flex-direction: row;
            width: 100%;
            align-items: center;
            justify-content: space-around;
            padding: 0.5rem;
            margin: 1rem 0;
        }


        .container01 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container02 {
            margin: 0 5rem;
        }
        
        .fln1 {
            display: flex;
            flex-direction: row;
            align-items: normal;
            padding: 0.5rem;
            width: 60%;
            margin: 1rem 0;
        }

        .cont1 {
            margin: 1rem;
            width: 100%;
        }

        @media only screen and (max-width:991px) {
            .fln1 {
                display: flex;
                flex-direction: column;
                align-items: normal;
                padding: 0.5rem;
                margin: 0.4rem 0;
                width:60%;
            }
            .container02{
                margin: 0;
            }
            .cont1 {
                margin: 0.5rem;
                width: 100%;
            }
        }

        .fln {
            display: flex;
            flex-direction: column;
            width: 100%;
            justify-content: center;
            align-items: flex-start;
            padding: 0.25rem;
            margin: 0.4rem 0;
            color: forestgreen;
        }



        .heading1 {
            font-weight: bolder;
        }

        .semestere {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2rem;

        }

        .hedd {
            margin: 1rem;

        }

        .cont {
            margin: 1rem;

        }

        .bb {
            margin: 0 2rem;
        }
    </style>



</head>



<body>


    <?php
    require("admin_navv.php");
    ?>


    <div class="contain">

        <div class="container01">
            <div class="fln">
            <?php  
                    echo '<div class="facu"> Welcome Mr. '.$_SESSION['Admin-name'].' </div>';
                    echo '<div class="dtt"> Date: '.date("d-m-y").' Time: '.date("H:i:s").' </div>';

                ?>
            </div>
            
        </div>

        <div class="container02">


            <table class="table table-info table-striped">
                <div class="fln">
                    All the students present today.
                </div>
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Enrollment No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Finger ID</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Year</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody id="userslog">
            </tbody>
            </table>
        </div>
    </div>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>