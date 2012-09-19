<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>Make A Difference Comments</title>
  <subtitle>Comments</subtitle>
  <link href="<?php echo url_for('@comment_feed',array('absolute'=>true));?>" rel="self"/>
  <link href="<?php echo url_for('@homepage',array('absolute'=>true));?>"/>
  <updated><?php echo $lastUpdated;?></updated>
  <author><name>Jishi</name></author>
  <id><?php echo url_for('@homepage',array('absolute'=>true));?></id>
  <?php foreach($articles as $article):?>
  <entry>
    <title><?php echo $article->getName();?> comments  on <?php echo strtr($article->getArticle()->getTitle(),$table);?></title>
    <link href="<?php echo url_for('index/article?id='.$article->getArticleId().'#comment-'.$article->getId())?>" />
    <id><?php echo url_for('index/article?id='.$article->getArticleId().'#comment-'.$article->getId(),array('absolute'=>true))?></id>
    <updated><?php echo date('c',strtotime($article->getCreatedAt()))?></updated>
    <summary type="xhtml"><div xmlns="http://www.w3.org/1999/xhtml">
      <?php
       // $table = array('&nbsp;'=>'&#160;');
        echo nl2br(htmlspecialchars(strtr($article->getBody(),$table)));?>
    </div></summary>
    <author><name><?php echo $article->getName();?></name></author>
  </entry>
  <?php endforeach;?>
</feed>
