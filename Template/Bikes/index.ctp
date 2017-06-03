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
            <?php foreach ($bikes as $bike): ?>
            <tr>
                <td><?= h($bike->name) ?></td>
                <td><?= h($bike->town) ?></td>
                <td><?= h($bike->state) ?></td>
				<td><?= h($bike->created) ?></td>
                <td><?= h($bike->revised) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bike->id]) ?>
                    <?php if($user) { ?>
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $bike->id]);?> 
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bike->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bike->id)]) ?>
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