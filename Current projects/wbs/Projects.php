<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 4/18/2018
 * Time: 8:53 AM
 */

session_start();

include 'inc/database.php';

$projectId = 0;

if (isset($_GET['projectId'])) {
    $projectId = $_GET['projectId'];
}


$sqlI = "SELECT * FROM tasks WHERE projectId = $projectId";
$i = connectWithDatabase($sqlI);

$sqlO = "SELECT * FROM projects WHERE id = $projectId";
$o = connectWithDatabase($sqlO);

?>

<html>
<head>
    <title>Jquery memory</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/stylesheet.css">

</head>
<body>
<div class="jumbotron">
    <h1 class="display-4">Project: <?php foreach ($o as $Item) {
            echo $Item['Title'];
        }; ?></h1>
    <hr class="my-4">
</div>
<div class="container">
    <div class="col-12">
        <table class="table" id="table-task">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Predecessor</th>
                <th scope="col">MoSCoW</th>
                <th scope="col">Plan (min)</th>
                <th scope="col">Do (min)</th>
                <th scope="col">Check</th>
                <th scope="col">Act</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <form id="update-shows-form">
                <?php
                foreach ($i as $key => $Item) {
                    ?>
                <div class="js-task-inputs">
                    <input type="hidden"  name="showId[]" value="<?php echo $Item['id']; ?>">
                    <tr>
                        <th scope="row"><?php echo$Item['id']; ?></th>
                        <td>
                            <input type="text" class="form-control" name="taskName[]"
                                   value="<?php echo$Item['taskName']; ?>">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="Predecessor[]"
                                   value="<?php echo$Item['Predecessor']; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="MoSCoW[]"
                                   value="<?php echo$Item['MoSCoW']; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="Time[]"
                                   value="<?php echo$Item['Time']; ?>">
                        </td>
                        <td>
                            <input id="time" class="form-control js-task-do" name="Do[]"
                                <?php echo$Item['ActualTime'] ?>>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="Plan[]"
                                   value="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="Check[]"
                                   value="<?php echo$Item['_check']; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="Act[]" value="<?php echo $Item['Act']; ?>">
                        </td>
                    </div>
            </form>
                        <td>
                            <button class="btn btn-success js-start-timer" id="start">Start</button>
                        </td>
                        <td>
                            <button class="btn btn-danger" id="pause">Stop</button>
                        </td>
                        <td><a class="btn btn-info" href="deleteTask.php?taskId=<?php echo $Item['id'];  ?>&projectId=<?php echo $Item['projectId']; ?>" onclick="return deleteItem()">Delete Task</a></td>
                    </tr>
                <?php } ?>

            <input type="button" id="js-update-shows" class="btn btn-success" value="save shows">

            <td colspan="13">Total Time do (min):<div id="js-do-total"></div> </td>
            </tbody>
        </table>
    </div>
</div>
<input type="button" id="js-update-shows" class="btn btn-info" value="Save Shows"/>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTask">Create Task</button>

<div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="createTask"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="createTask.php?projectId=<?php echo $projectId ?>">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input name="TaskName" type="text" class="form-control" placeholder="Task Name">
                        <small class="form-text text-muted">Enter a clear name for the Task</small>
                    </div>
                    <div class="form-group">
                        <label>Predecessor</label>
                        <input name="Predecessor" type="Number" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <label>MoSCoW</label>
                        <select name="MoSCoW" class="form-control">
                            <option>Must</option>
                            <option>Should</option>
                            <option>could</option>
                            <option>Won't</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Plan (min)</label>
                        <input name="Plan" type="number" value="10" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script src="JS/app/jquery.js"></script>
<script src="JS/app/timer.jquery.min.js"></script>
<script src="JS/test.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
        integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
        crossorigin="anonymous"></script>
</body>