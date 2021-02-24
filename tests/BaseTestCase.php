<?php

namespace Beekalam\NiraGateway\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    private function is_json($string)
    {
        json_decode($string);

        return json_last_error() == JSON_ERROR_NONE;
    }

    protected function assertISJson($string)
    {
        $this->assertTrue($this->is_json($string));
    }

    protected function getSearchResults()
    {
        return <<<'JSON'
        {
            "AvailableFlights": [
                            {
                                "DepartureDateTime":"2020-08-01 21:00:00",
                                "OperatingFlightNo":"1000",
                                "Airline":"PA",
                                "ArrivalDateTime":"2020-08-01 22:00:00",
                                "AdultTotalPrices":"Z:1140000 L:1140000 G:1352000",
                                "OperatingAirline":"PA",
                                "Origin":"UGT",
                                "FlightNo":1000,
                                "AircraftTypeName":"Foker 100",
                                "Destination":"TTQ",
                                "ClassRefundStatus":"Z:Refundable L:Refundable G:Refundable",
                                "ClassesStatus":"/ZA LA GC",
                                "AircraftTypeCode":"100"
                            }
            ]
        }
JSON;
    }

    protected function getAvailabilityFareResults()
    {
        return <<<'JSON'
{
    "AdultTotalPrice": "1140000",
    "InfantTotalPrice": "176000",
    "EligibilityText": "",
    "CRCNRules": "از 3 ساعت مانده به پرواز,50,P/از 24 ساعت مانده به پرواز تا 3 ساعت مانده به پرواز,40,P/از لحظه صدور تا 24 ساعت مانده به پرواز,30,P/",
    "InfantFare": "100000",
    "AdultTaxes": "I6:10000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:60000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "ChildFare": "500000",
    "AdultFare": "1000000",
    "ChildTaxes": "I6:10000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:30000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "InfantTaxes": "KU:6000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداري$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهي$",
    "AdultComission": "0",
    "ChildTotalPrice": "610000"
}
JSON;
    }

    protected function getFareResults()
    {
        return <<<'JSON'
{
    "InfantTotalPrice": "186000",
    "InfantFare": "100000",
    "ChildFare": "500000",
    "AdultComission": "0",
    "AdultFare": "1000000",
    "ChildTaxes": "I6:10000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:25000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداری$HL:5000.0,EN_Desc:HELAL AHMAR TAX,FA_Desc:  احمر$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهی$","ChildTotalPrice":"610000","AdultTaxes":"I6:10000.0,EN_Desc:PASS ENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:50000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداری$HL:10000.0,EN_Desc:HELAL AHMAR TAX,FA_Desc: هالل عوارض احمر$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهی$",
    "EligibilityText": "",
    "AdultTotalPrice": "1140000",
    "InfantTaxes": "I6:10 000.0,EN_Desc:PASSENGER SAFETY OVERSIGHT SERVICE,FA_Desc:PASSENGER SAFETY OVERSIGHT SERVICE$KU:5000.0,EN_Desc:MUNICIPALITI TAX,FA_Desc:شهرداری$HL:1000.0,EN_Desc:HELAL AHMAR TAX,FA_Desc: هالل عوارض احمر$LP:70000.0,EN_Desc:AIRPORT TAX,FA_Desc:فرودگاهی$",
    "CRCNRules": " 12 تا صدور لحظه از 30,پرواز به مانده روز یک ظهر,P/50,بعد به و پرواز به مانده روز یک ظ12از,P/"
}
JSON;
    }

    protected function getReserveResults($pnr = 'P3RZ7', $error = "No Err")
    {
        return <<<JSON
{"AirReserve":[{"Error":"$error","PNR":"$pnr"}]}
JSON;
    }

    protected function getReserveInfoResults()
    {
        return <<<'JSON'
{
"Passengers":[
    {
        "Deleted":"NO",
        "PassenferLastName":"TEAST",
        "PassenferFirstName":"NIRA",
        "PassenferAgeType":"{Adult}"}
    ],
    "AdultQTY":1,
    "ChildTP":1220000,
    "TotalPrice":2280000,
    "Contact":"09111111111",
    "Segments":[
        {
         "Deleted":"NO",
         "AFlightNo":"PA1000","DepartureDT":"2020-09-15 20:00:00",
         "ResStatus":"TK",
         "FlightClass":"Z",
         "Origin":"UGT",
         "FlightNo":"1000",
         "FlightStatus:"O",
         "Destination":"TTQ"
         },
         {
            "Deleted":"NO",
            "AFlightNo":"FP1000",
            "DepartureDT":"2020-09-15 22:00:00",
            "ResStatus":"UN",
            "FlightClass":"Z",
            "Origin":"UGT",
            "FlightNo":"1000",
            "FlightStatus":"D",
            "Destination":"TTQ"
            }
   ],
   "InfantTP":372000,
   "AdultTP":2280000,
   "Tickets":[
     {
        "ETStatus":"O",
        "PassengerET":"TEAST/ATEST:101240822254"
    }
   ],
   "DOCS":[
   {
        "DOC_TEAST/ATEST":"I//089034 7451//////M"
        }
        ],
        "ChildQTY":0,
        "InfantQTY":0,
        "Status":"ACTIVE",
        "Office":"NiraUser"
    }
JSON;
    }

    protected function getReserveTicketResult()
    {
        return <<<JSON
{
    "Passengers": [
        {
            "Deleted": "NO",
            "PassenferLastName": "TEAST",
            "PassenferFirstName": "NIRA",
            "PassenferAgeType": "{Adult}"
        }
    ],
    "AdultQTY": 1,
    "ChildTP": 1220000,
    "TotalPrice": 2280000,
    "Contact": "09111111111",
    "Segments": [
        {
            "Deleted": "NO",
            "AFlightNo": "PA1000",
            "DepartureDT": "2020-09-15 20:00:00",
            "ResStatus": "TK",
            "FlightClass": "Z",
            "Origin": "UGT",
            "FlightNo": "1000",
            "FlightStatus": "O",
            "Destination": "TTQ"
        },
        {
            "Deleted": "NO",
            "AFlightNo": "FP1000",
            "DepartureDT": "2020-09-15 22:00:00",
            "ResStatus": "UN",
            "FlightClass": "Z",
            "Origin": "UGT",
            "FlightNo": "1000",
            "FlightStatus ": "D",
            "Destination": "TTQ"
        }
    ],
    "InfantTP": 372000,
    "AdultTP": 2280000,
    "Tickets": [
        {
            "ETStatus": "O",
            "PassengerET": "TEAST/ATEST:101240822254"
        }
    ],
    "DOCS": [
        {
            "DOC_TEAST/ATEST": "I//0890347451//////M"
        }
    ],
    "ChildQTY": 0,
    "InfantQTY": 0,
    "Status": "ACTIVE",
    "Office": " NiraUser"
}
JSON;
    }
}
