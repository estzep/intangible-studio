<?php
$statusMsg = isset($_GET['status']) ? $_GET['status'] : '';
$statusType = isset($_GET['type']) ? $_GET['type'] : 'warning';
?>
<nav>
    <div class="nav-container container">
        <div class="content">
            <div class="top">
                <a href="<? echo $home_path; ?>" class="logo">
                    <img src="<? echo $path; ?>assets/img/brand/Intangible Assets-02.svg" alt="Intangible Studio Logo">
                </a>
                <ul>
                    <li>
                        <a href="<? echo $nav_path; ?>logos">Logofolio</a>
                    </li>
                    <li>
                        <a href="<? echo $nav_path; ?>proyectos">Proyectos</a>
                    </li>
                    <li>
                        <a href="<? echo $nav_path; ?>destacados">Proyectos Destacados</a>
                    </li>
                    <li>
                        <a href="../../" target="_blank">Visitar página principal</a>
                    </li>
                </ul>
                <?
                if (!empty($statusMsg)) {
                    ?>
                    <div class="alert alert-<? echo $statusType; ?> alert-dismissible fade show mt-5" role="alert">
                        <? echo $statusMsg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?
                }
                ?>
            </div>
            <form action="<? echo $path; ?>assets/data/logout.php" method="post" class="bottom">
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>