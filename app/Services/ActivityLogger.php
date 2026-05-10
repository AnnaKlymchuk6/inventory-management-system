<?php

require_once __DIR__ . '/../Models/ActivityLog.php';
require_once __DIR__ . '/../Helpers/Auth.php';

class ActivityLogger
{
    private ActivityLog $activityLogModel;

    public function __construct()
    {
        $this->activityLogModel = new ActivityLog();
    }

    public function log(string $action): void
    {
        $user = Auth::user();

        $userName = $user['name'] ?? 'Guest';

        $this->activityLogModel->create(
            $userName,
            $action
        );
    }
}