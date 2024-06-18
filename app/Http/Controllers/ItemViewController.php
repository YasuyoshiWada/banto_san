<?php
// ItemViewController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\CartItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\ItemTrait;
use Illuminate\Support\Facades\Auth; // Authを追加

class ItemViewController extends Controller
{
    use ItemTrait;

    public function index()
    {
        $orderedItems = [];
        $user = Auth::user();

        // ユーザーがログインしているか確認
        if (!$user) {
            // ユーザーがログインしていない場合の処理
            // 例: ログインページにリダイレクトするなど
            return redirect()->route('login');
        }
        // ユーザーのカートを取得
        $cart = $user->cart;

        // カートが存在しない場合、新しいカートを作成
        if (!$cart) {
            $cart = Cart::create([
                "user_id" => $user->id
            ]);
        }
        $items = Item::paginate(10);
        // todo: add a user_id column in carts table
        $orderedItems = Cart::find($user->cart->id)->items;
        // dd($user->cart);
        // dd($orderedItems->items);
        return view('item.item-view', ['cart' => $cart, 'items' => $items, 'orderedItems' => $orderedItems,]);
    }


    public function addOrder(Item $item)
    {
        $user = Auth::user();

        // ユーザーがログインしているか確認
        if (!$user) {
            // ユーザーがログインしていない場合の処理
            // 例: ログインページにリダイレクトするなど
            return redirect()->route('login');
        }

        // ユーザーのカートを取得
        $cart = $user->cart;

        // カートが存在しない場合、新しいカートを作成
        if (!$cart) {
            $cart = Cart::create([
                "user_id" => $user->id
            ]);
        }

        // Check if the item already exists in the cart
        $existingCartItem = $cart->items()->where('item_id', $item->id)->first();

        if ($existingCartItem) {
            // If the item exists, update the quantity
            $existingCartItem->update([
                'qty' => $existingCartItem->qty + 1,
            ]);
        } else {
            // If the item doesn't exist, create a new cart item
            $cartItem = new CartItem([
                'item_id' => $item->id,
                'item_price' => $item->price,
                'qty' => 1,
            ]);
            $cart->items()->save($cartItem);
        }

        // 他の処理...

        return redirect()->route('item-view.index'); // または適切なリダイレクト先に変更
    }

    public function updateQuantity(CartItem $cartItem, $quantity)
    {
        $cartItem->qty = $quantity;
        // カートアイテムの数量を更新
        $cartItem->save();

        // 必要なレスポンスを返す（例: 更新後のHTMLを返す）
        // ここではHTMLを返す仮定で、実際のレスポンスを返すロジックに置き換えてください
        return redirect()->back();
    }

    public function deleteOrder(CartItem $cartItem)
    {
        // $cart_item はルートパラメーターから受け取ります
        //$item = CartItem::find($cartItem);
        $cartItem->delete();

        return redirect()->route('item-view.index'); // または適切なリダイレクト先に変更

    }

    public function sendOrder(Request $request)
    {

        // フォームから送信されたデータを取得
        $cartId = $request->input('cart_id');
        $userId = Auth::user()->id; // ログインユーザーのIDを取得
        $paidAmount = $request->input('total');
        // 他のオーダー情報を取得
        // transaction テーブルにデータを保存

        $transaction = new Transaction;
        $transaction->cart_id = $cartId;
        $transaction->user_id = $userId;
        $transaction->paid_amount = $paidAmount;
        // Set other order information here
        $transaction->save();

        return redirect()->route('transaction.index');
    }
}
