$(document).ready(function () {
    $.ajax({
        url: "st_home.php",
    }).done(function (data) {
        $("#userslog").html(data);
    });
});