--
-- PostgreSQL database dump
--

\restrict S23RD4LmIvXTlAMXAnUajMYTl1Wara6Lw76Ay2wo0zZGeXZWfGP8g4tWFJvEL03

-- Dumped from database version 17.6 (Debian 17.6-1.pgdg13+1)
-- Dumped by pg_dump version 17.6

-- Started on 2025-11-09 19:48:05 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 217 (class 1259 OID 24578)
-- Name: address; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.address (
    id_address integer NOT NULL,
    house_number character varying(10) NOT NULL,
    street character varying(50) NOT NULL,
    town character varying(50) NOT NULL,
    zip_code character varying(6) NOT NULL,
    city character varying(50) NOT NULL,
    id_operator_fk integer
);


ALTER TABLE public.address OWNER TO "example-database";

--
-- TOC entry 218 (class 1259 OID 24581)
-- Name: address_id_address_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.address_id_address_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.address_id_address_seq OWNER TO "example-database";

--
-- TOC entry 3564 (class 0 OID 0)
-- Dependencies: 218
-- Name: address_id_address_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.address_id_address_seq OWNED BY public.address.id_address;


--
-- TOC entry 219 (class 1259 OID 24582)
-- Name: admin; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.admin OWNER TO "example-database";

--
-- TOC entry 220 (class 1259 OID 24587)
-- Name: admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_id_admin_seq OWNER TO "example-database";

--
-- TOC entry 3565 (class 0 OID 0)
-- Dependencies: 220
-- Name: admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.admin_id_admin_seq OWNED BY public.admin.id_admin;


--
-- TOC entry 221 (class 1259 OID 24588)
-- Name: car_expenses; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.car_expenses (
    id_expense integer NOT NULL,
    id_car integer NOT NULL,
    expense_date date DEFAULT CURRENT_DATE NOT NULL,
    category character varying(50) NOT NULL,
    amount numeric(10,2),
    description text
);


ALTER TABLE public.car_expenses OWNER TO "example-database";

--
-- TOC entry 222 (class 1259 OID 24594)
-- Name: car_expenses_id_expense_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.car_expenses_id_expense_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.car_expenses_id_expense_seq OWNER TO "example-database";

--
-- TOC entry 3566 (class 0 OID 0)
-- Dependencies: 222
-- Name: car_expenses_id_expense_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.car_expenses_id_expense_seq OWNED BY public.car_expenses.id_expense;


--
-- TOC entry 223 (class 1259 OID 24595)
-- Name: company_cars; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.company_cars OWNER TO "example-database";

--
-- TOC entry 224 (class 1259 OID 24599)
-- Name: company_cars_id_car_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.company_cars_id_car_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.company_cars_id_car_seq OWNER TO "example-database";

--
-- TOC entry 3567 (class 0 OID 0)
-- Dependencies: 224
-- Name: company_cars_id_car_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.company_cars_id_car_seq OWNED BY public.company_cars.id_car;


--
-- TOC entry 225 (class 1259 OID 24600)
-- Name: costs; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.costs (
    id_costs integer NOT NULL,
    expense_date timestamp without time zone NOT NULL,
    amount double precision NOT NULL,
    description character varying(250),
    category character varying(10),
    id_travel integer,
    id_operator_fk integer
);


ALTER TABLE public.costs OWNER TO "example-database";

--
-- TOC entry 226 (class 1259 OID 24603)
-- Name: costs_id_costs_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.costs_id_costs_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.costs_id_costs_seq OWNER TO "example-database";

--
-- TOC entry 3568 (class 0 OID 0)
-- Dependencies: 226
-- Name: costs_id_costs_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.costs_id_costs_seq OWNED BY public.costs.id_costs;


--
-- TOC entry 227 (class 1259 OID 24604)
-- Name: locations; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.locations OWNER TO "example-database";

--
-- TOC entry 228 (class 1259 OID 24607)
-- Name: locations_id_location_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.locations_id_location_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.locations_id_location_seq OWNER TO "example-database";

--
-- TOC entry 3569 (class 0 OID 0)
-- Dependencies: 228
-- Name: locations_id_location_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.locations_id_location_seq OWNED BY public.locations.id_location;


