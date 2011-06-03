<pre><?php

/**
 * @author MESMERiZE
 * @copyright 2010
 */
require_once 'simple_html_dom.php';
$pathUrl="http://www.alexa.com/site/linksin;1/facebook.com";
$html = file_get_html($pathUrl);
$gene_a=Array();
$postCount=0;
foreach($html->find('div.site-listing a.title') as $element){
    echo $element->href . " => " . $element->plaintext . "<br />";
}

$html->clear(); 
unset($html);
print_r($gene_a);
?></pre>