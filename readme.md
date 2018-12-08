## SETUP

PHP VERSION 5.6*,.7.*

Laravel 5.7

SQLITE 
- you should install Sqlite library for your system by enabling load of it in php.ini define don your system. You can
make it by uncommenting .so (Linux) or .dll sqlite line
- after making changes please restart your web server service (Apache , Nginx)

NOTE: on Linux ou should probably install Sqlite before:
$ sudo apt install sqlite3

From app root run:

$ php artisan migrate

- env file is already public

## DOCS

Apllication helps for managing a simple in memeory stored inventory and shopping cart.

Main functionalities are:

- you can fill  your inventory with  products with by defining main data (sku, name, , qty, price) before halting inventory state and switching to shopping cart management
- by execution of different commands available you can add, remove, reset items from shoppin cart
- for adding a product to shopping cart your products must be already available in inGventory system and in amount which is equal or higher than amount stated on ADDING TO CART.
- if no amount left or you willing amount(qty) is higher than Stock no execution to be made
- SKU filed is unique identificator of a Product and cannot be any duplicate entries on SKUs

Command list:

INVENTORY:ADD -adding product to inventory system
INVENTORY:END - ending the inventory fill proccess

CART:ADD -add product (sku, qty) combo
CART:REMOVE - remove on same way by substarcting defined amount
CART:END - finsih a App and exit
CART:CHECKOUT - printing of shopping cart info with subtotal and FINAL TOTAL for paying. Also after each checkout your cart 
would be emty again and ready for a new order!

All CLI commands are required to run in a schema like:

$ php artisan COMMAND_NAME

LSITING OF COMMANDS AVAILABLE:
$ php artisan list 
