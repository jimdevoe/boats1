<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modules index large-9 medium-8 columns content">
    <h3><?= __('Modules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('module_name') ?></th>
                <th><?= $this->Paginator->sort('section_name') ?></th>
                <th><?= $this->Paginator->sort('item_name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modules as $module): ?>
            <tr>
                <td><?= $this->Number->format($module->id) ?></td>
                <td><?= h($module->module_name) ?></td>
                <td><?= h($module->section_name) ?></td>
                <td><?= h($module->item_name) ?></td>
                <td><?= h($module->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $module->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $module->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?>
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
</div>
