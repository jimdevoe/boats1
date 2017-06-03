<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="modules form large-9 medium-8 columns content">
    <?= $this->Form->create($module) ?>
    <fieldset>
        <legend><?= __('Add Module') ?></legend>
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
