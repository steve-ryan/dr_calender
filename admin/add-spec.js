$(document).ready(function () {
  // save speciality to database
  $(document).on("click", "#submit_btn", function () {
    var speciality = $("#speciality").val();
    $.ajax({
      url: "server.php",
      type: "POST",
      data: {
        save: 1,
        speciality: speciality,
      },
      success: function (response) {
        $("#speciality").val("");
        $("#display_area").append(response);
      },
    });
  });
  // delete from database
  $(document).on("click", ".delete", function () {
    var id = $(this).data("id");
    $clicked_btn = $(this);
    $.ajax({
      url: "server.php",
      type: "GET",
      data: {
        delete: 1,
        id: id,
      },
      success: function (response) {
        // remove the deleted comment
        $clicked_btn.parent().remove();
        $("#speciality").val("");
      },
    });
  });
  var edit_id;
  var $edit_speciality;
  $(document).on("click", ".edit", function () {
    edit_id = $(this).data("id");
    $edit_speciality = $(this).parent();
    // grab the comment to be editted
    var speciality = $(this).siblings(".display_name").text();
    // place speciality in form
    $("#speciality").val(speciality);
    $("#submit_btn").hide();
    $("#update_btn").show();
  });
  $(document).on("click", "#update_btn", function () {
    var id = edit_id;
    var speciality = $("#speciality").val();
    $.ajax({
      url: "server.php",
      type: "POST",
      data: {
        update: 1,
        id: id,
        speciality: speciality,
      },
      success: function (response) {
        $("#speciality").val("");
        $("#submit_btn").show();
        $("#update_btn").hide();
        $edit_speciality.replaceWith(response);
      },
    });
  });
});
