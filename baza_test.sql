CREATE TABLE operator (
    id_operator SERIAL PRIMARY KEY NOT NULL,
    login VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	phone_number VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL,
	last_login TIMESTAMP,
	user_status VARCHAR(20) NOT NULL,
	user_grant VARCHAR(20) NOT NULL
);

CREATE TABLE address (
    id_address SERIAL PRIMARY KEY NOT NULL,
    house_number VARCHAR(10) NOT NULL,
    street VARCHAR(50) NOT NULL,
    town VARCHAR(50) NOT NULL,
    zip_vode VARCHAR(6) NOT NULL,
	city VARCHAR(50) NOT NULL,
    id_operator_FK INT UNIQUE,  -- Unikalne, aby zapewnić relację 1 do 1
    FOREIGN KEY (id_operator_FK) REFERENCES operator(id_operator) ON DELETE CASCADE
);

CREATE TABLE admin (
    id_admin SERIAL PRIMARY KEY NOT NULL,
    login VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	phone_number VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL,
	last_login TIMESTAMP,
	user_status VARCHAR(20) NOT NULL,
	user_grant VARCHAR(20) NOT NULL
);

CREATE TABLE route (
    id_route SERIAL PRIMARY KEY NOT NULL,
    location_1 VARCHAR(25) NOT NULL,
    location_2 VARCHAR(25) NOT NULL,
    id_travel VARCHAR(50) NOT NULL,
    time_travel_out TIMESTAMP NOT NULL,
	time_travel_in TIMESTAMP NOT NULL,
	distance DOUBLE PRECISION NOT NULL,
    id_operator_FK INT,
    FOREIGN KEY (id_operator_FK) REFERENCES operator(id_operator) ON DELETE CASCADE
);

CREATE TABLE costs (
    id_costs SERIAL PRIMARY KEY NOT NULL,
	expense_date TIMESTAMP NOT NULL,
    amount DOUBLE PRECISION NOT NULL,
	description VARCHAR(250),
    category VARCHAR(10),
	id_travel INT,
    id_operator_FK INT,
	FOREIGN KEY (id_operator_FK) REFERENCES operator(id_operator) ON DELETE CASCADE
);


--informacje o zleceneniu
CREATE TABLE orders (
    id_order SERIAL PRIMARY KEY,
    order_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_order VARCHAR(50) NOT NULL, -- np. 'new', 'in progress', 'completed'
    assigned_to INTEGER REFERENCES operator(id_operator), -- Id przypisanego pracownika
    due_date DATE -- data realizacji
);

--szczeguły trasy
CREATE TABLE routes (
    id_route SERIAL PRIMARY KEY,
    id_order_FK INTEGER NOT NULL REFERENCES orders(id_order) ON DELETE CASCADE,
    id_origin_location INTEGER NOT NULL REFERENCES locations(id_location),
    id_destination_location INTEGER NOT NULL REFERENCES locations(id_location),
    departure_time TIMESTAMP, -- opcjonalnie czas wyjazdu
    arrival_time TIMESTAMP -- opcjonalnie czas przyjazdu
);


--lokalizacja
CREATE TABLE locations (
    id_location SERIAL PRIMARY KEY,
    address_line1 VARCHAR(255) NOT NULL,
    address_line2 VARCHAR(255), -- dodatkowa linia adresowa (opcjonalnie)
    city VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20),
    country VARCHAR(100) NOT NULL,
    latitude DECIMAL(9, 6), -- szerokość geograficzna
    longitude DECIMAL(9, 6) -- długość geograficzna
);

-- SELECT o.order_name, o.status, r.route_id, l1.city AS origin_city, l2.city AS destination_city
-- FROM orders o
-- JOIN routes r ON o.order_id = r.order_id
-- JOIN locations l1 ON r.origin_location_id = l1.location_id
-- JOIN locations l2 ON r.destination_location_id = l2.location_id
-- WHERE o.order_id = 1;


-- 1. Dodaj nowe zlecenie
INSERT INTO orders (order_name, created_at, status_order, assigned_to, due_date)
VALUES ('Wyjazd służbowy do Krakowa', '2024-11-15', 'new', 8, '2024-11-15')
RETURNING id_order;

-- 2. Dodaj lokalizacje
INSERT INTO locations (house_number, street, town, zip_code, city, location_name)
VALUES 
    ('23', 'Jerozolimskie', 'Warszawa', '00-001', 'Warszawa', 'Dom'),
    ('24', 'Krakowska', 'Kraków', '31-001', 'Kraków', 'Biuro')
RETURNING id_location;

-- 3. Dodaj trasę
INSERT INTO routes (id_order_fk, id_origin_location, id_destination_location, departure_time, arrival_time)
VALUES (1, 7, 8, '2024-11-15 08:00:00', '2024-11-15 12:00:00');


SELECT *
FROM orders
JOIN routes ON orders.id_order = routes.id_order_fk
JOIN locations ls1 ON routes.id_origin_location = ls1.id_location
JOIN locations ls2 ON routes.id_destination_location = ls2.id_location
WHERE orders.id_order = 1;