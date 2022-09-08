$("#forget_password").click(function () {
  event.preventDefault();
  console.log("Kliknut link clicked");
  email = $("#email").serialize();
  password = document.getElementById("show-password");
  console.log(email);

  if (email) {
    req = $.ajax({
      url: "handler/search.php",
      type: "POST",
      data: email,
    });

    req.done(function (response, textStatus, jqXHR) {
        password.style.float = "right";
      if (response == "Failed") {
        password.style.color = "red";
        password.style.fontWeight = "bold";
        password.innerHTML = "Email ne postoji";
        console.log(response);
      } else {
        console.log(response);
        password.style.color = "green";
        password.style.float = "right";
        password.style.fontWeight = "bold";
        password.innerHTML = "" + JSON.parse(response)[0]["Password"];
        
      }
    });

    req.fail(function (res, textStatus, errorThrown) {
      password.innerHTML = "Pogresan email";
      console.log(errorThrown + " pogresan email");
    });
  } else {
    password.innerHTML = "Niste uneli email";
    password.style.color = "red";
    password.style.fontWeight = "bold";
    console.log("niste uneli email");
  }
});
