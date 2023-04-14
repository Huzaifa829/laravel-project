<?php

namespace App\Http\Controllers;

use Algolia\AlgoliaSearch\Http\GuzzleHttpClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Exception;

class DHLController extends Controller
{
    public function getSingleProductRate(Request $request)
    {

        // dd(env('DHL_ACCOUNT_NUMBER'));

        if($request->length > 0 && $request->width > 0 && $request->height > 0 && $request->weight){

            $ip = $request->ip();
            $data = \Location::get($ip);
            $today = new Carbon();
            

            if($today->dayOfWeek == Carbon::SATURDAY){
                $shippingDate = date('Y-m-d', strtotime(' +2 day'));
            }else{
                $shippingDate = date('Y-m-d', strtotime(' +1 day'));
            }

            $response = Http::withHeaders([
                'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
            ])->get('https://express.api.dhl.com/mydhlapi/test/rates?accountNumber='.env('DHL_ACCOUNT_NUMBER').'&originCountryCode='.env('COUNTRY_CODE').'&originCityName='.env('CITY_NAME').'&destinationCountryCode='.env('DESTINATION_COUNTRY_CODE').'&destinationCityName='.env('DESTINATION_CITY_NAME').'&weight='.$request->weight.'&length='.$request->length.'&width='.$request->width.'&height='.$request->height.'&plannedShippingDate='.$shippingDate.'&isCustomsDeclarable=false&unitOfMeasurement=metric');

            return $response->json();

        }else{

            

        }

    }

