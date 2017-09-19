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
            <li class="active">SEO Information</li>
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
                    <p style="font-size: 11px;
    background-color: grey;
    padding: 5px;
    color: white;
    border-radius: 5px;">HELP TEXT <br>
                        <b>Page</b> : Enter the last part of the url as Page Name.<br>
                        If you want to maintain seo for https://www.turkeyevisa.online/index.php/visa-fees, you have to
                        enter Page Name as "visa-fees"</p>
                </div><!--/.page-header-->
                <?php if (!empty($_SESSION['errorMsg'])) {
                    echo $_SESSION['errorMsg'];
                    unset($_SESSION['errorMsg']);
                }
                ?>

                <?php if (isset($_GET['page']) && ($_GET['page'] == 'ADD' || $_GET['page'] == 'edit')) {
                    $query = $mysqli->query('SELECT * FROM seoinformation WHERE id='.$_GET['id']);
                    if( $query->num_rows > 0 ){
                        $res = $query->fetch_assoc();
                    }
                    ?>
                    <a href="seoinformation.php" class="btn btn-success">Back to Pages</a>
                    <form class="form-horizontal" action="functions.php" method="post"/>
                    <div class="control-group">
                        <label class="control-label" for="form-field-1">Page Name</label>

                        <div class="controls form-static">
                            <input type="text" name="page" id="page" value="<?php if(isset($res['page']) && !empty($res['page'])) { echo $res['page'];} ?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="form-field-1">Title</label>

                        <div class="controls form-static">
                            <input type="text" name="title" id="title" value="<?php if(isset($res['title']) && !empty($res['title'])) { echo stripslashes($res['title']);} ?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-1">Description</label>
                        <div class="controls form-static">
                            <textarea type="text" name="description" id="description" value="" required><?php if(isset($res['description']) && !empty($res['description'])) { echo stripslashes($res['description']);} ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-1">Keywords</label>
                        <div class="controls form-static">
                            <textarea type="text" name="keywords" id="keywords" value="" required><?php if(isset($res['keywords']) && !empty($res['keywords'])) { echo stripslashes($res['keywords']);} ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls form-static">
                            <input type="hidden" name="action" id="action" value="SEOINFORMATION"/>
                            <input type="submit" name="submit" class="btn btn-success">
                        </div>
                    </div>

                    </form>
                <?php } else { ?>
                    <a href="seoinformation.php?page=ADD" class="btn btn-success">Add SEO for New Page</a>
                    <table id="sample-table-222" class="table table-striped table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th>Page</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = $mysqli->query('select * from seoinformation ORDER BY id DESC');
                        while ($applications = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $applications['page']; ?></td>
                                <td><?php echo $applications['title']; ?></td>
                                <td><?php echo $applications['description']; ?></td>
                                <td class="td-actions">
                                    <div class="hidden-phone visible-desktop action-buttons">
                                        <a class="green" href="seoinformation.php?page=edit&id=<?= $applications['id'] ?>">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>

                                        <a class="red"
                                           href="functions.php?action=delete&id=<?= $applications['id'] ?>&table=seoinformation&page=seoinformation">
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
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

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!--[if IE]>
<script type="text/javascript">
    wind
    ow.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
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
