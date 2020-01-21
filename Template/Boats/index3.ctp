<?php
		$this->Html->script('http://maps.google.com/maps/api/js?key=[enter key here]',['block'=>true]); 
		$this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js',['block'=>true]); 
		$this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js',['block'=>true]); 
		$this->Html->script('test1',['block'=>true]); 
?>
<?= $this->start('sidebar');?>
		<div id="map"  style="width:100%; height:600px;"></div>
		<div id="latlon" style="font-size:15px"></div>
<?php $this->end(); ?>		



    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('town') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('revised') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boats as $boat): ?>
            <tr>
                <td><?= h($boat->name) ?></td>
                <td><?= h($boat->town) ?></td>
                <td><?= h($boat->state) ?></td>
				<td><?= h($boat->created) ?></td>
                <td><?= h($boat->revised) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $boat->id]) ?>
                    <?php if($user) { ?>
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $boat->id]);?> 
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $boat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boat->id)]) ?>
					<?php };?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