    public function getMultiProductRate(Request $request)
    {

        $today = new Carbon();

        if($today->dayOfWeek == Carbon::SATURDAY){
            $shippingDate = date('Y-m-d H:i:s', strtotime(' +2 day'));
            $formattedshippingDate = \Carbon\Carbon::parse($shippingDate)->isoFormat('YYYY-MM-DD[T]HH:mm:ss[Z]ZZ');

        }else{
            $shippingDate = date('Y-m-d H:i:s', strtotime(' +1 day'));
            $formattedshippingDate = \Carbon\Carbon::parse($shippingDate)->isoFormat('YYYY-MM-DD[T]HH:mm:ss[Z]ZZ');
        }


        $array = [
            [
                "weight"=> 10,
                "dimensions" => [
                    "length"=> 10,
                    "width"=> 20,
                    "height"=> 30
                ]
            ],
        ];

        $headers = [
            'content-type' => 'application/json',
            'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $body = '{
            "customerDetails": {
                "shipperDetails": {
                    "postalCode": "'.env('POSTAL_CODE').'",
                    "cityName": "'.env('CITY_NAME').'",
                    "countryCode": "'.env('COUNTRY_CODE').'"
                },
                "receiverDetails": {
                    "postalCode": "'.$request->postalcode.'",
                    "cityName": "'.$request->cityname.'",
                    "countryCode": "'.$request->countrycode.'"
                }
            },
            "accounts": [
                {
                    "typeCode": "shipper",
                    "number": "'.env('DHL_ACCOUNT_NUMBER').'"
                }
            ],
            "productsAndServices": [
                {
                    "productCode": "P"
                }
            ],
            "payerCountryCode": "'.$request->postalcode.'",
            "plannedShippingDateAndTime": "'.$formattedshippingDate.'",
            "unitOfMeasurement": "metric",
            "isCustomsDeclarable": true,
            "monetaryAmount": [
                {
                    "typeCode": "declaredValue",
                    "value": 100,
                    "currency": "AED"
                }
            ],
            "estimatedDeliveryDate": {
                "isRequested": true,
                "typeCode": "QDDC"
            },
            "getAdditionalInformation": [
                {
                    "typeCode": "allValueAddedServices",
                    "isRequested": true
                }
            ],
            "returnStandardProductsOnly": false,
            "nextBusinessDay": true,
            "productTypeCode": "all",
            "packages": '.json_encode($array).'
        }';

        try{
        $res = $client->request('POST','https://express.api.dhl.com/mydhlapi/test/rates',[
            'body' => $body
        ]);

        $response = $res->getBody()->getContents();
        dd($response);
        return $response;
        }catch(Exception $exe){
            dd($exe);
        }


    }

    public function createShipment(Request $request)
    {

        $today = new Carbon();

        if($today->dayOfWeek == Carbon::SATURDAY){
            $shippingDate = date('Y-m-d H:i:s', strtotime(' +2 day'));
            $formattedshippingDate = \Carbon\Carbon::parse($shippingDate)->isoFormat('YYYY-MM-DD[T]HH:mm:ss[Z]ZZ');

        }else{
            $shippingDate = date('Y-m-d H:i:s', strtotime(' +1 day'));
            $formattedshippingDate = \Carbon\Carbon::parse($shippingDate)->isoFormat('YYYY-MM-DD[T]HH:mm:ss[Z]ZZ');
        }

        $headers = [
            'content-type' => 'application/json',
            'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $body = '{
            "plannedShippingDateAndTime":"'.$formattedshippingDate.'",
                "pickup":{
                    "isRequested":false,
                    "pickupDetails":{
                        "postalAddress":{
                            "postalCode": "'.env('POSTAL_CODE').'",
                            "cityName": "'.env('CITY_NAME').'",
                            "countryCode": "'.env('COUNTRY_CODE').'",
                            "addressLine1": "'.env('OFFICE_ADDRESS').'"
                        },
                        "contactInformation":{
                            "email":"'.env('OFFICE_EMAIL').'",
                            "phone":"'.env('OFFICE_PHONE').'",
                            "companyName":"'.env('COMPANY_NAME').'",
                            "fullName":"'.env('FULL_NAME').'"
                        }
                    },
                    "pickupRequestorDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'"
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname." ".$request->lastname.'"
                        }
                    }
                },
                "productCode":"'.$request->productcode.'",
                "accounts":[
                    {
                        "typeCode":"shipper",
                        "number":'.env('DHL_ACCOUNT_NUMBER').'
                    }
                ],
                "valueAddedServices":[
                    {
                        "serviceCode": "WY"
                    },
                    {
                        "serviceCode":"II",
                    }
                ],
                "customerReferences":[
                    {
                        "value":"'.$request->firstname." ".$request->lastname.'",
                        "typeCode":"CU"
                    }
                ],
                "identifiers":[
                    {
                        "typeCode":"shipmentId",
                        "value":"'.$request->ordercode.'"
                    }
                ],
                "customerDetails":{
                    "shipperDetails":{
                        "postalAddress":{
                            "postalCode":"'.env('POSTAL_CODE').'",
                            "cityName":"'.env('CITY_NAME').'",
                            "countryCode":"'.env('COUNTRY_CODE').'",
                            "addressLine1":"'.env('OFFICE_ADDRESS').'",
                        },
                        "contactInformation":{
                            "email":"'.env('OFFICE_EMAIL').'",
                            "phone":"'.env('OFFICE_PHONE').'",
                            "companyName":"'.env('COMPANY_NAME').'",
                            "fullName":"'.env('FULL_NAME').'"
                        }
                    },
                    "receiverDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'",
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname."".$request->lastname.'"
                        }
                    },
                    "buyerDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'"
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname."".$request->lastname.'"
                        }
                    },

                    "importerDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'"
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname."".$request->lastname.'"
                        }
                    },
                    "exporterDetails":{
                        "postalAddress":{
                            "postalCode":"'.env('POSTAL_CODE').'",
                            "cityName":"'.env('CITY_NAME').'",
                            "countryCode":"'.env('COUNTRY_CODE').'",
                            "addressLine1":"'.env('OFFICE_ADDRESS').'"
                        },
                        "contactInformation":{
                            "email":"'.env('OFFICE_EMAIL').'",
                            "phone":"'.env('OFFICE_PHONE').'",
                            "companyName":"'.env('COMPANY_NAME').'",
                            "fullName":"'.env('FULL_NAME').'"
                        }
                    },
                    "sellerDetails":{
                        "postalAddress":{
                            "postalCode":"'.env('POSTAL_CODE').'",
                            "cityName":"'.env('CITY_NAME').'",
                            "countryCode":"'.env('COUNTRY_CODE').'",
                            "addressLine1":"'.env('OFFICE_ADDRESS').'"
                        },
                        "contactInformation":{
                            "email":"'.env('OFFICE_EMAIL').'",
                            "phone":"'.env('OFFICE_PHONE').'",
                            "companyName":"'.env('COMPANY_NAME').'",
                            "fullName":"'.env('FULL_NAME').'"
                        }
                    },
                    "payerDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'"
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname."".$request->lastname.'"
                        }
                    },
                    "ultimateConsigneeDetails":{
                        "postalAddress":{
                            "postalCode":"'.$request->postalcode.'",
                            "cityName":"'.$request->city.'",
                            "countryCode":"'.$request->countrycode.'",
                            "addressLine1":"'.$request->address.'"
                        },
                        "contactInformation":{
                            "email":"'.$request->email.'",
                            "phone":"'.$request->phone.'",
                            "companyName":"'.$request->companyname.'",
                            "fullName":"'.$request->firstname."".$request->lastname.'"
                        }
                },
                "content":{
                    "packages":[
                        {
                            "weight":22.501,
                            "dimensions":{
                                "length":15.001,
                                "width":15.001,
                                "height":40.001
                            },
                            "customerReferences":[
                                {
                                    "value":"Customer reference",
                                    "typeCode":"CU"
                                }
                            ],
                            "identifiers":[
                                {
                                    "typeCode":"shipmentId",
                                    "value":"1234567890",
                                    "dataIdentifier":"00"
                                }
                            ],
                            "description":"Piece content description",
                            "labelBarcodes":[
                                {
                                    "position":"left",
                                    "symbologyCode":"93",
                                    "content":"string",
                                    "textBelowBarcode":"text below left barcode"
                                }
                            ],
                            "labelText":[
                                {
                                    "position":"left",
                                    "caption":"text caption",
                                    "value":"text value"
                                }
                            ],
                            "labelDescription":"bespoke label description"
                        }
                    ],
                    "isCustomsDeclarable":true,
                    "declaredValue":150,
                    "declaredValueCurrency":"AED",
                    "exportDeclaration":{
                        "lineItems":[
                            {
                                "number":1,
                                "description":"line item description",
                                "price":150,
                                "quantity":{
                                    "value":1,
                                    "unitOfMeasurement":"BOX"
                                },
                                "commodityCodes":[
                                    {
                                        "typeCode":"outbound",
                                        "value":"HS1234567890"
                                    }
                                ],

                                "exportReasonType":"permanent",
                                "manufacturerCountry":"CZ",
                                "exportControlClassificationNumber":"US123456789",
                                "weight":{
                                    "netValue":10,
                                    "grossValue":10
                                },
                                "isTaxesPaid":true,
                                "additionalInformation":["string"],
                                "customerReferences":[
                                    {
                                        "typeCode":"AFE",
                                        "value":"custref123"
                                    }
                                ],
                                "customsDocuments":[
                                    {
                                        "typeCode":"972",
                                        "value":"custdoc456"
                                    }
                                ]
                            }
                        ],
                        "invoice":{
                            "number":"'.$request->ordercode.'",
                            "date":"'.$request->created_at.'",
                            "signatureName":"Brewer",
                            "signatureTitle":"Mr.",
                            "signatureImage":"Base64 encoded image",
                            "instructions":["string"],
                            "customerDataTextEntries":["string"],
                            "totalNetWeight":999999999999,
                            "totalGrossWeight":999999999999,
                            "customerReferences":[
                                {
                                    "typeCode":"CU",
                                    "value":"custref112"
                                }
                            ],

                            "termsOfPayment":"100 days",
                            "indicativeCustomsValues":{
                                "importCustomsDutyValue":150.57,
                                "importTaxesValue":49.43
                            }
                        },


                        "remarks":[
                            {
                                "value":"declaration remark"
                            }
                        ],
                        "additionalCharges":[
                            {
                                "value":10,
                                "caption":"fee",
                                "typeCode":"freight"
                            }
                        ],
                        "destinationPortName":"port details",
                        "placeOfIncoterm":"port of departure or destination details",
                        "payerVATNumber":"12345ED",
                        "recipientReference":"recipient reference",
                        "exporter":{
                            "id":"123",
                            "code":"EXPCZ"
                        },
                        "packageMarks":"marks",
                        "declarationNotes":[
                            {
                                "value":"up to three declaration notes"
                            }
                        ],

                        "exportReference":"export reference",
                        "exportReason":"export reason",
                        "exportReasonType":"permanent",
                        "licenses":[
                            {
                                "typeCode":"export",
                                "value":"license"
                            },
                            {
                                "typeCode":"import",
                                "value":"license"
                            }
                        ],
                        "shipmentType":"personal",
                        "customsDocuments":[
                            {
                                "typeCode":"972",
                                "value":"custdoc445"
                            }
                        ]
                    },
                    "description":"shipment description",
                    "USFilingTypeValue":"12345",
                    "incoterm":"DAP",
                    "unitOfMeasurement":"metric"
                },
                "documentImages":[
                    {
                        "typeCode":"INV",
                        "imageFormat":"PDF",
                        "content":"base64 encoded image"
                    }
                ],

                "onDemandDelivery":{
                    "deliveryOption":"servicepoint",
                    "location":"front door",
                    "specialInstructions":"ringe twice",
                    "gateCode":"1234",
                    "whereToLeave":"concierge",
                    "neighbourName":"Mr.Dan",
                    "neighbourHouseNumber":"777",
                    "authorizerName":"Newman",
                    "servicePointId":"SPL123",
                    "requestedDeliveryDate":"2020-04-20"
                },
                "requestOndemandDeliveryURL":false,
                "shipmentNotification":[
                    {
                        "typeCode":"email",
                        "receiverId":"receiver@email.com",
                        "languageCode":"eng",
                        "languageCountryCode":"UK",
                        "bespokeMessage":"message to be included in the notification"
                    }
                ],
                "prepaidCharges":[
                    {
                        "typeCode":"freight",
                        "currency":"CZK",
                        "value":200,
                        "method":"cash"
                    }
                ],

                "getTransliteratedResponse":false,
                "estimatedDeliveryDate":{
                    "isRequested":false,
                    "typeCode":"QDDC"
                },
                "getAdditionalInformation":[
                    {
                        "typeCode":"pickupDetails",
                        "isRequested":true
                    }
                ],
                "parentShipment":{
                    "productCode":"s",
                    "packagesCount":1
                }
            }';

        try{
            $res = $client->request('POST','https://express.api.dhl.com/mydhlapi/test/shipments',[
                'body' => $body
            ]);

            $response = $res->getBody()->getContents();
            return $response;

        }catch(Exception $exce){
            dd($exce);
        }
    }

    public function trackSingleShipment(Request $request)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
        ])->get('https://express.api.dhl.com/mydhlapi/test/shipments/'.$request->trackingid.'/tracking');

        dd($response->body());
        return $response->body();

    }

    public function trackMultipleShipment(Request $request)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
        ])->get('https://express.api.dhl.com/mydhlapi/test/tracking');

        dd($response->body());
        return $response->body();

    }

    public function validatePickupAddress(Request $request)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Basic YXBZMnpCOHpBM3pCOHc6WEA3ekskM2ZDIzhtRiEyYw=='
        ])->get('https://express.api.dhl.com/mydhlapi/test/address-validate');

        dd($response->body());
        return $response->body();

    }
}
