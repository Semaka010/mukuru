<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $currency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exchange Rates'), ['controller' => 'ExchangeRates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exchange Rate'), ['controller' => 'ExchangeRates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</div>-->
<div class="currencies form large-10 medium-9 columns">
    <?= $this->Form->create($currency) ?>
    <fieldset>
        <legend><?= __('Edit Currency') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('surcharge');
            echo $this->Form->input('discount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
