    <?= $this->Form->create($source) ?>
    <fieldset>
        <legend><?= __('Edit Source') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('description');
            echo $this->Form->input('url');
            echo $this->Form->input('state');
            echo $this->Form->input('boats._ids', ['options' => $boats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
