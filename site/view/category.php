<?php
startHeader();
setTitle('Simple page title');
includeStyle('bootstrap.min.css');
includeStyle('clean-blog.css');
includeStyle('clean-blog.min.css');
includeExternalScript('https://kit.fontawesome.com/395a09f10a.js');
endHeader();

componentMenu($menu);
componentHeader($textheading);

$post =  Post::getAll();
?>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php foreach ($post as $post) { 

          if($id != null && $id == $post->getColumnValue('cate_post')){




          ?>
       
        <div class="post-preview">
          <a href="post@<?= $post->getColumnValue('id') ?>">
            <h2 class="post-title">
              <?= $post->getColumnValue('title') ?>
            </h2>
            
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?= User::getOne(['id' => $post->getColumnValue('user_create')])->getColumnValue('name') ?></a>
            on <?= $post->getColumnValue('tbtime') ?></p>
        </div>
        <hr>
        <?php
      }
          } 
        ?>
        <!-- Pager -->

      </div>
    </div>
  </div>

  <hr>

<?php

componentFooter($footer);

includeScript('jquery.min.js');
includeScript('bootstrap.bundle.min.js');
includeScript('clean-blog.min.js');

getFooter();
?>