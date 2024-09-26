<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <div class="navbar" style="display: flex; align-items: center;">
            <!-- Hamburger icon to toggle the sidebar -->
            <a href="#" class="navbar-brand" id="hamburger-menu" onclick="toggleSidebar()">
                <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 25px; height:25px;">
            </a>
            <h1 style="margin: 0 20px;">Mr. Worldwide</h1>
        </div>

        <!-- Sidebar content, initially hidden -->
        <div id="sidebar" class="sidebar">
            <div>
                <div class="navbar-top">
                    <a href="" class="navbar-brand" id="hamburger-menu" onclick="toggleSidebar()">
                        <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 25px; height:25px;">
                    </a>
                    <h1 style="margin: 0 20px;">Mr. Worldwide</h1>
                    <a class="navbar-brand" href="/">
                        <img src="/files/img/ui_icons/icons8-account-26.png" style="width: 25px; height:25px;">
                    </a>
                </div>
                <form id="navSearchForm" class="form-inline d-flex" action="/search" method="GET">
                    <input class="form-control mr-sm-2" type="search" aria-label="Search" placeholder="Keresés..." name="q" <?php if (isset($_GET['q'])) echo 'value="' . $_GET['q'] . '"'; ?>>
                    <a href="" class="search material-icons" onclick="document.getElementById('navSearchForm').submit();" name="search">search</a>
                </form>
            </div>
        <?php if(!App\Helper::isAuth()) :?>
            <div class="menu-section">
                <b>Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/userhandler/login">Poszt feltöltése</a></li>
                    <li><a class="nav-link" href="../userhandler/login">Poszt módosítása</a></li>
                    <li><a class="nav-link" href="../userhandler/login">Poszt törlése</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <b>Fiók</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link" href="/userhandle/login">Bejelentkezés</a></li>
                    <li><a class="nav-link cta" href="/userhandler/register">Regisztráció</a></li>
                </ul>
            </div>
        <?php else:?>
            <div class="menu-section">
                <b>Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/posts/create">Poszt feltöltése</a></li>
                    <li><a class="nav-link" href="../user/uploads">Posztjaim módosítása</a></li>
                    <li><a class="nav-link" href="../user/login">Posztjaim törlése</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <b>Fiók</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/userhandler/register">Profil</a></li>
                    <li><a class="nav-link" href="/user/settings">Fiók műveletek</a></li>
                    <li><a class="nav-link" href="/userhandle/logout">Kijelentkezés</a></li>
                </ul>
            </div>
            <?php endif?>
        </div>
    </div>
</nav>
