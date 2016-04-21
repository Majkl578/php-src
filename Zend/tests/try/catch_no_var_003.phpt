--TEST--
Catching an exception with and without catch variable, multiple times
--FILE--
<?php

try
{
	throw new Exception;
}
catch(RuntimeException $e)
{
	echo "Should not be caught\n";
}
catch(Exception)
{
	echo "Caught\n";
}
catch(Throwable $e)
{
	echo "Should not be caught either\n";
}

?>
===DONE===
--EXPECT--
Caught
===DONE===
