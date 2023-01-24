$(document).ready(function () {
  // Add user
  $(document).on("click", ".user_add", function () {
    //user Info
    var user_id = $("#user_id").val();
    var card_uid = $("#card_uid").val();
    var name = $("#name").val();
    var enrollno = $("#enrollno").val();
    var email = $("#email").val();
    //Additional Info
    var dev_uid = $("#dev_uid").val();
    var branch = $("#branch option:selected").val();
    var year = $("#year option:selected").val();

    $.ajax({
      url: "manage_users_conf.php",
      type: "POST",
      data: {
        Add: 1,
        user_id: user_id,
        name: name,
        card_uid:card_uid,
        enrollno: enrollno,
        email: email,
        dev_uid: dev_uid,
        branch: branch,
        year: year,
      },
      success: function (response) {
        if (response == 1) {
          $("#user_id").val("");
          $("#name").val("");
          $("#enrollno").val("");
          $("#email").val("");
          $("#branch").val("");
          $("#year").val("");

          $(".alert_user").fadeIn(500);
          $(".alert_user").html(
            '<p class="alert alert-success">A new User has been successfully added</p>'
          );
        } else {
          $(".alert_user").fadeIn(500);
          $(".alert_user").html(
            '<p class="alert alert-danger">' + response + "</p>"
          );
        }

        setTimeout(function () {
          $(".alert").fadeOut(500);
        }, 5000);

        $.ajax({
          url: "new_cards.php",
        }).done(function (data) {
          $("#manage_users").html(data);
        });
      },
    });
  });

  $(document).on("click", ".select_btn", function () {
    var el = this;
    var card_uid = $(this).attr("id");
    $.ajax({
      url: "manage_users_conf.php",
      type: "GET",
      data: {
        select: 1,
        card_uid: card_uid,
      },
      success: function (response) {
        $(el).closest("tr").css("background", "green");

        $(".alert_user").fadeIn(500);
        $(".alert_user").html(
          '<p class="alert alert-success">The card has been selected!</p>'
        );

        setTimeout(function () {
          $(".alert").fadeOut(500);
        }, 5000);

        $.ajax({
          url: "new_cards.php",
        }).done(function (data) {
          $("#manage_users").html(data);
        });

        console.log(response);

        var user_cid = {
          User_cid: [],
        };
        var user_ddep = {
          User_ddep: [],
        };
        var user_did = {
          User_did: [],
        };
        var user_id = {
          User_id: [],
        };
        var user_date = {
          User_date: [],
        };

            var len = response.length;

        for (var i = 0; i < len; i++) {
          user_cid.User_cid.push(response[i].card_uid);
          user_ddep.User_ddep.push(response[i].device_dap);
          user_did.User_did.push(response[i].device_uid);
          user_id.User_id.push(response[i].id);
          user_date.User_date.push(response[i].user_date);
        }

        $("#card_uid").val(user_cid.User_cid);
        $("#user_id").val(user_id.User_id);
      },
      error: function (data) {
        console.log(data);
      },
    });
  });

  $(".add_idcard").click(function () {
    $(".addincard").toggle("slow", function () { });
    $(".addinbiom").css("display","none");
    $(".remuser").css("display","none");
  });


  $(".add_biom").click(function () {
    $(".addinbiom").toggle("slow", function () { });
    $(".addincard").css("display","none");
    $(".remuser").css("display", "none");
  });

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
  $(".user_del").click(function () {
    $(".remuser").toggle("slow", function () { });
    $(".addinbiom").css("display","none");
    $(".addincard").css("display","none");
  });
});
