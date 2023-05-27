<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");

        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities(
                $productsInCart,
                $productsInSession
            );
        } else {
            $productsInCart = [];
        }
        $viewData = [];
        $viewData["title"] = "Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }


    public function add(Request $request, $id)
    {
        $products = $request->session()->get("products");
        if ($products && array_key_exists($id, $products)) {
            $products[$id] += $request->input("quantity");
        } else {
            $products[$id] = $request->input("quantity");
        }
        if ($request->input("quantity") === null) {
            $products[$id] = 1;
        }
        $request->session()->put("products", $products);
        return redirect()->route('cart.index');
    }
    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }
    public function deleteById(Request $request, $id)
    {
        $products = $request->session()->get("products");
        unset($products[$id]);
        $request->session()->put("products", $products);
        return redirect()->route("cart.index");
    }
    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();
            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();
            $request->session()->forget('products');
            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $order;
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
    // public function update($id, Request $request)
    // {
    //     // lấy số lượng mới của sản phẩm từ người dùng
    //     $quantity = intval($request->input('quantity'));

    //     // kiểm tra số lượng mới có hợp lệ không
    //     if ($quantity <= 0) {
    //         // nếu số lượng mới là 0 hoặc âm thì xóa sản phẩm khỏi giỏ hàng
    //         $this->deleteById($id);
    //         return redirect()->route('cart.index');
    //     }

    //     // lấy thông tin giỏ hàng từ session
    //     $products = session('products', []);

    //     // kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không
    //     if (isset($products[$id])) {
    //         // cập nhật số lượng sản phẩm trong giỏ hàng
    //         $products[$id] = $quantity;
    //         session(['products' => $products]);
    //     }

    //     return redirect()->route('cart.index');
    // }
}
