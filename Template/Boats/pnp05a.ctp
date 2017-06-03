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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?php //= $this->fetch('css') ?>
<!-- css -->
	<?php //echo $this->Html->css('http://code.jquery.com/ui/1.12.1/themes/black-tie/jquery-ui.css'); ?>
	<?php echo $this->Html->css('http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'); ?>
	<?php echo $this->Html->css('tinyfluidgrid'); ?>
	<?php echo $this->Html->css('pnp05'); ?>
    <?php //= $this->fetch('script') ?>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- js -->
	<?php echo $this->Html->script('http://code.jquery.com/jquery-1.12.0.js'); ?>
	<?php echo $this->Html->script('http://code.jquery.com/ui/1.12.1/jquery-ui.js'); ?>
	<?php echo $this->Html->script('//maps.google.com/maps/api/js?language=en&v=3&libraries=geometry'); ?>
	<?php echo $this->Html->script('jquery.cookie'); ?>
	<?php echo $this->Html->script('//www.google.com/jsapi'); ?>
	<?php echo $this->Html->script('pnp05'); ?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="grid_20 header" align="center">
			<div class="page-header" id="menu-toggle">
				<a class="navbar-brand" href="#">Park and Get Out</a>
			</div>
	</div>

	<div class="grid_20" align="center">
		<div class="grid_4 alpha" align="left" style="margin-left: 15px">
			<?= $this->fetch('sidebar') ?>
		</div>
		<div class="grid_1">&nbsp</div>
		<div class="grid_6">
			<?= $this->fetch('map1') ?>
		</div>
		<div class="grid_1">&nbsp</div>
		<div class="grid_8 omega">
			<?= $this->fetch('map2') ?>
			<footer>
				<?= $this->fetch('footer') ?>
			</footer>
		</div>
	</div>
</body>
</html>
