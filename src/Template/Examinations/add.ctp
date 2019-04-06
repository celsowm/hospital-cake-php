<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examination $examination
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Examinations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinations form large-9 medium-8 columns content">
    <?= $this->Form->create($examination) ?>
    <fieldset>
        <legend><?= __('Add Examination') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('appointment_id', ['options' => $appointments]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
