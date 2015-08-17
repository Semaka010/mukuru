<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Exchange Rates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="exchangeRates form large-10 medium-9 columns">
    <?= $this->Form->create($exchangeRate) ?>
    <fieldset>
        <legend><?= __('Add Exchange Rate') ?></legend>
        <?php
            echo $this->Form->input('currency_id', ['options' => $currencies, 'empty' => true]);
            echo $this->Form->input('date_time');
            echo $this->Form->input('rate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
