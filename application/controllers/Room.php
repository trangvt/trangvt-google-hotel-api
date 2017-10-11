<?php
/**
 * This is Step 2
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    /**
     * @api {get} google-api/rooms Get Rooms data
     * @apiVersion 1.0.0
     * @apiName roomMetadata
     * @apiGroup Room
     *
     * @apiDescription Define room and package metadata
     *
     * Some note:
     *
     * Google recommends that you define metadata during your initial setup
     *
     * You must define at least one Room Bundle that matches your base room rate.
     *
     * Transaction Message Syntax: https://developers.google.com/hotels/hotel-ads/dev-guide/transaction-syntax
     *
     * Access for more information: https://developers.google.com/hotels/hotel-ads/dev-guide/room-bundles#metadata
     *
     * @apiSuccess {Object[]} Transaction                 The root of the Transaction message
     * @apiSuccess {String}   Transaction.id              unique for each Transaction message
     * @apiSuccess {String}   Transaction.timestamp       The time Transaction message was sent
     * (YYYY-MM-DDTHH:MM:SS[<+|->HH:MM])
     * @apiSuccess {Object[]} Transaction.PropertyDataSet                             Contains descriptive information about specific rooms and related Room Bundles
     * @apiSuccess {String}   Transaction.PropertyDataSet.Property                    Hotel id
     * @apiSuccess {Object[]} [Transaction.PropertyDataSet.RoomData]                  Room information
     * @apiSuccess {String}   Transaction.PropertyDataSet.RoomData.RoomID             Room id
     * @apiSuccess {Object[]} Transaction.PropertyDataSet.RoomData.Name               Room name.
     * @apiSuccess {Object[]} Transaction.PropertyDataSet.RoomData.Name.Text          Two attributes, text and language
     * @apiSuccess {Object[]} [Transaction.PropertyDataSet.RoomData.Description]      Room description
     * @apiSuccess {String}   [Transaction.PropertyDataSet.RoomData.Description.Text] Two attributes, text and language
     * @apiSuccess {String}   [Transaction.PropertyDataSet.RoomData.Capacity]       Capacity
     * @apiSuccess {String}   Transaction.PropertyDataSet.RoomData.Occupancy        Occupancy
     * @apiSuccess {String}   [Transaction.PropertyDataSet.RoomData.PhotoURL]       PhotoURL
     * @apiSuccess {Object[]} [Transaction.PropertyDataSet.PackageData]             Plan information
     * @apiSuccess {String}   Transaction.PropertyDataSet.PackageData.PackageID     Plan id
     * @apiSuccess {Object[]} Transaction.PropertyDataSet.PackageData.Name          Plan name
     * @apiSuccess {String}   Transaction.PropertyDataSet.PackageData.Name.Text     Two attributes, text and language
     * @apiSuccess {Object[]} [Transaction.PropertyDataSet.PackageData.Description]      Plan description
     * @apiSuccess {String}   [Transaction.PropertyDataSet.PackageData.Description.Text] Two attributes, text and language
     * @apiSuccess {Boolean=1,2,true,false} [Transaction.PropertyDataSet.PackageData.BreakfastIncluded=true]
     * @apiSuccess {Boolean=1,2,true,false} [Transaction.PropertyDataSet.PackageData.Baserate.InternetIncluded=false]
     * @apiSuccess {Boolean=1,2,true,false} [Transaction.PropertyDataSet.PackageData.Baserate.ParkingIncluded=false]
     * @apiSuccess {String} Transaction.PropertyDataSet.PackageData.Baserate.Refundable 4 attributes: available(Required), refundable_until_days, refundable_until_time, refundable_until_days 
     * @apiSuccess {String="web","hotel","deposit"} [Transaction.PropertyDataSet.PackageData.Baserate.ChargeCurrency=web]
     *
     * @apiSuccessExample {xml} Success-Response:
     * <?xml version="1.0" encoding="UTF-8"?>
     * <Transaction timestamp="transaction_timestamp" id="transaction_id">
     *      <PropertyDataSet>
     *          <Property>hote_id</Property>
     *          <RoomData>
     *               <RoomID>room_id</RoomID>
     *               <Name>
     *                   <Text text="room_name" language="jp"/>
     *               </Name>
     *               <Description>
     *                    <Text text="room_name" language="language_code"/>
     *               </Description>
     *               <PhotoURL>
     *                   <Caption>
     *                       <Text text="caption" language="jp"/>
     *                   </Caption>
     *                   <URL>url</URL>
     *               </PhotoURL>
     *               <Capacity>2</Capacity>
     *               <Occupancy>2</Occupancy>
     *          </RoomData>
     *
     *          <PackageData>
     *               <PackageID>package_ID</PackageID>
     *               <Name>
     *                   <Text text="plan_name" language="jp"/>
     *               </Name>
     *               <Description>
     *                    <Text text="plan_name" language="language_code"/>
     *               </Description>
     *               <BreakfastIncluded>true</BreakfastIncluded>
     *               <InternetIncluded>false</InternetIncluded>
     *               <ParkingIncluded>false</ParkingIncluded>
     *               <Refundable available="refund_available" refundable_until_days="refund_days"
      refundable_until_time="refund_time"/>
     *               <ParkingIncluded>web</ParkingIncluded>
     *          </PackageData>
     *      </PropertyDataSet>
     * </Transaction>
     */

    public function roomMetadata($currentDateTime = NULL)
    {
        $currentDateTime = date('Y-m-d\TH:i:s P');
        $timestamp = strtotime($currentDateTime);

        $hotels = '<?xml version="1.0" encoding="UTF-8"?>';
        $hotels .= '<Transaction timestamp="' . $currentDateTime . '" id="transaction_id">';
        $hotels .= '<PropertyDataSet>';
        $hotels .= '<Property>hote_id</Property>';

        $hotels .= '<RoomData>';
        $hotels .= '<RoomID>room_id</RoomID>';
        $hotels .= '<Name>';
        $hotels .= '<Text text="room_name" language="jp"/>';
        $hotels .= '</Name>';
        $hotels .= '<Description>';
        $hotels .= '<Text text="room_description" language="ja"/>';
        $hotels .= '</Description>';
        $hotels .= '<Occupancy>2</Occupancy>';
        $hotels .= '</RoomData>';

        $hotels .= '<RoomData>';
        $hotels .= '...';
        $hotels .= '<PhotoURL>';
        $hotels .= '<Caption>';
        $hotels .= '<Text text="caption" language="jp"/>';
        $hotels .= '</Caption>';
        $hotels .= '<URL>url</URL>';
        $hotels .= '</PhotoURL>';
        $hotels .= '<Capacity>2</Capacity>';
        $hotels .= '</RoomData>';

        $hotels .= '<PackageData>';
        $hotels .= '<PackageID>package_ID</PackageID>';
        $hotels .= '<Refundable available="refund_available" refundable_until_days="refund_days"
      refundable_until_time="refund_time"/>';
        $hotels .= '</PackageData>';

        $hotels .= '<PackageData>';
        $hotels .= '...';
        $hotels .= '</PackageData>';

        $hotels .= '</PropertyDataSet>';

        $hotels .= '</Transaction>';
        header('Content-Type: text/xml');
        $this->output->set_status_header(200);
        echo $hotels;
    }
}
