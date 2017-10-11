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
     * @api {get} google-api/hotel-list-feed Get Hotel List Feed
     * @apiVersion 1.0.0
     * @apiName hotelListFeed
     * @apiGroup Hotel
     *
     * @apiDescription Get hotel list feed
     *
     * Some note:
     *
     * Omit XML elements that do not contain data
     *
     * At a minimum, you must provide the street address, city, state/region, and postal code for the hotel
     *
     * Either a phone number OR latitude/longitude are required. Both are preferred.
     *
     * There are five types of phone: main, tollfree, fax,tdd, mobile. At a minimum, you should provide a main type.
     *
     * To validate your feed prior to uploading, you can use the local feed XSD "http://www.gstatic.com/localfeed/local_feed.xsd".
     *
     * Access for more information: https://developers.google.com/hotels/hotel-ads/dev-guide/hlf-syntax
     *
     * @apiSuccess {String}     language                    The language in which your feed is written. Set the value of this element to a two-letter language code. Ex: ja
     * @apiSuccess {Object[]}   listing                     List of hotel
     * @apiSuccess {String}     listing.id                  Hotel id (A unique identifier for the hotel.)
     * @apiSuccess {String}     listing.name                The name of the hotel
     * @apiSuccess {String}     listing.address             The full physical location of the hotel.
     * @apiSuccess {String}     listing.address.addr1       The primary street address of the hotel.
     * @apiSuccess {String}     [listing.address.addr2]     The secondary street address, if necessary.
     * @apiSuccess {String}     [listing.address.addr3]     A third portion of the street address, if necessary.
     * @apiSuccess {String}     listing.address.city        The name of the hotel's city.
     * @apiSuccess {String}     listing.address.province    The name of the hotel's state, region, or province.
     * @apiSuccess {String}     listing.address.postal_code The hotel's postal code.
     * @apiSuccess {String}     listing.country             The country that this listing is located in. Ex: JP
     * @apiSuccess {String}     listing.latitude            The latitude that corresponds to the location of the listing
     * @apiSuccess {String}     listing.longitude           The longitude that corresponds to the location of the listing
     * @apiSuccess {String}     listing.phone               Contact numbers of the hotel.
     *
     * @apiSuccessExample {xml} Success-Response:
     * <?xml version="1.0" encoding="UTF-8"?>
     * <listings xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="http://www.gstatic.com/localfeed/local_feed.xsd">
     *      <language>Set the value of this element to a two-letter language code</language>
     *      <listing>
     *          <id>001</id>
     *          <name><![CDATA[ホテル!]]></name>
     *          <address format="simple">
     *               <component name="addr1">76 Trombones Road</component>
     *               <component name="addr2">Floor 5</component>
     *               <component name="city">Boston</component>
     *               <component name="province">MA</component>
     *               <component name="postal_code">02472</component>
     *          </address>
     *          <country>US</country>
     *          <latitude>37.423738</latitude>
     *          <longitude>-122.090101</longitude>
     *          <phone type="main">123-456-7890</phone>
     *          <phone type="fax">987-654-3210</phone>
     *      </listing>
     *
     *      <listing>
     *          ...
     *          Or you can provide a "freeform" address
     *          <address>76 Trombones Road, Floor 5, Boston, MA, 02472</address>
     *      <listing>
     * </listings>
     */
    public function hotelListFeed()
    {
        $hotels = '<?xml version="1.0" encoding="UTF-8"?>';
        $hotels .= '<listings xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:noNamespaceSchemaLocation="http://www.gstatic.com/localfeed/local_feed.xsd">';
        $hotels .= '<language>ja</language>';

        $hotels .= '<listing>';
        $hotels .= '<id>001</id>';
        $hotels .= '<name><![CDATA[ホテル]]></name>';
        $hotels .= '<address format="simple">';
        $hotels .= '<component name="addr1">76 Trombones Road</component>';
        $hotels .= '<component name="city">Boston</component>';
        $hotels .= '<component name="province">MA</component>';
        $hotels .= '<component name="postal_code">02472</component>';
        $hotels .= '</address>';
        $hotels .= '<country>JP</country>';
        $hotels .= '<latitude>37.423738</latitude>';
        $hotels .= '<longitude>-122.090101</longitude>';
        $hotels .= '<phone type="main">123-456-7890</phone>';
        $hotels .= '</listing>';

        $hotels .= '</listings>';
        header('Content-Type: text/xml');
        $this->output->set_status_header(200);
        echo $hotels;
    }
}
