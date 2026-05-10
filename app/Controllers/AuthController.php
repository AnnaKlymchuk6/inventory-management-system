<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Helpers/Auth.php';
require_once __DIR__ . '/../Services/ActivityLogger.php';

class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function loginForm(): void
    {
        $this->view('auth/login');
    }

    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if (!$user) {

            $this->view('auth/login', [
                'error' => 'Невірний email або пароль'
            ]);

            return;
        }

        if (!password_verify($password, $user['password'])) {

            $this->view('auth/login', [
                'error' => 'Невірний email або пароль'
            ]);

            return;
        }
        Auth::login($user);

        $logger = new ActivityLogger();
        $logger->log('Увійшов у систему');

        header('Location: /inventory-management-system/public/products');
    }

    public function logout(): void
    {
        $logger = new ActivityLogger();
        $logger->log('Вийшов із системи');

        Auth::logout();
        header('Location: /inventory-management-system/public/login');
    }
}