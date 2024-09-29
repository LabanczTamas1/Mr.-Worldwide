<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\RegisterController;
use App\Models\User;
use App\Tools;

class RegisterControllerTest extends TestCase
{
    protected $registerController;
    protected $userMock;

    protected function setUp(): void
    {
        parent::setUp();  // Call parent setup if needed
    
        // Reset the session to an empty array before each test
        $_SESSION = [];
    
        // Mock the $_SERVER superglobal to avoid undefined array key errors
        $_SERVER['SERVER_NAME'] = 'localhost';
        $_SERVER['REQUEST_URI'] = '/test-url';
    
        // Create a mock for the User model
        $this->userMock = $this->createMock(User::class);
    
        // Instantiate RegisterController with the mocked User object
        $this->registerController = new RegisterController($this->userMock);
    }
    

    public function testInsertUserSuccess()
{
    $postData = [
        'username' => 'testuser',
        'email' => 'test@example.com',
        'passwd1' => 'password123',
        'passwd2' => 'password123',
    ];

    // Mock `getItemBy` to return false for both username and email
    $this->userMock->expects($this->exactly(2))
        ->method('getItemBy')
        ->willReturn(false); // no user exists with the username or email

    // Mock `save` method to return true (user is saved successfully)
    $this->userMock->expects($this->once())
        ->method('save')
        ->willReturn(true);

    // Mock the redirect method to avoid header calls during tests
    $this->registerController = $this->getMockBuilder(RegisterController::class)
        ->setConstructorArgs([$this->userMock])
        ->onlyMethods(['redirect'])  // Only mock the redirect method
        ->getMock();

    $this->registerController->expects($this->once())
        ->method('redirect')
        ->with('/userhandle/login');  // Expect redirect to be called with the login URL

    // Call InsertUser method
    $result = $this->registerController->InsertUser($postData);

    // Assert that InsertUser returns true
    $this->assertTrue($result);
}


    public function testInsertUserFailsWhenFieldsAreEmpty()
    {
        // Define post data with empty fields
        $postData = [
            'username' => '',
            'email' => '',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals(
            'Please provide valid username and email.',
            $_SESSION['flash_message']['message']
        );
    }

    public function testInsertUserFailsWhenPasswordsDoNotMatch()
    {
        // Define post data with mismatched passwords
        $postData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password124',
        ];

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals(
            'Passwords do not match.',
            $_SESSION['flash_message']['message']
        );
    }

    public function testInsertUserFailsWhenUsernameAlreadyExists()
    {
        // Define post data where username already exists
        $postData = [
            'username' => 'existinguser',
            'email' => 'newemail@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Mock `getItemBy` to return true for existing username
        $this->userMock->expects($this->once())
            ->method('getItemBy')
            ->with('username', $postData['username'])
            ->willReturn(true);

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals('Username already exists.', $_SESSION['flash_message']['message']);
    }

        public function testInsertUserFailsWhenEmailAlreadyExists()
    {
        $postData = [
            'username' => 'newuser',
            'email' => 'existing@example.com',
            'passwd1' => 'password123',
            'passwd2' => 'password123',
        ];

        // Mock `getItemBy` to first return false for the username check, then return true for the email check
        $this->userMock->expects($this->exactly(2))
            ->method('getItemBy')
            ->withConsecutive(
                ['username', $postData['username']],  // First call checks the username
                ['email', $postData['email']]         // Second call checks the email
            )
            ->willReturnOnConsecutiveCalls(false, true); // Username does not exist, but email does

        // Call InsertUser method
        $result = $this->registerController->InsertUser($postData);

        // Assert that InsertUser returns false
        $this->assertFalse($result);

        // Assert that the flash message is correctly set
        $this->assertEquals('Email already exists.', $_SESSION['flash_message']['message']);
    }
}
