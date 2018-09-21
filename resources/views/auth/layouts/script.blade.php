{{ Html::script('assets/global/plugins/respond.min.js') }}
{{ Html::script('assets/global/plugins/excanvas.min.js') }}
{{ Html::script('assets/global/plugins/jquery.min.js') }}
{{ Html::script('assets/global/plugins/jquery-migrate.min.js') }}
{{ Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('assets/global/plugins/jquery.blockui.min.js') }}
{{ Html::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
{{ Html::script('assets/global/plugins/jquery.cokie.min.js') }}
{{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
{{ Html::script('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}
{{ Html::script('assets/global/plugins/select2/select2.min.js') }}
{{ Html::script('assets/global/scripts/metronic.js') }}
{{ Html::script('assets/admin/layout/scripts/layout.js') }}
{{ Html::script('assets/admin/layout/scripts/demo.js') }}
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
        // init background slide images
        $.backstretch([
                "{{ asset('assets/admin/pages/media/bg/1.jpg') }}",
                "{{ asset('assets/admin/pages/media/bg/2.jpg') }}",
                "{{ asset('assets/admin/pages/media/bg/3.jpg') }}",
                "{{ asset('assets/admin/pages/media/bg/4.jpg') }}",
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>
