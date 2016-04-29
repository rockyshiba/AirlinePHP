AirlinePHP Lee's features

***Feature 1***
Passenger sign up
location: localhost/AirlinePHP/index.php

From and To fields are validated against each other. These fields cannot be the same. 
Empty fields are validated for. 
Departure and return dates ae validated. Departure cannot be later than return. 
Orgin and destinations are generated from database. 

Admin
location: localhost/AirlinePHP/admin.php

Can add, edit delete airports. Affects the origin and destination fields on the public side. 

***Feature 2***
Parking (An alert pops up here with explanation of feature)
location: localhost/AirlinePHP/parking/index.php

Was once a purely parking feature but now incorporates some passenger information for purposes demonstration.
In the code, there is a check for a unique combination of license plate and plate province using
SELECT COUNT(*). If count is zero, application proceeds to process form data. If count is not zero, 
an error message appears to the user that a license plate already exists. Future versions are to include
a check if that license plate does exist only between departure and return dates. This feature is not complete.

Admin 
location: localhost/AirlinePHP/Parking/admin/index.php

Old admin from earlier version of parking feature. Can update, add, delete customers.

***Feature 3***
Store
location: localhost/airlinephp/store/index.php

The largest and most sophisticated feature of the three.

List of products are database generated.
User adds items to cart when viewing item details. 
User can view cart. Cart items are stored in a $_SESSION array. Ids in array reference ids in database
of products to generate item details in the cart.
User can check out and make a purchase. During this art a customer is added to the customers table. 
Using the unique email of the new customer (currently not validated for) the id of the new customer is
used to create new entries into the orders table. Future versions are to implement a customer profile
so customers can log in and change their details and view purchase history.

Admin
location: http://localhost/AirlinePHP/Store/Admin/index.php
Admin can manage products by adding, removing, updating.
Admin can manage customers by updating or removing customers.
Admin can manage orders by updating or removing customers. (not finished)

source: youtube user "Ismjudoka" https://youtu.be/38PqyQc_z9o

This is a modified version of Ismjudoka's example. 


 