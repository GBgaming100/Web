<?php
	function connectWithDatabase($sql)
	{
	$connect = mysqli_connect("localhost","root",'', "zorg"); //localhost

		$resource = mysqli_query($connect, $sql);
	    $retuning_array = array();
	    while($result = mysqli_fetch_assoc($resource))
	    {
	    	$retuning_array[] = $result;
	    }
	    return $retuning_array;
	}
?>