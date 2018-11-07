<!DOCTYPE>
<html>
<head>

    <meta charset="UTF-8">

    <title>CryptoMania</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sprite.css">

</head>
<body>


<table id="coin-table">
    <template id="all-coin-template">
        <tr>
            <th>Img</th>
            <th>Name</th>
            <th>Price</th>
            <th>Cap Change</th>
            <th>Supply</th>
            <th>Info</th>
        </tr>
        {{#.}}
        <tr>
            <!-- <td class="character-id">{{long}}</td> -->
            <td><span class="sprite sprite-{{class-name}} small_coin_logo"></span></td>
            <td>{{long}}</td>
            <td>{{price}}</td>
            <td>{{cap24hrChange}}</td>
            <td>{{supply}}</td>

            <td>
                <button type="button" class="btn btn-primary info-btn" data-target="#exampleModal" value="{{short}}">
                    info
                </button>
            </td>
        </tr>
        {{/.}}
    </template>
</table>

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title js-modal-title" >Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="coin-7-day-chart"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div id="template" style="display: none;">
    <template id="extra-info-template">
        {{#.}}
        {{/.}}
    </template>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<!-- Mustache JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>

<!-- Moment js  -->
<script src="js/moment.min.js"></script>

<!--- Charts js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<!-- Custom js  -->
<script src="js/main.js"></script>
</body>
</html>