<?php
session_start();

// met hulp van:
//                Maarten Jakobs

include "inc/db.php";

$sql = "SELECT * FROM `users`";
$i = connectDB($sql);

var_dump($_SESSION);

?>
<html>
<head>
    <title>AdressBook</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>
<!--Modal Start-->
<div class="modal  fade" id="createProjects" tabindex="-1" role="dialog" aria-labelledby="createProjects"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" class="form-control FirtsName" placeholder="First name">
                    </div>
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" class="form-control LastName" placeholder="Last name">
                    </div>
                </div>
                <label>Email</label>
                <input name="email" type="email" class="form-control Email" placeholder="Email">
                <label>Phone Number</label>
                <input name="phoneNumber" type="text" class="form-control phoneNumber" placeholder="Phone Number">
                <div class="row">
                    <div class="col">
                        <label>Street</label>
                        <input type="text" class="form-control Street" placeholder="Street">
                    </div>
                    <div class="col">
                        <label>Number</label>
                        <input type="text" class="form-control Number" placeholder="Number">
                    </div>
                    <div class="col">
                        <label>Extra</label>
                        <input type="text" class="form-control Extra" placeholder="Extra">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Zipcode</label>
                        <input type="text" class="form-control Zipcode" placeholder="Zipcode">
                    </div>
                    <div class="col">
                        <label>City</label>
                        <input type="text" class="form-control City" placeholder="City">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn_add_contact">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--Modal End -->
<!--Jumbotron Start-->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4 logo">Adress Book</h1>
        <hr class="my-4">
        <div class="row">
            <div class="col-4">
                <p>The social adress book. Lets make 'personal information' personal again.</p>
            </div>
            <div class="col-2 infill"></div>
            <div class="col-4 login-text">
                <h1>Testing</h1>
            </div>
            <div class="col-4 login-form ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input name="username" type="text" class="form-control username"
                           aria-describedby="emailHelp"
                           placeholder="Enter User Name">
                </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input name="password" type="password" class="form-control Password" id="exampleInputPassword1"
                       placeholder="Password">
            </div>
            <div class="btn btn-primary btn-login"> login</div>
            <div class="btn btn-primary btn-Registreer"> Registreer</div>
        </div>
    </div>
    </div>
</div>
</div>
<!--Jumbotron End-->
<!--content Start-->
<div class="content-body">
    <div class="container">
        <div class="template_contacts_outerDiv row">
            <template class="template_contacts">
                {{#.}}
                <div class="card col-md-4 mb-4 p-4">
                    <img class="card-img-top"
                         src="https://media.discordapp.net/attachments/298750446342766592/489425857455325185/UeMLJe3gW9neecfegRyWSVlTTus8TlPctH3pcyBHP5RaX8O3hHJOZHmpo64covvYhlTFpDg3QAAAAASUVORK5CYII.png"
                         alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{FirtsName}} {{LastName}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Email: {{Email}}</li>
                            <li class="list-group-item">City: {{City}}</li>
                            <li class="list-group-item">Street: {{Street}}{{Number}}</li>
                            <li class="list-group-item">Zipcode: {{Zipcode}}</li>
                            <button type="button" class="btn btn-primary more_info_button" value="{{id}}" data-toggle="modal" data-target="#contactModal">
                                More info
                            </button>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Contact Id: {{id}}</small>
                    </div>
                </div>
                {{/.}}

                <div class="card col-md-4 mb-4" style="width: 4rem; ;">
                    <div class="card-body">
                        <h5 class="card-title">Add project</h5>
                        <hr>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProjects">
                            Create Contact
                        </button>

                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
<!--Content End-->


<!-- User Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<footer></footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- Mustache JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>

<script src="js/main.js"></script>
</body>
</html>
