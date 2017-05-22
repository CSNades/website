<?php

namespace Tests;

use Exception;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseSetup;
    use DisableExceptionHandling;

    public $baseUrl = 'http://localhost';

    protected function setUp()
    {
        parent::setUp();
        $this->setupDatabase();
    }
}
