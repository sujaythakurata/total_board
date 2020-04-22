<div class="row" id="machine_speed">
    <div class="col-md-12" style="color: var(--cl-white);">
        <h2 a-lign="center">Machine's Design Speed Configuration</h2>
        <form id="machine_design_speed">
            <input name="design_speed[]" value="0" type="hidden" />
            <table class="table table-bordered" style="color: var(--cl-white);">
                <tbody>
                    <tr>    
                        @for($i=0;$i<=4;$i++)
                            <td>
                                <label>{{$machine[$i]->m_full_name}} </label>
                                <div class="form-control-wrap">
                                    <input name="{{$i}}" value="{{$machine[$i]->speed}}" style="width: 100%;">
                                    <span class="focus-border"><i></i></span>
                                </div>
                            </td>
                        @endfor
                    </tr>
                    <tr>    
                        @for($i=5;$i<=9;$i++)
                            <td>
                                <label>{{$machine[$i]->m_full_name}} </label>
                                <div class="form-control-wrap">
                                    <input name="{{$i}}" value="{{$machine[$i]->speed}}" style="width: 100%;">
                                    <span class="focus-border"><i></i></span>
                                </div>
                            </td>
                        @endfor
                    </tr>
                    <tr>    
                        @for($i=10;$i<=12;$i++)
                            <td>
                                <label>{{$machine[$i]->m_full_name}} </label>
                                <div class="form-control-wrap">
                                    <input name="{{$i}}" value="{{$machine[$i]->speed}}" style="width: 100%;">
                                    <span class="focus-border"><i></i></span>
                                </div>
                            </td>
                        @endfor
                        <td colspan="2" style="text-align: right;vertical-align: bottom;">
                            <button type="button" style="width: 80%;height: 45px;" class="bttn st btn-orange machine_design_speed"
                            onclick="updatemachine()" 
                            >
                                Update
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>