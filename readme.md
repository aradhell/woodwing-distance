### Contents
* [Goal](#goal)
* [Prerequisites](#rerequisites)
* [Requirements](#requirements)
* [Planning](#planning)

### Goal 
Make a web service that accepts two distances (numbers) and returns the total distance (sum of both).
### Prerequisites
Implement a RESTful web service in PHP with (or without) any framework of your choice.
Specifications: For each of the two distances, the requester can specify a unit, either Meters or Yards.

Also for the returned total distance, the requester must specify a unit as well.
For example, the request could be 3 Yards + 5 Meters = ... Meters, and the response would be 7.73 Meters.

### Requirements
* [PHP ^7.1.3](https://www.php.net/manual/en/install.php)
* [Composer](https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md)

### Planning
1 yard = 0.9144 meter

1 meter = 1 meter

Distance unit value in base unit never change, so I can keep them in unit object itself and I can also do the conversion from base unit value to value in unit object.

- I will create a Calculator to take 2 params;

distancesToCalculate and outputUnitType

- To pass request and get related calculation result, I will create a Service class. 
----
- [Create an example request, define parameters and response](#endpoint)
- Create a new [Lumen 5.8.*](https://github.com/laravel/lumen) project
- Write failing acceptance tests
- Start TDD with Unit Types (Meter, Yard)
- Refactor / abstraction
- Create Simple Factory for Units
- Refactor
- Create Calculator
- Refactor / abstraction
- Create Service
- Refactor
- Set route and controller
- Implement Service to controller

### Endpoint
 #### /api/v1 [POST] [GET]
 request
 ```
 {
 	"distances": [
 		{
 		    "value": 3,
 		    "unit": "Yard" //Meter,Yard
 		},
 		{
 		    "value": 5,
 		    "unit": "Meter"
 		}
 	],
 	"outputUnit": "Meter", //Meter,Yard
 	"precision": 2, //optional
 	"absolute": 1 //optional
 }
 ```
 response 200
 ```
{
    "data": {
        "value": 7.74,
        "unit": "Meter",
        "precision": 2
    }
}
 ```