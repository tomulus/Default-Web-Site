<!DOCTYPE html>
<html>
<body>
<?php
echo "<h1>Welcome to localhost!</h1>";
echo "<h3>The following sites were found using 'appcmd list site':</h3>";
echo "<ul>";

    //exec("appcmd list site", $output, $return);
	//echo $return."<br>";
    //var_dump($output);
	//unset($output);
	//exec("time /t", $output);
	//echo $output[0]."<br><br>";

//run "appcmd list site", parse output as localhost urls and print as hyperlinks	
	exec("appcmd list site", $output);
	foreach ($output as &$value) {
		unset($output,$return,$site,$name,$bindings,$tok,$port);
		$site = strtok($value, "\"");
		$name = strtok("\"");
		$bindings = strtok("\"");
		
		//echo "site: $site<br>";
		//echo "name: $name<br>";
		//echo "bindings: $bindings<br>";
		
		$tok = strtok($bindings,":");
 		while ($tok !== false) {
			//echo "$port<br>";
			$port[] = $tok;
			$tok = strtok(":");
		}
		$host = "localhost";
/* 		if ($port[4] !== ",state") {
			$host = $port[4];
		} */
		
		echo "<li><a href=\"http://$host:$port[3]\">$name</a></li>";
	}
	echo "</ul>";
?>  

</body>
</html>