<?php

/**
 * @author Bibhas
 * @copyright 2010
 */

require_once 'retarded.php';

$retarded_variable=new Retarded();
$url=$retarded_variable->conUrl("hello.php",array("name"=>"bibhas*&^  +*(&","age"=>"20"));

?>
<a href="<?php echo $url; ?>">Try this.</a>