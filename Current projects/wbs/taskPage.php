<?php
session_start();

include 'inc/database.php';
$projectId = $_GET['projectId'];
$sqlO = "SELECT * FROM projects WHERE id = $projectId";
$o = connectWithDatabase($sqlO);

$sqlI = "SELECT * FROM tasks WHERE projectId = $projectId";
$i = connectWithDatabase($sqlI);


$totalTimePlanned = 0;

$sqlP = "SELECT SUM(`Time`)FROM tasks WHERE projectId = $projectId ";
$p = connectWithDatabase($sqlP);

$totalTimePlanned = $p[0]["SUM(`Time`)"];

$totalActualTime = 0;

$sqlq = "SELECT SUM(`ActualTime`)FROM tasks WHERE projectId = $projectId ";
$q = connectWithDatabase($sqlq);

$totalActualTime = $q[0]["SUM(`ActualTime`)"];


//var_dump($i);
//die();

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
    <a href="index.php" class="btn btn-primary">Home</a>
    <h1 class="display-4">
        <?php
        echo $o[0]['Title'];
        ?>
    </h1>
    <hr class="my-4">
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">TaskName</th>
            <th scope="col">Predecessor</th>
            <th scope="col">MoSCoW</th>
            <th scope="col">Planned Time (min)</th>
            <th scope="col">Actual Time (min)</th>
            <th scope="col">Check</th>
            <th scope="col">Act</th>
            <th scope="col"></th><!--empty col for timer start button -->
            <th scope="col"></th><!--empty col for delete task button -->
        </tr>
        </thead>
        <tbody>
        <form id="update-task-form">
            <?php
            foreach ($i as $item) {
                ?>
                <tr>

                    <div class="form-row">
                        <input type="hidden" name="taskId[]" value="<?php echo $item['id']; ?>"/>
                        <th scope="row"><?php echo $item['id'] ?></th>
                        <td><input type="text" class="form-control      taskName" name="taskName[]"
                                   value='<?php echo $item['taskName'] ?>   '></td>
                        <td><input type="number" class="form-control    Predecessor" name="Predecessor[]"
                                   value='<?php echo $item['Predecessor'] ?>'></td>
                        <td><input type="text" class="form-control      MoSCoW" name="MoSCoW[]"
                                   value='<?php echo $item['MoSCoW'] ?>     '></td>
                        <td><input type="text" class="form-control      Time" name="Time[]"
                                   value='<?php echo $item['Time'] ?>       '></td>
                        <td><input type="text" class="form-control      js-task-actual ActualTime" name="ActualTime[]"
                                   value='<?php echo $item['ActualTime'] ?> ' ></td>
                        <td><input type="text" class="form-control      _check" name="_check[]"
                                   value='<?php echo $item['_check'] ?>     '></td>
                        <td><input type="text" class="form-control      Act" name="Act[]"
                                   value='<?php echo $item['Act'] ?>        '></td>
                        <td>
                            <div class="btn btn-success js-start-timer">Start</div>
                        </td>
                        <td>
                            <div class="btn btn-danger js-delete-task">Delete task</div>
                        </td>
                    </div>
                </tr>
                <?php
            }
            ?>
            <tr>
            <td colspan="4">
            </td>
            <td>Total time planned (min): <?php echo $totalTimePlanned  ?></td>
            <td>Total actual planned (min): <?php echo $totalActualTime ?></td>
            <td colspan="4"></td>
            </tr>

            <tr>
            <td colspan="10">
                <div class="btn btn-primary js-update-data">Update Tasks</div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTask">Create Task</button>
            </td>
            </tr>
        </form>
        </tbody>
    </table>
</div>


<!--Modal for adding taks-->
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
</html>


<!-- out commented -->

<!--
		<div id="button"></div>
		<div id="main-container">HELLO WORLD</div>

		<form>
			<input type="text" id="input-name">
			<input type="button" id="input-button" value="submit">
		</form> -->
<!-- <img src="img/xmen.jpg" alt="" id="photo">
 -->
