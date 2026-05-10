<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/ActivityLog.php';
require_once __DIR__ . '/../Helpers/Auth.php';

class ActivityLogController extends Controller
{
    private ActivityLog $activityLogModel;

    public function __construct()
    {
        Auth::requireLogin();

        $this->activityLogModel = new ActivityLog();
    }

    public function index(): void
    {
        $logs = $this->activityLogModel->getAll();

        $this->view('activity-logs/index', [
            'logs' => $logs
        ]);
    }
}