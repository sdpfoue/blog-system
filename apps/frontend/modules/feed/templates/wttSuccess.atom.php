<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>我说</title>
  <subtitle>和谐</subtitle>
  <link href="http://twitter.com/tongjishi" rel="self"/>
  <link href="#"/>
  <updated><?php echo date('c',strtotime($items[0]->get_date()))?></updated>
  <author><name>竹影清风</name></author>
  <id>http://twitter.com/tongjishi</id>
  <?php foreach($items as $item):?>
  <entry>
    <title><?php echo $item->get_date('j F Y | G:i'); ?> 说</title>
    <link href="<?php echo $item->get_permalink();?>" />
    <id><?php echo $item->get_permalink();?></id>
    <updated><?php echo date('c',strtotime($item->get_date()))?></updated>
    <summary type="xhtml"><div xmlns="http://www.w3.org/1999/xhtml">
      <?php echo str_replace("tongjishi: ","",$item->get_description()); ?>
    </div></summary>
    <author><name>竹影清风</name></author>
  </entry>
  <?php endforeach;?>
</feed>
