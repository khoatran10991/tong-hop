{{ content() }}
<link href="/backend/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
<div class="">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách sản phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                            <th>Mã sản Phẩm </th>
                            <th>Tên sản phẩm </th>
                            <th>Giá </th>
                            <th>Status </th>
                            <th>Ngày tạo </th>
                            <th class=" no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        {% for product in products %}
                            <tr class="pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" ">{{ product.sku_product|e }}</td>
                                <td class=" ">{{ product.name_product|e }}</i></td>
                                <td class=" ">{{ product.price_product|e }}</i></td>
                                <td class=" ">{{ product.status|e }}</i></td>
                                <td class=" ">{{ product.created|e }}</td>
                                <td class=" last"><a href="#">Xem | </a><a href="/dashboard/product/edit/{{ product.id|e }}">Sửa</a>
                                </td>
                            </tr>
                        {% endfor %}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<!-- Datatables -->
<script src="/backend/js/datatables/js/jquery.dataTables.js"></script>
<script src="/backend/js/datatables/tools/js/dataTables.tableTools.js"></script>
<script>
    $(document).ready(function() {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function() {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Tìm kiếm : "
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "/backend/js/datatables/tools/swf/copy_csv_xls_pdf.swf"
            }
        });
        $("tfoot input").keyup(function() {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function(i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function() {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function(i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>