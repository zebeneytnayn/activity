@extends('layout.app')
@section('title', 'List Items')
@section('content')

<div class="container">
    <h1 class="text-warning mb-4">Items List</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">
                + Add Items
            </button>

        </div>
    </div>

    <div class=" row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form id="search_form" class="search_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Business Unit</label>
                                <select class="form-select" id="business_unit" name="business_unit" required>
                                    <option value="">Select...</option>
                                    @forelse ($listItem['data'] as $listItems)
                                    <option value="{{ $listItems->bu_id }}"> {{ $listItems->bu_id }} </option>
                                    @empty
                                    <option value="">No Business Units Available</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Item Code</label>
                                <input type="text" class="form-control" name="item_code" id="item_code" placeholder="..." list="listItem" required>
                                <datalist id="listItem">
                                    <option></option>
                                </datalist>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="..." list="listDescription" required>
                                <datalist id="listDescription">
                                    <option></option>
                                </datalist>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Base OUM</label>
                                <select class="form-select" name="base_uom" id="base_uom" required>
                                    <option value="">Select...</option>

                                    <!-- Add options for base UOM -->
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category" id="category" required>
                                    <option value="">Select</option>
                                    <!-- Add options for categories -->
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Sub Category</label>
                                <select class="form-select" name="sub_category" id="sub_category" required>
                                    <option value="">Select</option>
                                    <!-- Add options for sub-categories -->
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Search</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- table -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Business Unit</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>UOM</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Display item data here -->
                            <tr id="tableBody">

                            </tr>

                            <tr>
                                <td colspan="7" id="clickToShow" class="text-center">Click search to show data</td>
                                <td colspan="7" id="item_table tbody" class="text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- endOfTable -->

            </div>
        </div>
    </div>
</div>


<!-- modal form for adding an Item -->

<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert-messages"></div>
            <form id="form" method="post">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Business Unit *</label>
                        <select class="form-select" id="bu_id" name="bu_id" required>
                            <option value="">Select...</option>
                            <option value="1005">1005</option>
                            <option value="1008">1008</option>
                            <option value="2008">2008</option>
                        </select>
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Item Code *</label>
                        <input type="text" class="form-control" id="item_code" name="item_code" placeholder="..." required>
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description *</label>
                        <textarea type="text" class="form-control" id="description" name="description" required placeholder="..."></textarea>
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Base UOM *</label>
                        <select class="form-select" id="base_uom" name="base_uom" required>
                            <option value="">Select...</option>
                            <option value="apk">APK</option>
                            <option value="efg">EFG</option>
                        </select>
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <labelclass="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Select...</option>
                                <option value="webapp">Web App</option>
                                <option value="app">Mobile App</option>
                            </select>
                            <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sub Category</label>
                        <select class="form-select" id="sub_category" name="sub_category">
                            <option value="">Select...</option>
                            <option value="software">Software</option>
                            <option value="mobile">Mobile</option>
                            <option value="website">Wesbite</option>
                        </select>
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Default Selling Price</label>
                        <input type="number" class="form-control" id="def_selling_price" name="def_selling_price" placeholder="...">
                        <div class="error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="enabled" name="enabled">
                            <label class="form-check-label" for="enabled">Enabled</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="billable" name="billable">
                            <label class="form-check-label" for="billable">Billable</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="purchasable" name="purchasable">
                            <label class="form-check-label" for="purchasable">Purchasable</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="stockable" name="stockable">
                            <label class="form-check-label" for="stockable">Stockable</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end of modal Item -->

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="itemName" placeholder="Enter item name">
                    </div>
                    <div class="mb-3">
                        <label for="itemDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="itemDescription" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        function clearSelect(elementId) {
            $('#' + elementId).empty();
        }
        $('button[type="reset"]').click(function() {
            clearSelect('listItem');
            clearSelect('listDescription');
            clearSelect('base_uom');
            clearSelect('category');
            clearSelect('sub_category');
            $('table tbody').empty();
        });

        // $('#item_code').change(function() {
        //     let item_code = $(this).val();
        //     console.log(item_code);
        // });
        // $('#description').change(function() {
        //     let description = $(this).val();
        //     console.log(description);
        // });
        // $('#base_uom').change(function() {
        //     let base_uom = $(this).val();
        //     console.log(base_uom);
        // });
        // $('#category').change(function() {
        //     let category = $(this).val();
        //     console.log(category);
        // });
        // $('#sub_category').change(function() {
        //     let sub_category = $(this).val();
        //     console.log(sub_category);
        // });

    });
</script>
@endsection