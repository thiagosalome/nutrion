<?php
require "app/models/paciente/pacienteDAO.php";
require "app/models/alimento/alimentoDAO.php";

$pacienteDAO = new pacienteDAO();
$totalPaciente = count($pacienteDAO->getAll($_SESSION["id_nutricionista"]));
$alimentoDAO = new alimentoDAO();
$totalAlimento = count($alimentoDAO->getAll($_SESSION["id_nutricionista"]));
?>
<div class="statistics-item">
    <div class="statistics-item-image-blue">
        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/patient_icon.png" alt="Pacientes" title="Pacientes" class="person-blue">
    </div>
    <div class="statistics-item-description">
        <span><?= $totalPaciente ?></span>
        <p>Pacientes</p>
    </div>
</div>
<div class="statistics-item">
    <div class="statistics-item-image-agua">
        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/aliments_icon.png" alt="Alimentos" title="Alimentos" class="person-blue">
    </div>
    <div class="statistics-item-description">
        <span><?= $totalAlimento ?></span>
        <p>Alimentos</p>
    </div>
</div>
<div class="statistics-item">
    <div class="statistics-item-image-green">
        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/diets_icon.png" alt="Dietas" title="Dietas" class="person-blue">
    </div>
    <div class="statistics-item-description">
        <span>32</span>
        <p>Dietas</p>
    </div>
</div>