<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<nav class="navigation-n">
    <div style="position: fixed; top: 0; left: 0; width: 100%; background-color: white; z-index: 1000;">
        <div class="navbar" style="padding-top: 22px; padding: 22px; width: 100%;">
            <!-- Hamburger icon to toggle the sidebar -->
            <div style="display: flex;">
            <a href="#" class="navbar-branding" id="hamburger-menu" onclick="toggleSidebar()">
                <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 48px; height:48px;">
            </a>
            <div class="website-title" style="margin: 0 20px;font-size: 32px;">Mr. Worldwide</div>
            </div>
            <?php if(!App\Helper::isAuth()) :?>
                <div style="display: flex;">
                    <div class="account-container" style="background-color: white;  border-radius: 100px;">
                        <a class="navbar-brand" href="/../userhandle/login.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: black; padding: 5px;">
                            Bejelentkezés
                        </a>
                    </div>
                    <div class="account-container" style="background-color: black; color:white;  border-radius: 100px;">
                        <a class="navbar-brand" href="/../userhandle/register.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: white; padding: 5px;">
                        Regisztráció
                        </a>
                    </div>
                </div>
            <?php else :
            ?>
            <div class="account-container" style="background-color: black; color:white;  border-radius: 100px;">
            <a class="navbar-brand" href="/views/components/profile.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: white;">
               <h4 style="padding-top:8px; padding-left:8px;"><?= App\Helper::user()->username ?>!</h4>
               <i class="fa-regular fa-user" style="padding:10px; padding-top:13px;"></i>
               </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

        <!-- Sidebar content, initially hidden -->
        <div id="sidebar" class="sidebar">
            <div class="navbar-top">
                <a href="#" class="navbar-brand" id="hamburger-menu" onclick="toggleSidebar()">
                    <img src="/files/img/ui_icons/icons8-hamburger-menu-50.png" style="width: 48px; height:48px;">
                </a>
                <div class="website-title" style="margin: 0 20px;font-size: 32px;"><a href="/">Mr. Worldwide</a></div>
                <a class="navbar-brand" href="/views/components/profile.php">
                    <img src="/files/img/ui_icons/icons8-account-26.png" style="width: 48px; height:48px;">
                </a>
            </div>

            <div class="middle-segment">
    <form method="get" class="form" action="/search" id="navSearchForm">
        <div class="input-wrapper" id="custom-input-wrapper">
            <input type="text" class="form-input" id="custom-form-input" name="q" <?php if (isset($_GET['q'])) echo 'value="' . $_GET['q'] . '"'; ?> placeholder="Search..." required />
            <button type="submit" class="submit-btn-nav" id="custom-submit-btn-nav">
                <i class="fa fa-search search-icon" id="custom-search-icon"></i>
            </button>
        </div>
    </form>
</div>


            <?php if(!App\Helper::isAuth()) :?>
            <div class="menu-section">
                <b style="padding-top:30px">Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/userhandle/login">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="18" height="18">
                            <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                        </svg> Poszt feltöltése</a>
                    </li>
                    <li><a class="nav-link" href="../userhandle/login">Poszt módosítása</a></li>
                    <li><a class="nav-link" href="../userhandle/login">Poszt törlése</a></li>
                </ul>
            </div>

            <div class="menu-section">
                <b>Fiók</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link" href="/userhandle/login">Bejelentkezés</a></li>
                    <li><a class="nav-link cta" href="/userhandle/register">Regisztráció</a></li>
                </ul>
            </div>
            <?php if (!App\Helper::isAuth()) : ?>
        <div class="container home-container">
        </div>
            <?php endif?>
            <?php else :
        ?>
        <div class="menu-section">
                <b style="padding-top:30px">Poszt</b>
                <ul style="list-style-type:none; padding-left: 20px;">
                    <li><a class="nav-link cta" href="/posts/create.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="18" height="18">
                            <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                        </svg> Poszt feltöltése</a>
                    </li>
                    <li><a class="nav-link" href="/user/uploads">Poszt módosítása</a></li>
                    <li><a class="nav-link" href="/user/uploads">Poszt törlése</a></li>
                </ul>
            </div>

            <div class="menu-section">
                <b>Fiók</b>
                <li><a class="nav-link cta" href="/user/uploads">Profil</a></li>
                <li><a class="nav-link cta" href="/views/components/profile">Profil</a></li>
                    <li><a class="nav-link" href="/user/settings">Fiók műveletek</a></li>
                    <li><a class="nav-link" href="/userhandle/logout">Kijelentkezés</a></li>
                </ul>
            </div>
        <?php endif; ?>

            <div class="navbar-bottom">
                <div class="link-segment">
                    <a href="#">About</a>
                    <a href="#">Terms and policy</a>
                </div>
                <h4>Mr. Worldwide Inc. 2024</h4>
            </div>
        </div>
    </div>
</nav>
