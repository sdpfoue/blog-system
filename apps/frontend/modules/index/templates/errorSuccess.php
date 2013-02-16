<?php decorate_with(FALSE); ?> 

<?php slot('title')?>
  404 page not found - 
<?php end_slot();?>

  <head>
          <?php include_http_metas() ?>
              <?php include_metas() ?>
                  <?php //include_title() ?>
                      <?php use_stylesheet('style'); ?>
    <?php use_stylesheet('highlight'); ?>
<?php $module=$sf_request->getParameter('module');
$action=$sf_request->getParameter('action');  ?>
    <title><?php include_slot('title') ?>Make A Difference</title>
            <link rel="shortcut icon" href="http://tjsweb.info/favicon.ico" />
                <link rel="alternate" type="application/atom+xml" title="Articles"
                  href="<?php echo url_for('feed/index', true) ?>" />
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

<li class="<?php if($module=='index'&&$action=='share')echo 'current_page_item'?>"><a href="<?php echo url_for('index/share');?>" title="Share">Share</a></li>

<!-- <li class="<?php if($module=='index'&&$action=='timetable')echo 'current_page_item'?>"><a href="<?php echo url_for('index/timetable');?>" title="Timetable">Timetable</a></li>-->


<li id="pattern"></li>
</ul>
   </div>


<h2>Error 404 - Not Found</h2>
  <script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8"></script>

<div id="footer">
            <p>
                Powered by <a href="#" title="It's Jishi's Website.">Jishi</a> and <a href="http://www.symfony-project.org/" rel="external" target="_blank">Symfony</a>. Theme designed by <a href="http://www.hoofei.com/" target="_blank">Hoofei</a></p>

        </div>
<div style=""></div>

</body>
