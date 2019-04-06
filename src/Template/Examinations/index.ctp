<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examination[]|\Cake\Collection\CollectionInterface $examinations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examination'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Appointments'), ['controller' => 'Appointments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examinations index large-9 medium-8 columns content">
    <h3><?= __('Examinations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appointment_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examinations as $examination): ?>
            <tr>
                <td><?= $this->Number->format($examination->id) ?></td>
                <td><?= h($examination->name) ?></td>
                <td><?= $examination->has('appointment') ? $this->Html->link($examination->appointment->id, ['controller' => 'Appointments', 'action' => 'view', $examination->appointment->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examination->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examination->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examination->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
