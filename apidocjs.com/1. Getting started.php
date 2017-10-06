1. Install
    npm install apidoc -g

2. Create apidoc.json file
    {
        "name": "TrangVT API",
        "version": "1.0.0",
        "description": "apiDoc for using Google Hotel API",
        "title": "My Hotel API",
        "url" : "http://localhost/trangvt-google-hotel-api"
    }

3. Create a comment for function at application/controllers/Hotel.php
/**
 * @api {get} google-api/hotel-list-feed Get Hotel List Feed.
 */

4. Run
    apidoc -i myapp/ -o apidoc/ -t mytemplate/
In this case, run
    apidoc -i application/controllers -o apidoc/

After executes the command, apidoc will be created