$(document).ready(function () {
    $.ajax({
        url: "ad_home.php",
    }).done(function (data) {
        $("#userslog").html(data);
    });
});

  