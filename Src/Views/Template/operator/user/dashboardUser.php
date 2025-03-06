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
	<?php if (!empty($_SESSION["dashboard"])) : ?>
		<?php flash("dashboard"); ?>
	<?php endif; ?>
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
							<a href="/user/profile" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
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
					<li class="sidebar__item"><a href="/user-dashboard" class="sidebar__link"><?php $this->LangContentsNav('homePage')?></a></li>
					<li class="sidebar__item"><a href="/user/route" class="sidebar__link"><?php $this->LangContentsNav('route')?></a></li>
					<li class="sidebar__item"><a href="/user/order" class="sidebar__link"><?php $this->LangContentsNav('order')?></a></li>
					<li class="sidebar__item"><a href="/user/fleet" class="sidebar__link"><?php $this->LangContentsNav('car')?></a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title"><?php $this->LangContents('title')?></h2>
			<div class="dashboard">
				<div class="dashboard__section">
					<h2 class="dashboard__title"><?php $this->LangContents('status1')?></h2>
					<?php if (isset($params['orders'])): ?>
						<h3><?php $this->LangContents('del1')?></h3>
						<p class="routs-execution__message"><strong><?php $this->LangContents('del2')?> </strong><?php echo $params['orders']['order_name']; ?></p>
						<p class="routs-execution__message"><strong><?php $this->LangContents('del3')?> </strong><?php echo $params['orders']['due_date']; ?></p>
						<p class="routs-execution__message"><strong><?php $this->LangContents('del4')?> </strong><?php echo date('Y-m-d', strtotime($params['orders']['created_at'])); ?></p>
						<p class="routs-execution__message"><strong><?php $this->LangContents('del7')?> </strong><?php echo $params['orders']['status_order']; ?></p>
						<br>
						<form class="modal-form" action="/user-dashboard/reject" method="post">
							<input type="hidden" id="id_order" value="<?php echo $params['orders']['id_order']; ?>" name="id_order">
							<button class="button button--negative"><?php $this->LangContents('btmCancel')?></button>
						</form>
						<?php if (!empty($params['orders'])) : ?>
							<?php switch ($_SESSION['action']) {
								case 'start': ?>
									<h3><?php $this->LangContents('del5')?></h3>
									<form class="modal-form" method="post" action="/user-dashboard/start">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['origin_city']. "<br> " .$params['orders']['origin_zip_code']. " " .$params['orders']['origin_town']. " ul. " . $params['orders']['origin_street']. " " . $params['orders']['origin_house_number']; ?>
										<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
									</form>
								<?php break;
								case 'stop': ?>
									<h3><?php $this->LangContents('del6')?></h3>
									<form class="modal-form" method="post" action="/user-dashboard/stop">
										<input type="hidden" id="id_route" value="<?php echo $params['orders']['id_route']; ?>" name="id_route">
										<?php echo $params['orders']['destination_city']. "<br> " .$params['orders']['destination_zip_code']. " " .$params['orders']['destination_town']. " ul. " . $params['orders']['destination_street']. " " . $params['orders']['destination_house_number']; ?>
										<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
									</form>
								<?php break;
								default: ?>
									<p>Witaj! Twoja rola jest nieznana.</p>
							<?php break;
							} ?>
						<?php endif; ?>
					<?php else: ?>
						<?php $this->LangContents('status2')?>
					<?php endif ?>
				</div>
				<div class="dashboard__section">
					<h2 class="dashboard__title"><?php $this->LangContents('status3')?></h2>
					<form class="modal-form" action="/user/order" method="post">
						<div class="modal-form__row">
							<div class="modal-form__full">
								<div class="field">
									<label for="StopRoute" class="field__label"><?php $this->LangContents('status4')?></label>
									<input type="text" id="StopRoute" name="StopRoute" class="field__input" placeholder="<?php $this->LangContents('status4')?>" required>
								</div>
							</div>
						</div>
						<div class="modal-form__row">
							<div class="modal-form__full">
								<div class="field">
									<label for="StopRoute" class="field__label"><?php $this->LangContents('status5')?></label>
									<input type="number" step="0.01" min="0" id="add_amount" name="add_amount" class="field__input" placeholder="<?php $this->LangContents('status5')?>" required>
								</div>
							</div>
						</div>
						<div class="modal__actions">
							<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
							<a class="button button--negative" id="cancel-button2"><?php $this->LangContents('btmCancel')?></a>
						</div>
					</form>
				</div>
				<!-- Moduł samochodu -->
				<?php if (isset($params['car'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title"><?php $this->LangContents('status6')?></h2>
						<div class="dashboard__car-info">
							<div class="dashboard__data">
								<p><strong><?php $this->LangContents('status7')?></strong> <?php echo $params['car']['license_plate'] ?></p>
								<p><strong><?php $this->LangContents('status8')?></strong> <?php echo $params['car']['brand'] ?></p>
								<p><strong><?php $this->LangContents('status9')?></strong> <?php echo $params['car']['model'] ?></p>
								<p><strong><?php $this->LangContents('status10')?></strong> <?php echo $params['car']['mileage'] ?> km</p>
								<p><strong><?php $this->LangContents('status11')?></strong> <?php echo $params['car']['end_of_insurance'] ?></p>
							</div>
						</div>
						<img src="resources\image\car\img_67af4a168fea49.94863134.jpg" alt="Samochód" class="dashboard__car-image">
					</div>
				<?php endif; ?>

				<!-- Moduł kosztów -->
				<div class="dashboard__section">
					<h2 class="dashboard__title"><?php $this->LangContents('status12')?></h2>
					<p class="dashboard__costs"><?php echo $params['carCost']['total_costs'] ?> PLN</p>
				</div>

				<!-- Moduł tras -->
				<?php if (isset($params['showOrder'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title"><?php $this->LangContents('status13')?></h2>
						<p><strong><?php $this->LangContents('status14')?></strong> <?php echo $params['showOrder'][0]["order_name"] . " " . $params['showOrder'][0]["due_date"] ?></p>
						<div class="dashboard__routes">
							<?php foreach ($params['showOrder'] as $order): ?>
								<div class="dashboard__route">
									<span><strong><?php echo $order["origin_location"] . " → " . $order["destination_location"] ?></strong></span>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<!-- Moduł kosztów -->
				<?php if (isset($params['showDistance'])): ?>
					<div class="dashboard__section">
						<h2 class="dashboard__title"><?php $this->LangContents('status15')?></h2>
						<p class="dashboard__costs"><strong><?php $this->LangContents('status16')?></strong> <?php echo $params['showDistance']['total_distance'] ?> KM</p>
						<p class="dashboard__costs"><strong><?php $this->LangContents('status17')?></strong> <?php echo $params['showDistance']['total_routes'] ?> szt</p>
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