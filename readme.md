# PayGenius Sample Document

## Installation
Project uses composer. At the route of the project execute:

```bash
composer install
```

Create config.php in the root of the project containing:
```php
<?php
return [
    'token' => 'your-token',
    'secret' => 'your-secret',
    'endpoint' => 'api-endpoint',
    'log' => true,
    'baseurl' => sprintf('%s://%s/', (empty($_SERVER['HTTPS']) ? 'http' : 'https'), $_SERVER['HTTP_HOST'])
];
```

| Variable | Description |
| - | - |
| token | The provided access token |
| secret | The provided secret key |
| endpoint | The api endpoint (see Endpoints below) |
| log | Where to log api request/responses. If set to `true`, it will log to the standard PHP error log. If a filename is provided, it will log to that file. |
| baseurl | The base URL for the project (incl. the trailing `/`) |

### Endpoints

| Type | Base URL |
| - | - |
| Testing | https://developer.paygenius.co.za/pg/api/v2 |
| Production | https://www.paygenius.co.za/pg/api/v2 |


## Page Descriptions

| Page | Description |
| - | - |
| `validate.php` | Used to validate the API details |
| `card-info.php` | Collect the user's credit card information |
| `card-auth.php` | Creates the credit card payment, and handles the 3D secure form |
| `card-3ds.php` | Handles the 3D secure response |
| `card-execute.php` | Executes the credit card payment |
| `eft-info.php` | Collect's the user's information for instant eft |
| `eft-init.php` | Sets up the Instant EFT process |
| `hosted-info.php` | Collect's the user's information for hosted payment pages |
| `hosted-init.php` | Sets up the hosted payment page |
| `transaction-complete.php` | Shows the transaction status when one of the payment processes have completed |
| `error-page.php` | Used by the exception handler to show exception information |

## General Credit Card Payment Process

Successful payment process flow (see code for errors):

```
card-info.php ---POST---> card-auth.php ---NO3DS -----------------------------------------------------------------------------REDIRECT---> card-execute.php ---REDIRECT---> transaction-complete.php
                                        \--3DS---FORMPOST---> card-3ds.php ---POST---> [BANKSERV] ---POST ---> card-3ds.php /
```

1. `card-info.php`
    1. Collect user info
    2. Post to card-auth.php
2. `card-auth.php`
    1. Perform auth/create request (line 89)
    2. If no 3DS, redirect to `card-execute.php` (line 98)
    3. If 3DS, display 3DS form (line 112)
        1. Post Form to Bankserv to verify card
        2. Bankserv posts back to `card-3ds.php`
3. `card-3ds.php`
    1. Verify 3DS postback from Bankserv (line 11)
    2. Redirect to `card-execute.php`
4. `card-execute.php`
    1. Execute the payment (line 10)

## Test card details

| 3DS | Type | Number | Expiry | CVV | 3DS Password |
| :-: | - | - | - | - | - |
| N | Visa | `4550270020557018` | `10/2018` | `904` | |
| Y | Visa | `4260890000160011` | `12/2017` | `731` | test123 |
| N | MasterCard | `5471209024048015` | `10/2018` | `639` | |
| Y | MasterCard | `5286250003061012` | `09/2017` | `070` | test123 |

**Note:** Any card holder name can be used