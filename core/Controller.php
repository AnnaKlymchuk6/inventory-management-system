<?php

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = __DIR__ . '/../app/Views/' . $view . '.php';

        require __DIR__ . '/../app/Views/layouts/main.php';
    }
}