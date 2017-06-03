    <?= $this->Form->create($source) ?>
    <fieldset>
        <legend><?= __('Add Source') ?></legend>
        <?php
            echo $this->Form->text('name');
            echo $this->Form->text('type', array('default'=>$type));
            echo $this->Form->input('description');
            echo $this->Form->input('url');
            echo $this->Form->input('state');
            echo $this->Form->input('boats._ids', ['options' => $boats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
