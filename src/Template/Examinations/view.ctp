<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examination $examination
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examination'), ['action' => 'edit', $examination->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examination'), ['action' => 'delete', $examination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examination->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examinations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examination'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examinations view large-9 medium-8 columns content">
    <h3><?= h($examination->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($examination->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Appointment') ?></th>
            <td><?= $examination->has('appointment') ? $this->Html->link($examination->appointment->id, ['controller' => 'Appointments', 'action' => 'view', $examination->appointment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examination->id) ?></td>
        </tr>
    </table>
</div>
