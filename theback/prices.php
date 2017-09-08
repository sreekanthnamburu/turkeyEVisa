<?php include('header.php');
@ini_set('display_errors', true); ?>

<style>
    .control-label {
        font-weight: bold;
    }
</style>
<div class="sidebar-collapse" id="sidebar-collapse">
    <i class="icon-double-angle-left"></i>
</div>
</div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
            </li>
            <li class="active">Prices</li>
        </ul><!--.breadcrumb-->
    </div>


    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="page-content">
                <div class="page-header position-relative">
                    <h1>
                        Prices
                    </h1>
                </div><!--/.page-header-->
                <?php
                $query = mysql_query('SELECT * FROM visa_prices WHERE id=1');

                if(mysql_num_rows($query)>0){
                    $res = mysql_fetch_assoc($query);
                }
                ?>
                <?php if (!empty($_SESSION['errorMsg'])) {
                    echo $_SESSION['errorMsg'];
                    unset($_SESSION['errorMsg']);
                }
                ?>
                <form class="form-horizontal" action="functions.php" method="post"/>

                <div class="control-group">
                    <label class="control-label" for="form-field-1">Normal (Guaranteed 2 working days)</label>

                    <div class="controls form-static">
                        <input type="text" name="normal" id="normal" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Urgent (Guaranteed 4-8 hours)</label>

                    <div class="controls form-static">
                        <input type="text" name="urgent" id="urgent" required>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="form-field-1">Immediate Service, Weekend & National Holidays
                        covered</label>
                    <div class="controls form-static">
                        <input type="text" name="immediate" id="immediate" required>
                    </div>
                </div>

                <div class="control-group">


                    <div class="controls form-static">
                        <input type="hidden" name="action" id="action" value="PRICES"/>
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                </div>

                </form>
            </div>
        </div><!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
</div><!--/.row-fluid-->
</div><!--/.page-content-->

</div><!--/.main-content-->
</div><!--/.main-container-->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]>-->

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!--<![endif]-->

<!--[if IE]>
<script type="text/javascript">
    wind    ow.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

<!--ace scripts-->

<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!--inline scripts related to this page-->

<script type="text/javascript">
    $(function () {
        var oTable1 = $('#sample-table-2').dataTable({
            "aoColumns": [
                {"bSortable": false},
                null, null, null, null, null,
                {"bSortable": false}
            ]
        });


        $('table th input:checkbox').on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });


        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }
    })
</script>
</body>
</html>
