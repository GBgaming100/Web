<?php
	function connectWithDatabase($sql)
	{
	$connect = mysqli_connect("localhost","root","", "carspotter"); //localhost

		$resource = mysqli_query($connect, $sql);
	    $retuning_array = array();
	    while($result = mysqli_fetch_assoc($resource))
	    {
	    	$retuning_array[] = $result;
	    }
	    return $retuning_array;
	}
	function loginFrom()
	{
		?>
		<li class="nav-item">
              <?php if (isset($_SESSION['username'])) {
                ?>
                <a class="btn btn-primary" href="logOut.php">Log Out</a>
                <?php
              }else{ ?>
              <a class="btn btn-primary" href="#"  onclick="document.getElementById('id01').style.display='block'">Sign In</a>
              <?php } ?>
         </li>
		<div id="id01" class="modal">
		  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		  <form class="modal-content" action="signin.php">
		    <div class="container">
		      <h1>Sign In</h1>
		      <p>Please fill in this form to login into your account.</p>
		      <hr>
		      <label for="email"><b>Username</b></label>
		      <input type="text" placeholder="Enter Username" name="username" required>

		      <label for="psw"><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="psw" required>

		      <div class="clearfix">
		        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancel btn">Cancel</button>
		        <button type="submit" class="signin btn">Sign In</button>
		      </div>
		    </div>
		  </form>
		</div>

		<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>


		<?php
	}
?>