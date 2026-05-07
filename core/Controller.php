<?php

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        require __DIR__ . '/../app/Views/' . $view . '.php';
    }
}