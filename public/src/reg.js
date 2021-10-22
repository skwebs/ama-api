"use strict";
window.addEventListener("DOMContentLoaded", (event) => {
  console.log("DOM fully loaded and parsed");

  const getDataUrl = "http://localhost:8080/api/v1/user";
  fetch(getDataUrl)
    .then((res) => res.json())
    .then((data) => console.log(data));

  const form = document.getElementById("reg-form");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    let uname = document.getElementById("name").value;
    let email = document.getElementById("email").value;

    // const uData = JSON.stringify({
    //   name: document.getElementById("name").value,
    //   email: document.getElementById("email").value,
    // });
    const uData = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
    };
    console.log("uData", uData);

    // console.log(email);
    fetch("http://localhost:8080/api/v1/user", {
      method: "POST",
      headers: {
        // "Content-Type": "application/json",
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: uData,
    })
      .then((res) => res.json())
      .then((data) => console.log(data)); // fetch api
  }); // form on submit
});
