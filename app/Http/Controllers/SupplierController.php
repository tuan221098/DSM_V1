<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'name' => trans('menu.products.supplier'),
            ]
        ];
        $statuses = $this -> getStatuses();
        return view('supplier.index', compact('breadcrumbs', 'statuses'));
    }

    //loadFm
    public function loadForm(Request $request)
    {

        $statuses = $this->getStatuses();
        $id = $request->id;
        if ($id==null) {
            $supplier =new Supplier();}
        else
        {
            $supplier = Supplier::findOrFail($id);
        }
        return view('supplier.form', compact('supplier', 'statuses'));
    }
    //getStatuses
    private function getStatuses()
    {
        $statuses = [];

        foreach (config('constants.supplier_status') as $key => $value) {
            $statuses[$value] = trans("layout.supplier_status.$key");
        }

        return $statuses;
    }

    public function search(Request $request)
    {
        $query = Supplier::query();
        if ($request->code_supplier) {
            $query = $query->where('code_supplier', 'like', "%$request->code_supplier%");
        }
        if ($request->name_supplier) {
            $query = $query->where('name_supplier', 'like', "%$request->name_supplier%");
        }
        if ($request->status_search != '') {
            $query = $query->where('status', $request->status_search);
        }
        $data = $query->orderByDesc('created_at')
            ->select([ 'id','code_supplier','email','phone','name_supplier','status'])->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status_name', function ($row) {
                return $row->getStatusName();
            })
            ->addColumn('status_badge', function ($row) {
                if ($row->status == config('constants.supplier_status.active')) {
                    return 'primary';
                } else if ($row->status == config('constants.supplier_status.in_active')) {
                    return 'danger';
                }
            })
            ->rawColumns(['status_name','status_badge'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = [
            'code_supplier' => $request->code_supplier,
            'name_supplier' => $request->name_supplier,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ];

        $result = Supplier::create($supplier);

        if ($result->id) {
            return response()->json([
                'success' => true,
                'message' => trans('supplier.messages.create_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => trans('supplier.messages.create_fail')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $success = $supplier->update([
            'code_supplier' => $request->code_supplier,
            'name_supplier' => $request->name_supplier,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        if ($success) {
            return response()->json([
                'success' => true,
                'message' => trans('supplier.messages.update_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => trans('supplier.messages.update_fail')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $success = $supplier->delete();

        if ($success) {
            return response()->json([
                'success' => true,
                'message' => trans('supplier.messages.delete_success')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => trans('supplier.messages.delete_fail')
        ]);
    }
}
