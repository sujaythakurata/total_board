<div class="row">
    <div class="col-md-4">
        <div class="login-form">
            <div class="main-div" style="margin: 0;">
                <div class="panel">
                    <h2>Batch Entry</h2>
                </div>
                <form id="batch_add" method="post" action="{{url('batch')}}">
                    @csrf
                    <div class="form-group c-form-group">
                        <label>Batch No</label>
                        <div class="form-control-wrap">
                            <input name="batch_no" style="width: 100%;">
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('batch_no')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group c-form-group">
                        <label>Select Product</label>
                        <div class="form-control-wrap">
                            <select name="product_id" style="width: 100%;" id="productID" 
                                onchange = "valuedetect(event.target.value)"
                            >
                                <pre>
                                    @foreach($product as $prod)
                                    <option value={{$prod->product_id}}>{{$prod->product_name}}
                                    </option>
                                    @endforeach
                            </select>
                            <span class="focus-border"><i></i></span>
                            <a href="#" id="productIDDelete">Delete Product</a>
                        </div>
                        @error('product_id')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group c-form-group">
                        <label>Quantity</label>
                        <div class="form-control-wrap">
                            <input name="batch_qty" style="width: 100%;" id="batch_qty" onkeyup="calculate(event.target.value)">
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('batch_qty')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group c-form-group">
                        <label>Carton</label>
                        <div class="form-control-wrap">
                            <input name="batch_carton" style="width: 100%;" id="batch_carton" >
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('batch_carton')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button  class="bttn st btn-orange text-uppercase" style="width: 100%;height: 33px;" type="submit">Save</button>
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
                <button type="button" id="searchBtn" onclick="search()"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <table class="table table-bordered"  style="color: var(--cl-white);">
            <tr id="batch_row">
                <th>Batch No</th>
                <th>Batch Qty</th>
                <th>Batch Carton</th>
                <th>Product Name</th>
                <th>BL</th>
                <th>Batch Created</th>
                <th>Batch Start</th>
                <th>Action</th>
            </tr>
            @foreach($data as $d)
                <tr>
                    <td>{{$d->batch_no}}</td>
                    <td>{{$d->batch_qty}}</td>
                    <td>{{$d->batch_carton}}</td>
                    <td>{{$d->product_name}}</td>
                    <td>
                        {{$d->no_of_bottle}}B{{$d->liters}}L
                    </td>
                    <td>{{$d->created_time}}</td>
                    <td>
                        @if($d->batch_start_time)
                        {{$d->batch_start_time}}
                        @else
                        Batch is not started yet
                        @endif
                    </td>
                    <td>
                        @if($d->batch_status == 0)
                            <button type="button" data-id="data" class="bttn st btn-green start"
                            onclick="batchstart('{{$d->batch_no}}')"
                            >Start</button>
                        @elseif($d->batch_status == 1)
                            <button type="button" data-id="data" class="bttn st btn-red start"
                            onclick="batchend('{{$d->batch_no}}')"
                            >Stop</button>
                        @else
                            {{$d->last_edited}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>