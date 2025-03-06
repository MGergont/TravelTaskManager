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
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('addTitle')?></h2>
			<form class="modal-form" action="/manager/vehicle/addCosts" method="post">
				<input type="hidden" id="add_id" name="id" value="<?php echo $params['fleet']['id_car'] ?>">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_expense_date" class="field__label"><?php $this->LangContents('add1')?></label>
							<input type="date" id="add_expense_date" name="add_expense_date" class="field__input" placeholder="<?php $this->LangContents('add1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="deit_category" class="field__label"><?php $this->LangContents('add2')?></label>
							<select name="edit_category" id="edit_category" class="field__input">
								<option value="service"><?php $this->LangContents('add3')?></option>
								<option value="fuel"><?php $this->LangContents('add4')?></option>
								<option value="exploitation"><?php $this->LangContents('add5')?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_amount" class="field__label"><?php $this->LangContents('add6')?></label>
							<input type="number" step="0.01" min="0" id="add_amount" name="add_amount" class="field__input" placeholder="<?php $this->LangContents('add6')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field field--textarea">
							<label for="add_description" class="field__label"><?php $this->LangContents('add7')?></label>
							<textarea id="add_description" name="add_description" class="field__textarea" placeholder="<?php $this->LangContents('add7')?>"></textarea>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('modalDelTitle')?></h2>
			<p class="modal__message modal__message--warning"><?php $this->LangContents('modalInfo')?></p>
			<form action="/manager/vehicle/del" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive"><?php $this->LangContents('btmConf')?></button>
					<a class="button button--negative" id="cancel-button2"><?php $this->LangContents('btmCancel')?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title"><?php $this->LangContents('modalTitle')?></h2>
			<form class="modal-form" action="/manager/vehicle/edit" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_expense_date" class="field__label"><?php $this->LangContents('add1')?></label>
							<input type="date" id="edit_expense_date" name="edit_expense_date" class="field__input" placeholder="<?php $this->LangContents('add1')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="deit_category" class="field__label"><?php $this->LangContents('add2')?></label>
							<select name="edit_category" id="edit_category" class="field__input">
								<option value="service"><?php $this->LangContents('add3')?></option>
								<option value="fuel"><?php $this->LangContents('add4')?></option>
								<option value="exploitation"><?php $this->LangContents('add5')?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_amount" class="field__label"><?php $this->LangContents('add6')?></label>
							<input type="number" step="0.01" min="0" id="edit_amount" name="edit_amount" class="field__input" placeholder="<?php $this->LangContents('add6')?>" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field field--textarea">
							<label for="edit_description" class="field__label"><?php $this->LangContents('add7')?></label>
							<textarea id="edit_description" name="edit_description" class="field__textarea" placeholder="<?php $this->LangContents('add7')?>"></textarea>
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
	<?php if (!empty($_SESSION["fleetUseManager"])) : ?>
		<?php flash("fleetUseManager"); ?>
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
			<div class="content__controls">
				<button class="button button--positive" onclick="addLocation()"><?php $this->LangContents('btmAddError')?></button>
				<button class="button button--positive" onclick="addCosts()"><?php $this->LangContents('btmCost')?></button>
			</div>
			<div class="fleet">
				<div class="fleet__car">
					<div class="fleet__info">
						<?php if($params['fleet']['img_path'] === "BRAK"): ?>
						<img src="/Public/image/car/img_car_1.jpg" alt="Zdjęcie samochodu" class="fleet__image">
						<?php else: ?>
							<img src="\resources\image\car\<?php echo $params['fleet']['img_path'] ?>" alt="Zdjęcie samochodu" class="fleet__image">
						<?php endif; ?>
						<div class="fleet__details">
							<h2 class="fleet__title"><?php echo $params['fleet']['brand'] . " " . $params['fleet']['model'] ?></h2>
							<p class="fleet__text"><strong><?php $this->LangContents('info1')?></strong> <?php echo $params['fleet']['production_year'] ?></p>
							<p class="fleet__text"><strong><?php $this->LangContents('info2')?></strong> <?php echo $params['fleet']['mileage'] ?>km</p>
							<p class="fleet__text"><strong><?php $this->LangContents('info3')?></strong> <?php echo $params['fleet']['status'] ?></p>
						</div>
					</div>
					<div class="fleet__service">
						<h3 class="fleet__service-title"><?php $this->LangContents('info4')?></h3>
						<p class="fleet__service-text"><strong><?php $this->LangContents('info5')?></strong> <?php echo $params['fleet']['last_service'] ?></p>
						<p class="fleet__service-text"><strong><?php $this->LangContents('info6')?></strong> <?php echo $params['fleet']['end_of_insurance'] ?></p>
						<p class="fleet__service-text"><strong><?php $this->LangContents('info7')?></strong> <?php echo $params['fleet']['end_of_tech_inspect'] ?></p>
					</div>
				</div>
				<div class="fleet__table">
					<?php if (!empty($params['costs'])) : ?>
						<div class="user-panel">
							<table class="user-panel__table">
								<thead>
									<tr class="user-panel__row">
										<th class="user-panel__header"><?php $this->LangContents('title2')?></th>
										<th class="user-panel__header"><?php $this->LangContents('title3')?></th>
										<th class="user-panel__header"><?php $this->LangContents('title4')?></th>
										<th class="user-panel__header"><?php $this->LangContents('title5')?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($params['costs'] as $costs): ?>
										<tr class="user-panel__row">
											<td class="user-panel__cell"><?php echo $costs['category'] ?></td>
											<td class="user-panel__cell"><?php echo $costs['expense_date'] ?></td>
											<td class="user-panel__cell"><?php echo $costs['amount'] ?></td>
											<td class="user-panel__cell">
												<button class="user-panel__icon"><i class="icon-pencil" onclick="editCosts(
													'<?php echo $costs['id_expense']; ?>',
													'<?php echo $costs['expense_date']; ?>',
													'<?php echo $costs['category']; ?>',
													'<?php echo $costs['amount']; ?>',
													'<?php echo $costs['description']; ?>'
													)"></i></button>
												<button class="user-panel__icon"><i class="icon-trash" onclick="delCosts(
													'<?php echo $costs['id_expense']; ?>'
													)"></i></button>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
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

	function addCosts() {
		document.getElementById('modal1').style.display = 'block';
	};

	function delCosts(id) {
		document.getElementById('del_id').value = id;
		document.getElementById('modal2').style.display = 'block';
	}

	function editCosts(id, expense, category, amount, description) {
		document.getElementById('edit_id').value = id;
		document.getElementById('edit_expense_date').value = expense;
		document.getElementById('edit_category').value = category;
		document.getElementById('edit_amount').value = amount;
		document.getElementById('edit_description').value = description;

		document.getElementById('modal3').style.display = 'block';
	}

	const cancelButton = document.getElementById('cancel-button');
	const cancelButton2 = document.getElementById('cancel-button2');
	const cancelButton3 = document.getElementById('cancel-button3');

	const modal1 = document.getElementById('modal1');
	const modal2 = document.getElementById('modal2');
	const modal3 = document.getElementById('modal3');

	cancelButton.addEventListener('click', function() {
		modal1.style.display = 'none';
	});

	cancelButton2.addEventListener('click', function() {
		modal2.style.display = 'none';
	});

	cancelButton3.addEventListener('click', function() {
		modal3.style.display = 'none';
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			modal1.style.display = 'none';
			modal2.style.display = 'none';
			modal3.style.display = 'none';
		}
	});
</script>

</html>