<!--Met dank aan:
                    Maarten jakobs
                    Ryan van den broek
                    Benjamin porobich
                    Gert-jan van den Boom-->

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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CryptoMania</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="news.html">Nieuws</a>
            <a class="nav-item nav-link" href="wallet.php">Wallet</a>
        </div>
    </div>
</nav>

<div class="loader-container js-loader">
    <div class="loader">
        <img src="img/load.svg" alt="">
    </div>
</div>

<table id="bitcoin-info" class="table table-hover">
    <tr>
        <th scope="col">Bitcoin Price</th>
        <th scope="col">Volume Alt Coins</th>
        <th scope="col">Volume Bitcoin</th>
        <th scope="col">Total Volume</th>
    </tr>
    <tr>
        <td id="BitcoinPrice">NaN</td>
        <td id="VolumeAlt">NaN</td>
        <td id="VolumeBTC">NaN</td>
        <td id="VolumeTotal">NaN</td>
    </tr>
</table>

<table id="coin-table" class="table table-hover">
    <template id="all-coin-template">
        <tr>
            <th scope="col">Img</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Cap Change</th>
            <th scope="col">Supply</th>
            <th scope="col">Info</th>
            <th scope="col">Add Coin</th>
        </tr>
        {{#.}}
        <tr>
            <!-- <td class="character-id">{{long}}</td> -->
            <td><span class="sprite sprite-{{class-name}} small_coin_logo"></span></td>
            <td>{{long}}</td>
            <td>{{price}}</td>
            <td>
                <div class="capChange " id="{{color}}"> {{cap24hrChange}}</div>
            </td>
            <td>{{supply}}</td>

            <td>
                <button type="button" class="btn btn-primary info-btn" data-target="#exampleModal" value="{{short}}">
                    info
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-success add_btn" value="{{short}}">
                    add
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
                <h5 class="modal-title js-modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="infoContainer">
                <div class="loaderModal">
                    <img src="img/load.svg">
                </div>
                <div class="info-container">
                    <div class="info">
                        <h5 class="modal-title">price</h5>
                        <p class="modal-info js-modal-price">Modal title</p>
                    </div>
                    <div class="info">
                        <h5 class="modal-title">cap</h5>
                        <p class="modal-info js-modal-cap">Modal title</p>
                    </div>
                    <div class="info">
                        <h5 class="modal-title">volume</h5>
                        <p class="modal-info js-modal-volume">Modal title</p>
                    </div>
                    <div class="info">
                        <h5 class="modal-title">supply</h5>
                            <p class="modal-info js-modal-supply">Modal title</p>
                    </div>
                </div>
                <div id="canvas-div">
                    <canvas id="coin-7-day-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title js-modal-title coin_name">Add Coin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Current price $<span id="coin_price">7486.20</span>
                <br/>
                Amount: <input type="number" id="amount_coins" value="1">
                <br/>
                Total: <span id="total_value">0</span>
                <br/>
                <div id="js_coin_name" style="display: none;">test</div>
                <button type="button" class="btn btn-primary" id="add_coin_btn">Add</button>
            </div>
        </div>
    </div>
</div>


<div id="template" style="display: none;">
    <template id="extra-info-template">
        {{#.}}
        {{price}}
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