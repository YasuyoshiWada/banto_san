<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Category;
class CategoryController extends Controller
{
    private $category;
    private $item;
    public function __construct(Category $category,Item $item)
    {
        $this->category = $category;
        $this->item = $item;
    }
    public function index()
    {
        $all_categories = Category::with('item')->latest()->paginate(8);
        return view('category.itemcategories')->with('all_categories',$all_categories);
    }
    public function itemindex($id) //item index function show up item in the category
{
    $category = Category::with('item')->find($id);
    if (!$category) {
        // category not found is show up
    }
        $items = $category->item()->paginate(8);

    return view('category.categoryitemlist',compact('category','items'));
}
public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        $all_categories = $this->category->all();
        $selected_categories = [];        if ($category->categories !== null && $category->categories->isNotEmpty()) {
            foreach($category->categories as $categories_item) {
                $selected_categories[] = $categories_item->id;
            }
        }        return view('category.edit')
                    ->with('category',$category)
                    ->with('all_categories',$all_categories)
                    ->with('selectedCategories',$selected_categories);
    }

        public function store(Request $request)
{

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2096',
        ]);

        $this->category->name = $request->name;
        $this->category->image = 'data:image/'. $request->image->extension() . ';base64,' .base64_encode(file_get_contents($request->image));

        $this->category->save();

        return redirect()->route('category.index');
}
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2096',
        ]);

        $category = $this->category->findOrFail($id);
        $category->name = $request->name;

        if ($request->image) {
            $category->image = 'data:image/'. $request->image->extension() . ';base64,' .base64_encode(file_get_contents($request->image));
        }

        $category->save();

        return redirect()->route('category.index', $category->id);
    }
}

