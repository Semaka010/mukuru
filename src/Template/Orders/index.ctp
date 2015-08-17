
<div class="orders index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('currency_id') ?></th>
            <th><?= $this->Paginator->sort('exchange_rate') ?></th>
            <th><?= $this->Paginator->sort('amount_requsted') ?></th>
            <th><?= $this->Paginator->sort('amount_paid') ?></th>
            <th><?= $this->Paginator->sort('surcharge_amount') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $this->Number->format($order->id) ?></td>
            <td><?= h($order->email) ?></td>
            <td>
                <?= $order->has('currency') ? $this->Html->link($order->currency->name, ['controller' => 'Currencies', 'action' => 'view', $order->currency->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($order->exchange_rate) ?></td>
            <td><?= $this->Number->format($order->amount_requsted) ?></td>
            <td><?= $this->Number->format($order->amount_paid) ?></td>
            <td><?= $this->Number->format($order->surcharge_amount) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>-->
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
