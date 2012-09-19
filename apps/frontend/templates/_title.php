<div class="post" id="post-<?php echo $article->getId();?>">
			
<ul class="date">
	<li class="day"><?php echo date('d',strtotime($article->getCreatedAt()))?></li>

	<li class="month"><?php echo date('M',strtotime($article->getCreatedAt()))?></li>
</ul>

<ul class="title">	
	<li class="topic">
	  <?php echo link_to($article->getTitle(),'index/article?id='.$article->getId());?>
	</li>
    <li class="postmeta">Posted by Jishi at 
    <?php echo $article->getCreatedAt();?>
     . Tags:
     <?php $tags=$article->getArticleTags();
		$tag=array_shift($tags);
		echo link_to2($tag->getTag(),'tag',array('sf_route' => 'tag','sf_subject'=>$tag));
          foreach($tags as $tag){
			echo ',&nbsp;';
            echo link_to2($tag->getTag(),'tag',array('sf_route' => 'tag','sf_subject'=>$tag));
            }?> 
     
      
      <?php echo link_to($article->getCommentnb().' Comments','index/article?id='.$article->getId().'#comments');?> </li> </ul>
      <div class="clear"></div>
