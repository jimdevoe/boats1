    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sources as $source): ?>
            <tr>
                <td><?= h($source->name) ?></td>
				<td><?= h($source->type) ?></td>
				<td><?= h($source->created) ?></td>
                <td><?= h($source->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $source->id]) ?>
                    <?php if($user) { ?>
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $source->id]) ?>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $source->id], ['confirm' => __('Are you sure you want to delete # {0}?', $source->id)]) ?>
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
