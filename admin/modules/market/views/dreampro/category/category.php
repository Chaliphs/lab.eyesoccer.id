<div class='boxtitle'><?php echo $title; ?> <?php echo (isset($sub) AND isset($_GET['id'])) ? '&rsaquo; '.$sub->news_type : ''; ?></div>
<div id='boxmessage'></div>

<div id='boxbutton'>
    <?php
        $sv = $this->library->sub_view();
        if(isset($_GET['id']))
        {
            ?> <a href="javascript:void(0)" id='button' onclick="actmenu('news/category/view<?php echo $sv->idback; ?>')">Back</a> <?php
        }
    ?>
    <a href="javascript:void(0)" id='button' onclick="openform('news/category/add<?php echo $sv->idstay; ?>')">Add New</a>
    
    <div class='search'>
        <label>Search By</label>
        <select name='cselect' class='cinput inselect'>
            <?php
                if(isset($_GET['id']))
                {
                    $field = array('sub_category_name' => 'Name');
                } else {
                    $field = array('news_type' => 'Name');
                }

                foreach($field as $n1 => $v1)
                {
                    if($this->session->userdata('xfield_'.$prefix) == $n1)
                    {
                        echo "<option value='$n1' selected>$v1</option>";
                    } else {
                        echo "<option value='$n1'>$v1</option>";
                    }
                }
            ?>
        </select>
        
        <?php $csearch = ($this->session->userdata('xsearch_'.$prefix) != '') ? $this->session->userdata('xsearch_'.$prefix) : ''; ?>
        <input type='text' name='csearch' class='cinput insearch' value='<?php echo $csearch; ?>' placeholder='Search...' onkeyup="actsearch('news/category/search<?php echo $sv->idstay; ?>')">
    </div>
    
    <div style='clear: both;'></div>
</div>

<div id='boxaction'>
    <div class='action'>
        <select name='caction' class='caction inselect'>
            <option value=''>- Select -</option>
            <?php
                $sort = array('Delete' => '1'/*, 'Enabled' => '2', 'Disabled' => '3'*/);
                foreach($sort as $n2 => $v2)
                {
                    echo "<option value='$v2'>$n2</option>";
                }
            ?>
        </select>
    </div>
    <a href="javascript:void(0)" id='button' onclick="actcheck('news/category/checked')">Action</a>
    
    <div class='limit'>
        <label>Limit</label>
        <select name='climit' class='climit inselect' onchange="actlimit('news/category/view')">
            <?php
                $l1 = array('10','25','50','100','150','200');
                foreach($l1 as $v3)
                {
                    if($this->session->userdata('limit_'.$prefix) == $v3)
                    {
                        echo "<option value='$v3' selected>$v3</option>";
                    } else {
                        if($limit == $v3)
                        {
                            echo "<option value='$v3' selected>$v3</option>";
                        } else {
                            echo "<option value='$v3'>$v3</option>"; 
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div style='clear: both;'></div>
</div>

<div id='boxjq'>
    <div id='boxtable'>
        <?php $this->load->view($this->config->item('base_theme').'/category/category_table'); ?>
    </div>
    
    <?php
        if($showpage > 1)
        {
            echo "<div id='pageself'>
                    <div id='showurl' value='news/category/pagetable".$sv->idstay."'></div>
                    <div id='showpage' value='$showpage'></div>
                    <div id='showoff' value='4'></div>
                    <div id='showrun' value='2'></div>
                    <div id='shownav'></div>
                  </div>";
        }
    ?>
</div>

<script>
    $(document).ready(function(){
        setTimeout(function(){
            <?php
                if($this->session->userdata('voffset_'.$prefix) > 1)
                {
                    if($showpage == $this->session->userdata('voffset_'.$prefix) OR $this->session->userdata('voffset_'.$prefix) == $showpage - 1)
                    {
                        ?> nav_last(<?php echo $this->session->userdata('voffset_'.$prefix); ?>); <?php 
                    } else {
                        ?> nav_page(<?php echo $this->session->userdata('voffset_'.$prefix); ?>); <?php 
                    }
                } else {
                    if($this->session->userdata('voffset_'.$prefix) > 0)
                    {
                        ?> nav_first(<?php echo $this->session->userdata('voffset_'.$prefix); ?>); <?php 
                    }
                }
            ?>
        }, 500);
    });
</script>