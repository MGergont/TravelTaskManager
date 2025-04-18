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
	<div class="modal" id="modal1" style="display:none;">
		<div class="modal__content modal__content--add">
			<h2 class="modal__title"><?php $this->LangContents('modalAdd')?></h2>
			<p class="modal__message "><?php $this->LangContents('modalAdd1')?></p>
			<form class="modal-form" action="/manager/order/routMain" method="POST">
				<input type="hidden" id="add_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="location_order_B" class="field__label"><?php $this->LangContents('modalAdd2')?></label>
							<select name="location_order_B" id="location_order_B" class="field__input">
								<?php foreach ($params['location'] as $veh): ?>
									<option value="<?php echo $veh['id_location']; ?>">
										<?php echo $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="arrival_date" class="field__label"><?php $this->LangContents('modalAdd3')?></label>
							<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button type="submit" class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('modalDelTitle')?></h2>
			<p class="modal__message modal__message--warning"><?php $this->LangContents('modalInfo')?></p>
			<form action="/manager/order/dellMain" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button2"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal4" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('DelTitle')?></h2>
			<p class="modal__message modal__message--warning"><?php $this->LangContents('DelInfo')?></p>
			<form action="/manager/order/routeDellMain" method="post">
				<input type="hidden" id="del_route_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button4"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content modal__content--large">
			<h2 class="modal__title"><?php $this->LangContents('modalEditPoint')?></h2>
			<form class="modal-form" action="/manager/order/routeEditMain" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__column">
						<p class="modal__message"><?php $this->LangContents('modal1')?> <samp id="nameA"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal2')?> <samp id="cityA"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal3')?> <samp id="zipCodeA"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal4')?> <samp id="townA"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal5')?> <samp id="streetA"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal6')?> <samp id="numberA"></samp></p>
					</div>
					<div class="modal-form__column">
						<p class="modal__message"><?php $this->LangContents('modal1')?> <samp id="nameB"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal2')?> <samp id="cityB"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal3')?> <samp id="zipCodeB"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal4')?> <samp id="townB"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal5')?> <samp id="streetB"></samp></p>
						<p class="modal__message"><?php $this->LangContents('modal6')?> <samp id="numberB"></samp></p>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="location_A_edit" class="field__label"><?php $this->LangContents('table5')?></label>
							<select name="location_A_edit" id="location_A_edit" class="field__input">
								<option id="originLocation" selected></option>
								<?php foreach ($params['location'] as $veh): ?>
									<option value="<?php echo $veh['id_location']; ?>">
										<?php echo $veh['id_location'] . " // " . $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="location_B_edit" class="field__label"><?php $this->LangContents('table6')?></label>
							<select name="location_B_edit" id="location_B_edit" class="field__input">
								<option id="destinLocation" selected></option>
								<?php foreach ($params['location'] as $veh): ?>
									<option value="<?php echo $veh['id_location']; ?>">
										<?php echo $veh['id_location'] . " // " .  $veh['location_name'] . " // " . $veh['town'] . " " . $veh['house_number']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="arrival_date" class="field__label"><?php $this->LangContents('modalAdd3')?></label>
							<input type="datetime-local" id="arrival_date" name="arrival_date" class="field__input">
						</div>
					</div>
					<div class="modal-form__column">
						<div class="field">
							<label for="departure_date" class="field__label"><?php $this->LangContents('modalAdd4')?></label>
							<input type="datetime-local" id="departure_date" name="departure_date" class="field__input">
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button3"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal5" style="display:none;">
		<div class="modal__content modal__content--add">
			<h2 class="modal__title"><?php $this->LangContents('modalEdit')?></h2>
			<form class="modal-form" action="/manager/order/orderEditMain" method="post">
				<input type="hidden" id="edit_order_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="name_order" class="field__label"><?php $this->LangContents('modalEdit1')?></label>
							<input type="text" id="name_order" name="name_order" class="field__input" placeholder="<?php $this->LangContents('modalEdit1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="user_order" class="field__label"><?php $this->LangContents('modalEdit2')?></label>
							<select name="user_order" id="user_order" class="field__input">
								<?php foreach ($params['users'] as $veh): ?>
									<option value="<?php echo $veh['id_operator']; ?>">
										<?php echo $veh['login'] . " // " . $veh['name'] . " " . $veh['last_name']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="date_due" class="field__label"><?php $this->LangContents('modalEdit3')?></label>
							<input type="date" id="date_due" name="date_due" class="field__input" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="status_order" class="field__label"><?php $this->LangContents('modalEdit4')?></label>
							<select name="status_order" id="status_order" class="field__input">
								<option value="new"><?php $this->LangContents('modalEdit5')?></option>
								<option value="in progress"><?php $this->LangContents('modalEdit6')?></option>
								<option value="done"><?php $this->LangContents('modalEdit7')?></option>
								<option value="accepted"><?php $this->LangContents('modalEdit8')?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button5"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<?php if (!empty($_SESSION["orderManagment"])) : ?>
		<?php flash("orderManagment"); ?>
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
							<a href="/manager/profile" class="menu-user__dropdown-link"><?php $this->LangContentsNav('userProfil')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="#" class="menu-user__dropdown-link"><?php $this->LangContentsNav('settings')?></a>
						</li>
						<li class="menu-user__dropdown-item">
							<a href="/logout" class="menu-user__dropdown-link"><?php $this->LangContentsNav('logOut')?></a>
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
			<div class="content__controls">
				<a href="/manager/order/add"><button name="submit" class="button button--positive"><?php $this->LangContents('btmAdd')?></button></a>
			</div>
			<div class="user-panel">
				<div class="accordion">
					<div class="accordion__title">
						<div class="accordion__text"></div>
						<div class="accordion__text"><?php $this->LangContents('table1')?></div>
						<div class="accordion__text"><?php $this->LangContents('table2')?></div>
						<div class="accordion__text"><?php $this->LangContents('table3')?></div>
						<div class="accordion__text"><?php $this->LangContents('table4')?></div>
						<div class="accordion__text accordion__toggle"></div>
					</div>
					<?php if (!empty($params['orders'])) : ?>
						<?php foreach ($params['orders'] as $order): ?>
							<div class="accordion__item">
								<div class="accordion__header">
									<div class="accordion__cell"><?php echo $order['order_name']; ?></div>
									<div class="accordion__cell"><?php echo $order['due_date']; ?></div>
									<div class="accordion__cell"><?php echo $order['created_at']; ?></div>
									<div class="accordion__cell"><?php echo $order['status_order']; ?></div>
									<div class="accordion__cell accordion__toggle">+</div>
								</div>
								<div class="accordion__content">
									<table class="accordion__table">
										<thead>
											<tr>
												<th><?php $this->LangContents('table5')?></th>
												<th><?php $this->LangContents('table6')?></th>
												<th><?php $this->LangContents('table7')?></th>
											</tr>
										</thead>
										<tbody>
											<?php if (!empty($order['locations'])) : ?>
												<?php foreach ($order['locations'] as $location): ?>
													<tr>
														<td><?php echo $location['origin_name'] . "; " . $location['origin_city']; ?></td>
														<td><?php echo $location['destination_name'] . "; " . $location['destination_city']; ?></td>
														<td class=accordion__cell user-panel__cell--options">
															<button class="accordion__icon"><i class="icon-pencil" onclick="editRoute(
															'<?php echo $location['id_route']; ?>',
															'<?php echo $location['origin_name']; ?>',
															'<?php echo $location['origin_city']; ?>',
															'<?php echo $location['origin_zip_code']; ?>',
															'<?php echo $location['origin_town']; ?>',
															'<?php echo $location['origin_street']; ?>',
															'<?php echo $location['origin_house_number']; ?>',
															'<?php echo $location['destination_name']; ?>',
															'<?php echo $location['destination_city']; ?>',
															'<?php echo $location['destination_zip_code']; ?>',
															'<?php echo $location['destination_town']; ?>',
															'<?php echo $location['destination_street']; ?>',
															'<?php echo $location['destination_house_number']; ?>',
															)"></i></button>
															<button class="accordion__icon"><i class="icon-trash" onclick="delRoute('<?php echo $location['id_route']; ?>')"></i></button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
									<div class="accordion__options">
										<div class="accordion__button">
											<button type="submit" name="submit" class="button button--positive" onclick="addRoute('<?php echo $order['id_order']; ?>')"><?php $this->LangContents('btmAddPoint')?></button>
										</div>
										<div class="accordion__button">
											<button type="submit" name="submit" class="button button--positive" onclick="delOrder('<?php echo $order['id_order']; ?>')"><?php $this->LangContents('btmDel')?></button>
										</div>
										<div class="accordion__button">
											<button type="submit" name="submit" class="button button--positive" onclick="editOrder(
											'<?php echo $order['id_order']; ?>',
											'<?php echo $order['order_name']; ?>',
											'<?php echo $order['assigned_to']; ?>',
											'<?php echo $order['due_date']; ?>',
											'<?php echo $order['status_order']; ?>'
											)"><?php $this->LangContents('btmEdit')?></button>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
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

	document.addEventListener('DOMContentLoaded', () => {
		const headers = document.querySelectorAll('.accordion__header');

		headers.forEach(header => {
			header.addEventListener('click', () => {
				const content = header.nextElementSibling;

				if (content.style.display === 'block') {
					content.style.display = 'none';
					header.querySelector('.accordion__toggle').textContent = '+';
				} else {
					content.style.display = 'block';
					header.querySelector('.accordion__toggle').textContent = '-';
				}
			});
		});
	});

	function addRoute(id) {
		document.getElementById('add_id').value = id;
		document.getElementById('modal1').style.display = 'block';
	}

	function delOrder(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function delRoute(id) {
		document.getElementById('del_route_id').value = id;
		document.getElementById('modal4').style.display = 'block';
	}

	function editRoute(id, nameA, cityA, zipCodeA, townA, streetA, numberA, nameB, cityB, zipCodeB, townB, streetB, numberB) {
		document.getElementById('edit_id').value = id;
		document.getElementById('nameA').innerHTML = nameA;
		document.getElementById('cityA').innerHTML = cityA;
		document.getElementById('zipCodeA').innerHTML = zipCodeA;
		document.getElementById('townA').innerHTML = townA;
		document.getElementById('streetA').innerHTML = streetA;
		document.getElementById('numberA').innerHTML = numberA;

		document.getElementById('nameB').innerHTML = nameB;
		document.getElementById('cityB').innerHTML = cityB;
		document.getElementById('zipCodeB').innerHTML = zipCodeB;
		document.getElementById('townB').innerHTML = townB;
		document.getElementById('streetB').innerHTML = streetB;
		document.getElementById('numberB').innerHTML = numberB;

		document.getElementById('modal3').style.display = 'block';
	}

	function editOrder(id, nameOrder, userId, date, status) {
		document.getElementById('edit_order_id').value = id;

		document.getElementById('name_order').value = nameOrder;
		document.getElementById('user_order').value = userId;
		document.getElementById('date_due').value = date;
		document.getElementById('status_order').value = status;
		document.getElementById('modal5').style.display = 'block';
	}

	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');
	const cancelButton3 = document.getElementById('cancel-button3');
	const cancelButton4 = document.getElementById('cancel-button4');
	const cancelButton5 = document.getElementById('cancel-button5');
	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');
	const modal3 = document.getElementById('modal3');
	const modal4 = document.getElementById('modal4');
	const modal5 = document.getElementById('modal5');

	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	cancelButton2.addEventListener('click', function() {
		modal2.style.display = 'none';
	});

	cancelButton3.addEventListener('click', function() {
		modal3.style.display = 'none';
	});

	cancelButton4.addEventListener('click', function() {
		modal4.style.display = 'none';
	});

	cancelButton5.addEventListener('click', function() {
		modal5.style.display = 'none';
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			modal1.style.display = 'none';
			modal2.style.display = 'none';
			modal3.style.display = 'none';
			modal4.style.display = 'none';
			modal5.style.display = 'none';
		}
	});
</script>

</html>