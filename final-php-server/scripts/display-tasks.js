let xhr = new XMLHttpRequest();
xhr.open(
  "GET",
  `../scripts/retrieve-user-task.php?userID=${Number(userID)}`,
  true
);
xhr.onload = function () {
  let taskInfo = JSON.parse(this.responseText);
  for (let task of taskInfo) {
    let n = document.createElement("td");
    n.innerHTML = task.id;

    let name = document.createElement("td");
    name.innerHTML = task.name;

    let description = document.createElement("td");
    description.innerHTML = task.description;

    let time = document.createElement("td");
    time.innerHTML = task.time;

    let start = document.createElement("td");
    start.innerHTML = task.start_time;

    let finish = document.createElement("button");
    finish.innerHTML = "Mark as done";
    finish.addEventListener("click", function () {
      finish.disabled = "disabled";
      let new_time = new Date();
      let startTime = new Date(task.start_time);
      let timeToFinish = (new_time - startTime) / 3600000;
      let iterReq = new XMLHttpRequest();
      let params = `task_id=${Number(
        task.id
      )}&new_time=${timeToFinish}&curr_time=${task.time}&id=${task.taskID}`;
      iterReq.open("POST", "../scripts/iter-avg.php", true);
      iterReq.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      iterReq.onload = function () {
        console.log(this.responseText);
      };
      iterReq.send(params);
    });

    let finishContainer = document.createElement("td");
    finishContainer.appendChild(finish);

    let row = document.createElement("tr");
    row.appendChild(n);
    row.appendChild(name);
    row.appendChild(description);
    row.appendChild(time);
    row.appendChild(start);
    row.appendChild(finishContainer);

    document.getElementById("task-container").appendChild(row);
  }
};
xhr.send();
