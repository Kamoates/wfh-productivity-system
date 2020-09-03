<?php
    session_start();
    $pageName = 'Statistics';
    include_once '../scripts/database-setup.php';
    include_once '../scripts/load-ui.php';

    $query = "SELECT userID FROM user WHERE access=0";
    $result = mysqli_query($conn, $query);
    $userIDs = array();

    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($userIDs, $row);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $headAdmin; ?>
    <link rel="stylesheet" href="../stylesheets/mail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="../scripts/distribute-task.js">
        
    </script>
</head>
</head>
<body>
    <?php echo $bodyAdmin;?>
    <div class="container">
        <br>    
        <h2>Add Task</h2>
        <br>
        <hr>
        <div class="form-group">
            <form name="add_task" id="add_task">
                <table id="dynamic_field">
                    <tr>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Task Type</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="name[]"></td>
                        <td><input type="text" name="description[]"></td>
                        <td><select name="type[]">
                                <option value="creating exams">Creating exams</option>
                                <option value="computing grades">Computing grades</option>
                                <option value="attending classes">Attend Class</option>
                                <option value="attending meeting">Attend Meeting</option>
                            </select></td>
                        <td><button type="button" name="add" id="add">Add</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" value="Submit">
            </form>
        </div>
    </div>
    <?php echo $footer; ?>
</body>
</html>

<script>
    let userIDs = <?php echo json_encode($userIDs); ?>;
    let tasks;
    $(document).ready(() => {
        var i = 1;
        $('#add').click(() => {
            i++;
            $('#dynamic_field').append(`<tr id="row${i}">
                        <td><input type="text" name="name[]"></td>
                        <td><input type="text" name="description[]"></td>
                        <td><select name="type[]">
                                <option value="creating exams">Creating exams</option>
                                <option value="computing grades">Computing grades</option>
                                <option value="attending classes">Attend Class</option>
                                <option value="attending meeting">Attend Meeting</option>
                            </select></td>
                        <td><button type="button" name="remove" id="${i}" class="btn_remove">X</button></td>
                    </tr>`);
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $(`#row${button_id}`).remove();
        });

        $('#submit').click(function () {
            $.ajax({
                url: "../scripts/get-avg-time.php",
                type: "POST",
                data: $('#add_task').serialize(),
                success: function (data) {
                    tasks = JSON.parse(data);
                    for (let task of tasks)
                        task.time = Number(task.time);
  
                    var xhr = new XMLHttpRequest();
                    var params = `task=${JSON.stringify(distributeGreedy(tasks, userIDs))}`;
                
                    xhr.open("POST", "../scripts/add-task-to-database.php", true);
                    xhr.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded"
                    );
                    xhr.onload = function () {
                        alert(this.responseText);
                    };
                    xhr.send(params);
                    $('#add_task')[0].reset();
                }
            });
        });
    });
</script>