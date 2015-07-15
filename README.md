# test-pineappletc
A small Purchase Order Web App 

1) To install the database look the sql script at: 
   /purchaseorderweb/protected/data/purchaseorderdb.sql
   
   This one will create the whole db for this app.

2) The scope of this app does not support authentication for users during the shopping of items.

3) To fix: When a user select items from different providers all of them are mixed into the shopping cart.
   It will be necessary to implement a filter to group every item for its specific provider and to generate
   different POs.
   
4) The current release does not support uploading images for products.


