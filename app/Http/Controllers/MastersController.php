<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Supplier;
use App\Category;
use App\Brand;
use App\Item;
use Faker\Provider\Company;

class MastersController extends Controller
{


    public function index()
    {
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $categories= Category::all();
        $brands = Brand::all();
        $items = Item::all();
        return view('masters/index', compact('suppliers','categories','customers','brands','items'));
    }


    //supplier

    public function createsupplier(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Supplier::create($request->all());

        return redirect('/master')->with('status','Pemasok Berhasil Ditambahkan');
    }

    public function editsupplier(Supplier $supplier)
    {
        return view('masters.supplier.edit',compact('supplier'));
    }

    public function updatesupplier(Request $request, Supplier $supplier)
    {
        Supplier::where('id',$supplier->id)
                ->update([
                    'name' => $request->name,
                    'cs' => $request->cs,
                    'address' => $request->address,
                    'sales' => $request->sales,
                    'hp' => $request->hp
                ]);
        return redirect('/master')->with('status','Pemasok berhasil diedit');
    }

    public function destroysupplier(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);
        return redirect('/master')->with('status','Pemasok Berhasil Dihapus');
    }

    //customer
    public function createcustomer(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Customer::create($request->all());

        return redirect('/master')->with('status','Pelanggan Berhasil Ditambahkan');
    }

    public function destroycustomer(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect('/master')->with('status','Pelanggan Berhasil Dihapus');

    }

    public function editcustomer(Customer $customer)
    {
        return view('masters.customer.edit',compact('customer'));
    }

    public function updatecustomer(Request $request, Customer $customer)
    {
        Customer::where('id',$customer->id)
                ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'hp' => $request->hp
                ]);
        return redirect('master')->with('status','Pelanggan berhasil diedit');
    }

    //category
    public function createcategory(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create($request->all());

        return redirect('master')->with('status','Kategori Berhasil Ditambahkan');
    }

    public function destroycategory(Category $category)
    {
        Category::destroy($category->id);
        return redirect('master')->with('status','Kategori Berhasil Dihapus');

    }

    //brand
    public function createbrand(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands'
        ]);

        Brand::create($request->all());
        return redirect('master')->with('status','Brand Berhasil Ditambahkan');
    }

    public function destroybrand(Brand $brand)
    {
        Brand::destroy($brand->id);
        return redirect('master')->with('status','Brand Berhasil Dihapus');

    }

    public function createitem(Request $request)
    {
        $item = new Item;
        $item->brand_id = $request->brand;
        $item->category_id = $request->category;
        $item->tipe = $request->tipe;
        $item->description = $request->description;
        if ($request->hasFile('image'))
        {
            $request->file('image')->move('image/',$request->file('image')->getClientOriginalName());
            $item->image = $request->file('image')->getClientOriginalName();
        };
        $item->save();
        return redirect('master')->with('status','Item Berhasil Ditambahkan');
    }

    public function showitem(Item $item)
    {
        return view('masters.item.detail', compact('item'));
    }

    public function destroyitem(Item $item){
        Item::destroy($item->id);
        return redirect('master')->with('status','Item Berhasil Dihapus');
    }
}
