<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $breadcrumbs = [
            [
                'name' => trans('menu.products.category'),
            ]
        ];
        $statuses = $this->getStatuses();
        $statuses = collect($statuses)->prepend('Tất cả', '');
        return view('categories.index', compact('breadcrumbs', 'statuses'));
    }

    public function search(Request $request)
    {
        $query = Category::query();
        if ($request->name_search) {
            $query = $query->where('name', 'like', "%$request->name_search%");
        }
        if ($request->status_search != '') {
            $query = $query->where('status', $request->status_search);
        }
        $data = $query->select(['id', 'name', 'description', 'status'])->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status_name', function ($row) {
                return $row->getStatusName();
            })
            ->addColumn('status_badge', function ($row) {
                if ($row->status == config('constants.category_status.active')) {
                    return 'primary';
                } else if ($row->status == config('constants.category_status.in_active')) {
                    return 'danger';
                }
            })
            ->make(true);
    }

    public function loadForm(Request $request)
    {
        $category = new Category();
        $statuses = $this->getStatuses();
        $id = $request->id;
        if ($id) {
            $category = Category::findOrFail($id);
        }
        return view('categories.form', compact('category', 'statuses'));
    }

    public function store(Request $request)
    {
        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $result = Category::create($category);

        if ($result->id) {
            return response()->json([
                'success' => true,
                'messages' => trans('category.messages.create_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'messages' => trans('category.messages.create_fail')
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $success = $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if ($success) {
            return response()->json([
                'success' => true,
                'messages' => trans('category.messages.update_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'messages' => trans('category.messages.update_fail')
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $success = $category->delete();

        if ($success) {
            return response()->json([
                'success' => true,
                'messages' => trans('category.messages.delete_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'messages' => trans('category.messages.delete_fail')
        ]);
    }

    private function getStatuses()
    {
        $statuses = [];

        foreach (config('constants.category_status') as $key => $value) {
            $statuses[$value] = trans("layout.category_status.$key");
        }

        return $statuses;
    }
}
