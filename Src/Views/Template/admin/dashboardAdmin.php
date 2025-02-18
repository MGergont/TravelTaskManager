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
					<li class="sidebar__item"><a href="/operators" class="sidebar__link">Operatorzy</a></li>
					<li class="sidebar__item"><a href="/admins" class="sidebar__link">Administracja</a></li>
					<li class="sidebar__item"><a href="/register" class="sidebar__link">Dodaj użytkownika</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Services</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="dashboard">
				<?php if (isset($params['StatusOrders'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Ilość użytkowników</h2>
						<div class="dashboard__routes">
							<?php foreach ($params['StatusOrders'] as $orders): ?>
								<div class="dashboard__route">
									<span><strong><?php echo $orders["user_grant"] . " " . $orders["user_count"] . "szt. " ?></strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($params['Query'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Liczba zapytań do bazy</h2>
						<?php foreach ($params['Query'] as $query): ?>
							<p class="dashboard__costs"><?php echo $query['hour'] . " " . $query['query_count'] ?> szt.</p>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if (isset($params['StatusUser'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Liczba aktywnych i zablokowanych operatorów</h2>
						<div class="dashboard__routes">
						<?php foreach ($params['StatusUser'] as $param): ?>
							<div class="dashboard__route">
							<span><strong><?php echo $param['user_status'] . " " . $param['user_count'] ; ?> szt</strong></span>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($params['InactiveUsers'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Nieaktywni użytkownicy</h2>
							<?php foreach ($params['InactiveUsers'] as $inactiv): ?>
									<p class="dashboard__costs"><?php echo $inactiv["name"] . " " . $inactiv["last_name"] . " | " . $inactiv["role"] . " <br> " . date('Y-m-d', strtotime($inactiv["last_login"])) ?></p>
							<?php endforeach ?>
					</div>
				<?php endif; ?>
				<?php if (isset($params['ErrorLogin'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Błędne próby logowania</h2>
						<div class="dashboard__routes">
							<?php foreach ($params['ErrorLogin'] as $inactiv): ?>
								<div class="dashboard__route">
									<span><strong><?php echo $inactiv["name"] . " " . $inactiv["last_name"] . " <br> " . $inactiv["email"] . " " . $inactiv["login_error"]?>szt.</strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($params['email'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title">Wiadomości email</h2>
							<?php foreach ($params['email'] as $email): ?>
								<p class="dashboard__costs"><?php echo $email["recipient_email"] . " <br> " . $email["subject"] . " <br> " . date('Y-m-d h-m', strtotime($email["sent_at"])); ?></p>
							<?php endforeach ?>
					</div>
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