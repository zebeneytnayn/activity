<?php

namespace App\Http\Controllers;

use App\Models\InvItem;
use Illuminate\Http\Request;

class InvItemController extends Controller
{

    public function index()
    {
        //
        $listItem['data'] = InvItem::orderby('bu_id', 'asc')
            ->distinct('bu_id')
            ->select('bu_id',)
            ->get();
        return view('items.index')->with('listItem', $listItem);
    }

    public function getItemCode($bu_id)
    {

        $itemCodes = [];
        $itemCodes['item_code'] = InvItem::where('bu_id', $bu_id)->distinct('item_code')->pluck('item_code');
        $itemCodes['description'] = InvItem::where('bu_id', $bu_id)->distinct('description')->pluck('description');
        $itemCodes['base_uom'] = InvItem::where('bu_id', $bu_id)->distinct('base_uom')->pluck('base_uom');
        $itemCodes['category'] = InvItem::where('bu_id', $bu_id)->distinct('category')->pluck('category');
        $itemCodes['sub_category'] = InvItem::where('bu_id', $bu_id)->distinct('sub_category')->pluck('sub_category');
        return response()->json(['data' => $itemCodes]);
    }

    public function getData($bu_id)
    {
        $itemCodes['data'] = InvItem::where('bu_id', $bu_id)
            ->orderby('bu_id', 'asc')
            ->select('item_id', 'bu_id', 'item_code', 'description', 'base_uom', 'category', 'sub_category')
            ->get();
        return response()->json($itemCodes);
    }


    public function create()
    {
        //get
        return view('list.index');
    }



    public function store(Request $request)
    {
        //to validate the user input
        $data = $request->validate([
            'bu_id' => 'required|integer',
            'item_code' => 'required|string',
            'description' => 'required|string|max:100',
            'base_uom' => 'required|string|size:3',
            'category' => 'required|string|max:30',
            'sub_category' => 'required|string|max:30',
            'def_selling_price' => 'required|numeric',
        ]);

        //to make sure the radio butts value are smallInt
        $data = [
            'bu_id' => $request->input('bu_id'),
            'item_code' => $request->input('item_code'),
            'description' => $request->input('description'),
            'base_uom' => $request->input('base_uom'),
            'category' => $request->input('category'),
            'sub_category' => $request->input('sub_category'),
            'def_selling_price' => $request->input('def_selling_price'),
            'enabled' => $request->has('enabled') ? 1 : 0,
            'billable' => $request->has('billable') ? 1 : 0,
            'purchasable' => $request->has('purchasable') ? 1 : 0,
            'stockable' => $request->has('stockable') ? 1 : 0,
        ];

        try {
            $invItem = InvItem::create($data);
            return response()->json(['success' => 'Item created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while creating Item: ' . $e->getMessage());
        }
    }


    public function show(InvItem $invItem)
    {
        //
    }


    public function edit(InvItem $invItem)
    {
        //
    }


    public function update(Request $request, InvItem $invItem)
    {
        //
    }

    public function destroy(InvItem $invItem)
    {
        //
    }
}
