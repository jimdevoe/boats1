    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->type)); ?>
    </div>
    <div class="row">
        <h4><?= __('Town') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->town)); ?>
    </div>
    <div class="row">
        <h4><?= __('State') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->state)); ?>
    </div>
    <div class="row">
        <h4><?= __('Zip') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->zip)); ?>
    </div>
    <div class="row">
        <h4><?= __('Source') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->source)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Json') ?></h4>
        <?= $this->Text->autoParagraph(h($bike->json)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sources') ?></h4>
        <?php if (!empty($bike->sources)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
            </tr>
            <?php foreach ($bike->sources as $sources): ?>
            <tr>
                <td><?= h($sources->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
