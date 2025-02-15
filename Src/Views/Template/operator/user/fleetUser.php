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
			<h2 class="modal__title">Dodawanie kosztów</h2>
			<form class="modal-form" action="/user/vehicle/addCosts" method="post">
				<input type="hidden" id="add_id" name="id" value="<?php echo $params['fleet']['id_car'] ?>">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_expense_date" class="field__label">Data kosztów</label>
							<input type="date" id="add_expense_date" name="add_expense_date" class="field__input" placeholder="Nazwa" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="deit_category" class="field__label">Kategoria kosztów</label>
							<select name="edit_category" id="edit_category" class="field__input">
								<option value="service">serwis</option>
								<option value="fuel">paliwo</option>
								<option value="exploitation">eksploatacja</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="add_amount" class="field__label">Koszt</label>
							<input type="number" step="0.01" min="0" id="add_amount" name="add_amount" class="field__input" placeholder="Kod pocztowy" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field field--textarea">
							<label for="add_description" class="field__label">Opis pojazdu</label>
							<textarea id="add_description" name="add_description" class="field__textarea" placeholder="Dodaj opis pojazdu..."></textarea>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal2" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Cost Delate</h2>
			<p class="modal__message modal__message--warning">! Zarejestrowany koszt zostanie trwale usunięte, czy chcesz potwierdzić !</p>
			<form action="/user/vehicle/del" method="post">
				<input type="hidden" id="del_id" name="id">
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="modal3" style="display:none;">
		<div class="modal__content">
			<h2 class="modal__title">Edycja kosztów</h2>
			<form class="modal-form" action="/user/vehicle/edit" method="post">
				<input type="hidden" id="edit_id" name="id">
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_expense_date" class="field__label">Data kosztów</label>
							<input type="date" id="edit_expense_date" name="edit_expense_date" class="field__input" placeholder="Nazwa" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__column">
						<div class="field">
							<label for="deit_category" class="field__label">Kategoria kosztów</label>
							<select name="edit_category" id="edit_category" class="field__input">
								<option value="service">serwis</option>
								<option value="fuel">paliwo</option>
								<option value="exploitation">eksploatacja</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field">
							<label for="edit_amount" class="field__label">Koszt</label>
							<input type="number" step="0.01" min="0" id="edit_amount" name="edit_amount" class="field__input" placeholder="Kod pocztowy" required>
						</div>
					</div>
				</div>
				<div class="modal-form__row">
					<div class="modal-form__full">
						<div class="field field--textarea">
							<label for="edit_description" class="field__label">Opis pojazdu</label>
							<textarea id="edit_description" name="edit_description" class="field__textarea" placeholder="Dodaj opis pojazdu..."></textarea>
						</div>
					</div>
				</div>
				<div class="modal__actions">
					<button class="button button--positive">Confirm</button>
					<a class="button button--negative" id="cancel-button3">Cancel</a>
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
					<li class="sidebar__item"><a href="/user/order" class="sidebar__link">Zlecenia delegacji</a></li>
					<li class="sidebar__item"><a href="/user/fleet" class="sidebar__link">Flota</a></li>
					<li class="sidebar__item"><a href="#" class="sidebar__link">Contact</a></li>
				</ul>
			</nav>
		</div>
		<main class="content">
			<h2 class="content__title">Vechicle Dashboard</h2>
			<div class="content__controls">
				<button class="button button--positive" onclick="addLocation()">Dodaj zgłoszenie awarii</button>
				<button class="button button--positive" onclick="addCosts()">Dodaj koszt</button>
			</div>
			<div class="fleet">
				<div class="fleet__car">
					<div class="fleet__info">
						<?php if ($params['fleet']['img_path'] === "BRAK"): ?>
							<img src="/Public/image/car/img_car_1.jpg" alt="Zdjęcie samochodu" class="fleet__image">
						<?php else: ?>
							<img src="\resources\image\car\<?php echo $params['fleet']['img_path'] ?>" alt="Zdjęcie samochodu" class="fleet__image">
						<?php endif; ?>
						<div class="fleet__details">
							<h2 class="fleet__title"><?php echo $params['fleet']['brand'] . " " . $params['fleet']['model'] ?></h2>
							<p class="fleet__text"><strong>Rok produkcji:</strong> <?php echo $params['fleet']['production_year'] ?></p>
							<p class="fleet__text"><strong>Przebieg:</strong> <?php echo $params['fleet']['mileage'] ?>km</p>
							<p class="fleet__text"><strong>Status:</strong> <?php echo $params['fleet']['status'] ?></p>
						</div>
					</div>
					<div class="fleet__service">
						<h3 class="fleet__service-title">Informacje</h3>
						<p class="fleet__service-text"><strong>Data ostatniego serwisu:</strong> <?php echo $params['fleet']['last_service'] ?></p>
						<p class="fleet__service-text"><strong>Data końca ważności ubezpieczenia:</strong> <?php echo $params['fleet']['end_of_insurance'] ?></p>
						<p class="fleet__service-text"><strong>Data końca ważności przeglądu:</strong> <?php echo $params['fleet']['end_of_tech_inspect'] ?></p>
					</div>
				</div>
				<div class="fleet__table">
					<?php if (!empty($params['costs'])) : ?>
						<div class="user-panel">
							<table class="user-panel__table">
								<thead>
									<tr class="user-panel__row">
										<th class="user-panel__header">Kategoria</th>
										<th class="user-panel__header">Data zgłoszenia</th>
										<th class="user-panel__header">Kwota</th>
										<th class="user-panel__header">Options</th>
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
</script>

</html>