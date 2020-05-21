<?php
startHeader();
setTitle('Simple page title');
includeStyle('main.css');
endHeader();
?>
<div id="container">
    <?php echo "This is a sample page - ".$testVar;?>
</div>
<?php
getFooter();
?>