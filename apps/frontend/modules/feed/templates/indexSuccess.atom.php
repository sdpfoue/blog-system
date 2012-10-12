<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<title>Make A Difference</title>
	<subtitle>Latest Articles</subtitle>
	<link href="<?php echo url_for('feed/index',array('absolute'=>true));?>" rel="self"/>
	<link href="<?php echo url_for('@homepage',array('absolute'=>true));?>"/>
	<updated><?php echo $lastUpdated;?></updated>
	<author><name>Jishi</name></author>
	<id><?php echo url_for('@article_feed',array('absolute'=>true));?></id>
<?php //$table = array('&nbsp;'=>'&#160;','&hellip;'=>'&#8230;');
foreach($articles as $article):?>
	<entry>
		<title><?php echo strtr($article->getTitle(),$table);?></title>
		<link href="<?php echo url_for('index/article?id='.$article->getId(),array('absolute'=>true))?>" />
		<id><?php echo url_for('index/article?id='.$article->getId(),array('absolute'=>true))?></id>
		<updated><?php echo date('c',strtotime($article->getCreatedAt()))?></updated>
		<summary type="xhtml"><div xmlns="http://www.w3.org/1999/xhtml">
			Tags:
<?php $tags=$article->getArticleTags();        
foreach($tags as $tag){
	echo link_to2(strtr($tag->getTag(),$table),'tag',array('sf_route' => 'tag','sf_subject'=>$tag));
	echo ',&#160;';}?> <br/>
<?php
		if(is_null($article->getPwd())){ 
			echo preg_replace("/<script(.*)<\/script>|<object([\S\s]+?)<\/object>/", "",strtr($article->getBody(),$table));
		}else{
			$body = strpos($article->getBody(), '<!--pwd-->') === false ? '' : preg_replace('/(.*)<!--pwd-->.*/s', '$1', $article->getBody());
			echo preg_replace("/<script(.*)<\/script>|<object([\S\s]+?)<\/object>/", "",strtr($body,$table)); 
			echo '<p>此内容被作者加密，继续阅读请与博主索要密码并到网站阅读</p>';
		}
?>
		</div></summary>
		<author><name>Jishi</name></author>
	</entry>
	<?php endforeach;?>
</feed>
