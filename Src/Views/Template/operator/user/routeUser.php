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
		<img class="topbar__logo" src="/Public/image/logo_main.png" alt="logo Travel Flow" />
		<img class="topbar__logo2" src="/Public/image/logo_slim.png" alt="logo Travel Flow" />
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
							<a href="/logout-ope" class="menu-user__dropdown-link">wyloguj się</a>
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
					<li class="sidebar__item"><a href="/user-dashboard" class="sidebar__link">Strona główna</a></li>
					<li class="sidebar__item"><a href="/user/route" class="sidebar__link">Delegacja</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Route Dashboard</h2>
			<div class="user-panel">
				<?php
				switch ($_SESSION['statusDel']) {
					case 'start':
				?>
						<form method="post" action="/user/route/castom-start">
							<input type="text" name="StartRoute" placeholder="Start location" required>
							<input type="number" name="Distance" placeholder="distance" required>
							<input type="text" name="StopRoute" placeholder="Stop location" required>
							<button type="submit" name="submit">Start</button>
						</form>
					<?php
						break;
					case 'next':
					?>
						<form method="post" action="/user/route/castom-next">
							<input type="text" name="StartRoute" placeholder="Next location">
							<input type="number" name="NextDistance" placeholder="Next Distance">
							<input type="text" name="StopRoute" placeholder="Stop location">
							<button type="submit" name="submit">Start</button><br>
							<a href="/user/route/castom-end">Stop</a>
						</form>
					<?php
						break;
					case 'runtime':
					?>
						<p>Trasa trwa...</p>
						<a href="/user/route/castom-stop"><button name="submit">Stop</button></a>
					<?php
						break;
					default:
					?>
						<p>Witaj! Twoja rola jest nieznana.</p>
				<?php
						break;
				}
				?>
				<?php if(!empty($_SESSION["route"])) : ?>
        		<?php flash("route"); ?>
    			<?php endif; ?>
				<p>Start a route to add costs</p>
				<?php if ($_SESSION['statusDel'] != 'start'): ?>
					<p>Add cost</p>
					<form method="post" action="/route-cost">
						<input type="number" name="amount" placeholder="Koszt" required>
						<input type="text" name="descript" placeholder="Opis" required>
						<button type="submit" name="submit">Start</button>
					</form>
				<?php endif; ?>
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