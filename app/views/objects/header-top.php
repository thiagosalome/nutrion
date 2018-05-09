<div class="header-top">
    <div class="header-perfil js-header-perfil">
        <p class="perfil-name"><?php echo $_SESSION["nome_nutricionista"] ?></p>
        <img class="perfil-arrow" src="<?php echo HOME_URI; ?>app/public/images/dashboard/icon_arrow.png" alt="" title="">
    </div>
    <div class="header-search">
        <img class="search-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/icon_search.png" alt="" title="">
        <input class="search-input" type="text" name="search" id="">
    </div>
    <div class="header-options js-header-options">
        <ul>
            <li><button data-toggle="modal" data-target="#modal-update">Editar Conta</button></li>
            <li><button data-toggle="modal" data-target="#modal-delete">Deletar Conta</button></li>
            <li><a href="<?php echo HOME_URI; ?>nutricionista/signOut">Sair</a></li>
        </ul>
    </div>
    <div class="header-menu js-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>