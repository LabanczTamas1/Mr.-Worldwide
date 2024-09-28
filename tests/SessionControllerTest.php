<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\SessionController;
use App\Session;

class SessionControllerTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset session before each test
        $_SESSION = [];

        // Mock session_start behavior
        if (!function_exists('session_start')) {
            function session_start() { return true; }
        }
    }

    public function testCreateSession()
    {
        // Arrange
        $user_id = 1;

        // Act
        $controller = new SessionController();
        $controller->create($user_id);

        // Assert
        $this->assertArrayHasKey('user', $_SESSION);
        $this->assertInstanceOf(Session::class, $_SESSION['user']);
    }

    public function testDestroySession()
    {
        // Arrange
        $_SESSION['user'] = new Session(1); // Simulate an active session

        // Act
        $controller = new SessionController();
        $result = $controller->destroy();

        // Assert
        $this->assertTrue($result);
        $this->assertArrayNotHasKey('user', $_SESSION);
    }

    public function testIsAuthWhenUserSessionExists()
    {
        // Arrange
        $_SESSION['user'] = new Session(1); // Simulate a session with a logged-in user

        // Act & Assert
        $this->assertTrue(SessionController::isAuth());
    }

    public function testIsAuthWhenUserSessionDoesNotExist()
    {
        // Arrange
        $_SESSION = []; // No session set

        // Act & Assert
        $this->assertFalse(SessionController::isAuth());
    }

    public function testAuthAssignsSessionToController()
    {
        // Arrange
        $_SESSION['user'] = new Session(1); // Simulate an active session

        // Act
        $controller = new SessionController();

        // Assert
        $this->assertInstanceOf(Session::class, $controller->getSession());
    }

    public function testAuthDoesNotAssignSessionIfNoUser()
    {
        // Arrange
        $_SESSION = []; // No session

        // Act
        $controller = new SessionController();

        // Assert
        $this->assertNull($controller->getSession());
    }

    public function testGetSessionWhenSessionIsSet()
    {
        // Arrange
        $_SESSION['user'] = new Session(1); // Simulate an active session

        // Act
        $controller = new SessionController();
        $session = $controller->getSession();

        // Assert
        $this->assertInstanceOf(Session::class, $session);
    }

    public function testGetSessionWhenSessionIsNotSet()
    {
        // Arrange
        $_SESSION = []; // No session

        // Act
        $controller = new SessionController();
        $session = $controller->getSession();

        // Assert
        $this->assertNull($session);
    }
}
