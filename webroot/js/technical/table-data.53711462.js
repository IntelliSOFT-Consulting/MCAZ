$(function(t){$("#basic-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}}),$("#responsive-datatable").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});var e=$("#file-datatable").DataTable({buttons:["copy","excel","pdf","colvis"],language:{searchPlaceholder:"Search...",scrollX:"100%",sSearch:""}});e.buttons().container().appendTo("#file-datatable_wrapper .col-md-6:eq(0)");var e=$("#delete-datatable").DataTable({language:{searchPlaceholder:"Search...",sSearch:""}});$("#delete-datatable tbody").on("click","tr",function(){$(this).hasClass("selected")?$(this).removeClass("selected"):(e.$("tr.selected").removeClass("selected"),$(this).addClass("selected"))}),$("#button").click(function(){e.row(".selected").remove().draw(!1)}),$("#example2").DataTable({responsive:!0,language:{searchPlaceholder:"Search...",sSearch:"",lengthMenu:"_MENU_ items/page"}}),$("#example3").DataTable({responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(l){var a=l.data();return"Details for "+a[0]+" "+a[1]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table"})}}}),$(".select2").select2({placeholder:"Choose one",searchInputPlaceholder:"Search"})});