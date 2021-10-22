"use strict";

$(document).ready(function () {
  alert("alert");

  var form = $("#reg-form");

  form.on("submit", function (e) {
    e.preventDefault();

    console.warn(form.serialize());

    $.ajax({
      url: form.attr("action"), //"http:localhost:8080/home/reg", //form.attr("action"),
      method: "POST",
      // cors: true,
      data: form.serialize(),
      // dataType: "json",
      beforeSend: function () {
        console.log("beforeSend");
      },
      success: function (data) {
        console.log("success", data);
      },
      error: function () {
        console.log("error");
      },
    });
  });
});
