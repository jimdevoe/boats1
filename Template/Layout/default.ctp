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
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-3 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title')?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
			<ul class="side-nav">
				<li><?= $this->Html->link(__('Map'), 	['controller' => 'Boats', 	'action' => 'index2']) ?> </li>
				<li><?= $this->Html->link(__('Boats'), 	['controller' => 'Boats', 	'action' => 'index', 'type'=> 'boat']) ?> </li>
				<li><?= $this->Html->link(__('Bikes'), 	['controller' => 'Boats', 	'action' => 'index', 'type' => 'bike']) ?> </li>
				<li><?= $this->Html->link(__('Sources'),['controller' => 'Sources', 'action' => 'index']) ?> </li>
				<li><?= $this->Html->link(__('Users'), 	['controller' => 'Users', 	'action' => 'index']) ?> </li>
				<?php if($user) { ?>
					<li><?= $this->Html->link(__('Add'), ['action' => 'add']) ?> </li>
					<li><?= $this->Html->link(__('Logout '.$user), ['controller' => 'Users', 'action' => 'logout']) ?></li>
		        <?php };?>
				<?php if(!$user) { ?>
					<li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
				<?php };?>
			</ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
		<div class="large-3 medium-3 columns" >
        	<?= $this->fetch('sidebar') ?>
		</div>
		<div class="users form large-9 medium-9 columns content">
        	<?= $this->fetch('content') ?>
		</div>
    </div>
    <footer>
    </footer>
</body>
</html>
