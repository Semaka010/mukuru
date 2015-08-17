<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exchange Rates'), ['controller' => 'ExchangeRates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exchange Rate'), ['controller' => 'ExchangeRates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</div>-->
<div class="currencies view large-10 medium-9 columns">
    <h2><?= h($currency->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($currency->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($currency->description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($currency->id) ?></p>
            <h6 class="subheader"><?= __('Surcharge') ?></h6>
            <p><?= $this->Number->format($currency->surcharge) ?></p>
            <h6 class="subheader"><?= __('Discount') ?></h6>
            <p><?= $this->Number->format($currency->discount) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($currency->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($currency->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Orders') ?></h4>
    <?php if (!empty($currency->orders)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Currency Id') ?></th>
            <th><?= __('Exchange Rate') ?></th>
            <th><?= __('Amount Requsted') ?></th>
            <th><?= __('Amount Paid') ?></th>
            <th><?= __('Surcharge Amount') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($currency->orders as $orders): ?>
        <tr>
            <td><?= h($orders->id) ?></td>
            <td><?= h($orders->email) ?></td>
            <td><?= h($orders->currency_id) ?></td>
            <td><?= h($orders->exchange_rate) ?></td>
            <td><?= h($orders->amount_requsted) ?></td>
            <td><?= h($orders->amount_paid) ?></td>
            <td><?= h($orders->surcharge_amount) ?></td>
            <td><?= h($orders->created) ?></td>
            <td><?= h($orders->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>

                <!--<?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>-->

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Exchange Rates') ?></h4>
    <?php if (!empty($currency->exchange_rates)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Currency Id') ?></th>
            <th><?= __('Date Time') ?></th>
            <th><?= __('Rate') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($currency->exchange_rates as $exchangeRates): ?>
        <tr>
            <td><?= h($exchangeRates->id) ?></td>
            <td><?= h($exchangeRates->currency_id) ?></td>
            <td><?= h($exchangeRates->date_time) ?></td>
            <td><?= h($exchangeRates->rate) ?></td>
            <td><?= h($exchangeRates->created) ?></td>
            <td><?= h($exchangeRates->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ExchangeRates', 'action' => 'view', $exchangeRates->id]) ?>

                <!--<?= $this->Html->link(__('Edit'), ['controller' => 'ExchangeRates', 'action' => 'edit', $exchangeRates->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExchangeRates', 'action' => 'delete', $exchangeRates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchangeRates->id)]) ?>-->

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>

