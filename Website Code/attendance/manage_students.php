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
    <title>Manage Students</title>


    <link rel="stylesheet" type="text/css" href="css/manageusers1.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/manage_users1.js"></script>
    <script src="js/manage_users2.js"></script>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: "new_cards.php"
            }).done(function(data) {
                $('#manage_users').html(data);
            });
            setInterval(function() {
                $.ajax({
                    url: "new_cards.php"
                }).done(function(data) {
                    $('#manage_users').html(data);
                });
            }, 5000);


            $.ajax({
                url: "new_cards1.php"
            }).done(function(data) {
                $('#manage_users1').html(data);
            });
            setInterval(function() {
                $.ajax({
                    url: "new_cards1.php"
                }).done(function(data) {
                    $('#manage_users1').html(data);
                });
            }, 5000);

        });
    </script>
    <style>
        * {
            /* border:2px solid red; */
            margin: 0;
        }

        .contain_02 {
            background: url('imgg/Campus View of Shri Rawatpura Sarkar Snatak Mahavidyalaya Datia_Campus-View.png') no-repeat center center/cover;
            height: 100vh;
        }

        .container01 {
            display: flex;
            align-items: center;
            justify-content: center;
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

        .fln1 {
            display: flex;
            flex-direction: row;
            align-items: normal;
            padding: 0.25rem;
            width: 80%;
            margin: 2rem 0;
        }

        .cont1 {
            margin: 0.5rem 1rem;
            width: 100%;
            background-color: #7878782e;
            color: black;
        }

        .cont1:hover {
            background-color: black;
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
                width: 60%;
                margin: 0.5rem 0;
            }

            .cont1 {
                margin: 0.5rem 0;
                width: 100%;
                background-color: #7878782e;
                color: black;
            }

            .cont1:hover {
                background-color: black;
            }

            .container02 {
                margin: 0;
            }
        }

        .crd11 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            background-color: #15172b;
            border-radius: 20px;
            box-sizing: border-box;
            height: 500px;
            padding: 20px;
            width: 320px;
            height: max-content;
            padding: 1.5rem;
            width: 60%;
            margin: 1rem;

        }

        .title {
            color: #eee;
            font-family: sans-serif;
            font-size: 36px;
            font-weight: 600;
            margin-top: 30px;
        }

        .subtitle {
            color: #eee;
            font-family: sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
        }

        .input-container {
            height: 3rem;
            position: relative;
            width: 100%;
        }

        .ic1 {
            margin-top: 20px;
        }

        .ic2 {
            margin-top: 20px;
        }

        .input {
            background-color: #303245;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100%;
        }

        .cut {
            background-color: #15172b;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            transform: translateY(0);
            transition: transform 200ms;
            width: 95px;
        }

        .cut2 {
            width: 50px;
        }

        .cut3 {
            width: 65px;
        }

        .cut-short {
            width: 50px;
        }
        .cut-long {
            width: 150px;
        }

        .input:focus~.cut,
        .input:not(:placeholder-shown)~.cut {
            transform: translateY(8px);
        }

        .placeholder {
            color: white;
            font-family: sans-serif;
            left: 20px;
            line-height: 14px;
            pointer-events: none;
            position: absolute;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            background-color: #30324500;
            top: 20px;
            opacity: 1;
        }

        .input:focus~.placeholder,
        .input:not(:placeholder-shown)~.placeholder {
            transform: translateY(-30px) translateX(10px) scale(0.75);
        }

        .input:not(:placeholder-shown)~.placeholder {
            color: #808097;
        }

        .input:focus~.placeholder {
            color: #dc2f55;
        }

        .submit {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            margin-top: 20px;
            /* outline: 0; */
            text-align: center;
            width: 100%;
        }

        .submit:active {
            background-color: #06b;
        }

        .msg {
            font-size: 2rem;
            font-weight: bolder;
            color: lightgreen;
        }

        .msg2 {
            font-size: 2rem;
            font-weight: bolder;
            color: red;
        }
    </style>

