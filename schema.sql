-- Feed The Future — database schema
-- Import once with:  mysql -u root < schema.sql
-- (XAMPP: use the phpMyAdmin Import tab, or the MySQL shell above.)
-- Creates the `donation_db` database and the three tables the PHP
-- code actually uses. Product ids 1-15 match the cards on index.html.

CREATE DATABASE IF NOT EXISTS donation_db;
USE donation_db;

-- Donations recorded by process_donation.php
-- INSERT INTO donations (company_name, quantity, address, mobile) ...
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    address TEXT NOT NULL,
    mobile VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Subsidised products listed by atc.php
-- SELECT * FROM products  (uses id, name, price, image)
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL
);

-- Shopping cart rows
-- a_t_c.php: SELECT/INSERT/UPDATE cart ... WHERE product_id = ...
-- rfc.php:   DELETE FROM cart WHERE id = ...
CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1
);

-- Seed products shown on index.html (prices as displayed: Wheat Rs. 50, Pulses Rs. 12, all others Rs. 18)
INSERT INTO products (id, name, price, image) VALUES
(1,  'Rice(10 kg)',            18.00, 'images/rice.png'),
(2,  'Wheat / Atta (10 kg)',   50.00, 'images/wheat.png'),
(3,  'Pulses (Dal, 1 kg)',     12.00, 'images/pulses.png'),
(4,  'Sugar (1 kg)',           18.00, 'images/sugar.png'),
(5,  'Salt (Iodized, 1 kg)',   18.00, 'images/salt.png'),
(6,  'Maize / Corn flour (1 kg)', 18.00, 'images/maize.png'),
(7,  'Cooking Oil (1 L)',      18.00, 'images/cookingoil.png'),
(8,  'Milk (1 L)',             18.00, 'images/milk.png'),
(9,  'Eggs (6 pcs)',           18.00, 'images/eggs.png'),
(10, 'Ragi (1 kg)',            18.00, 'images/ragi.png'),
(11, 'Jowar / Bajra (1 kg)',   18.00, 'images/jowar.png'),
(12, 'Groundnut Oil (1 L)',    18.00, 'images/gnoil.png'),
(13, 'Soap (1 bar)',           18.00, 'images/soap.png'),
(14, 'Mustard Seeds (100 g)',  18.00, 'images/mustardseeds.png'),
(15, 'Paneer (250 g)',         18.00, 'images/paneer.png')
ON DUPLICATE KEY UPDATE
    name = VALUES(name), price = VALUES(price), image = VALUES(image);
