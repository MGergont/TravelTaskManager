<!DOCTYPE html>
<html lang="pl">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apliakcja internetowa ułatwiająca pracownikom oraz pracodawcy zarzadzane wyjazdami służbowymi">
        <meta name="keywords" content="travel, management, business, tasks, coordination, planning, automation, trips">
        <title>TravelFlow.pl</title>
        <link rel="icon" href="/Public/image/icon.png" type="image/png">
        <link rel="stylesheet" href="/Public/css/main.min.css">
        
    </head>
    <body>
        <header class="topbar">
            <div class="topbar__hamburger">
                <span class="topbar__bar"></span>
                <span class="topbar__bar"></span>
                <span class="topbar__bar"></span>
            </div>
            <img class="topbar__logo" src="/Public/image/logo_main.png" alt="logo Travel Flow"/>
            <img class="topbar__logo2" src="/Public/image/logo_slim.png" alt="logo Travel Flow"/>
            <div class="menu-user">
                <ul class="menu-user__list">
                    <li class="menu-user__item menu-user__item--dropdown">
                        <a href="#" class="menu-user__link">MGergont ^</a>
                        <ul class="menu-user__dropdown">
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Web Development</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Design</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">SEO</a>
                        </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <div>
            <div class="sidebar">
                <nav class="sidebar__menu">
                    <ul class="sidebar__list">
                        <li class="sidebar__item"><a href="#" class="sidebar__link">Home</a></li>
                        <li class="sidebar__item"><a href="#" class="sidebar__link">About</a></li>
                        <li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
                        <li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <main class="content">
                <h1>Welcome to the Responsive Layout</h1>
                <p>This layout adapts based on the screen size.</p>
            </main>
        </div>
        <!-- <h2>Admin Dashboard</h2>

        <a href="/register">Dodaj użytkownika</a><br>

        <a href="/logout">wyloguj się</a> -->
                
    </body>
    <script>
        // Pobranie elementów
        const sidebar = document.querySelector('.sidebar');
        const topbarHamburger = document.querySelector('.topbar__hamburger');

        // Funkcja do otwierania/zamykania menu na telefonach
        function toggleSidebar() {
        sidebar.classList.toggle('sidebar--hidden');
        }

        if (topbarHamburger) {
        topbarHamburger.addEventListener('click', toggleSidebar);
        }
    </script>
</html>