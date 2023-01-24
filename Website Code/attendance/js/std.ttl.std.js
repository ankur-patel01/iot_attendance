$(document).ready(function () {
    $(document).on("click", "#user_log", function () {
      var yr_sel = $("#yr_sel").val();
      var br_sel = $("#br_sel").val();
  
      $.ajax({
        url: "staff_studentpps.php",
        type: "POST",
        data: {
          log_date: 1,
          yr_sel: yr_sel,
          br_sel: br_sel,
        },
        success: function (response) {
          $.ajax({
            url: "staff_studentspp.php",
            type: "POST",
            data: {
              log_date: 1,
              yr_sel: yr_sel,
              br_sel: br_sel,
                          },
          }).done(function (data) {
            $("#userslog").html(data);
          });
        },
      });
    });
  });
  