    <h3><?= h($source->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($source->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($source->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($source->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($source->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($source->url)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Boats') ?></h4>
        <?php if (!empty($source->boats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
            </tr>
            <?php foreach ($source->boats as $boats): ?>
            <tr>
                <td><?= h($boats->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
