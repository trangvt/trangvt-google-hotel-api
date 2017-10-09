# trangvt-google-hotel-api

In this project, I used
- Framework: CodeIgniter 3.1.6
- Google Hotel Prices and Hotel Ads APIs
https://developers.google.com/hotels/hotel-ads/
- apidocjs
http://apidocjs.com/

**Google Hotel Prices and Hotel Ads APIs** is an API of Google allows you to post your hotels (or properties) on Google

It contains 2 parts: One-time Tasks & On-going Tasks.
But in this project I only represented One-time Tasks
https://developers.google.com/hotels/hotel-ads/dev-guide/data-feeds

**- Step 1: Create a Hotel List Feed**
Upload an XML or CSV file that lists all hotels for which you will provide pricing information;
the Hotel List Feed itself does not contain pricing information.

=> Create a controller to get hotel infomation from DB and results are XML format
> application/controllers/Hotel.php

> http://localhost/trangvt-google-hotel-api/index.php/google-api/hotel-list-feed

**- Step 2: Define room and package metadata.**

=> Create a controller to get metadata of hotel from DB results are XML format

Step 3: Choose a delivery mode: Decide whether to use Pull or Pull with Hints delivery mode to share your hotel prices with Google.

I use Pull

Step 4: Define endpoints and query controls

Step 5: Create Point of Sale

Step 6: Create QueryControl Message
