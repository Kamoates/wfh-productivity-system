// get the form element in login.html
document.getElementById("user-info").addEventListener("submit", (e) => {
  //to prevent reloading
  e.preventDefault();

  //get the value inserted by user
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var params = `username=${username}&password=${password}`;

  //start the request
  var xhr = new XMLHttpRequest();
  //this will open verify-info.php with POST method
  xhr.open("POST", "../scripts/verify-info.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //will run when connection is established
  xhr.onload = function () {
    //parse the resulting string from veify-info.php into JSON
    var result = JSON.parse(this.responseText);
    //check username and password
    if (username == result.username && password == result.password) {
      //will load/run the next page
      e.stopPropagation();
      window.location.assign("welcome.php");
    } else {
      //if the user input the wrong info this will run
      document.getElementById("warning").innerHTML = `<style>
              #warning {
color: red;
text-align: center;
margin-top: 10px;
font-size: 12px;
font-weight: bold;
}
              </style>
            <p>Wrong password!*</p>`;
    }
  };

  xhr.send(params);
});