--
-- TOC entry 229 (class 1259 OID 24608)
-- Name: messages; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.messages (
    id_message integer NOT NULL,
    id_operator_fk integer NOT NULL,
    subject character varying(255) NOT NULL,
    message text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(20)
);


ALTER TABLE public.messages OWNER TO "example-database";

--
-- TOC entry 230 (class 1259 OID 24614)
-- Name: messages_id_message_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.messages_id_message_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.messages_id_message_seq OWNER TO "example-database";

--
-- TOC entry 3570 (class 0 OID 0)
-- Dependencies: 230
-- Name: messages_id_message_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.messages_id_message_seq OWNED BY public.messages.id_message;


--
-- TOC entry 231 (class 1259 OID 24615)
-- Name: operator; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.operator OWNER TO "example-database";

--
-- TOC entry 232 (class 1259 OID 24620)
-- Name: operator_id_operator_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.operator_id_operator_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.operator_id_operator_seq OWNER TO "example-database";

--
-- TOC entry 3571 (class 0 OID 0)
-- Dependencies: 232
-- Name: operator_id_operator_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.operator_id_operator_seq OWNED BY public.operator.id_operator;


--
-- TOC entry 233 (class 1259 OID 24621)
-- Name: orders; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.orders (
    id_order integer NOT NULL,
    order_name character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status_order character varying(50) NOT NULL,
    assigned_to integer,
    due_date date
);


ALTER TABLE public.orders OWNER TO "example-database";

--
-- TOC entry 234 (class 1259 OID 24625)
-- Name: orders_id_order_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.orders_id_order_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_order_seq OWNER TO "example-database";

--
-- TOC entry 3572 (class 0 OID 0)
-- Dependencies: 234
-- Name: orders_id_order_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.orders_id_order_seq OWNED BY public.orders.id_order;


--
-- TOC entry 235 (class 1259 OID 24626)
-- Name: route; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.route OWNER TO "example-database";

--
-- TOC entry 236 (class 1259 OID 24629)
-- Name: route_id_route_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.route_id_route_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.route_id_route_seq OWNER TO "example-database";

--
-- TOC entry 3573 (class 0 OID 0)
-- Dependencies: 236
-- Name: route_id_route_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.route_id_route_seq OWNED BY public.route.id_route;


--
-- TOC entry 237 (class 1259 OID 24630)
-- Name: routes; Type: TABLE; Schema: public; Owner: example-database
--

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


ALTER TABLE public.routes OWNER TO "example-database";

--
-- TOC entry 238 (class 1259 OID 24633)
-- Name: routes_id_route_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.routes_id_route_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.routes_id_route_seq OWNER TO "example-database";

--
-- TOC entry 3574 (class 0 OID 0)
-- Dependencies: 238
-- Name: routes_id_route_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.routes_id_route_seq OWNED BY public.routes.id_route;


--
-- TOC entry 239 (class 1259 OID 24634)
-- Name: sent_emails; Type: TABLE; Schema: public; Owner: example-database
--

CREATE TABLE public.sent_emails (
    id_email integer NOT NULL,
    recipient_email character varying(255) NOT NULL,
    recipient_name character varying(100),
    subject character varying(255) NOT NULL,
    body text NOT NULL,
    sent_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    status character varying(20)
);


ALTER TABLE public.sent_emails OWNER TO "example-database";

--
-- TOC entry 240 (class 1259 OID 24640)
-- Name: sent_emails_id_email_seq; Type: SEQUENCE; Schema: public; Owner: example-database
--

CREATE SEQUENCE public.sent_emails_id_email_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sent_emails_id_email_seq OWNER TO "example-database";

--
-- TOC entry 3575 (class 0 OID 0)
-- Dependencies: 240
-- Name: sent_emails_id_email_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: example-database
--

ALTER SEQUENCE public.sent_emails_id_email_seq OWNED BY public.sent_emails.id_email;


--
-- TOC entry 3329 (class 2604 OID 24641)
-- Name: address id_address; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.address ALTER COLUMN id_address SET DEFAULT nextval('public.address_id_address_seq'::regclass);


--
-- TOC entry 3330 (class 2604 OID 24642)
-- Name: admin id_admin; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.admin ALTER COLUMN id_admin SET DEFAULT nextval('public.admin_id_admin_seq'::regclass);


