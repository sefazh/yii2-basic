<link rel="stylesheet" href="/js/datetimepicker/bootstrap-datetimepicker.min.css">

<style>
    .color-group ul { list-style-type: none; overflow: hidden; padding-left: 0}
    .color-group ul li {
        width: 32px;
        height: 32px;
        background: #666;
        float: left;
        margin-right: 3px;
        border-radius: 3px;
        cursor: pointer;
    }
    .color-group ul li.active { border: #333 solid 4px;}
    .color-group ul li:nth-child(1) { background-color: #5d708c}
    .color-group ul li:nth-child(2) { background-color: #7ac2ff}
    .color-group ul li:nth-child(3) { background-color: #ff9800}
    .color-group ul li:nth-child(4) { background-color: #ffe230}
    .color-group ul li:nth-child(5) { background-color: #65CEA7}
    .color-group ul li:nth-child(6) { background-color: #ff282a}
</style>

<div class="fancy">
    <h3>新建事件</h3>
    <form id="add_form" class="allday" action="/ajax-calendar/create-event" method="post">
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="">日程内容：</label>
            <input type="text" class="form-control" name="event" id="event" style="width:320px" placeholder="记录你将要做的一件事...">
        </div>
        <div class="form-group">
            <label for="startdate">开始时间：</label>
            <div class="datetime-group">
                <input type="text" class="form-control datetimepicker" name="startdate" id="startdate" value="<?=$date?>">
                <div class="start_time timepicker">
                    <select name="s_hour" class="form-control">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected>08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    <select name="s_minute" class="form-control">
                        <option value="00" selected>00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group end-row">
            <label for="enddate">结束时间：</label>
            <div class="datetime-group">
                <input type="text" class="form-control datetimepicker" name="enddate" id="enddate" value="<?=$date?>">
                <div class="start_time timepicker">
                    <select name="e_hour" class="form-control">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected>08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    <select name="e_minute" class="form-control">
                        <option value="00" selected>00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">标签颜色</label>
            <div class="color-group">
                <ul>
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <input type="hidden" name="style" id="color-style" value="0">
            </div>
        </div>

        <div class="form-group">
            <label><input type="checkbox" value="1" id="isallday" name="isallday" checked> 全天</label>
            <label><input type="checkbox" value="1" id="isend" name="isend"> 结束时间</label>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-default btn_del" id="del_event">删除</button>
            <button type="submit" class="btn btn-default btn_ok">确定</button>
            <button type="button" class="btn btn-default btn_cancel" onClick="$.fancybox.close()">取消</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="/js/jquery.form.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function(){
        // validate
        $('#add_form').validate({
            debug: true,

            rules: {
                event: 'required',
                startdate:{
                    required: true,
                    dateISO: true
                },
                enddate: 'dateISO'
            },
            messages: {
                event: '请填写日程内容',
                startdate: {
                    required: '开始日期不能为空',
                    dateISO: '请输入正确的日期格式'
                },
                enddate: '请输入正确的日期格式'
            },

            submitHandler:function(form){
                $(form).ajaxSubmit({
                    success: showResponse
                });
            },
        });


        // datetimepicker
        $(".datetimepicker").datetimepicker({
            format: 'yyyy-mm-dd',
            minView: 'month',
            todayBtn: true,
            todayHighlight: true,
            autoclose: true
        });


        // 注册事件处理函数
        $("#isallday").click(function(){
            $('#add_form').toggleClass('allday');
        });

        $("#isend").click(function(){
            $('#add_form').toggleClass('isend');
        });

        $(".color-group ul li").click(function() {
            if ($(this).hasClass('active')) return;

            $(this).siblings('.active').removeClass('active').end().addClass('active');
            $('#color-style').val($(this).index());
        });

    });

    function showResponse(responseText, statusText, xhr, $form){
        if(statusText=="success"){
            if(responseText==1){
                $.fancybox.close();
                $('#calendar').fullCalendar('refetchEvents'); //重新获取所有事件数据
            }else{
                alert(responseText);
            }
        }else{
            alert(statusText);
        }
    }
</script>