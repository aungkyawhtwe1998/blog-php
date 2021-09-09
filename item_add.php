<?php include "template/header.php";?>
<div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white">
                                <li class="breadcrumb-item"><a href="dashboard.html"><i class="feather-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo $url;?>/item_list.php">Item</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Item</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4>
                                        <i class="feather-plus-circle text-primary">Add Item</i>
                                    </h4>
                                    <a href="<?php echo $url;?>/item_list.php" class="btn btn-outline-primary">
                                        <i class="feather-list"></i>
                                    </a>
                                </div>
                                <hr>
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="photo">
                                                    Photo Upload

                                                </label>
                                                <i class="feather-info text-primary" data-bs-container="body"
                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                    data-bs-content="only support JPG/PNG"></i>

                                                <input type="file" name="photo" id="photo" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name"> Item Name</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select name="type" id="type" class="form-control custom-select">
                                                    <option value="0">Wet Goods</option>
                                                    <option value="1">Dry Goods</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="c">Category</label>
                                                <select name="c" id="c" class="form-control custom-select">
                                                    <option value="" selected disabled>Select Category</option>
                                                    <!-- <option value="0">Wet Goods</option>
                                                    <option value="1">Dry Goods</option> -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sc">Sub Category</label>
                                                <select name="sc" id="sc" class="form-control custom-select">
                                                    <option value="" selected disabled>Select Sub Category</option>

                                                    <!-- <option value="0">Wet Goods</option>
                                                    <option value="1">Dry Goods</option> -->
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="q">Item Quantity</label>
                                                    <input type="text" id="q" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="s-category">Units</label>
                                                        <select name="type" id="s-category"
                                                            class="form-control custom-select">
                                                            <option value="0">Wet Goods</option>
                                                            <option value="1">Dry Goods</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="price"> Price</label>
                                                <input type="number" id="price" name="price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="des"> Description</label>
                                                <textarea type="text" id="des" name="des" rows="8"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6"></div>

                                    </div>
                                    <hr>
                                    <button class="btn btn-primary"> Add Item</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
<?php include "template/footer.php";?>
