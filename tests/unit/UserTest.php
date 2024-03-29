<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testToGetFirstName() 
    {
        $user = new App\Models\User;

        $user->setFirstName("Billy");

        $this->assertEquals($user->getFirstName(), "Billy");
    }

    public function testToGetLastName() 
    {
        $user = new App\Models\User;

        $user->setLastName("Garrett");

        $this->assertEquals($user->getLastName(), "Garrett");
    }

    public function testToGetFullName()
    {
        $user = new App\Models\User;

        $user->setFirstName("Billy");
        $user->setLastName("Garrett");

        $this->assertEquals($user->getFullName(), "Billy Garrett");
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new App\Models\User;

        $user->setFirstName("Billy    ");
        $user->setLastName("   Garrett");

        $this->assertEquals($user->getFirstName(), "Billy");
        $this->assertEquals($user->getLastName(), "Garrett");
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new App\Models\User;

        $user->setEmail("billy@codecourse.com");

        $this->assertEquals($user->getEmail(), "billy@codecourse.com");
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new App\Models\User;

        $user->setFirstName("Billy");
        $user->setLastName("Garrett");
        $user->setEmail("billy@codecourse.com");

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey("full_name", $emailVariables);
        $this->assertArrayHasKey("email", $emailVariables);


        $this->assertEquals($emailVariables["full_name"], "Billy Garrett");
        $this->assertEquals($emailVariables["email"], "billy@codecourse.com");
    }
}