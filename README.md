# ASP_Test

System created for the company alter solutions.
Below is an explanation of how to run the system and use it.

## Installation

Let's use xampp to access the database in a simpler way, to download it use the link

[XAMPP](https://www.apachefriends.org/pt_br/download.html)

After installing xampp run it

Create a .sql file with the following code

```python
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `test` 
DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
```

Open the browser and go to the url localhost/phpmyadmin,
look for the import button, go to browse file and get your .sql file 
that we created just now. Run then.

To run the system from the command line we will use the visual studio code, 
you can download it from the link below

[Visual Studio Code](https://code.visualstudio.com/download)

Make a clone of the system in C:/xampp/htdocs folder and open it in terminal

```bash
git clone https://github.com/LucasDaniel/ASP_Test.git
```

Next we will install the dependencies for the system. 
First let's install composer

[Composer](https://getcomposer.org/)

After that, go to the project root folder and run 

```bash
composer install
```

Install dependencies if needed

## Executation

At the end of Visual Studio code in the project root folder, use the commands below to interact with the system

Show all users
```bash
php bin/console app:init
```
Change password User
```bash
php bin/console app:create-user-pwd id "password" "retypePassword"
```
Create user
```bash
php bin/console app:create-user "firstname" "lastname" "email" age
```
