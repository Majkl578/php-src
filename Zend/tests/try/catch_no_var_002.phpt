--TEST--
Catching an exception without catch variable, multiple times
--FILE--
<?php

try
{
	throw new Exception;
}
catch(RuntimeException)
{
	echo "Should not be caught\n";
}
catch(Exception)
{
	echo "Caught\n";
}
catch(Throwable)
{
	echo "Should not be caught either\n";
}

?>
===DONE===
--EXPECT--
Caught
===DONE===
