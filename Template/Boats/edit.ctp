    <?= $this->Form->create($boat) ?>
        <?php
			echo($this->Form->button('Submit'));
			echo '<br>';
			echo '<fieldset>';
			echo '<legend>'.__('Edit Boat').'</legend>'; 
            echo $this->Form->input('Id');
            echo $this->Form->input('name',['type' => 'text']);
            echo $this->Form->input('lat',['type' => 'float']);
            echo $this->Form->input('lon',['type' => 'float']);
            echo $this->Form->input('type',['type' => 'text', 'size'=>'13','maxlength'=>'13']);
            echo $this->Form->input('town',['type' => 'text']);
            echo $this->Form->input('state',['type' => 'text', 'size'=>'2', 'maxlength'=>'2']);
            echo $this->Form->input('zip',['type' => 'integer']);
            echo $this->Form->input('comment',['type'=>'text']);
            echo $this->Form->input('url',['type'=>'text']);
            echo $this->Form->input('description',['type'=>'text']);
            echo $this->Form->input('json',['type'=>'text']);
//            echo $this->Form->input('revised', ['empty' => true]);
            echo $this->Form->input('sources._ids', ['options' => $sources]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
