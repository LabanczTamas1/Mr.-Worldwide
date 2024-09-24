    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar" style="display: flex; align-items: center;">
    <a class="navbar-brand" href="/">
        <img src="\files\img\ui_icons\icons8-hamburger-menu-50.png" style="width: 25px; height:25px;">
    </a>
    <h1 style="margin: 0 20px;">Mr. Worldwide</h1>
    <a class="navbar-brand" href="/">
        <img src="\files\img\ui_icons\icons8-account-26.png" style="width: 25px; height:25px;">
    </a>
</div>

                <form id="navSearchForm" class="form-inline d-flex" action="/search" method="GET">
                    <input class="form-control mr-sm-2" type="search" aria-label="Search" placeholder="Keresés..." name="q" <?php if (isset($_GET['q'])) echo 'value="' . $_GET['q'] . '"'; ?>>
                    <a href="#" class="search material-icons" onclick="document.getElementById('navSearchForm').submit();" name="search">search</a>
                </form>

                <b>Poszt</b>
                    <ul style="list-style-type:none; padding-left: 20px;">
                        <li>
                            <a class="nav-link cta" href="/Userhandler/register">
                                Poszt feltöltése
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../Userhandler/login">
                                Poszt módosítása
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../Userhandler/login">
                                Poszt törlése
                            </a>
                        </li>
                    </ul>
                </li>

                    <b>Fiók</b>
                    <ul style="list-style-type:none; padding-left: 20px;">
                        <li>
                            <a class="nav-link cta" href="/Userhandler/register">
                                Profil
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../Userhandler/login">
                                Bejelentkezés
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../Userhandler/login">
                                Fiók műveletek
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="../Userhandler/login">
                                Kijelentkezés
                            </a>
                        </li>
                    </ul>
                </li>

                        
            </div>

            <div>
                About
                Terms and Policy
                <h5>C Mr. Worldwide Inc. 2024</h5>
            </div>

        </div>
    </nav>