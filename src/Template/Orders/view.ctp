<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?> </li>
    </ul>
</div>-->
<div class="orders view large-10 medium-9 columns">
    <h2><?= h($order->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($order->email) ?></p>
            <h6 class="subheader"><?= __('Currency') ?></h6>
            <p><?= $order->has('currency') ? $this->Html->link($order->currency->name, ['controller' => 'Currencies', 'action' => 'view', $order->currency->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($order->id) ?></p>
            <h6 class="subheader"><?= __('Exchange Rate') ?></h6>
            <p><?= $this->Number->format($order->exchange_rate) ?></p>
            <h6 class="subheader"><?= __('Amount Requsted') ?></h6>
            <p><?= $this->Number->format($order->amount_requsted) ?></p>
            <h6 class="subheader"><?= __('Amount Paid') ?></h6>
            <p><?= $this->Number->format($order->amount_paid) ?></p>
            <h6 class="subheader"><?= __('Surcharge Amount') ?></h6>
            <p><?= $this->Number->format($order->surcharge_amount) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($order->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($order->modified) ?></p>
        </div>
    </div>
</div>
