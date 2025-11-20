SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

CREATE TABLE public.address (
    id_address integer NOT NULL,
    house_number character varying(10) NOT NULL,
    street character varying(50) NOT NULL,
    town character varying(50) NOT NULL,
    zip_code character varying(6) NOT NULL,
    city character varying(50) NOT NULL,
    id_operator_fk integer
);


CREATE SEQUENCE public.address_id_address_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.address_id_address_seq OWNED BY public.address.id_address;

CREATE TABLE public.admin (
    id_admin integer NOT NULL,
    login character varying(50) NOT NULL,
    name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    phone_number character varying(50) NOT NULL,
    email character varying(100) NOT NULL,
    pwd character varying(255) NOT NULL,
    last_login timestamp without time zone,
    user_status character varying(20) NOT NULL,
    user_grant character varying(20) NOT NULL,
    login_error integer,
    lang character varying(5)
);

CREATE SEQUENCE public.admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;

CREATE TABLE public.car_expenses (
    id_expense integer NOT NULL,
    id_car integer NOT NULL,
    expense_date date DEFAULT CURRENT_DATE NOT NULL,
    category character varying(50) NOT NULL,
    amount numeric(10,2),
    description text
);


CREATE SEQUENCE public.car_expenses_id_expense_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.car_expenses_id_expense_seq OWNED BY public.car_expenses.id_expense;


CREATE TABLE public.company_cars (
    id_car integer NOT NULL,
    license_plate character varying(15) NOT NULL,
    brand character varying(50) NOT NULL,
    model character varying(50) NOT NULL,
    production_year timestamp without time zone,
    mileage integer,
    status character varying(20),
    id_operator_fk integer,
    last_service timestamp with time zone,
    end_of_insurance timestamp without time zone,
    end_of_tech_inspect timestamp with time zone,
    img_path character varying(50),
    CONSTRAINT company_cars_mileage_check CHECK ((mileage >= 0))
);

CREATE SEQUENCE public.company_cars_id_car_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.company_cars_id_car_seq OWNED BY public.company_cars.id_car;


CREATE TABLE public.costs (
    id_costs integer NOT NULL,
    expense_date timestamp without time zone NOT NULL,
    amount double precision NOT NULL,
    description character varying(250),
    category character varying(10),
    id_travel integer,
    id_operator_fk integer
);

CREATE SEQUENCE public.costs_id_costs_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.costs_id_costs_seq OWNED BY public.costs.id_costs;


CREATE TABLE public.locations (
    id_location integer NOT NULL,
    house_number character varying(10) NOT NULL,
    street character varying(50) NOT NULL,
    town character varying(50) NOT NULL,
    zip_code character varying(6) NOT NULL,
    city character varying(50) NOT NULL,
    latitude numeric(9,6),
    longitude numeric(9,6),
    location_name character varying(255)
);

CREATE SEQUENCE public.locations_id_location_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.locations_id_location_seq OWNED BY public.locations.id_location;


CREATE TABLE public.messages (
    id_message integer NOT NULL,
    id_operator_fk integer NOT NULL,
    subject character varying(255) NOT NULL,
    message text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(20)
);

CREATE SEQUENCE public.messages_id_message_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.messages_id_message_seq OWNED BY public.messages.id_message;

CREATE TABLE public.operator (
    id_operator integer NOT NULL,
    login character varying(50) NOT NULL,
    name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    phone_number character varying(50) NOT NULL,
    email character varying(100) NOT NULL,
    pwd character varying(255) NOT NULL,
    last_login timestamp without time zone,
    user_status character varying(20) NOT NULL,
    user_grant character varying(20) NOT NULL,
    login_error integer,
    lang character varying(5)
);

CREATE SEQUENCE public.operator_id_operator_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.operator_id_operator_seq OWNED BY public.operator.id_operator;

CREATE TABLE public.orders (
    id_order integer NOT NULL,
    order_name character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status_order character varying(50) NOT NULL,
    assigned_to integer,
    due_date date
);




CREATE SEQUENCE public.orders_id_order_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_order_seq OWNED BY public.orders.id_order;

CREATE TABLE public.route (
    id_route integer NOT NULL,
    location_1 character varying(25) NOT NULL,
    location_2 character varying(25) NOT NULL,
    id_travel character varying(50) NOT NULL,
    time_travel_out timestamp without time zone NOT NULL,
    time_travel_in timestamp without time zone NOT NULL,
    distance double precision NOT NULL,
    id_operator_fk integer
);


CREATE SEQUENCE public.route_id_route_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.route_id_route_seq OWNED BY public.route.id_route;

CREATE TABLE public.routes (
    id_route integer NOT NULL,
    id_order_fk integer NOT NULL,
    id_origin_location integer NOT NULL,
    id_destination_location integer NOT NULL,
    departure_time timestamp without time zone,
    arrival_time timestamp without time zone,
    departure_time_active timestamp with time zone,
    arrival_time_active timestamp with time zone
);

CREATE SEQUENCE public.routes_id_route_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.routes_id_route_seq OWNED BY public.routes.id_route;

CREATE TABLE public.sent_emails (
    id_email integer NOT NULL,
    recipient_email character varying(255) NOT NULL,
    recipient_name character varying(100),
    subject character varying(255) NOT NULL,
    body text NOT NULL,
    sent_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(20)
);



