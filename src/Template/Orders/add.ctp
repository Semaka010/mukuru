<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['controller' => 'Currencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currencies', 'action' => 'add']) ?></li>
    </ul>
</div>-->
<div class="orders form large-10 medium-9 columns">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('currency_id', ['options' => $currencies]);
            echo $this->Form->input('exchange_rate');
            echo $this->Form->input('amount_requsted');
            echo $this->Form->input('amount_paid');
            echo $this->Form->input('surcharge_amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
