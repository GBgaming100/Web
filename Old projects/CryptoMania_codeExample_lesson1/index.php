<!DOCTYPE>
<html>
<head>

    <meta charset="UTF-8">

    <title>CryptoMania - Lesson 1</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <template id="character-modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Species: {{species}}</h5>
                            <img src="{{image}}";
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                    </template>

                </div>
            </div>
        </div>


<table id="characters-table">

    <template id="all-characters-template">
        {{#.}}
        <tr>
            <td class="character-id">
                {{id}}
            </td>
            <td>
                {{name}}
            </td>
            <td>
                {{species}}
            </td>
            <td>
                <button type="button" class="btn btn-info info-btn" value="{{id}}" data-toggle="modal"
                        data-target="#exampleModal">
                    More info
                </button>

            </td>
        </tr>
        {{/.}}
    </template>

</table>


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

<!-- Custom js  -->
<script src="js/main.js"></script>
</body>
</html>