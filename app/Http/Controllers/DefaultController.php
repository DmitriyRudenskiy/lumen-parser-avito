<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Laravel\Lumen\Routing\Controller;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class DefaultController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::all();

        return view('default.index', ['orders' => $orders]);
    }

    public function form()
    {
        $customer = Customer::orderBy('name')->get();

        return view(
            'default.form',
            [
                'customer' => $customer
            ]
        );
    }

    public function table()
    {
        return view('default.table', []);
    }
}