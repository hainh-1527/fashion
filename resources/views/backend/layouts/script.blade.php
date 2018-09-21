{{ Html::script('assets/global/plugins/respond.min.js') }}
{{ Html::script('assets/global/plugins/excanvas.min.js') }}

{{ Html::script('assets/global/plugins/jquery.min.js') }}
{{ Html::script('assets/global/plugins/jquery-migrate.min.js') }}

{{ Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ Html::script('assets/global/plugins/jquery.blockui.min.js') }}
{{ Html::script('assets/global/plugins/jquery.cokie.min.js') }}
{{ Html::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}

{{ Html::script('assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}
{{ Html::script('assets/global/plugins/select2/select2.min.js') }}
{{ Html::script('assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
{{ Html::script('assets/admin/pages/scripts/form-samples.js') }}
{{ Html::script('assets/global/plugins/ckeditor/ckeditor.js') }}

{{ Html::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}
{{ Html::script('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}
{{ Html::script('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js') }}
{{ Html::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('assets/admin/pages/scripts/table-advanced.js') }}
{{ Html::script('assets/admin/pages/scripts/table-managed.js') }}

{{ Html::script('assets/global/plugins/fuelux/js/spinner.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ Html::script('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}
{{ Html::script('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') }}
{{ Html::script('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}
{{ Html::script('assets/global/plugins/typeahead/handlebars.min.js') }}
{{ Html::script('assets/global/plugins/typeahead/typeahead.bundle.min.js') }}

{{ Html::script('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}

{{ Html::script('assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js') }}
{{ Html::script('assets/admin/pages/scripts/ui-bootstrap-growl.js') }}

{{ Html::script('assets/global/plugins/jquery-nestable/jquery.nestable.js') }}

{{ Html::script('assets/global/scripts/metronic.js') }}
{{ Html::script('assets/admin/layout/scripts/layout.js') }}
{{ Html::script('assets/admin/layout/scripts/quick-sidebar.js') }}
{{ Html::script('assets/admin/layout/scripts/demo.js') }}

{{--confirm--}}
{{ Html::script('assets/admin/pages/scripts/ui-confirmations.js') }}

{{ Html::script('assets/admin/pages/scripts/components-dropdowns.js') }}
{{ Html::script('assets/admin/pages/scripts/components-form-tools.js') }}

{{ Html::script('assets/admin/app.js') }}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        UIBootstrapGrowl.init();
    });
</script>
