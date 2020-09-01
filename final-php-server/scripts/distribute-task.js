function distributeGreedy(task, users) {
  //task should have id and time property
  //users should have userID property
  task.sort((a, b) => a.time - b.time);

  //initialized container
  taskContainer = [];
  for (let user of users) {
    taskContainer.push({ id: user.userID, toDo: [], sum: 0 });
  }

  while (task.length) {
    taskContainer.sort((a, b) => a.sum - b.sum);
    let time = task.pop();
    taskContainer[0].toDo.push(time);
    taskContainer[0].sum += time.time;
  }

  return taskContainer;
}
