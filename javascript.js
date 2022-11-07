$.ajax({
    type: "POST",
    url: "process-signup.php",
    data: formData,
    dataType: "json",
    encode: true,
  })
    .done(function(data) {
      // ...
    })
    .fail(function (data) {
      $("form").html(
        '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
      );
    });