</head>
</body>

<?php
require("admin_navv.php");
// include'header.php';

?>



<div class="contain_02">


    <div class="container01">
        <div class="fln1">
            <button type="button" class="add_idcard cont1 btn btn-outline-success">Add Student Card</button>
            <button type="button" class="add_biom cont1 btn btn-outline-success">Add Biometric</button>
            <button type="button" class="user_del cont1 btn btn-outline-success">Remove Student</button>
        </div>
    </div>




    <!-- adding card -->
    <div class="addincard" style="display:none">

        <div class="section">
            <div class="slideInRight animated">
                <div id="manage_users"></div>
            </div>
        </div>
        <div class="alert_user"></div>
        <div class="crd11">
            <form action="" class="form">
                <div class="subtitle">Add Student's Card ID </div>
                <div class="input-container ic2">
                    <input id="card_uid" name="card_uid" class="input" type="text" placeholder=" " />
                    <div class="cut3 cut"></div>
                    <label for="card_uid" class="placeholder">Card ID</>
                </div>
                <input type="hidden" name="user_id" id="user_id">
                <div class="input-container ic1">
                    <input id="name" name="name" class="input" type="text" placeholder=" " />
                    <div class="cut2 cut"></div>
                    <label for="name" class="placeholder">Name</label>
                </div>
                <div class="input-container ic2">
                    <input id="enrollno" name="enrollno" class="input" type="text" placeholder=" " />
                    <div class="cut"></div>
                    <label for="enrollno" class="placeholder">Enrollment No</label>
                </div>
                <div class="input-container ic2">
                    <input id="email" name="email" class="input" type="text" placeholder=" " />
                    <div class="cut cut-short"></div>
                    <label for="email" class="placeholder">Email</>
                </div>
                <div class="input-container ic2">
                    <select class="input" name="branch" id="branch">
                        <option selected>Select Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="CE">CE</option>
                        <option value="ME">ME</option>
                    </select>
                </div>
                <div class="input-container ic2">
                    <select class="input" name="year" id="year">
                        <option selected>Select Course year</option>
                        <option value="First">First</option>
                        <option value="Second">Second</option>
                        <option value="Third">Third</option>
                        <option value="Fourth">Fourth </option>
                    </select>

                </div>
                <button type="text" name="user_add" class="user_add submit">submit</button>
            </form>
        </div>
    </div>








    <!-- finger id -->
    <div class="addinbiom" style="display:none">
        <div class="section">
            <div class="slideInRight animated">
                <div id="manage_users1"></div>
            </div>
        </div>
        <div class="alert1">
            <label id="alert1"></label>
        </div>
        <div class="crd11">
            <form action="" class="form">
                <div class="subtitle">Add Biometric ID </div>
                <label style="color:white">(Enter Fingerprint ID between 1 & 127)</label>
                <div class="input-container ic2">
                    <input class="input" type="number" name="fingerid" id="fingerid" placeholder=" " />
                    <div class="cut3 cut"></div>
                    <label for="fingerid" class="placeholder">Finger ID</>
                </div>
                <button type="button" name="fingerid_add" class="fingerid_add submit">Input Finger</button>
                <div class="input-container ic2">
                    <input class="input" type="text" name="number" id="number" placeholder=" " />
                    <div class="cut"></div>
                    <label for="number" class="placeholder">Enrollment No</label>
                </div>

                <button type="text" name="user_add1" class="user_add1 submit">submit</button>
            </form>
        </div>
    </div>
   
   
   
   
   
    <div class="remuser" style="display:none">
        <div class="crd11">
            <form action="" class="form">
                <div class="subtitle">Remove Student</div>
                <div class="input-container ic2">
                    <input class="input" type="text" name="number1" id="number1" placeholder=" " />
                    <div class="cut"></div>
                    <label for="number1" class="placeholder">Enrollment No</label>
                </div>
                <button type="text" name="user_rmo" class="user_rmo submit">submit</button>
            </form>
        </div>
    </div>




</div>





<script>

</script>
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