<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Exchange Rate'), ['action' => 'edit', $exchangeRate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exchange Rate'), ['action' => 'delete', $exchangeRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchangeRate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exchange Rates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exchange Rate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?> </li>
    </ul>
</div>-->
<div class="exchangeRates view large-10 medium-9 columns">
    <h2><?= h($exchangeRate->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Currency') ?></h6>
            <p><?= $exchangeRate->has('currency') ? $this->Html->link($exchangeRate->currency->name, ['controller' => 'Currencies', 'action' => 'view', $exchangeRate->currency->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($exchangeRate->id) ?></p>
            <h6 class="subheader"><?= __('Rate') ?></h6>
            <p><?= $this->Number->format($exchangeRate->rate) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Time') ?></h6>
            <p><?= h($exchangeRate->date_time) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($exchangeRate->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($exchangeRate->modified) ?></p>
        </div>
    </div>
</div>
