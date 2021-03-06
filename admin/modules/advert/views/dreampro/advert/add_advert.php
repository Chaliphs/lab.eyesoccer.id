<script>
    $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        $('.chosen-container').css({width: '100%'});
    });
</script>

<div class='boxtitle'><?php echo $title; ?></div>
<div id='boxmessage'></div>

<div id='boxjq'>
    <div id='boxbutton'>
        <a href="javascript:void(0)" id='button' onclick="actmenu('advert/view')">Back</a>
        
        <div style='clear: both;'></div>
    </div>
    
    <?php echo form_open_multipart('advert/save', array('name' => 'form_addmulti', 'id' => 'form_addmulti')); ?>
    <div id='boxtable' class='shadow'>
        <div class='row'>
            <div class='col-lg-8 col-md-12 col-sm-8 col-xs-12'>
                <div class='boxtab pad-all mg-b20'>
                    <h1>Add New</h1>
                    <div class='pad-lr20'>
                        <input type='hidden' name='val' value='true'>
                        <div class='pad-b20'>
                            <label>Title</label>
                            <input type='text' name='title' id='title' class='cinput input_multi' required>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='col-lg-4 col-md-12 col-sm-4 col-xs-12'>
                <div class='boxtab pad-all mg-b20'>
                    <h1>Category</h1>
                    <div class='pad-lr20'>
                        <div class='pad-b20'>
                            <label>Category</label>
                            <select name="note" id="note" class="cinput select_multi tx-cp" >
                                <option value="">- Select -</option>
                                <?php
                                    if($category)
                                    {
                                        foreach ($category->data as $cat) {
                                            echo "<option value='$cat->note'>$cat->note</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='boxtab pad-all mg-b20'>
                    <h1>Picture</h1>
                    <div class='pad-lr20'>
                        <div class='pad-b20'>
                            <input type='file' name='uploadfile' id='uploadfile' class='cinput input_multi'>
                        </div>
                    </div>
                </div>  
                <div class='boxtab pad-all mg-b20'>
                    <h1>Action</h1>
                    <div class='pad-lr20'>
                        <div class='pad-b18'>
                            <div class='layout-row'>
                                <input type='submit' value='Save' id='btn_submit' onclick="saveaddmulti('advert/save')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='clean'></div>
        </div>
    </div>
</div>