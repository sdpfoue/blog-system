<?php slot('title');?>
  Sitemap - 
<?php end_slot();?>

<h2>Sitemap</h2>
<ul>
  <li><?php echo link_to('Home','index/index');?></li>
  <li><?php echo link_to('About','index/about');?></li>
  <li><?php echo link_to('Twitter','index/twitter');?></li>
  <li><?php echo link_to('Douban','index/douban');?></li>
  <li><?php echo link_to('Shared item on google reader','index/share');?></li>
  <li><?php echo link_to('Archives','archive/all');?></li>
</ul>