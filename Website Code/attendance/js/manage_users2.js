$(document).ready(function () {
  // Add user
  $(document).on("click", ".user_add1", function () {
    //user Info
    var number = $("#number").val();
    var fingerid = $("#fingerid").val();

    
    $.ajax({
      url: "manage_users_conf1.php",
      type: "POST",
      data: {
        Add: 1,
        number: number,
        fingerid:fingerid,
      },
      success: function (response) {
        $("#fingerid").val("");
        $("#number").val("");
        $("#alert").show();
        $("#alert").text(response);
        $.ajax({
          url: "new_cards1.php",
        }).done(function (data) {
          $("#manage_users1").html(data);
        });
      },
    });
  });

  // Add user Fingerprint
  $(document).on("click", ".fingerid_add", function () {
    var fingerid = $("#fingerid").val();

    $.ajax({
      url: "manage_users_conf1.php",
      type: "POST",
      data: {
        Add_fingerID: 1,
        fingerid: fingerid,
      },
      success: function (response) {
        $("#alert").show();
        $("#alert").text(response);
        $.ajax({
          url: "new_cards1.php",
        }).done(function (data) {
          $("#manage_users1").html(data);
        });
      },
    });
  });
 
  // delete user
  $(document).on("click", ".user_rmo", function () {
    var enrollno = $("#number1").val();
    $.ajax({
      url: "manage_users_conf1.php",
      type: "POST",
      data: {
        delete: 1,
        enrollno: enrollno,
      },
      success: function (response) {
        $("#alert").show();
        $("#alert").text(response);
        
      },
    });
  });
  // select user
  $(document).on("click", ".select_btn1", function () {
    var el = this;
    var Finger_id = $(this).attr("id");
    $.ajax({
      url: "manage_users_conf1.php",
      type: "GET",
      data: {
        select: 1,
        Finger_id: Finger_id,
      },
      success: function (response) {
        $(el).closest("tr").css("background", "blue");

        $(".alert1").fadeIn(500);
        $(".alert1").html(
          '<p class="alert1 alert-success">The finger has been selected!</p>'
        );

        $("#alert1").show();
        $("#alert1").text(response);
        setTimeout(function () {
          $(".alert1").fadeOut(1000);
        }, 500);

        $.ajax({
          url: "new_cards1.php",
        }).done(function (data) {
          $("#manage_users1").html(data);
        });
        console.log(response);

        var user_fid = {
          User_fid: [],
        };

        var len = response.length;

        for (var i = 0; i < len; i++) {
          user_fid.User_fid.push(response[i].fingerprint_id);
        }

        $("#fingerid").val(user_fid.User_fid);
      },
      error: function (data) {
        console.log(data);
      },
    });
  });

  
});
