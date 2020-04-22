<div class="row" id="shift">
    <div class="col-md-4">
        <div class="login-form">
            <div class="main-div" style="margin: 0;">
                <div class="panel">
                    <h2>Add Product</h2>
                </div>
                <form id="product_add" method="post" action="{{url('setting/addprod')}}">
                    @csrf
                    <div class="form-group c-form-group">
                        <label>Product Name</label>
                        <div class="form-control-wrap">
                            <input name="product_name" style="width: 100%;">
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('product_name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group c-form-group">
                        <label>No. Of Bottles</label>
                        <div class="form-control-wrap">
                            <input type="number" name="no_of_bottle" style="width: 100%;">
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('no_of_bottle')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group c-form-group">
                        <label>No. Of Liters</label>
                        <div class="form-control-wrap">
                            <input type="number" name="liters" style="width: 100%;">
                            <span class="focus-border"><i></i></span>
                        </div>
                        @error('liters')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="bttn st btn-orange text-uppercase" type="submit" style="width: 100%;height: 33px;">Add</button>
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
            @foreach($shift as $s)
                <tr>
                    <td>{{$s->shift_id}}</td>
                    <td><input type="time" value="{{$s->start_time}}" class="{{$s->shift_id}}" /></td>
                    <td><input type="time" value="{{$s->end_time}}" class="{{$s->shift_id}}" /></td>
                    <td>
                        <button type="button" data-id="data" class="bttn st btn-orange updateSift"
                        onclick="shiftupdate('{{$s->shift_id}}'
                        )"
                        >
                            Update
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>