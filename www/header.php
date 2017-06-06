<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.ico">

    <title>Matt Koskela</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php wp_head();?>
  </head>

  <body>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-4637415-8', 'mattkoskela.com');
      ga('send', 'pageview');
    </script>

    <div class="container">

       <div class="row hidden-xs">
           <div class="logo">
               <a href="/"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png"></a>
           </div>
       </div>
    
       <div class="row visible-xs">
           <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="background: #FFFFFF; border-bottom: none;">
               <div class="container">
                   <div class="navbar-header">
                       <div class="row">
                           <div class="col-xs-10">
                               <a href="/"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png" style="width: 100%; padding: 2px;"></a>
                           </div>
                           <div class="col-xs-2">
                               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="border-color: #666;">
                                   <span class="sr-only">Toggle navigation</span>
                                   <span class="icon-bar" style="background: #666;"></span>
                                   <span class="icon-bar" style="background: #666;"></span>
                                   <span class="icon-bar" style="background: #666;"></span>
                               </button>
                           </div>
                       </div>
                   </div>
                   <!-- Collect the nav links, forms, and other content for toggling -->
                   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border: none;">
                       <ul class="nav navbar-nav">
                           <li><a href="/tech" style="color: #333;">Tech</a></li>
                           <!--<li><a href="/travel" style="color: #333;">Travel</a></li>-->
                           <!--<li><a href="/photo" style="color: #333;">Photography</a></li>-->
                           <li><a href="/library" style="color: #333;">Library</a></li>
                           <li><a href="/about" style="color: #333;">About</a></li>
                           <!--<li><a href="/contact" style="color: #333;">Contact</a></li>-->
                       </ul>
                   </div>
               </div>
           </nav>
       </div>
       
       <div class="row social hidden-xs">
           <div class="">
               <div class="col-sm-4"><a href="/tech" class="red">Tech</a></div>
               <!--<div class="col-sm-2"><a href="/travel" class="red" target="_blank">Travel</a></div>-->
               <!--<div class="col-sm-2"><a href="/photo" class="red" target="_blank">Photography</a></div>-->
               <div class="col-sm-4"><a href="/library" class="red">Library</a></div>
               <div class="col-sm-4"><a href="/about" class="red">About</a></div>
               <!--<div class="col-sm-2"><a href="/contact" class="red" target="_blank">Contact</a></div>-->
           </div>
       </div>
       
       <center><hr></center>