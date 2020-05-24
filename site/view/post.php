<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('clean-blog.css');
includeStyle('clean-blog.min.css');
endHeader();

componentMenu($menu);
componentHeader($textheading);



?>
<!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?=$post->getColumnValue('content')?>
        </div>
      </div>
    </div>
  </article>
  <hr>


<?php

componentFooter($footer);

includeScript('jquery.min.js');
includeScript('bootstrap.bundle.min.js');
includeScript('clean-blog.min.js');

getFooter();
?>