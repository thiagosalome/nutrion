<aside class="aside js-aside">
    <header class="aside-header">
        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/logo_menu.png" alt="" title="" class="header-logo">
    </header>
    <nav class="aside-nav">
        <ul>
            <li class="nav-dropdown js-item-menu" data-type="paciente">
                <div class="nav-item js-nav-item">
                    <img class="item-icon-info" src="<?php echo HOME_URI; ?>app/public/images/dashboard/patient_icon.png" alt="">
                    <p class="item-description">Pacientes</p>
                    <img class="item-icon-arrow" src="<?php echo HOME_URI; ?>app/public/images/dashboard/seta_icon.png" alt="">
                </div>
                <ul class="nav-submenu">
                    <li>
                        <a href="<?php echo HOME_URI; ?>nutricionista/paciente/consultar" title="Consultar Pacientes">
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/view_icon.png" alt="Consultar Pacientes" title="Consultar Pacientes">
                            <p class="submenu-description">Consultar Pacientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo HOME_URI; ?>nutricionista/paciente/adicionar" title="Adicionar Paciente">
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/add_icon.png" alt="Adicionar Paciente" title="Adicionar Paciente">
                            <p class="submenu-description">Adicionar Paciente</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown js-item-menu" data-type="alimento">
                <div class="nav-item js-nav-item">
                    <img class="item-icon-info" src="<?php echo HOME_URI; ?>app/public/images/dashboard/aliments_icon.png" alt="">
                    <p class="item-description">Alimentos</p>
                    <img class="item-icon-arrow" src="<?php echo HOME_URI; ?>app/public/images/dashboard/seta_icon.png" alt="">
                </div>
                <ul class="nav-submenu">
                    <li>
                        <a href="#" title="Consultar Alimentos">
                            <a href="<?php echo HOME_URI; ?>nutricionista/paciente/alimentos" title="Consultar Alimentos"> 
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/view_icon.png" alt="Consultar Alimentos" title="Consultar Alimentos">
                            <p class="submenu-description">Consultar Alimentos</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Adicionar Alimento">
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/add_icon.png" alt="Adicionar Alimento" title="Adicionar Alimento">
                            <p class="submenu-description">Adicionar Alimento</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown js-item-menu" data-type="dieta">
                <div class="nav-item js-nav-item">
                    <img class="item-icon-info" src="<?php echo HOME_URI; ?>app/public/images/dashboard/diets_icon.png" alt="">
                    <p class="item-description">Dietas</p>
                    <img class="item-icon-arrow" src="<?php echo HOME_URI; ?>app/public/images/dashboard/seta_icon.png" alt="">
                </div>
                <ul class="nav-submenu">
                    <li>
                        <a href="#" title="Consultar Dietas">
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/view_icon.png" alt="Consultar Dietas" title="Consultar Dietas">
                            <p class="submenu-description">Consultar Dietas</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Adicionar Dieta">
                            <img class="submenu-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/add_icon.png" alt="Adicionar Dieta" title="Adicionar Dieta">
                            <p class="submenu-description">Adicionar Dieta</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="js-item-menu" data-type="relatorios">
                <div class="nav-item">
                    <a href="<?php echo HOME_URI?>nutricionista/relatorios/gerar" title="Relatórios">
                        <img class="item-icon-info" src="<?php echo HOME_URI; ?>app/public/images/dashboard/report_icon.png" alt="Relatórios" title="Relatórios">
                        <p class="item-description">Relatórios</p>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <footer class="rodape-menu">
        <p>&copy; Copyright - Todos os direitos reservados</p>
    </footer>
</aside>