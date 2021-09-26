# Table reservation system

# Story behind it
This project was originally made as a work for a client, but at the end he didn't want it.
So I just upload it here and use it as another project.

# What it can do:
- ## Front-end:
  - Main page
  - Reservation form - Date picker is from: <a href="https://github.com/Pikaday/Pikaday">Pikaday</a>
  - Gallery
  - Privacy policy
- ## Table reservation:
  - Email notification to client and company on the occasion of reserving a table. `mail/email-conf.php` and `private/php/reserve.php`
  - Interaction with database (look at `private/php/reserve.php` for functionality)
  - Error handling
  - Rules:
    - You can only reserve a table from next day to 2 months from the given date. Example: Date is 01 Sep, can reserve from 02 Sep until 30 November.
- ## Other back-end functionalities:
  - Monthly update of database (to clear record of last month's reservations) through cron on Linux. `private/php/monthly_up.php`<br>
  Cron was going to be set to the following: `0 6 1 * * ./private/monthly_up.php ./private/dataset/json`
  - If the Database get corrupted a file that rewrites the whole DB `private/php/remake.php`
  - JSON dataset generation by `private/python/jsont.py`
- ## Security:
  - Protection against basic SQL and HTML injection.
  - Privacy Policy (GDPR)
  - .htaccess file and directory protection

# Names and variables to change (if you'd like to use this project):
### I know that there are a lots of things to change, but these stuff were meant to be hardcoded for one brand, not to be changed.
**NOTE:** This project was made by using IONOS linux hosting package.
  - ## Database connection variables at:<br>
    - `private/php/vars.php (connect function)`<br>
    - `private/php/connect.php (whole file)`,<br>
    - `private/php/monthly_up.php (line 8-12)`
  - ## Email settings at:<br>
    - `private/php/email-conf.php` --> <br>`$mail->Host`<br> `$mail->Username`<br>`$mail->Password`<br>`$mail->setFrom()`<br>
    `$mail->addReplyTo()`
    - `private/php/reserve.php:88` this is a mailing function. Change the *email* to the company's email address and *NAME* to the company's name.<br> This will be under the *# Company email* comment
    - You can also change any other settings if your hosting is different.
  - ## Email content at:
    - `private/php/reserve.php` --> <br> `$email_body_alt` (this will be the same as the main content of `/mail/mail_to.html`)<br>
    `$email_body_alt_comp` (this will be the same as the main content of `/mail/mail_from.html`)
    - `/mail/mail_to.html` main message (you'll know) **DO NOT CHANGE THE TEXT IN `{}` AS THEY ARE USED FOR DATA PROCESSING IN `private/php/reserve.php`**
    - `/mail/mail_from.html` main message (you'll know) **DO NOT CHANGE THE TEXT IN `{}` AS THEY ARE USED FOR DATA PROCESSING IN `private/php/reserve.php`**
  - ## Footer -  restaurant name and location at: <br>
    `assets/js/react-comps.js:19`
  - ## Restaurant name: <br>
    `/mail/mail_from.html` p tag in footer <br>
    `/mail/mail_to.html` p tag in footer
  - ## All the title tags on every HTML page to your liking.

# Database layout:
## Table:
  - Name: `Months`
  - Layout: -->

| `Rows`              | `Data type` |
| ------------------- | ----------- |
|         Jan         |    JSON     |
|         Feb         |    JSON     |
|         Mar         |    JSON     |
|         Apr         |    JSON     |
|         May         |    JSON     |
|         Jun         |    JSON     |
|         Jul         |    JSON     |
|         Aug         |    JSON     |
|         Sep         |    JSON     |
|         Oct         |    JSON     |
|         Nov         |    JSON     |
|         Dec         |    JSON     |

**NOTE:** All of the rows in the table have the same data assigned to them which is coming from `private/dataset.json` and uploaded by `private/remake.php`.

# Tech stack used:
- ## Front-end:
  - HTML
  - CSS
  - Vanilla JS
  - REACT
  - JQUERY
- ## Back-end:
  - PHP
  - MYSQL
  - PYTHON
  - JSON

