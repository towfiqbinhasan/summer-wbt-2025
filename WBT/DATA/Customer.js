document.addEventListener("DOMContentLoaded", () => {
    var form = document.getElementById("cvForm");

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        
        var fname = document.getElementById("firstname").value;
        var lname = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;

      
        var service = document.querySelector("input[name='service']:checked").value;

       
        var projects = [];
        document.querySelectorAll("input[type='checkbox']:checked").forEach(cb => {
            projects.push(cb.value);
        });

        
        var username = fname.toLowerCase();
        var password = 123456;

     let message = "Registration Successful!\n\n";
message += "Name: " + fname + " " + lname + "\n";
message += "Email: " + email + "\n\n";
message += "Your Username: " + username + "\n";
message += "Your Password: " + password;

alert(message);


       
       let queryString = "../HTML/show.html?"
  + "fname=" + encodeURIComponent(fname)
  + "&lname=" + encodeURIComponent(lname)
  + "&email=" + encodeURIComponent(email)
  + "&service=" + encodeURIComponent(service)
  + "&projects=" + encodeURIComponent(projects.join(", "))
  + "&username=" + encodeURIComponent(username)
  + "&password=" + encodeURIComponent(password);

        window.location.href = queryString;
    });
});

 var urlParams = new URLSearchParams(window.location.search);
    var fname = urlParams.get("fname");
    var lname = urlParams.get("lname");
    var email = urlParams.get("email");
    var service = urlParams.get("service");
    var projects = urlParams.get("projects");
    var username = urlParams.get("username");
    var password = urlParams.get("password");

  
    var correctUser = username;
    var correctPass = password;

    document.getElementById("loginBtn").addEventListener("click", () => {
      var inputUser = document.getElementById("checkUser").value;
      var inputPass = document.getElementById("checkPass").value;

      if (inputUser === correctUser && inputPass === correctPass) {
       
        document.getElementById("details").style.display = "block";
        document.getElementById("name").textContent = fname + " " + lname;
        document.getElementById("email").textContent = email;
        document.getElementById("service").textContent = service;
        document.getElementById("projects").textContent = projects;
        document.getElementById("user").textContent = username;
        document.getElementById("pass").textContent = password;
      } else {
        alert(" Wrong Username or Password! Try again.");
      }
    });