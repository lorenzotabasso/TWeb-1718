DROP TABLE IF EXISTS USERS;
create table USERS(
 ID_user INTEGER NOT NULL AUTO_INCREMENT,
 Name VARCHAR(100) NOT NULL,
 Surname VARCHAR(100) NOT NULL,
 Email VARCHAR(254) NOT NULL,
 Password VARCHAR(30) NOT NULL,
 
 CONSTRAINT ID_user_pk PRIMARY KEY(ID_user)
);

CREATE UNIQUE INDEX Email_user
ON USERS (Email);

DROP TABLE IF EXISTS ORDERS;
create table ORDERS(
	ID_order INTEGER NOT NULL AUTO_INCREMENT,
	ID_user_order INTEGER NOT NULL,
	timestamp TIMESTAMP,
	CONSTRAINT ID_order_pk PRIMARY KEY(ID_order),
	CONSTRAINT ID_user_order_fk FOREIGN KEY(ID_user_order) REFERENCES USERS(ID_user) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS CATEGORY;
create table CATEGORY(
	ID_category INTEGER NOT NULL AUTO_INCREMENT,
	Name VARCHAR(100) NOT NULL,
	Description TEXT NOT NULL,
	Picture BLOB NOT NULL,
	
	CONSTRAINT ID_category_pk PRIMARY KEY(ID_category)
);

DROP TABLE IF EXISTS PRODUCTS;
create table PRODUCTS(
	ID_product INTEGER NOT NULL AUTO_INCREMENT,
	ID_category_products INTEGER NOT NULL,
	Name VARCHAR(100) NOT NULL,
	Description TEXT NOT NULL,
	Picture BLOB NOT NULL,
	Available BOOLEAN DEFAULT TRUE NOT NULL,
	Price FLOAT NOT NULL,
	
	CONSTRAINT ID_product_pk PRIMARY KEY(ID_product),
	CONSTRAINT ID_category_products_fk FOREIGN KEY (ID_category_products) REFERENCES CATEGORY (ID_category) ON DELETE NO ACTION ON UPDATE CASCADE
);

DROP TABLE IF EXISTS ORDERS_DETAILS;
create table ORDERS_DETAILS(
	ID_details INTEGER NOT NULL AUTO_INCREMENT,
	ID_order_details INTEGER NOT NULL,
	ID_product_details INTEGER NOT NULL,
	Price FLOAT NOT NULL,
	Quantity INTEGER NOT NULL,
	Total FLOAT NOT NULL,
	
	CONSTRAINT ID_details_pk PRIMARY KEY (ID_details),
	CONSTRAINT ID_order_details_fk FOREIGN KEY(ID_order_details) REFERENCES ORDERS (ID_order) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT ID_product_details_fk FOREIGN KEY(ID_product_details) REFERENCES PRODUCTS (ID_product) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO CATEGORY (ID_category, Name, Description, Picture) VALUES (NULL, 'Other', 'Other object that we sell', NULL),
INSERT INTO CATEGORY (ID_category, Name, Description, Picture) VALUES (NULL, 'Laptop', 'Some Laptop that we sell',NULL);
INSERT INTO CATEGORY (ID_category, Name, Description, Picture) VALUES (NULL, 'Smartphone', 'Some Smartphone that we sell',NULL);

INSERT INTO PRODUCTS (ID_product, ID_category_products, Name, Description, Picture, Available, Price) VALUES (NULL, 1, 'Vacuum Cleaner', 'a Vacuum cleaner', NULL , 1, 50);
INSERT INTO PRODUCTS (ID_product, ID_category_products, Name, Description, Picture, Available, Price) VALUES (NULL, 1, 'Bluetooth Speaker', 'a Bluetooth Speaker', NULL, 1, 80);
INSERT INTO PRODUCTS (ID_product, ID_category_products, Name, Description, Picture, Available, Price) VALUES (NULL, 1, 'Philips Hue', 'a Philips Hue bulb', NULL, 1, 75);
INSERT INTO PRODUCTS (ID_product, ID_category_products, Name, Description, Picture, Available, Price) VALUES (NULL, 3, 'iPhone X', 'an iPhone X', NULL, 1, 700);
INSERT INTO PRODUCTS (ID_product, ID_category_products, Name, Description, Picture, Available, Price) VALUES (NULL, 1, 'Indiana J. Hat', 'the original hat of Indiana Jones', NULL, 1, 15);