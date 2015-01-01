<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('materialize');
		echo $this->Html->script('jquery-2.1.3.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="header">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo" style="padding-left: 10px">Media</a>
			<ul id="nav-mobile" class="right side-nav">
				<li><a href="sass.html">Sass</a></li>
				<li><a href="components.html">Components</a></li>
				<li><a href="javascript.html">JavaScript</a></li>
			</ul>

			<!-- Include this line below -->
			<a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
			<!-- End -->

		</div>
	</nav>
</div>
<div class="container" style="padding-top: 32px">
	<?php echo $this->Session->flash(); ?>
	<div class="col s12">
		<?php echo $this->fetch('content'); ?>
	</div>
</div>
<div id="footer">
</div>
<?php echo $this->Html->script('materialize'); ?>
<script type="text/javascript">
	$(".button-collapse").sideNav();
</script>
</body>
</html>