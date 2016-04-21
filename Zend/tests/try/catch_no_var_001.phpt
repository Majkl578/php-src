--TEST--
Catching an exception without catch variable
--FILE--
<?php

try
{
	throw new Exception;
}
catch(Exception)
{
	echo "Caught\n";
}

?>
===DONE===
--EXPECT--
Caught
===DONE===
