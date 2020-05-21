<?php
/**
 * Start the head section of the page
 */
function startHeader(){
    $string = "<!DOCTYPE html>\n<html>\n<head>\n";
    echo $string;
}
/**
 * Include a stylesheet from the css folder
 */
function includeStyle($filename){
    global $area;
    $path = "./".$area."/css/".$filename;
    includeExternalStyle($path);
}
/**
 * Include an external stylesheet from another domain
 */
function includeExternalStyle($location){
    $string = "<link rel='stylesheet' type='text/css' href='".$location."' />\n";
    echo $string;
}
/**
 * Inlcude a javascript file from the js folder
 */
function includeScript($filename){
    global $area;
    $path = "./".$area."/js/".$filename;
    includeExternalScript($path);
}
/**
 * Inlcude an external javascript
 */
function includeExternalScript($location){
    $string = "<script type='text/css' src='".$location."'></script>\n";
    echo $string;
}
/**
 * Set title of the page
 */
function setTitle($title){
    echo "<title>".$title."</title>\n";
}
/**
 * End the head section of the page
 */
function endHeader(){
    echo "</head>\n<body>\n";
}
/**
 * Get footer
 */
function getFooter(){
    echo "\n</body>\n</html>";
}
?>