--
-- TOC entry 3331 (class 2604 OID 24643)
-- Name: car_expenses id_expense; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.car_expenses ALTER COLUMN id_expense SET DEFAULT nextval('public.car_expenses_id_expense_seq'::regclass);


--
-- TOC entry 3333 (class 2604 OID 24644)
-- Name: company_cars id_car; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.company_cars ALTER COLUMN id_car SET DEFAULT nextval('public.company_cars_id_car_seq'::regclass);


--
-- TOC entry 3334 (class 2604 OID 24645)
-- Name: costs id_costs; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.costs ALTER COLUMN id_costs SET DEFAULT nextval('public.costs_id_costs_seq'::regclass);


--
-- TOC entry 3335 (class 2604 OID 24646)
-- Name: locations id_location; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.locations ALTER COLUMN id_location SET DEFAULT nextval('public.locations_id_location_seq'::regclass);


--
-- TOC entry 3336 (class 2604 OID 24647)
-- Name: messages id_message; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.messages ALTER COLUMN id_message SET DEFAULT nextval('public.messages_id_message_seq'::regclass);


--
-- TOC entry 3338 (class 2604 OID 24648)
-- Name: operator id_operator; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.operator ALTER COLUMN id_operator SET DEFAULT nextval('public.operator_id_operator_seq'::regclass);


--
-- TOC entry 3339 (class 2604 OID 24649)
-- Name: orders id_order; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.orders ALTER COLUMN id_order SET DEFAULT nextval('public.orders_id_order_seq'::regclass);


--
-- TOC entry 3341 (class 2604 OID 24650)
-- Name: route id_route; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.route ALTER COLUMN id_route SET DEFAULT nextval('public.route_id_route_seq'::regclass);


--
-- TOC entry 3342 (class 2604 OID 24651)
-- Name: routes id_route; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.routes ALTER COLUMN id_route SET DEFAULT nextval('public.routes_id_route_seq'::regclass);


--
-- TOC entry 3343 (class 2604 OID 24652)
-- Name: sent_emails id_email; Type: DEFAULT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.sent_emails ALTER COLUMN id_email SET DEFAULT nextval('public.sent_emails_id_email_seq'::regclass);


--
-- TOC entry 3535 (class 0 OID 24578)
-- Dependencies: 217
-- Data for Name: address; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.address (id_address, house_number, street, town, zip_code, city, id_operator_fk) FROM stdin;
\.


--
-- TOC entry 3537 (class 0 OID 24582)
-- Dependencies: 219
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.admin (id_admin, login, name, last_name, phone_number, email, pwd, last_login, user_status, user_grant, login_error, lang) FROM stdin;
1	admin	Admin	Admin	111222333	admin@domain.com	$2y$10$c6nTocDDXkSxfoHZA4JCaeE9IySNKqKH3E6NjDTyxcfUvZ/lB3HFy	2025-10-21 20:48:33.641901	active	admin	0	pl
\.


--
-- TOC entry 3539 (class 0 OID 24588)
-- Dependencies: 221
-- Data for Name: car_expenses; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.car_expenses (id_expense, id_car, expense_date, category, amount, description) FROM stdin;
\.


--
-- TOC entry 3541 (class 0 OID 24595)
-- Dependencies: 223
-- Data for Name: company_cars; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.company_cars (id_car, license_plate, brand, model, production_year, mileage, status, id_operator_fk, last_service, end_of_insurance, end_of_tech_inspect, img_path) FROM stdin;
\.


--
-- TOC entry 3543 (class 0 OID 24600)
-- Dependencies: 225
-- Data for Name: costs; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.costs (id_costs, expense_date, amount, description, category, id_travel, id_operator_fk) FROM stdin;
\.


--
-- TOC entry 3545 (class 0 OID 24604)
-- Dependencies: 227
-- Data for Name: locations; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.locations (id_location, house_number, street, town, zip_code, city, latitude, longitude, location_name) FROM stdin;
\.


--
-- TOC entry 3547 (class 0 OID 24608)
-- Dependencies: 229
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.messages (id_message, id_operator_fk, subject, message, created_at, status) FROM stdin;
\.


