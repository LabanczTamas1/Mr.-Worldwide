<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid" style="position: fixed; background-color: white;" style="margin-top:0px;">
        <div class="navbar" style="display: flex; align-items: center; padding-top: 22px; padding: 22px; width: 2000px;">
            <!-- Hamburger icon to toggle the sidebar -->
            <a href="#" class="navbar-brand" id="hamburger-menu" onclick="toggleSidebar()">
                <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 48px; height:48px;">
            </a>
            <div class="website-title" style="margin: 0 20px;font-size: 32px;">Mr. Worldwide</div>
        </div>

        <!-- Sidebar content, initially hidden -->
        <div id="sidebar" class="sidebar">

                <div class="navbar-top">
                    <a href="" class="navbar-brand" id="hamburger-menu" onclick="toggleSidebar()">
                        <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 48px; height:48px;">
                    </a>
                    <div class="website-title" style="margin: 0 20px;font-size: 32px;">Mr. Worldwide</div>
                    <a class="navbar-brand" href="/profile.php">
                        <img src="/files/img/ui_icons/icons8-account-26.png" style="width: 48px; height:48px;">
                    </a>
                </div>
                <div class="middle-segment">
                <form id="navSearchForm" class="form-inline d-flex" action="/search" method="GET">
                    <div class="search-container">
                        <input class="form-control" type="search" aria-label="Search" placeholder=" Keresés..." name="q" <?php if (isset($_GET['q'])) echo 'value="' . $_GET['q'] . '"'; ?>>
                        <i class="fa fa-search search-icon"></i>
                    </div>
                </form>
        <?php if(!App\Helper::isAuth()) :?>
            <div class="menu-section">
                <b style="padding-top:30px">Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/userhandler/login"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="18" height="18">
                        <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                    </svg>
                    Poszt feltöltése</a></li>
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
                <b  style="padding-top:30px">Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/posts/create"><i class="fa-solid fa-arrow-up"></i>Poszt feltöltése</a></li>
                    <li><a class="nav-link" href="../user/uploads">Posztjaim módosítása</a></li>
                    <li><a class="nav-link" href="../user/login">Posztjaim törlése</a></li>
                </ul>
            </div>
            <div class="menu-section">
                <b>Fiók</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/userhandler/register">Profil</a></li>
                    <li><a class="nav-link" href="/user/settings">Fiók műveletek</a></li>
                    <li><a class="nav-link" href="/userhandle/logout"><i class="fa-solid fa-xmark"></i>Kijelentkezés</a></li>
                </ul>
            </div>
            <?php endif?>
            <div class="navbar-bottom">
                <div class="link-segment">
                    <a>About</a>
                    <a>Terms and policy</a>
                </div>
                    <h4>Mr. Worldwide Inc. 2024</h4>
            </div>
        </div>
        </div>
    </div>
</nav>
