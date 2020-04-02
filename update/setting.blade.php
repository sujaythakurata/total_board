<!DOCTYPE html>
<html lang="en">

<head>
    <title>Setting</title>
    <base href="<?= base_url() ?>" target="_blank">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('common/myproject.css')}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    <?php include("import/header.php"); ?>
    <section class="main-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="login-form">
                        <div class="main-div" style="margin: 0;">
                            <div class="panel">
                                <h2>Batch Add</h2>
                            </div>
                            <form id="batch_add">
                                <div class="form-group c-form-group">
                                    <label>Batch No</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_no" class="form-control">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Select Product</label>
                                    <div class="form-control-wrap">
                                        <select name="product_id" id="productID" class="form-control">
                                            <?php
                                            // echo "<pre>";print_r($products);die;
                                            foreach ($products as $value) { ?>
                                                <option value="<?= $value->product_id ?>">
                                                    <?= $value->product_name ?>___
                                                    <?= $value->no_of_bottle ?>B
                                                    <?= $value->liters ?>L
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Quantity</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_qty" class="form-control" id="batch_qty">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Carton</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_carton" class="form-control" id="batch_carton">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <button type="submit" class="bttn st btn-orange btn-block text-uppercase">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="color: var(--cl-white);">
                    <h2 a-lign="center">Batch List</h2>
                    <table class="table table-bordered" style="color: var(--cl-white);">
                        <tr>
                            <th>Batch No</th>
                            <th>Batch Qty</th>
                            <th>Batch Carton</th>
                            <th>Product Name</th>
                            <th>BL</th>
                            <th>CreateTime</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($batches as $value) { ?>
                            <tr>
                                <td><?= $value->batch_no ?></td>
                                <td><?= $value->batch_qty ?></td>
                                <td><?= $value->batch_carton ?></td>
                                <td><?= $value->product_name ?></td>
                                <td><?= $value->no_of_bottle . "B" . $value->liters ?>L</td>
                                <td><?= $value->batch_start_time ?></td>
                                <td>
                                    <?php
                                        if ($value->batch_status == 0) { ?>
                                        <button type="button" data-id="<?= $value->batch_id ?>" class="bttn st btn-orange start">Start</button>
                                    <?php } else if ($value->batch_status == 1) { ?>
                                        <button type="button" data-id="<?= $value->batch_id ?>" class="bttn st btn-outline start">Stop</button>
                                    <?php } else { ?>
                                        Finished
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <br />
            <div class="row" id="shift">
                <div class="col-md-12" style="color: var(--cl-white);">
                    <h2 a-lign="center">Shift</h2>
                    <table class="table table-bordered" style="color: var(--cl-white);">
                        <tr>
                            <th>No</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($siftList as $value) { ?>
                            <tr>
                                <td><?= $value->shift_id ?></td>
                                <td><input type="time" value="<?= $value->start_time ?>" id="start_<?= $value->shift_id ?>" /></td>
                                <td><input type="time" value="<?= $value->end_time ?>" id="end_<?= $value->shift_id ?>" /></td>
                                <td><button type="button" data-id="<?= $value->shift_id ?>" class="bttn st btn-orange updateSift">Update</button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="comman-footer-outer">
        <!-- FOOTER -->
        <footer>
            <div class="container text-center">
                <p class="para-14">&copy; 2017-2019 Company, Inc.</p>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js;)}}"></script>
    <script src="{{asset('js/bootstrap.min.js')"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('common/myforms.js')}}"></script>
    <script type="text/javascript">
        var productList = <?= json_encode($products) ?>;
        console.log(productList);
        //product_id: "1"
        // productID
        // batch_qty
        $(document).ready(function() {
            // pie chart:
            $("#batch_qty").focusout(function() {
                console.log($("#productID").val());
                var productID = $("#productID").val();
                var batch_qty = parseInt($("#batch_qty").val());
                $.each(productList, function(i, elem) {
                    if (elem.product_id == productID) {
                        $("#batch_carton").val(Math.ceil(batch_qty / parseInt(elem.no_of_bottle)));
                    }
                });
            });
            $("#batch_add").on('submit', (function(e) {
                e.preventDefault();
                sendDataInPost(
                    "<?= base_url() ?>machine/saveBatch",
                    $("#batch_add"),
                    new FormData($("#batch_add")[0]),
                    e,
                    function(data) {
                        console.log("___S", data)
                        location.reload();
                    },
                    function(data) {
                        console.log("___F", data)
                    },
                );
            }));
            $(".start").on('click', (function(e) {
                e.preventDefault();
                getDataFromURL(
                    "<?= base_url() ?>machine/batchStatusChange/" + jQuery(this).attr("data-id"),
                    function(data) {
                        location.reload();
                    },
                    function(data) {
                        console.log("___F", data)
                    },
                );
            }));
            $(".updateSift").on('click', (function(e) {
                e.preventDefault();
                var shiftID = jQuery(this).attr("data-id");
                var fd = new FormData();
                fd.append('start_time', jQuery("#start_" + shiftID).val());
                fd.append('end_time', jQuery("#end_" + shiftID).val());
                fd.append('shift_id', shiftID);
                sendDataInPost(
                    "<?= base_url() ?>machine/updateShift",
                    $("#shift"),
                    fd,
                    e,
                    function(data) {
                        console.log("___S", data)
                        location.reload();
                    },
                    function(data) {
                        console.log("___F", data)
                    },
                );
            }));
        });
    </script>
</body>

</html>