<?php
/**
 * This is Step 1
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    /**
     * @api {get} google-api/hotel-list-feed Get Hotel List Feed.
     * @apiVersion 1.0.0
     * @apiName GetUser
     * @apiGroup Hotel
     *
     * @apiDescription Get hotel list feed
     */
    public function hotelListFeed()
    {
        $hotels = '';
        header('Content-Type: text/xml');
        $this->output->set_status_header(200);
        echo $hotels;
    }
}