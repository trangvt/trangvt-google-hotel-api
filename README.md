# trangvt-google-hotel-api

In this project, I used
- Framework: CodeIgniter 3.1.6
- Google Hotel Prices and Hotel Ads APIs
https://developers.google.com/hotels/hotel-ads/
- apidocjs
http://apidocjs.com/

View API doc in local
http://localhost/trangvt-google-hotel-api/apidoc/

**NOTE**
- Just created wrap functions to get data.
- Source code in application/
- Google Hotel Prices and Hotel Ads APIs note in google-hote-api/
- apidocjs note in apidocjs.com/

**Google Hotel Prices and Hotel Ads APIs** is an API of Google allows you to post your hotels (or properties) on Google. 

There are two ways you can integrate to display your properties on Google. In this source, I choose the second way
So, you need request to create an account before you can integrate with it. Please visit the below link to find the request link

> https://support.google.com/hotelprices/answer/6101897

**Integration Overview**

It contains 2 parts: One-time Tasks & On-going Tasks.
But in this project I only represented One-time Tasks
https://developers.google.com/hotels/hotel-ads/dev-guide/data-feeds

**- Step 1: Create a Hotel List Feed**

=> Create a controller to get hotel infomation from DB and results are XML format. Because the doc use XML format, so I encourage you use XML format

> application/controllers/Hotel.php

> http://localhost/trangvt-google-hotel-api/index.php/google-api/hotel-list-feed

**- Step 2: Define room and package metadata.**
https://developers.google.com/hotels/hotel-ads/dev-guide/room-bundles#metadata

=> Create a controller to get metadata of hotel from DB and results are XML format

> application/controllers/Room.php

> http://localhost/trangvt-google-hotel-api/index.php/google-api/rooms

**-Step 3: Choose a delivery mode**
https://developers.google.com/hotels/hotel-ads/dev-guide/delivery-mode

Decide whether to use Pull or Pull with Hints delivery mode to share your hotel prices with Google.
I use Pull: https://developers.google.com/hotels/hotel-ads/dev-guide/delivery-mode#pull

=> Create a controller for query

> application/controllers/Query.php

> http://localhost/trangvt-google-hotel-api/index.php/google-api/query-message

Step 4: Define endpoints and query controls

Step 5: Create Point of Sale

Step 6: Create QueryControl Message
