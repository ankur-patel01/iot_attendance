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
  <script src="js/std.ttl.std.js"></script>
    <title>Enrolled Students</title>
    <script>
         $(document).ready(function() {
            $(document).on("click", "#user_log", function () {

      $.ajax({
        url: "staff_studentspp.php",
        type: 'POST',
        data: {
          'select_date': 1,
        }
      });
      setInterval(function() {
        $.ajax({
          url: "staff_studentspp.php",
          type: 'POST',
          data: {
            'select_date': 0,
          }
        }).done(function(data) {
          $('#userslog').html(data);
        });
      }, 5000);
    });
    });
    </script>
    <style>
        .contain_02 {
            background: url('imgg/Campus View of Shri Rawatpura Sarkar Snatak Mahavidyalaya Datia_Campus-View.png') no-repeat center center/cover;
            height: 100vh;
        }

        .container01 {
            display: flex;
            align-items: center;
            justify-content: center;
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
        .fln {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: flex-start;
        padding: 0.25rem;
        margin: 0.4rem 0;
      }

        .container02 {
            margin: 0 5rem;
        }

        @media only screen and (max-width:991px) {
            .fln1 {
                display: flex;
                flex-direction: column;
                align-items: normal;
                padding: 0.25rem;
                margin: 0.5rem 0;
            }

            .cont1 {
                margin: 0.5rem;
                width: 100%;
            }
            .container02{
                margin:0;
            }
        }
    </style>

</head>
</body>

<?php
require("staff_navv.php");
?>

<div class="contain_02">
    <div class="container01">
    <form method="POST" class="fln1" action="export4.php">
    <!-- <select class="br_sel cont1 form-select" name="br_sel" id="br_sel" aria-label="Default select example">
                <option selected value="0">Select Branch</option>
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="CE">CE</option>
                <option value="ME">ME</option>
            </select> -->
    <select class="yr_sel cont1 form-select" name="yr_sel" id="yr_sel" aria-label="Default select example">
                <option selected value="0">Select Course Year</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth </option>
            </select>
            <button type="button" name="user_log" class="cont1 unusers btn btn-success" id="user_log">Search</button>
            <input type="submit" name="To_Excel" class="cont1 btn btn-success" value="Export to Excel">
        </form>
    </div>
    <div class="container02 slideInRight animated">
        <table class="table table-info table-striped">
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