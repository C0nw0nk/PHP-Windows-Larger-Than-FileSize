<?php

//Function to check file size
function find_filesize($file)
{
  //Check OS is Windows
	if(substr(PHP_OS, 0, 3) == "WIN")
	{
	  //Exec windows command line
		exec('for %I in ("'.$file.'") do @echo %~zI', $output);
		//Array output
		$return = $output[0];
	}
	else //Else the OS was not Windows
	{
	  //Use php built in function
		$return = filesize($file);
	}
	//Incase the path or directory does not exist make the size output 0
	if (!ctype_digit($return))
	{
	  //Make file size 0
		$return = 0;
	}
	return $return;
}

//Usage : find_filesize("path");
//Example :
echo "File size is : ".find_filesize("D:\Server\movie.mp4")."";

$pathDest = "D:\Server\movie.mp4";
echo "File size is : ".find_filesize($pathDest)."";

?>

<?php

//Usage with no function needed.

//Set path
$pathDest = "D:\Server\movie.mp4";

if(substr(PHP_OS, 0, 3) == "WIN")
{
exec('for %I in ("'.$pathDest.'") do @echo %~zI', $return);
echo $return[0];
}

?>
