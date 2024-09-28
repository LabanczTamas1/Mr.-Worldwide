<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;
use App\Tools;

class RegisterControllerTest extends TestCase
{
    protected function setUp(): void
    {
        // Set SERVER_NAME to localhost if not already set
        if (!isset($_SERVER['SERVER_NAME'])) {
            $_SERVER['SERVER_NAME'] = 'localhost';
        }

        // Set REQUEST_URI to a default value if not set
        if (!isset($_SERVER['REQUEST_URI'])) {
            $_SERVER['REQUEST_URI'] = '/';
        }

        // Mock Tools class and its static methods
        $this->toolsMock = $this->getMockBuilder(Tools::class)
                                ->onlyMethods(['FlashMessage', 'Crypt'])
                                ->getMock();

        // Mock User class
        $this->userMock = $this->getMockBuilder(User::class)
                               ->onlyMethods(['getItemBy', 'save'])
                               ->getMock();
    }

    public function testInsertUserWithEmptyFields()
    {
        // Arrange
        $controller = new RegisterController();
        $postData = [
            'username' => '',
            'email' => '',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Expect FlashMessage to be called with the error message
        $this->toolsMock
            ->expects($this->once())
            ->method('FlashMessage')
            ->with($this->equalTo("Adjon meg helyes adatokat!"), $this->equalTo('danger'));

        // Act
        $result = $controller->InsertUser($postData);

        // Assert
        $this->assertFalse($result);
    }

    public function testInsertUserWithMismatchingPasswords()
    {
        // Arrange
        $controller = new RegisterController();
        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password456',
        ];

        // Expect FlashMessage to be called with the error message
        $this->toolsMock
            ->expects($this->once())
            ->method('FlashMessage')
            ->with($this->equalTo("A jelszavak nem egyeznek!"), $this->equalTo('danger'));

        // Act
        $result = $controller->InsertUser($postData);

        // Assert
        $this->assertFalse($result);
    }

    public function testInsertUserWhenUsernameAlreadyExists()
    {
        // Arrange
        $controller = new RegisterController();
        $postData = [
            'username' => 'existinguser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Simulate the username already exists in the database
        $this->userMock
            ->expects($this->once())
            ->method('getItemBy')
            ->with($this->equalTo('username'), $this->equalTo('existinguser'))
            ->willReturn(true);

        // Expect FlashMessage to be called with the error message
        $this->toolsMock
            ->expects($this->once())
            ->method('FlashMessage')
            ->with($this->equalTo("Már létezik ilyen nevű felhasználó!"), $this->equalTo('danger'));

        // Act
        $result = $controller->InsertUser($postData);

        // Assert
        $this->assertFalse($result);
    }

    public function testInsertUserWhenEmailAlreadyExists()
    {
        // Arrange
        $controller = new RegisterController();
        $postData = [
            'username' => 'newuser',
            'email' => 'existing@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Simulate the email already exists in the database
        $this->userMock
    ->expects($this->exactly(2))
    ->method('getItemBy')
    ->will($this->returnCallback(function ($field, $value) {
        return $field === 'email' && $value === 'existing@example.com' || $field === 'username' && $value !== 'newuser';
    }));

        // Expect FlashMessage to be called with the error message
        $this->toolsMock
            ->expects($this->once())
            ->method('FlashMessage')
            ->with($this->equalTo("Már létezik ilyen email cím!"), $this->equalTo('danger'));

        // Act
        $result = $controller->InsertUser($postData);

        // Assert
        $this->assertFalse($result);
    }

    public function testSuccessfulUserInsert()
    {
        // Arrange
        $controller = new RegisterController();
        $postData = [
            'username' => 'newuser',
            'email' => 'newuser@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Simulate no existing user by username or email
        $this->userMock
            ->expects($this->exactly(2)) // username check, email check
            ->method('getItemBy')
            ->willReturn(false);

        // Mock the password encryption
        $this->toolsMock
            ->expects($this->once())
            ->method('Crypt')
            ->with($this->equalTo('password123'))
            ->willReturn('encrypted_password');

        // Simulate successful user save
        $this->userMock
            ->expects($this->once())
            ->method('save')
            ->willReturn(true);

        // Expect FlashMessage to be called with the success message
        $this->toolsMock
            ->expects($this->once())
            ->method('FlashMessage')
            ->with($this->equalTo("Sikeres regisztráció!"), $this->equalTo('success'));

        // Expect a redirect to the login page
        $this->expectOutputString(''); // For header() we suppress output, assuming test environment

        // Act
        $result = $controller->InsertUser($postData);

        // Assert
        $this->assertNull($result); // The controller returns nothing after success
    }
}