CREATE SEQUENCE public.sent_emails_id_email_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sent_emails_id_email_seq OWNED BY public.sent_emails.id_email;

ALTER TABLE ONLY public.address ALTER COLUMN id_address SET DEFAULT nextval('public.address_id_address_seq'::regclass);

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);

ALTER TABLE ONLY public.car_expenses ALTER COLUMN id_expense SET DEFAULT nextval('public.car_expenses_id_expense_seq'::regclass);

ALTER TABLE ONLY public.company_cars ALTER COLUMN id_car SET DEFAULT nextval('public.company_cars_id_car_seq'::regclass);

ALTER TABLE ONLY public.costs ALTER COLUMN id_costs SET DEFAULT nextval('public.costs_id_costs_seq'::regclass);

ALTER TABLE ONLY public.locations ALTER COLUMN id_location SET DEFAULT nextval('public.locations_id_location_seq'::regclass);

ALTER TABLE ONLY public.messages ALTER COLUMN id_message SET DEFAULT nextval('public.messages_id_message_seq'::regclass);

ALTER TABLE ONLY public.operator ALTER COLUMN id_operator SET DEFAULT nextval('public.operator_id_operator_seq'::regclass);

ALTER TABLE ONLY public.orders ALTER COLUMN id_order SET DEFAULT nextval('public.orders_id_order_seq'::regclass);

ALTER TABLE ONLY public.route ALTER COLUMN id_route SET DEFAULT nextval('public.route_id_route_seq'::regclass);

ALTER TABLE ONLY public.routes ALTER COLUMN id_route SET DEFAULT nextval('public.routes_id_route_seq'::regclass);

ALTER TABLE ONLY public.sent_emails ALTER COLUMN id_email SET DEFAULT nextval('public.sent_emails_id_email_seq'::regclass);

INSERT INTO public.admin 
(id_admin, login, name, last_name, phone_number, email, pwd, last_login, user_status, user_grant, login_error, lang)
VALUES 
(1, 'admin', 'Admin', 'Admin', '111222333', 'admin@domain.com',
 '$2y$10$c6nTocDDXkSxfoHZA4JCaeE9IySNKqKH3E6NjDTyxcfUvZ/lB3HFy',
 '2025-10-21 20:48:33.641901', 'active', 'admin', 0, 'pl');


SELECT pg_catalog.setval('public.address_id_address_seq', 1, false);

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, true);

SELECT pg_catalog.setval('public.car_expenses_id_expense_seq', 1, false);

SELECT pg_catalog.setval('public.company_cars_id_car_seq', 1, false);

SELECT pg_catalog.setval('public.costs_id_costs_seq', 1, false);

SELECT pg_catalog.setval('public.locations_id_location_seq', 1, false);

SELECT pg_catalog.setval('public.messages_id_message_seq', 1, false);

SELECT pg_catalog.setval('public.operator_id_operator_seq', 1, false);

SELECT pg_catalog.setval('public.orders_id_order_seq', 1, false);

SELECT pg_catalog.setval('public.route_id_route_seq', 1, false);

SELECT pg_catalog.setval('public.routes_id_route_seq', 1, false);

SELECT pg_catalog.setval('public.sent_emails_id_email_seq', 1, false);

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_id_operator_fk_key UNIQUE (id_operator_fk);


ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (id_address);

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_email_key UNIQUE (email);

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);

ALTER TABLE ONLY public.car_expenses
    ADD CONSTRAINT car_expenses_pkey PRIMARY KEY (id_expense);

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_id_operator_fk_key UNIQUE (id_operator_fk);

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_license_plate_key UNIQUE (license_plate);

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_pkey PRIMARY KEY (id_car);

ALTER TABLE ONLY public.costs
    ADD CONSTRAINT costs_pkey PRIMARY KEY (id_costs);

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_pkey PRIMARY KEY (id_location);

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id_message);

ALTER TABLE ONLY public.operator
    ADD CONSTRAINT operator_email_key UNIQUE (email);

ALTER TABLE ONLY public.operator
    ADD CONSTRAINT operator_pkey PRIMARY KEY (id_operator);

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id_order);

ALTER TABLE ONLY public.route
    ADD CONSTRAINT route_pkey PRIMARY KEY (id_route);

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_pkey PRIMARY KEY (id_route);

ALTER TABLE ONLY public.sent_emails
    ADD CONSTRAINT sent_emails_pkey PRIMARY KEY (id_email);

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;

ALTER TABLE ONLY public.car_expenses
    ADD CONSTRAINT car_expenses_id_car_fkey FOREIGN KEY (id_car) REFERENCES public.company_cars(id_car) ON DELETE CASCADE;


ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE SET NULL;

ALTER TABLE ONLY public.costs
    ADD CONSTRAINT costs_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_assigned_to_fkey FOREIGN KEY (assigned_to) REFERENCES public.operator(id_operator);

ALTER TABLE ONLY public.route
    ADD CONSTRAINT route_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_destination_location_fkey FOREIGN KEY (id_destination_location) REFERENCES public.locations(id_location);

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_order_fk_fkey FOREIGN KEY (id_order_fk) REFERENCES public.orders(id_order) ON DELETE CASCADE;

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_origin_location_fkey FOREIGN KEY (id_origin_location) REFERENCES public.locations(id_location);
