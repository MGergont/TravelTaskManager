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
