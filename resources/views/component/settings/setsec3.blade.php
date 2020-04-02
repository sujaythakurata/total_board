            <div class="row" id="shift">
                <div class="col-md-4">
                    <div class="login-form">
                        <div class="main-div" style="margin: 0;">
                            <div class="panel">
                                <h2>Add Product</h2>
                            </div>
                            <form id="product_add">
                                <div class="form-group c-form-group">
                                    <label>Product Name</label>
                                    <div class="form-control-wrap">
                                        <input name="product_name" style="width: 100%;">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>No. Of Bottles</label>
                                    <div class="form-control-wrap">
                                        <input type="number" name="no_of_bottle" style="width: 100%;">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <div class="form-group c-form-group">
                                    <label>No. Of Liters</label>
                                    <div class="form-control-wrap">
                                        <input type="number" name="liters" style="width: 100%;">
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>
                                <button type="submit" class="bttn st btn-orange text-uppercase" style="width: 100%;height: 33px;">Add</button>
                            </form>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="col-md-8" style="color: var(--cl-white);">
                    <h2 a-lign="center">Shift Configurations</h2>
                    <table class="table table-bordered" style="color: var(--cl-white);">
                        <tr>
                            <th>Shift number</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                <td>data</td>
                                <td><input type="time" value="data" id="data" /></td>
                                <td><input type="time" value="data" id="data" /></td>
                                <td>
                                    <button type="button" data-id="data" class="bttn st btn-orange updateSift">
                                        Update
                                    </button>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>