--
-- TOC entry 3549 (class 0 OID 24615)
-- Dependencies: 231
-- Data for Name: operator; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.operator (id_operator, login, name, last_name, phone_number, email, pwd, last_login, user_status, user_grant, login_error, lang) FROM stdin;
\.


--
-- TOC entry 3551 (class 0 OID 24621)
-- Dependencies: 233
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.orders (id_order, order_name, created_at, status_order, assigned_to, due_date) FROM stdin;
\.


--
-- TOC entry 3553 (class 0 OID 24626)
-- Dependencies: 235
-- Data for Name: route; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.route (id_route, location_1, location_2, id_travel, time_travel_out, time_travel_in, distance, id_operator_fk) FROM stdin;
\.


--
-- TOC entry 3555 (class 0 OID 24630)
-- Dependencies: 237
-- Data for Name: routes; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.routes (id_route, id_order_fk, id_origin_location, id_destination_location, departure_time, arrival_time, departure_time_active, arrival_time_active) FROM stdin;
\.


--
-- TOC entry 3557 (class 0 OID 24634)
-- Dependencies: 239
-- Data for Name: sent_emails; Type: TABLE DATA; Schema: public; Owner: example-database
--

COPY public.sent_emails (id_email, recipient_email, recipient_name, subject, body, sent_at, status) FROM stdin;
\.


--
-- TOC entry 3576 (class 0 OID 0)
-- Dependencies: 218
-- Name: address_id_address_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.address_id_address_seq', 1, false);


--
-- TOC entry 3577 (class 0 OID 0)
-- Dependencies: 220
-- Name: admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.admin_id_admin_seq', 1, true);


--
-- TOC entry 3578 (class 0 OID 0)
-- Dependencies: 222
-- Name: car_expenses_id_expense_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.car_expenses_id_expense_seq', 1, false);


--
-- TOC entry 3579 (class 0 OID 0)
-- Dependencies: 224
-- Name: company_cars_id_car_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.company_cars_id_car_seq', 1, false);


--
-- TOC entry 3580 (class 0 OID 0)
-- Dependencies: 226
-- Name: costs_id_costs_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.costs_id_costs_seq', 1, false);


--
-- TOC entry 3581 (class 0 OID 0)
-- Dependencies: 228
-- Name: locations_id_location_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.locations_id_location_seq', 1, false);


--
-- TOC entry 3582 (class 0 OID 0)
-- Dependencies: 230
-- Name: messages_id_message_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.messages_id_message_seq', 1, false);


--
-- TOC entry 3583 (class 0 OID 0)
-- Dependencies: 232
-- Name: operator_id_operator_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.operator_id_operator_seq', 1, false);


--
-- TOC entry 3584 (class 0 OID 0)
-- Dependencies: 234
-- Name: orders_id_order_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.orders_id_order_seq', 1, false);


--
-- TOC entry 3585 (class 0 OID 0)
-- Dependencies: 236
-- Name: route_id_route_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.route_id_route_seq', 1, false);


--
-- TOC entry 3586 (class 0 OID 0)
-- Dependencies: 238
-- Name: routes_id_route_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.routes_id_route_seq', 1, false);


--
-- TOC entry 3587 (class 0 OID 0)
-- Dependencies: 240
-- Name: sent_emails_id_email_seq; Type: SEQUENCE SET; Schema: public; Owner: example-database
--

SELECT pg_catalog.setval('public.sent_emails_id_email_seq', 1, false);


--
-- TOC entry 3347 (class 2606 OID 24654)
-- Name: address address_id_operator_fk_key; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_id_operator_fk_key UNIQUE (id_operator_fk);


--
-- TOC entry 3349 (class 2606 OID 24656)
-- Name: address address_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (id_address);


--
-- TOC entry 3351 (class 2606 OID 24658)
-- Name: admin admin_email_key; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_email_key UNIQUE (email);


--
-- TOC entry 3353 (class 2606 OID 24660)
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 3355 (class 2606 OID 24662)
-- Name: car_expenses car_expenses_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.car_expenses
    ADD CONSTRAINT car_expenses_pkey PRIMARY KEY (id_expense);


--
-- TOC entry 3357 (class 2606 OID 24664)
-- Name: company_cars company_cars_id_operator_fk_key; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_id_operator_fk_key UNIQUE (id_operator_fk);


