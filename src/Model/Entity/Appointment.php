<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Examination[] $examinations
 */
class Appointment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'doctor_id' => true,
        'patient_id' => true,
        'date' => true,
        'doctor' => true,
        'patient' => true,
        'examinations' => true
    ];
}
