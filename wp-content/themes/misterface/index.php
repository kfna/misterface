<?php get_header(); ?>

<div id="stage">
  <div id="layers">
    <div id="home" class="isLayer"><?php include("_inc/inc.home.php"); ?></div>
    <div id="about" class="isLayer"><?php include("_inc/inc.about.php"); ?></div>
    <div id="people" class="isLayer"><?php include("_inc/inc.people.php"); ?></div>
    <div id="clients" class="isLayer"><?php include("_inc/inc.clients.php"); ?></div>
    <div id="work" class="isLayer"><?php include("_inc/inc.works.php"); ?></div>
    <div id="archive" class="isLayer"><?php include("_inc/inc.archives.php"); ?></div>
    <div id="news" class="isLayer"><?php include("_inc/inc.news.php"); ?></div>
    <div id="contact" class="isLayer"><?php include("_inc/inc.contact.php"); ?></div>
    
    <br class="clear" />
  </div>
</div>

<?php get_footer(); ?>