<?php

echo "<table>";
echo $this->Html->tableHeaders(['Doctor','Patient','Appointment Date', 'Exams']);

foreach ($data as $doctor){

    echo "<tr>";
    echo "<td rowspan='".count($doctor->appointments)."'>".$doctor->name."</td>";
    foreach ($doctor->appointments as $key => $appointment) {
        
            if($key == !array_key_first($doctor->appointments)){
                echo "<tr>";
            }
            echo "<td>".$appointment->patient->name."</td>";
            echo "<td>".$appointment->date."</td>";
            $exams = array_column($appointment->examinations, 'name'); // Error !
            echo "<td>".implode('; ', $exams); //Error !
        echo "</tr>";
    }
    
}
