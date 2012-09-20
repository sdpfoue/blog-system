<?php use_helper('Form')?>
<?php slot('title')?>
  <?php echo $article->getTitle();?> - 
<?php end_slot();?>

<?php slot('header')?>
<script type="text/javascript">
window.onload = function(){
  var validate = document.createElement("input");
  validate.name="val";
  validate.value="true";
  validate.type="hidden";
  Tem=document.getElementById("commentform");
  Tem.appendChild(validate);
}
</script>
<?php end_slot();?>


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
     
      
			<?php 
		  $comments_str = $article->getCommentnb()==1 ? ' Comment' : ' Comments';					
			echo link_to($article->getCommentnb().$comments_str,'index/article?id='.$article->getId().'#comments_str');?> </li> </ul>

		
		<div class="clear"></div>
		<div class="entry">
			<?php $pwd = $article->getPwd();
						if(!$sf_user->isAuthenticated() && isset($pwd) && (!isset($_POST['pwd']) || $pwd != $_POST['pwd'])):?>
				<p>该文章被作者加密，请向作者索要密码</p>
			  <form style="text-align:left;" action="" method="post" accept-charset="utf-8">
					<input type="text" name="pwd" id="pwd" value="" />
					<input type="submit" value="Submit" />
				</form>
			<?php else:?>
				<?php echo $article->getBody(); $is_auth = true;?>
				<?php if($sf_user->isAuthenticated()):?>
					<p><input type="text" name="" id="" value="<?php echo $article->getPwd()?>" /></p>
				<?php endif;?>
			<?php endif;?>
			
		</div>
		</div>
		<div style="text-align:right">
		
<!-- JiaThis Button BEGIN -->
<div id="ckepop">
	<a class="jiathis_button_douban">豆瓣</a>
	<a class="jiathis_button_linkedin">LinkedIn</a>	
	<a class="jiathis_button_delicious">Delicious</a>	
	<a class="jiathis_button_tools_1"></a>
	<a class="jiathis_button_tools_2"></a>
	<a class="jiathis_button_twitter">Twitter</a>
	<a class="jiathis_button_fb">Facebook</a>
	<a href="http://www.jiathis.com/share/?uid=902227" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">更多</a>
</div>
<!-- JiaThis Button END -->
		</div>
		<div class="clear"></div>
		<hr/>
		<h3 id="comments"><?php echo $article->getCommentNb().$comments_str;?> </h3><br/>
		
		<!--评论内容开始 -->
		<ol class="commentlist">
      <?php $n=0; foreach($comments as $comment):?>
      <?php $n++; if($n%2==1)$st='odd';else $st='even';?>
      
      <li id="comment-<?php echo $comment->getId();?>" class="comment <?php echo $st;?>" >
      
      <div class="comment-author vcard">
        <cite> #<?php echo $n;?>
          <?php if($comment->getWeb()):?>
            <a href="<?php echo $comment->getWeb()?>" target="_blank">
              <?php echo $comment->getName()?>
            </a>
          <?php else:?><span style="color:#000;"><?php echo $comment->getName()?></span><?php endif;?>
        </cite>
         @<?php echo $comment->getCreatedAt();?>
	 <?php if($sf_user->isAuthenticated()):?>
		<?php echo $comment->getIpaddr();?>
		<?php echo link_to($comment->getIp(),'tongjishi/comment?ip='.$comment->getIp());?>
    <?php echo link_to('删除','tongjishi/delcomment?id='.$comment->getId());?>
	 <?php endif;?>
      </div>
      <p><?php echo  nl2br(ereg_replace("http://([a-zA-Z0-9./-]+)([a-zA-Z/]+)",
"<a href=\"\\0\" target=\"_blank\">\\0</a>",htmlspecialchars($comment->getBody())));?></p>
      
      <!--主人回复-->
      <?php if($st=='odd')$st='even';else $st='odd';?>
      <?php if($comment->getReply()):?>
      <div class="<?php echo $st;?>" style="margin:10px;">
        <div class="comment-author vcard">
          <cite>
            <span style="color:#000;"><a href="<?php echo url_for('@homepage');?>">Jishi Replied:</a> </span>
          </cite>
           @<?php echo $comment->getRepliedAt();?>
        </div>
        <!--回复内容-->
        <p><?php echo nl2br(ereg_replace("http://([a-zA-Z0-9./-]+)([a-zA-Z/]+)",
"<a href=\"\\0\" target=\"_blank\">\\0</a>",$comment->getReply()));?></p>
      </div>  
      
      <?php endif;?>
      
      </li>
      <?php endforeach;?>

    </ol>
		<h3>Leave a comment</h3>
		<form id="commentform" method="post">
		  <table>
		    <?php echo $form ?>
		    <tr>
				<td colspan="2" align="center">
<?php if($is_auth):?>
<input type="hidden" name="pwd" id="pwd" value="<?php echo $article->getPwd();?>" />
<?php endif;?>

<?php echo submit_image_tag('submit.png',array('id'=>
		        'submit'));?><noscript><span style="color:red"><strong>requires javascript to be senabled</strong></span></noscript></td>
		    <tr>
		  </table>
		  <input type="hidden" name="id" value="<?php echo $articleid?>"/>
		</form>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js?uid=902227" charset="utf-8"></script>
