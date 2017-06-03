    <div class="row">
        <h4><?= __('ID') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->id)); ?>
    </div>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->type)); ?>
    </div>
    <div class="row">
        <h4><?= __('Town') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->town)); ?>
    </div>
    <div class="row">
        <h4><?= __('State') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->state)); ?>
    </div>
    <div class="row">
        <h4><?= __('Zip') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->zip)); ?>
    </div>
    <div class="row">
        <h4><?= __('Source') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->source)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Json') ?></h4>
        <?= $this->Text->autoParagraph(h($boat->json)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sources') ?></h4>
        <?php if (!empty($boat->sources)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
            </tr>
            <?php foreach ($boat->sources as $sources): ?>
            <tr>
                <td><?= h($sources->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
