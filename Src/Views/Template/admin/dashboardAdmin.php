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
        <link rel="stylesheet" href="/Public/fonts/icon/fontello/css/fontello.css">
        
    </head>
    <body>
        <header class="topbar">
            <div class="topbar__hamburger">
                <i class="topbar__bar icon-menu"></i>
            </div>
            <img class="topbar__logo" src="/Public/image/logo_main.png" alt="logo Travel Flow"/>
            <img class="topbar__logo2" src="/Public/image/logo_slim.png" alt="logo Travel Flow"/>
            <div class="menu-user">
                <ul class="menu-user__list">
                    <li class="menu-user__item menu-user__item--dropdown">
                        <a href="#" class="menu-user__link1"><?php echo $_SESSION['userLogin']; ?><i class="icon-down-open"></i></a>
                        <a href="#" class="menu-user__link2"><i class="icon-torso"></i></a>
                        <ul class="menu-user__dropdown">
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Profil</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="#" class="menu-user__dropdown-link">Ustawienia</a>
                        </li>
                        <li class="menu-user__dropdown-item">
                            <a href="/logout" class="menu-user__dropdown-link">wyloguj się</a>
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
                        <li class="sidebar__item"><a href="/admin-dashboard" class="sidebar__link">Strona główna</a></li>
                        <li class="sidebar__item"><a href="/register" class="sidebar__link">Dodaj użytkownika</a></li>
                        <li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
                        <li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <main class="content">
                <h2>Admin Dashboard</h2>
                <div class="user-panel">
                  <table class="user-panel__table">
                    <thead>
                      <tr class="user-panel__row">
                        <th class="user-panel__header">First Name</th>
                        <th class="user-panel__header">Last Name</th>
                        <th class="user-panel__header">Login</th>
                        <th class="user-panel__header">Phone</th>
                        <th class="user-panel__header">Email</th>
                        <th class="user-panel__header user-panel__header--status">Status</th>
                        <th class="user-panel__header">Last Login</th>
                        <th class="user-panel__header">Permissions</th>
                        <th class="user-panel__header">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="user-panel__row">
                        <td class="user-panel__cell">John</td>
                        <td class="user-panel__cell">Doe</td>
                        <td class="user-panel__cell">johndoe</td>
                        <td class="user-panel__cell">+123456789</td>
                        <td class="user-panel__cell">john@example.com</td>
                        <td class="user-panel__cell  user-panel__cell--active">Active</td>
                        <td class="user-panel__cell">2024-10-02</td>
                        <td class="user-panel__cell">Admin</td>
                        <td class="user-panel__cell user-panel__cell--options">
                          <button class="user-panel__icon"><i class="icon-pencil"></i></button>
                          <button class="user-panel__icon"><i class="icon-key"></i></button>
                          <button class="user-panel__icon"><i class="icon-trash"></i></button>
                        </td>
                      </tr>
                      <tr class="user-panel__row">
                        <td class="user-panel__cell">John</td>
                        <td class="user-panel__cell">Doe</td>
                        <td class="user-panel__cell">johndoe</td>
                        <td class="user-panel__cell">+123456789</td>
                        <td class="user-panel__cell">john@example.com</td>
                        <td class="user-panel__cell user-panel__cell--inactive">Active</td>
                        <td class="user-panel__cell">2024-10-02</td>
                        <td class="user-panel__cell">Admin</td>
                        <td class="user-panel__cell user-panel__cell--options">
                          <button class="user-panel__icon"><i class="icon-pencil"></i></button>
                          <button class="user-panel__icon"><i class="icon-key"></i></button>
                          <button class="user-panel__icon"><i class="icon-trash"></i></button>
                        </td>
                      </tr>
                      <!--TODO Kolejni użytkownicy -->
                    </tbody>
                  </table>
                </div>
            </main>
        </div>     
    </body>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const topbarHamburger = document.querySelector('.topbar__hamburger');

        function toggleSidebar() {
        sidebar.classList.toggle('sidebar--hidden');
        }

        if (topbarHamburger) {
        topbarHamburger.addEventListener('click', toggleSidebar);
        }
    </script>
</html>