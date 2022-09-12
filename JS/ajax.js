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

$("#myform").submit(function(){
  event.preventDefault();
  place=$('#place-search').serialize();
  
  req=$.ajax({
    url:"handler/search.php",
    type:"GET",
    data:place
  });

  req.done(function(response,textStatus,jqXHR){
    if(response=="Failed"){
      alert("Takvo odmaraliste ne postoji");
    }else{
      console.log("Pronadjene su destinacije");
      window.location.reload();
    }
  });

  req.fail(function (res, textStatus, errorThrown) {
    console.log(errorThrown);
  });
});


$("#reservate").click(function () {
  event.preventDefault();
  dateTo=$("#date-to").val();
  dateFrom=$("#date-from").val();
console.log(typeof dateTo, dateFrom);
  if(dateFrom!="" & dateTo!="") {
    request=$.ajax({
      url:"handler/add.php",
      dataType:"json",
      data:{"dateTo":dateTo, "dateFrom":dateFrom},
      type:"post"
  
    });
    
    request.done(function(response,textStatus,jqXHR) {
      if(response=="success") {
        console.log(response);
        alert("Uspesno ste rezervisali");
        window.location.href = "../index.php";

      }
      else{
        console.log(response);
        alert("Rezervacija nije uspela");
      }

      request.fail(function(response,textStatus,errorThrown) {
        alert("Rezervacija nije uspela");
        console.log(errorThrown);
      });
    });

  }else{
    alert("Molimo popunite datume pocetka i kraja odmora");
  }
});