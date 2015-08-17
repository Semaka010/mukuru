<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Exchange Rate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
    </ul>
</div>-->
<div class="exchangeRates index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('currency_id') ?></th>
            <th><?= $this->Paginator->sort('date_time') ?></th>
            <th><?= $this->Paginator->sort('rate') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($exchangeRates as $exchangeRate): ?>
        <tr>
            <td><?= $this->Number->format($exchangeRate->id) ?></td>
            <td>
                <?= $exchangeRate->has('currency') ? $this->Html->link($exchangeRate->currency->name, ['controller' => 'Currencies', 'action' => 'view', $exchangeRate->currency->id]) : '' ?>
            </td>
            <td><?= h($exchangeRate->date_time) ?></td>
            <td><?= $this->Number->format($exchangeRate->rate) ?></td>
            <td><?= h($exchangeRate->created) ?></td>
            <td><?= h($exchangeRate->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $exchangeRate->id]) ?>
                <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $exchangeRate->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exchangeRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchangeRate->id)]) ?>-->
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
