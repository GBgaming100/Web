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
    <a class="navbar-brand" href="index.php">CryptoMania</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="news.html">Nieuws</a>
            <a class="nav-item nav-link active" href="#">Wallet</a>
        </div>
    </div>
</nav>


<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Bought on</th>
        <th>Name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Total</th>
        <th>Save</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody id="crypto-folio-table">
    <div id="template" style="display: none;">
        <template id="all-coins-template">
            {{#.}}
            <tr>
                <td class="coin-id">{{id}}</td>
                <td class="bought-on">{{bought_on}}</td>
                <td class="coin-name">{{name}}</td>
                <td class="coin-price">{{price}}</td>
                <td class="coin-amount"><input type="number" value="{{amount}}" class="amount-input"/></td>
                <td class="coin-value   ">{{totalValue}}</td>
                <td>
                    <button type="button" class="btn btn-warning save-coin-btn" value="{{id}}">Save</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger delete-coin-btn" value="{{id}}">Delete</button>
                </td>
            </tr>
            {{/.}}
    </div>
    </tbody>
</table>

</template>

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
<script src="js/wallet.js"></script>
</body>
</html>