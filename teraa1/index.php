<!DOCTYPE html>
<html>
<head>

	<!-- Character set -->
	<meta charset="utf-8">

	<!-- Tells the Internet Explorer to display the webpage in the highest mode available. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- For rendering on mobile devices and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Faster+One|Fugaz+One|Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sal.css">

    <link rel="icon" href="img/logo.png" type="image/gif">

	<title>Train Fever</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" height="50" alt="">
            <span>TRAIN FEVER</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse collapse" id="navbarsExample03" style="">
            <ul class="navbar-nav m-auto">
              <li class="nav-item">
                <a class="nav-link text-white" href="#trainspeed">Train Speed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#blockssystem">Train Blocks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#trackchange">Alternate Track</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#trafficlights" target="_blank">Traffic Lights</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#map" target="_blank">Map</a>
              </li>
            </ul>

          </div>
      </div>
          
    </nav>

    <div class="container mb-4">
      <div class="row mb-4">
        <div class="col-md-6 mt-4"
            data-sal="slide-right"
            data-sal-duration="1500"
            data-sal-delay="0"
            data-sal-easing="ease-out-bounce">
            <div id="freight-img" class="card img" style="min-width: 18rem;">
                <!-- <img class="card-img-top" src="https://www.railway-technology.com/wp-content/uploads/sites/24/2017/10/freight2-John-Mueller.jpg" alt="Card image cap"> -->
            </div>
        </div>
        <div class="col-md-6 mt-4"
            data-sal="slide-left"
            data-sal-duration="1500"
            data-sal-delay="0"
            data-sal-easing="ease-out-bounce">
            <div class="card h-100" id="trainspeed" style="min-width: 18rem;">
              <div class="card-body" id="train-template-div">
                <template id="train-template">

                    <h2 class="card-title">Train Speed</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Take Control of the train</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    {{#.}}
                        <h6 class="text-center trainspeed"> 

                            Direction: 
                            <i class="direction-icon fas fa-undo text-primary"></i> 
                            <span class="direction-text">counter clockwise</span> 
                            <button value="{{direction}}" data-train-type="{{id}}" class="btn btn-primary btn-swapdirection">
                                <i class="fas fa-exchange-alt"></i> 
                                Swap Direction
                             </button>

                        </h6>
                        <input type="range" value="{{speed}}" min="{{min_speed}}" max="{{max_speed}}" class="speed-range-slider slider" data-train-type="{{id}}">
                        <h4 class="text-center trainspeed">{{name}} speed: 
                            <span class="speed-value-container" data-train-type="{{id}}">
                                {{speed}}
                            </span>
                        </h4>
                    {{/.}}
               
                    <audio id="audio" src="sounds/trainhorn.mp3" autostart="false" ></audio>
                    <!-- <a href="#" onclick="playSound();" class="card-link text-center">Train Horn</a>

                    <a href="#" class="card-link text-center">Another link</a> -->
                 </template>
              </div>
            </div>
        </div>

        <div class="col-md-6 mt-4" id="blockssystem"
            data-sal="slide-right"
            data-sal-duration="1500"
            data-sal-delay="750"
            data-sal-easing="ease-out-bounce">
            <div class="card" style="min-width: 18rem;">
              <div class="card-body">

                    <h2 class="card-title">Train Blocks</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Let the train take a break</h3>
                    <p class="card-text">Let trains stop on diffrent spots on the track. We have 4 spots where you can park your train</p>

                    <table class="table table-striped table-light">
                      <thead>
                        <tr>
                          <th scope="col">Block</th>
                          <th scope="col">Switch</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody  id="block-template-div">

                        <template id="block-template">
                        {{#.}}
 

                            <tr>
                              <th scope="row">{{id}}</th>
                              <td>
                                <label class="switch">
                                  <input id="{{io}}" type="checkbox" class="blockcheckbox" data-block="{{id}}">
                                  <span class="switch-slider round"></span>
                                </label>
                              </td>
                              <td><i class="fas fa-train text-center {{status-string}}"></i> {{status-string}}</td>
                            </tr>
                        {{/.}}
                        </template>

                      </tbody>
                    </table>
              </div>
            </div>
        </div>

        <div class="col-md-6 mt-4"
            data-sal="slide-left"
            data-sal-duration="1500"
            data-sal-delay="750"
            data-sal-easing="ease-out-bounce">
            <div class="card img" id="station-img" style="min-width: 18rem;"></div>
        </div>

        <div class="col-md-6 mt-4" 
            data-sal="slide-right"
            data-sal-duration="1500"
            data-sal-delay="0"
            data-sal-easing="ease-out-bounce">
            <div class="card img" id="alternate-img" style="min-width: 18rem;"></div>
        </div>
        <div class="col-md-6 mt-4" id="trackchange" 
            data-sal="slide-left"
            data-sal-duration="1500"
            data-sal-delay="0"
            data-sal-easing="ease-out-bounce">
            <div class="card" style="min-width: 18rem;">
              <div class="card-body">

                    <h2 class="card-title">Alternate Track</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Choose an alternate route</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <table class="table table-striped table-light">
                      <thead>
                        <tr>
                          <th scope="col">Block</th>
                          <th scope="col">Switch</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody  id="alternate-template-div">

                        <template id="alternate-template">
                        {{#.}}

                            <tr>
                              <th scope="row">{{id}}</th>
                              <td>
                                <label class="switch">
                                  <input id="{{io}}" type="checkbox" class="trackcheckbox" data-block="{{id}}">
                                  <span class="switch-slider round"></span>
                                </label>
                              </td>
                              <td><img class="rail-icon" src="img/rail-icon/change-{{status-string}}.png"> {{status-string}}</td>
                            </tr>

                        {{/.}}
                        </template>

                      </tbody>
                    </table>
              </div>
            </div>
        </div>

        <div class="col-md-12 mt-4" id="trafficlights"
            data-sal="slide-top"
            data-sal-duration="2000"
            data-sal-delay="250"
            data-sal-easing="ease-out-bounce">
            <div class="card" style="min-width: 18rem;">
              <div class="card-body" id="block-template-div">

                    <h2 class="card-title">Traffic Lights</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Take Control of the train</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="row  mt-4" id="traffic-template-div">
                    <template id="traffic-template">
                      {{#.}}
                        <form class="form-traffic-light col-md-2 {{id}}"> 
                            <div id="traffic-light">
                                <div class="light red">
                                    <input type="radio" name="traffic-light" class="green{{io}}" value="off" checked="true" />
                                    <span class="checkmark"></span>
                                </div>

                                <div class="light green">
                                    <input type="radio" name="traffic-light" class="red{{io}}" value="on" checked />
                                    <span class="checkmark"></span>
                                </div>
                            </div>
                        </form>
                        {{/.}}
                    </template>
                    </div>
              </div>
            </div>
        </div>

        <div class="col-md-12 mt-4" id="map"
            data-sal="slide-top"
            data-sal-duration="2000"
            data-sal-delay="250"
            data-sal-easing="ease-out-bounce">
            <div class="card" style="min-width: 18rem;">
              <div class="card-body" id="block-template-div">

                    <h2 class="card-title">Map</h2>
                    <h3 class="card-subtitle mb-2 text-muted">Take a little look for all stops</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

              </div>
              <img class="card-img-top" src="img/map.png" alt="Card image cap">
            </div>
        </div>
        
    </div>

    <button type="button" class="backToTop btn btn-primary" data-toggle="tooltip" data-placement="top" title="Back to Top">
      <i class="fas fa-arrow-circle-up"></i>
    </button>

	<!-- jQuery -->
	<script src="js/jquery-3.3.1.min.js"></script>
    <!-- socket io -->

    <!-- sal.js -->
        <script src = "js/sal.js"></script>
    <!-- Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Font Awsome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <!-- Mustache JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.js"></script>
    <!-- Custom js  -->
    <script src="js/main.js"></script>
</body>
</html>