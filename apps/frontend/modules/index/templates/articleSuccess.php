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
          foreach($tags as $tag){
            echo link_to2($tag->getTag(),'tag',array('sf_route' => 'tag','sf_subject'=>$tag));
            echo ',&nbsp;';}?> .
     
      
      <?php echo link_to($article->getCommentnb().' Comments','index/article?id='.$article->getId().'#comments');?> </li> </ul>

		
		<div class="clear"></div>
		<div class="entry">
			<?php $n=0; echo $article->getBody();?>
			
		</div>
		</div>
		<div style="text-align:right">
			<script>
				document.writeln("<div id=\"socialbookmark\"><a href=\"javascript:window.open(\'http:\/\/v.t.sina.com.cn\/share\/share.php?title=\'+encodeURIComponent(document.title.substring(0,76))+\'&url=\'+encodeURIComponent(location.href)+\'&rcontent=\',\'_blank\',\'scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes\'); void 0\" style=\"color:#000000;text-decoration:none;font-size:12px;font-weight:normal\"><SPAN style=\"PADDING-RIGHT: 5px; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 10px; CURSOR: pointer; PADDING-TOP: 5px\"><IMG alt=转发到新浪微博 src=\"http:\/\/t.sina.com.cn\/favicon.ico\" align=absMiddle border=0>&nbsp;转发到新浪微博<\/SPAN><\/a>");

document.writeln("<a href=\"javascript:window.open(\'http:\/\/www.kaixin001.com\/repaste\/share.php?rtitle=\'+encodeURIComponent(document.title.substring(0,76))+\'&rurl=\'+encodeURIComponent(location.href)+\'&rcontent=\',\'_blank\',\'scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes\'); void 0\" style=\"color:#000000;text-decoration:none;font-size:12px;font-weight:normal\"><SPAN style=\"PADDING-RIGHT: 5px; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 10px; CURSOR: pointer; PADDING-TOP: 5px\"><IMG alt=转帖到开心网 src=\"http:\/\/img1.kaixin001.com.cn\/i\/favicon.ico\" align=absMiddle border=0>&nbsp;转帖到开心网<\/SPAN><\/a>");

document.writeln("<a href=\"javascript:window.open(\'http://share.renren.com/share/buttonshare.do?title=\'+encodeURIComponent(document.title.substring(0,76))+\'&link=\'+encodeURIComponent(location.href)+\'&content=\',\'_blank\',\'scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes\'); void 0\" style=\"color:#000000;text-decoration:none;font-size:12px;font-weight:normal\"><SPAN style=\"PADDING-RIGHT: 5px; PADDING-LEFT: 5px; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; MARGIN-LEFT: 10px; CURSOR: pointer; PADDING-TOP: 5px\"><IMG alt=转帖到人人网 src=\"http:\/\/s.xnimg.cn\/favicon-rr.ico\" align=absMiddle border=0>&nbsp;转帖到人人网<\/SPAN><\/a><\/div>");


			</script>
		</div>
		<div class="clear"></div>
		<hr/>
		<h3 id="comments"><?php echo $article->getCommentNb();?> Comments</h3><br/>
		
		<!--评论内容开始 -->
		<ol class="commentlist">
      <?php foreach($comments as $comment):?>
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
		      <td colspan="2" align="center"><?php echo submit_image_tag('submit.png',array('id'=>
		        'submit'));?><noscript><span style="color:red"><strong>requires javascript to be senabled</strong></span></noscript></td>
		    <tr>
		  </table>
		  <input type="hidden" name="id" value="<?php echo $articleid?>"/>
		</form>
