<!-- File: src/Template/Users/login.ctp -->
	  <?php $this->log('form: login - begin', 'debug'); ?>

	<div class="users form">
	<?= $this->Flash->render('auth') ?>
	<?= $this->Form->create('login',['type' => 'post', 'url' => ['action' => 'login' ]]) ?>
		<fieldset>
			<legend><?= __('Please enter your username and password') ?></legend>
			<?= $this->Form->input('username') ?>
			<?= $this->Form->input('password') ?>
		</fieldset>
	<?= $this->Form->button(__('Login')); ?>
	<?= $this->Form->end() ?>
	</div>

<?php $this->log('form: login - end', 'debug');?>
