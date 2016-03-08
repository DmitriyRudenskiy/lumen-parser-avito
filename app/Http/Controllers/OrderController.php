<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('default.index', []);
    }

    public function add()
    {
        return view('default.form', []);
    }

    public function insert(Request $request)
    {
        $data = $request->only(['customer_id', 'price', 'amount', 'sum', 'name', 'description', 'path', 'ready']);
        $data['user_id'] = Auth::user()->id;

        var_dump($data);

        Order::forceCreate($data);

    }


    public function table()
    {
        return view('default.table', []);
    }
}