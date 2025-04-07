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
							<a href="/manager/profile" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('settings')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="/logout-ope" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut')?></a>
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
					<li class="sidebar__item"><a href="/manager-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage')?></a></li>
					<li class="sidebar__item"><a href="/manager/order" class="sidebar__link"><?php $this->LangContentsNav('order')?></a></li>
					<li class="sidebar__item"><a href="/manager/route" class="sidebar__link"><?php $this->LangContentsNav('route')?></a></li>
					<li class="sidebar__item"><a href="/manager/location" class="sidebar__link"><?php $this->LangContentsNav('location')?></a></li>
					<li class="sidebar__item"><a href="/manager/fleet" class="sidebar__link"><?php $this->LangContentsNav('cars')?></a></li>
					<li class="sidebar__item"><a href="/manager/vehicle" class="sidebar__link"><?php $this->LangContentsNav('car')?></a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="route">
				<div class="route__add--route">
					<?php switch ($_SESSION['statusDel']) {
						case 'start': ?>
							<form class="modal-form" method="post" action="/manager/route/castom-start">
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="StartRoute" class="field__label"><?php $this->LangContents('AddRouteTitle1')?></label>
											<input type="text" id="StartRoute" name="StartRoute" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle1')?>" required>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="Distance" class="field__label"><?php $this->LangContents('AddRouteTitle2')?></label>
											<input type="number" id="Distance" name="Distance" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle2')?>" required>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="StopRoute" class="field__label"><?php $this->LangContents('AddRouteTitle3')?></label>
											<input type="text" id="StopRoute" name="StopRoute" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle3')?>" required>
										</div>
									</div>
								</div>
								<button type="submit" name="submit" class="button button--positive"><?php $this->LangContents('btmStop')?></button>
							</form>
						<?php break;
						case 'next': ?>
							<form class="modal-form" method="post" action="/manager/route/castom-next">
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="StartRoute2" class="field__label"><?php $this->LangContents('AddRouteTitle10')?></label>
											<input type="text" id="StartRoute2" name="StartRoute" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle10')?>" required>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="NextDistance" class="field__label"><?php $this->LangContents('AddRouteTitle20')?></label>
											<input type="number" id="NextDistance" name="NextDistance" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle20')?>" required>
										</div>
									</div>
								</div>
								<div class="modal-form__row">
									<div class="modal-form__full">
										<div class="field">
											<label for="StopRoute2" class="field__label"><?php $this->LangContents('AddRouteTitle3')?></label>
											<input type="text" id="StopRoute2" name="StopRoute" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle3')?>" required>
										</div>
									</div>
								</div>
								<button type="submit" name="submit" class="button button--positive"><?php $this->LangContents('btmNext')?></button><br>
								<a href="/manager/route/castom-end" class="button button--negative"><?php $this->LangContents('btmStop')?></a>
							</form>
						<?php break;
						case 'runtime': ?>
							<p><?php $this->LangContents('AddRouteTitle5')?></p>
							<a href="/manager/route/castom-stop"><button name="submit" class="button button--negative"><?php $this->LangContents('btmStop')?></button></a>
						<?php break;
						default: ?>
							<p>Witaj! Twoja rola jest nieznana.</p>
					<?php break;
					} ?>
					<?php if (!empty($_SESSION["route"])) : ?>
						<?php flash("route"); ?>
					<?php endif; ?>
					<p><?php $this->LangContents('AddRouteTitle4')?></p>
				</div>
				<?php if ($_SESSION['statusDel'] != 'start'): ?>
					<div class="route__add--coste">
						<p><?php $this->LangContents('AddRouteTitle6')?></p>
						<form class="modal-form" method="post" action="/manager/route/cost">
							<div class="modal-form__row">
								<div class="modal-form__full">
									<div class="field">
										<input type="number" name="amount" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle7')?>" required>
									</div>
								</div>
							</div>
							<div class="modal-form__row">
								<div class="modal-form__full">
									<div class="field">
										<input type="text" name="descript" class="field__input" placeholder="<?php $this->LangContents('AddRouteTitle8')?>" required>
									</div>
								</div>
							</div>
							<button type="submit" name="submit" class="button button--positive"><?php $this->LangContents('btmAdd')?></button>
						</form>
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