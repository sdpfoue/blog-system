<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta name="verify-v1" content="eU1BPXFT57fy0qhELhnATRW7JGXQcxdObJUQH365xhs=" >
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php //include_title() ?>
    <?php use_stylesheet('style'); ?>
    <?php use_stylesheet('highlight'); ?>
    <?php $module=$sf_request->getParameter('module');
          $action=$sf_request->getParameter('action');  ?>
    <title><?php include_slot('title') ?>Make A Difference</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--<link rel="alternate" type="application/atom+xml" title="Articles"
  href="<?php //echo url_for('feed/index', true) ?>" />-->
	<link rel="alternate" type="application/rss+xml" title="Articles"
  href="http://feeds.feedburner.com/mkad" />
    <link rel="alternate" type="application/atom+xml" title="Comments"
      href="<?php echo url_for('@comment_feed', true) ?>" />
    <?php include_slot('header'); ?>
    
  </head>

 <body>
    <div id="bgcontain"> 
        <div id="header">
            <h1><?php echo link_to('Make '.image_tag('a.jpg').' Difference','index/index');?></h1>
            <div class="clear"></div>
            <span>Be the change you want to see in the world</span>
        </div> 

        <div id="menu">
		

<ul>
<li class="<?php if($module=='index'&&$action=='index')echo 'current_page_item'?>"><?php echo link_to('Home','index/index')?></li>
<li class="<?php if($module=='index'&&$action=='about')echo 'current_page_item'?>"><a href="<?php echo url_for('index/about');?>" title="About">About</a></li>

<li class="<?php if($module=='index'&&$action=='douban')echo 'current_page_item'?>"><a href="<?php echo url_for('index/douban');?>" title="Douban">Douban</a></li>


<!-- <li class="<?php if($module=='index'&&$action=='timetable')echo 'current_page_item'?>"><a href="<?php echo url_for('index/timetable');?>" title="Timetable">Timetable</a></li>-->


<li id="pattern"></li>
</ul>

        </div>
        <div class="contain">
            <div id="content" class="narrowcolumn">
                
	          <?php echo $sf_data->getRaw('sf_content'); ?>
            </div>


<div id="sidebar">
<?php if (!include_slot('sidebar')): ?>
	<ul>
	  <li>
	  <li>
	  <g:plusone size="small" annotation="inline"></g:plusone>
	    <h2>Subscribe</h2>
	    <ul>
	      <li class="rss"><!--<?php //echo link_to('Posts','feed/index');?>-->
			<a href="http://feeds.feedburner.com/mkad">Posts</a></li>
	      <li class="rss"><?php echo link_to('Comments','feed/comment');?></li>
	      
	    </ul>
	  </li>
	  <li>
	    <h2>Recent Posts</h2>
	    <?php include_component('index','recentpost');?>
	  </li>
	
			<li>
    <h2>Tags</h2>
      <?php include_component('tag','sidebar');?>
   </li>
   <li>
    <h2>Links</h2>
      <ul>
        <li><a href="http://tech.tjs.im" target="_blank" >我的技术笔记</a>
        <li><a href="http://log.dongsheng.org/" target="_blank">Dongsheng</a></li>
        <li><a href="http://4everyoung.cn/blog/" target="_blank">4everyoung</a></li>
        <li><a href="http://terrywang.net/" target="_blank" title="terry's blog">KISS</a></li>
      </ul>    
   </li>
    	<li>    
    <h2>Archives</h2>
      <?php include_component('archive','archive');?>
   </li>
   
<!--
   <li>
	<h2>Latitude</h2>
		<iframe src="http://www.google.com/latitude/apps/badge/api?user=-2973367468695175468&type=iframe&maptype=roadmap&z=7" width="200" height="300" frameborder="0"></iframe>
   </li>
-->
   <!--
   <li>
	    <h2>Thanks to Wikipedia</h2>
	      <a target="_blank" href="http://wikimediafoundation.org/wiki/Support_Wikipedia/en"><img style="margin-top:5px;" border="0" alt="Wikipedia Affiliate Button" src="http://wikimediafoundation.org/w/extensions/skins/Donate/images/banners/Banner_125x125_0001_B.jpg" /></a>
	  </li>-->
   <script type="text/javascript"><!--
google_ad_client = "ca-pub-5039372918023729";
/* blog */
google_ad_slot = "9172111164";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	</ul>
<?php endif; ?>
</div>

	</div>
       
		<div id="footer">
			<p>
				Powered by <a href="#" title="It's Jishi's Website.">Jishi</a> and <a href="http://www.symfony-project.org/" rel="external" target="_blank">Symfony</a>. Theme designed by <a href="http://www.hoofei.com/" target="_blank">Hoofei</a></p>

		</div>

	</div>

</body>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8816834-3");
pageTracker._trackPageview();
} catch(err) {}</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</html>
