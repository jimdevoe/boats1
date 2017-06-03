    <?= $this->Form->create($boat) ?>
    <fieldset>
        <legend><?= __('Add '.$type) ?></legend>
        <?php
//            echo $this->Form->input('wp_id');
            echo $this->Form->input('name');
            echo $this->Form->input('lat');
            echo $this->Form->input('lon');
            echo $this->Form->input('type', array('default'=>$type));
            echo $this->Form->input('town');
            echo $this->Form->input('state');
            echo $this->Form->input('zip');
            echo $this->Form->input('source');
            echo $this->Form->input('source_id');
            echo $this->Form->input('comment');
            echo $this->Form->input('url');
            echo $this->Form->input('description');
            echo $this->Form->input('json');
 //           echo $this->Form->input('revised', ['empty' => true]);
            echo $this->Form->input('sources._ids', ['options' => $sources]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
