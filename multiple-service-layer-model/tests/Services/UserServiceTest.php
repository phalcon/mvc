<?php 
namespace Services;

class UserServiceTest extends \UnitTestCase
{
    public function testEmptyUser()
    {
        $serviceUser = \Modules\Services\Services::getService('User');
		
		$this->assertFalse($serviceUser->getLast());
    }
}
