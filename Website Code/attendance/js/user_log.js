$(document).ready(function () {
  // Get Report passenger
  $(document).on("click", "#user_log", function () {
    var date_sel = $("#date_sel").val();
    var yr_sel = $("#yr_sel").val();
    var br_sel = $("#br_sel").val();

    $.ajax({
      url: "user_log_up.php",
      type: "POST",
      data: {
        log_date: 1,
        date_sel: date_sel,
        yr_sel: yr_sel,
        br_sel: br_sel,
      },
      success: function (response) {
        $.ajax({
          url: "user_log_up.php",
          type: "POST",
          data: {
            log_date: 1,
            date_sel: date_sel,
            yr_sel: yr_sel,
            br_sel: br_sel,
            select_date: 0,
          },
        }).done(function (data) {
          $("#userslog").html(data);
        });
      },
    });
  });
});
