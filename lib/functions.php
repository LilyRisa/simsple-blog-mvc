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
function componentMenu($array){
    $title = $array['title'];
    $menu = $array['menu'];
    $count = count($array['menu']);

    $template = sprintf('<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="%s">%s</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">',$title['link'],$title['text']);
        for($i=0;$i<$count;$i++){
            $template .= '<li class="nav-item">
            <a class="nav-link" href="'.$menu[$i]['link'].'">'.$menu[$i]['text'].'</a>
          </li>';
        }
        $template .= '</ul>
      </div>
    </div>
  </nav>';
  echo $template;
}

function componentHeader($array){
    $template = sprintf('
    <header class="masthead" style="background-image: url('."'".'%s'."'".')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>%s</h1>
            <span class="subheading">%s</span>
          </div>
        </div>
      </div>
    </div>
  </header>
    ',$array['background'],$array['heading'],$array['subheading']);
    echo $template;
}
// function includeExternalScript($location){
//     $string = '<script src="'.$location.'" ><script>'.PHP_EOL;
//     echo $string;
// }
function componentFooter($array){
    $template = sprintf('<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="%s">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="%s">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="%s">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">%s</p>
        </div>
      </div>
    </div>
  </footer>',$array['twitter'], $array['facebook'], $array['github'],$array['text']);
    echo $template;
}
function staticfile($path){
    return './'.$path;
}

function getFooter(){
    echo "\n</body>\n</html>";
}
?>