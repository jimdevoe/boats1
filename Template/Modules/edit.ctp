<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $module->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="modules form large-9 medium-8 columns content">
    <?= $this->Form->create($module) ?>
    <fieldset>
        <legend><?= __('Edit Module') ?></legend>
        <?php
            echo $this->Form->input('module_name');
            echo $this->Form->input('section_name');
            echo $this->Form->input('item_name');
            echo $this->Form->input('description');
            echo $this->Form->input('wording');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
