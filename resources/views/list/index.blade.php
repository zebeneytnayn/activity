<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>
<body>
    <h1 class="text-warning">Item List</h1>
    <div>
        <div class="row pb-5">
            <div>
            
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    + Add Items
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="form" method="post">
                                    @csrf
                                    
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- modal body -->
                                    <div class="modal-body">
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label">Business Unit *</label>
                                            <div class="col-sm-7">
                                                <select class="form-select" id="bu_id" name="bu_id">
                                                    <option value="1">Lux</option>
                                                    <option value="2">Scc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label form-label">Item Code:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="item_code" name="item_code" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label form-label">Description:</label>
                                            <div class="col-sm-7">
                                                <textarea type="text" class="form-control" id="description" name="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label">Base UOM *</label>
                                            <div class="col-sm-7">
                                                <select class="form-select" id="base_uom" name="base_uom">
                                                    <option value="apk">APK</option>
                                                    <option value="efg">EFG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label">Category</label>
                                            <div class="col-sm-7">
                                                <select class="form-select" id="category" name="category">
                                                    <option value="webapp">Web App</option>
                                                    <option value="app">Mobile App</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label">Sub Category</label>
                                            <div class="col-sm-7">
                                                <select class="form-select" id="sub_category" name="sub_category">
                                                    <option value="system">System</option>
                                                    <option value="website">Wesbite</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-4 col-form-label form-label">Default Selling Price:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="def_selling_price" name="def_selling_price" required>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="enabled" name="enabled">
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="billable" name="billable">
                                            <label class="form-check-label">Billable</label>
                                        </div>
                                        
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="purchasable" name="purchasable">
                                            <label class="form-check-label">Purchasable</label>
                                        </div>
                                        <div class="form-check form-switch ">
                                            <input class="form-check-input" type="checkbox" role="switch" id="stockable" name="stockable">
                                            <label class="form-check-label">Stockable</label>
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
                    <!-- end of modal -->
                    
                    <div class="input-group mb-3">
                    <div class="col-md-2">
                                    <select class="form-select" name="business_unit">
                                        <option value="">Select...</option>
                                        <!-- Add options for business units -->
                                    </select>
                                </div>
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2" class="visually-hidden">Email</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Password</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                    </div>
        
            </div>
        </div>

    <div>
        <h2 class="text-primary text-center pb-2"></h1>
            <table class="table">
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


                </tbody>
            </table>
    </div>



<script>
$(document).ready(function() {
    $('#form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("store") }}',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Success:', response);
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    });
});
</script>

</div>
</body>
</html>