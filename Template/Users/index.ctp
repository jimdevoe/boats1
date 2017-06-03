    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td><?= h($u->username) ?></td>
                <td><?= h($u->role) ?></td>
                <td><?= h($u->created) ?></td>
                <td><?= h($u->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $u->id]);?>
					<?php if($user) { ?>
				
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $u->id]); ?>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $u->id], ['confirm' => __('Are you sure you want to delete # {0}?', $u->id)]); ?>
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
