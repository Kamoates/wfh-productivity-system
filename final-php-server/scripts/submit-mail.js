document.getElementById("mail-form").addEventListener("submit", (e) => {
  e.preventDefault();

  var params = `userID=${userID}&subject=${
    subject.value
  }&content=${content.value.replace(/[\r\n]+/gm, "||")}`;
  console.log(params);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../scripts/mail-to-database.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    console.log(this.responseText);
  };

  xhr.send(params);
});
