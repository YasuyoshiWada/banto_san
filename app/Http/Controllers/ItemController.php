<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'images';

    private $item;
    private $category;

    public function __construct(Item $item, Category $category)
    {
        $this->item = $item;
        $this->category = $category;
    }

    public function index()
    {
        $all_items = $this->item->latest()->paginate(10);
        return view('item.item')->with('all_items', $all_items);
    }

    public function create()
    {
        $all_categories = Category::all();
        $selected_categories = [];
        return view('item.create', compact('all_categories', 'selected_categories'));
    }

    public function store(Request $request)
    {
        // バリデーションルール

        $request->validate([
            'name' => 'required|min:1|max:200',
            'price' => 'required|min:1|max:50',
            'detail' => 'required|min:1|max:200',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2096',
            'inventory' => 'required|numeric|min:1|max:50',
            'category' => 'required|array',
        ]);

        $selected_categories = $request->category;
        $item = new Item([
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail,
            'inventory' => $request->inventory,
            'status' => 'active',
            'category_id' => $selected_categories[0]
        ]);

        if ($request->image) {
            $item->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }

        $item->save();
        $item->categories()->attach($selected_categories);

        return redirect()->route('item.index');
    }

    public function edit($id)
    {
        $item = $this->item->findOrFail($id);
        $all_categories = $this->category->all();
        $selected_categories = [];

        if ($item->categories !== null && $item->categories->isNotEmpty()) {
            foreach ($item->categories as $categories_item) {
                $selected_categories[] = $categories_item->id;
            }
        }

        return view('item.edit')
            ->with('item', $item)
            ->with('all_categories', $all_categories)
            ->with('selected_categories', $selected_categories);
    }

    public function update(Request $request, $id)
    {
        // バリデーションルール
        $request->validate([
            'name' => 'min:1|max:200',
            'price' => 'min:1|max:50',
            'upload_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
        ]);

        $item = $this->item->findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;

        if ($request->upload_file) {
            $item->image = 'data:image/' . $request->upload_file->extension() . ';base64,' . base64_encode(file_get_contents($request->upload_file));
        }

        $item->category_id = $request->category;
        $item->save();

        $item->categories()->sync([$request->category]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = $this->item->findOrFail($id);
        $item->categories()->detach('category_id');
        $item->delete();

        return redirect()->route('item.index');
    }
}
