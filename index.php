<?php

//Function to check file size
function find_filesize($file)
{
	//Check OS is Windows and PHP version is less than 7 (In PHP 7 on Windows the design limitation is fixed.)
	if(substr(PHP_OS, 0, 3) == "WIN" && strtok(phpversion(),'.') < 7)
	{
		//Setup for array
		$output = array(); //This is not needed but i like to prepare code for array storage
		//Exec windows command line
		exec('for %I in ("'.$file.'") do @echo %~zI', $output);
		//Array output
		$return = $output[0];
		//Incase the path or directory does not exist make the size output 0
		if (!ctype_digit($return))
		{
			//Make file size 0
			$return = 0;
		}
	}
	else //Else the OS was not Windows
	{
		//Use php built in function
		$return = filesize($file);
	}
	return $return;
}

//Usage : find_filesize("path");
//Example :
echo "File size is : ".find_filesize("D:\Server\movie.mp4")."";
//Set path
$pathDest = "D:\Server\movie.mp4";
echo "File size is : ".find_filesize($pathDest)."";

?>

<?php

//Usage with no function needed.

//Set path
$pathDest = "D:\Server\movie.mp4";

//Check OS is Windows and PHP version is less than 7 (In PHP 7 on Windows the design limitation is fixed.)
if(substr(PHP_OS, 0, 3) == "WIN" && strtok(phpversion(),'.') < 7)
{
	//Setup for array
	$return = array(); //This is not needed but i like to prepare code for array storage
	//Exec windows command line
	exec('for %I in ("'.$pathDest.'") do @echo %~zI', $return);
	//Echo how many bytes the file has.
	echo $return[0];
}

?>
