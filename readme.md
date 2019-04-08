# Laravel Fluent Multivers

This packages uses [Laveto/laravel-multivers](https://github.com/laveto/laravel-multivers) to provide a fluent interface for Unit4 Multivers.
Since this package does not cover all resources and endpoints of the Multivers API, Laveto's package may be used for anything else. Contributions to this package are very welcome nonetheless!

# Installation

```bash
$ composer require vormkracht10/fluent-multivers
```

To get the configuration files:

```bash
$ php artisan vendor:publish --tag=fluent-multivers
$ php artisan vendor:publish --tag=laravel-multivers
```

# Configuration

The minimal configuration needed is the following environment variable:

```
# Multivers client ID
MULTIVERS_ID=
```

Additionally, these can be set as well:

```
# In case you want to use a different API version
MULTIVERS_URL=

# If you want to customize the URL Multivers redirects back to after authentication
# The default is /multivers/return
MULTIVERS_RETURN=
```

# Usage

Note: the examples for creating resources show a minimal amount of attributes, however any of the attributes as listed in the Multivers API Help pages can be assigned!

## Authentication

In your `routes.php` place the following to get basic Multivers authentication up and running:

```php
use Vormkracht10\FluentMultivers\Facades\FluentMultivers;

Route::get('multivers/auth', function () {
    return FluentMultivers::auth();
});

Route::any('multivers/return', function () {
    echo 'Welcome back!';
});
```

At this point, your application is authenticated to interact with the Multivers API. Reminder: this is apart from the authorization your organization needs to use the API to start with.

## Accounts

### General

```php
use Vormkracht10\FluentMultivers\Domain\Acount\Acount;
```

#### Getting all accounts for a fiscal year

```php
$accounts = Account::query()->fiscalYearOrFail(2019);
```

#### Getting one specific account

```php
$account = Account::query()->findOrFail('0025');
```

#### Creating a new account

```php
// The following are the minimum required fields
$account = Account::new();
$account->AccountId = '9992';
$account->accountType = 1;
$account->fiscalYear = 2019; // If not set, falls back to current year
$account->AuditionDescription = 'Test';
$account = $account->save();
```

## Journals

### General

```php
use Vormkracht10\FluentMultivers\Domain\Journal\Journal;
```

#### Getting all journals

```php
$journals = Journal::query()->all();
```

#### Getting all journals for a fiscal year

```php
$journals = Journal::query()->fiscalYearOrFail(2019);
```

#### Getting one specific journal

```php
$journal = Journal::query()->findOrFail('I');
```

#### Creating a new journal

```php
// The following are the minimum required fields
$journal = Journal::new();
$journal->accountId = '0020';
$journal->journalId = 'ABC';
$journal->fiscalYear = 2019; // If not set, falls back to current year
$journal = $journal->save();
```

## Suppliers

### General

```php
use Vormkracht10\FluentMultivers\Domain\Supplier\Supplier;
```

#### Getting all suppliers

```php
$suppliers = Supplier::query()->all();
```

#### Getting one specific supplier

```php
$supplier = Supplier::query()->findOrFail('7001');
```

### Invoices

```php
use Vormkracht10\FluentMultivers\Domain\Supplier\Invoice;
```

#### Getting all invoices for a fiscal year

```php
// Optionally you can pass a state (0: any (default), 1: open, 2: paid in full)
$invoices = Invoice::query()->fiscalYearOrFail(2019, 1);
```

#### Getting one specific invoice

```php
$invoice = Invoice::query()->findOrFail('20190001');
```

#### Creating a new invoice

```php
$invoice = Invoice::new();
$invoice->fiscalYear = '2019'; // required, defaults to to current year
$invoice->invoiceDate = '1-4-2019'; // required, defaults to to current date
$invoice->PeriodNumber = '4'; // required, defaults to to current month
$invoice->invoiceExpirationDate = '1-4-2019'; // required, defaults to current date
$invoice->journalId = 'I'; // required
$invoice->paymentConditionId = '14'; // required
$invoice->PaymentReference = 'Reference '.str_random(4); // required
$invoice->supplierId = '7001'; // required
$invoice->vatAmount = 40.0; // required
$invoice->vatAmountCur = 50.0;
$invoice->addLine([
    // The following fields are all required _if_ you add a line to the invoice
    'accountId' => '7030',
    'debitAmount' => 200.0,
    'debitAmountCur' => 200.0,
    'description' => 'Pay up buddy!',
    'vatAmount' => 30,
    'vatAmountCur' => 30,
]);

$invoice = $invoice->save(); // Multivers invoice on success, false on failure.
```

Instead of setting each variable as done above, you may pass everything in an array:

```php
$invoice = Invoice::create([
    'fiscalYear' => 2019,
    ...
]); // Multivers invoice on success, false on failure.
```

## Customers

### General

```php
use Vormkracht10\FluentMultivers\Domain\Customer\Customer;
```

#### Getting all customers

```php
$customers = Customer::query()->all();
```

#### Getting one specific customer

```php
$customer = Customer::query()->findOrFail('1001');
```

### Invoices

```php
use Vormkracht10\FluentMultivers\Domain\Customer\Invoice;
```

#### Getting all invoices for a fiscal year

```php
$invoices = Invoice::query()->fiscalYearOrFail(2019);

// Optionally you can pass a state (0: any (default), 1: open, 2: paid in full)
$invoices = Invoice::query()->fiscalYearOrFail(2019, 2);
```

#### Getting one specific invoice

```php
$invoice = Invoice::query()->findOrFail('20190001');
```

#### Creating a new invoice

```php
$invoice = Invoice::new();
$invoice->fiscalYear = '2019'; // required, defaults to to current year
$invoice->invoiceDate = '1-4-2019'; // required, defaults to to current date
$invoice->PeriodNumber = '4'; // required, defaults to to current month
$invoice->invoiceExpirationDate = '1-4-2019'; // required, defaults to current date
$invoice->journalId = 'I'; // required
$invoice->paymentConditionId = '14'; // required
$invoice->PaymentReference = 'Reference '.str_random(4); // required
$invoice->customerId = '7001'; // required
$invoice->vatAmount = 40.0; // required
$invoice->vatAmountCur = 50.0;
$invoice->addLine([
    // The following fields are all required _if_ you add a line to the invoice
    'accountId' => '7030',
    'debitAmount' => 200.0,
    'debitAmountCur' => 200.0,
    'description' => "You're welcome!",
    'vatAmount' => 30,
    'vatAmountCur' => 30,
]);

$invoice = $invoice->save(); // Multivers invoice on success, false on failure.
```

Instead of setting each variable as done above, you may pass everything in an array:

```php
$invoice = Invoice::create([
    'fiscalYear' => 2019,
    ...
]); // Multivers invoice on success, false on failure.
```

### Orders

```php
use Vormkracht10\FluentMultivers\Domain\Order\Order;
```

#### Getting a listing of orders

```php
$orders = Order::query()->openOrdersOrFail();
$orders = Order::query()->byProjectOrFail($projectId);
$orders = Order::query()->byInvoiceOrFail($invoiceId);
```

#### Getting a customer's orders based on multiple conditionals

```php
$orders = Order::query()->forCustomer($customerId);
// The following statements are optional, `get()` is required to get the results, obviously.
$order = $order->whereMinDate('1-4-2019')
               ->whereMaxDate('10-4-2019')
               ->whereMinPrice(5)
               ->whereMaxPrice(10)
               ->whereOpen(true)
               ->whereFiscalYear(2019)
               ->get();
```

#### Getting one specific order

```php
$order = Order::query()->findOrFail('20190038');
```

#### Creating a new order

```php
// The following fields are the minimum required fields
$order = Order::new();

$order->customerId = '1006';
$order->paymentConditionId = '14';
$order->addLine([
    'accountId' => '7030',
    'description' => 'Testorder',
    'productId' => '80.300',
    'quantityOrdered' => 10,
]);

$order = $order->save(); // Multivers order on success, false on failure.
```

Instead of setting each variable as done above, you may pass everything in an array:

```php
$order = Order::create([
    'customerId' => '1006',
    ...
]); // Multivers invoice on success, false on failure.
```
