document.getElementById("mail-form").addEventListener("submit", (e) => {
  e.preventDefault();

  var params = `userID=${userID}&subject=${
    subject.value
  }&content=${content.value.replace(/[\r\n]+/gm, "||")}`;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/mail-to-database.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    var message = this.responseText;
    alert(message);
    document.getElementById("mail-form").reset();
  };

  xhr.send(params);
});