--
-- TOC entry 3359 (class 2606 OID 24666)
-- Name: company_cars company_cars_license_plate_key; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_license_plate_key UNIQUE (license_plate);


--
-- TOC entry 3361 (class 2606 OID 24668)
-- Name: company_cars company_cars_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_pkey PRIMARY KEY (id_car);


--
-- TOC entry 3363 (class 2606 OID 24670)
-- Name: costs costs_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.costs
    ADD CONSTRAINT costs_pkey PRIMARY KEY (id_costs);


--
-- TOC entry 3365 (class 2606 OID 24672)
-- Name: locations locations_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.locations
    ADD CONSTRAINT locations_pkey PRIMARY KEY (id_location);


--
-- TOC entry 3367 (class 2606 OID 24674)
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id_message);


--
-- TOC entry 3369 (class 2606 OID 24676)
-- Name: operator operator_email_key; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.operator
    ADD CONSTRAINT operator_email_key UNIQUE (email);


--
-- TOC entry 3371 (class 2606 OID 24678)
-- Name: operator operator_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.operator
    ADD CONSTRAINT operator_pkey PRIMARY KEY (id_operator);


--
-- TOC entry 3373 (class 2606 OID 24680)
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id_order);


--
-- TOC entry 3375 (class 2606 OID 24682)
-- Name: route route_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.route
    ADD CONSTRAINT route_pkey PRIMARY KEY (id_route);


--
-- TOC entry 3377 (class 2606 OID 24684)
-- Name: routes routes_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_pkey PRIMARY KEY (id_route);


--
-- TOC entry 3379 (class 2606 OID 24686)
-- Name: sent_emails sent_emails_pkey; Type: CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.sent_emails
    ADD CONSTRAINT sent_emails_pkey PRIMARY KEY (id_email);


--
-- TOC entry 3380 (class 2606 OID 24687)
-- Name: address address_id_operator_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;


--
-- TOC entry 3381 (class 2606 OID 24692)
-- Name: car_expenses car_expenses_id_car_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.car_expenses
    ADD CONSTRAINT car_expenses_id_car_fkey FOREIGN KEY (id_car) REFERENCES public.company_cars(id_car) ON DELETE CASCADE;


--
-- TOC entry 3382 (class 2606 OID 24697)
-- Name: company_cars company_cars_id_operator_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.company_cars
    ADD CONSTRAINT company_cars_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE SET NULL;


--
-- TOC entry 3383 (class 2606 OID 24702)
-- Name: costs costs_id_operator_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.costs
    ADD CONSTRAINT costs_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;


--
-- TOC entry 3384 (class 2606 OID 24707)
-- Name: messages messages_id_operator_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;


--
-- TOC entry 3385 (class 2606 OID 24712)
-- Name: orders orders_assigned_to_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_assigned_to_fkey FOREIGN KEY (assigned_to) REFERENCES public.operator(id_operator);


--
-- TOC entry 3386 (class 2606 OID 24717)
-- Name: route route_id_operator_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.route
    ADD CONSTRAINT route_id_operator_fk_fkey FOREIGN KEY (id_operator_fk) REFERENCES public.operator(id_operator) ON DELETE CASCADE;


--
-- TOC entry 3387 (class 2606 OID 24722)
-- Name: routes routes_id_destination_location_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_destination_location_fkey FOREIGN KEY (id_destination_location) REFERENCES public.locations(id_location);


--
-- TOC entry 3388 (class 2606 OID 24727)
-- Name: routes routes_id_order_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_order_fk_fkey FOREIGN KEY (id_order_fk) REFERENCES public.orders(id_order) ON DELETE CASCADE;


--
-- TOC entry 3389 (class 2606 OID 24732)
-- Name: routes routes_id_origin_location_fkey; Type: FK CONSTRAINT; Schema: public; Owner: example-database
--

ALTER TABLE ONLY public.routes
    ADD CONSTRAINT routes_id_origin_location_fkey FOREIGN KEY (id_origin_location) REFERENCES public.locations(id_location);


-- Completed on 2025-11-09 19:48:05 UTC

--
-- PostgreSQL database dump complete
--

\unrestrict S23RD4LmIvXTlAMXAnUajMYTl1Wara6Lw76Ay2wo0zZGeXZWfGP8g4tWFJvEL03

