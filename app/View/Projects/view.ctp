<!DOCTYPE HTML>
<!--
	Directive by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Directive by HTML5 UP</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php
        echo $this->Html->css('style');
        echo $this->Html->css('skel');
        echo $this->Html->css('style-wide');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('materialize');

        echo $this->Html->script('skel.min');
        echo $this->Html->script('jquery-2.1.3.min');
        echo $this->Html->script('init2');

        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>


<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo" style="padding-left: 10px">Media</a>
        <ul id="nav-mobile" class="right side-nav">
            <li><?php echo $this->Html->link('不満スレ', array('controller' => 'categories', 'action' => 'index')) ?></li>
            <li><?php echo $this->Html->link('プロジェクト', array('controller' => 'projects', 'action' => 'index')) ?></li>
            <li><?php echo $this->Html->link('ユーザー情報', array('controller' => 'users', 'action' => 'index')) ?></li>
        </ul>

        <!-- Include this line below -->
        <a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
        <!-- End -->

    </div>
</nav>

<!-- Header -->
<div id="header">
    <span class="logo icon fa-paper-plane-o"></span>
    <h1><?php echo $project['Project']['name']; ?></h1>
    <p>
        このプロジェクトは <?php echo $project['User2']['username']; ?> の不満を解決するため<br />
        <?php echo $project['User']['username']; ?> が <?php echo $project['Project']['created']; ?> に立ち上げました。
    </p>
</div>

<!-- Main -->
<div id="main">
    <footer class="major container 75%" style="margin-top: -50px">
        <h3><?php echo $project['Project']['purpose']; ?></h3>
        <p style="padding-top: 15px;"><?php echo $project['Project']['message']; ?></p>
        <ul class="actions" style="padding-top: 15px;">
            <li><?php echo $this->Html->link('応援する', array('action' => 'favorite'), array('class' => 'button')); ?></li>
        </ul>
    </footer>
</div>

<!-- Footer -->
<div id="footer">
    <div class="container 75%">

        <header class="major last">
            <h4>質問やコメントがあれば下記に</h4>
        </header>

        <p>ここに個人情報が入ります</p>

        <ul class="icons" style="padding-top: 15px;">
            <li><a href="https://twitter.com/share" class="icon fa-twitter" data-lang="ja" data-count="none" data-dnt="true"></a></li>        </ul>

        <ul class="copyright">
            <li>&copy; <?php echo $project['Project']['name']; ?>. All rights reserved.</li><li>Author: Takahiro Ikeda</li>
        </ul>

    </div>
</div>
<script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    $(".button-collapse").sideNav();
</script>
</body>
</html>