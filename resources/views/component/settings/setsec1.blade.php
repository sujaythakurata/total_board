            <div class="row">
                <div class="col-md-4">
                    <div class="login-form">
                        <div class="main-div" style="margin: 0;">
                            <div class="panel">
                                <h2>Batch Entry</h2>
                            </div>
                            <form id="batch_add">
                                <div class="form-group c-form-group">
                                    <label>Batch No</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_no" style="width: 100%;">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Select Product</label>
                                    <div class="form-control-wrap">
                                        <select name="product_id" style="width: 100%;" id="productID">
                                            <pre>
                                                <option value="data">L
                                                </option>
                                        </select>
                                        <span class="focus-border"><i></i></span>
                                        <a href="#" id="productIDDelete">Delete Product</a>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Quantity</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_qty" style="width: 100%;" id="batch_qty">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>Carton</label>
                                    <div class="form-control-wrap">
                                        <input name="batch_carton" style="width: 100%;" id="batch_carton">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <button type="submit" class="bttn st btn-orange text-uppercase" style="width: 100%;height: 33px;">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="color: var(--cl-white);">
                    <div>
                        <h2 a-lign="center" style="display: inline">
                            Batch List
                        </h2>
                        <div style="float: right;margin-top:10px;display: inline">
                            <input type="date" id="batchStartDate" />
                            <button type="button" id="searchBtn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <table class="table table-bordered" style="color: var(--cl-white);">
                        <tr>
                            <th>Batch No</th>
                            <th>Batch Qty</th>
                            <th>Batch Carton</th>
                            <th>Product Name</th>
                            <th>BL</th>
                            <th>Batch Start</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                                <td>dataL</td>
                                <td>data</td>
                                <td>
                                <button type="button" data-id="data" class="bttn st btn-green start">Start</button>
                                        <button type="button" data-id="data" class="bttn st btn-red start">Stop</button>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>