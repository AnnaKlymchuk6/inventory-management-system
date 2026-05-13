<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Sale.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Helpers/Auth.php';
require_once __DIR__ . '/../Services/ActivityLogger.php';
require_once __DIR__ . '/../Models/StockMovement.php';

class SaleController extends Controller
{
    private Sale $saleModel;
    private Product $productModel;
    private SaleService $saleService;

    public function __construct()
    {
        Auth::requireLogin();

        $this->saleModel = new Sale();
        $this->productModel = new Product();
        $this->saleService = new SaleService();
    }

    public function index(): void
    {
        $sales = $this->saleModel->getAll();

        $this->view('sales/index', [
            'sales' => $sales
        ]);
    }

    public function create(): void
    {
        $products = $this->productModel->getAll();

        $this->view('sales/create', [
            'products' => $products
        ]);
    }

    public function store(): void
    {
        $productId = (int) $_POST['product_id'];
        $quantity = (int) $_POST['quantity'];
        $note = trim($_POST['note']);

        $result = $this->saleService->processSale($productId, $quantity, $note, Auth::user());

        if (!$result['success']) {
            if (isset($result['redirect']) && $result['redirect']) {
                header('Location: /inventory-management-system/public/sales');
                return;
            }
            die($result['error']);
        }

        header('Location: /inventory-management-system/public/sales');
    }
}