# smartbees-checkout
Recruitment task 

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Features](#features)

## General info
Recruitment task to create checkout functionality for an online shop. Checkout allows the user to enter the data of a new ordering user, add this data to the database, choose delivery and payment options, add comments to the order and subscribe to the shop's newsletter.

## Used technologies
Project is created with:
* HTML
* CSS
* PHP version: 8.0.2
* JavaScript (jQuery)
* SQL (MySQL)

## Setup
Create database using "database.sql" script and configure connection to it in "src/Database.php" file.


## Features
* checkboxes show/hide additional form fields
* radio buttons interact with each other
* enter customer data
* backend validation
* frontend validation
* after form submition, popup with order number is shown
* login form popup is shown, when "Logowanie" button is pressed
* new customer is being signed up to newsletter in database, if proper option is selected in form
* "Dodaj kod rabatowy" button shows input for discount code
* place orders using other delivery address than customer address
* Recaptcha
