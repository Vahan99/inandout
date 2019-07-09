let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix
    // Admin Lte
    .combine([
        'resources/assets/admin-lte/css/*',
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/jvectormap/jquery-jvectormap.css',
        'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'bower_components/bootstrap-daterangepicker/daterangepicker.css',
    ], 'public/css/admin-lte-plugin.css')

    .combine([
        'bower_components/fastclick/lib/fastclick.js',
        'resources/assets/admin-lte/js/adminlte.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'resources/assets/admin-lte/js/jquery-jvectormap-1.2.2.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/Chart.js/Chart.js',
        'bower_components/moment/moment.js',
        'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'bower_components/jquery-validation/dist/jquery.validate.min.js',
        'resources/assets/admin-lte/js/pages/dashboard2.js',
        'resources/assets/admin-lte/js/demo.js',
    ], 'public/js/admin-lte-plugin.js')

    .copy([
        'bower_components/font-awesome/fonts',
        'bower_components/bootstrap/fonts/*',
        'bower_components/font-awesome/fonts/*'
        ], 'public/fonts')

    // Tour Show
    .combine([
        'bower_components/datatables.net/js/jquery.dataTables.min.js',
        'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
        'resources/assets/admin/js/tour-show.js'
    ], 'public/js/tour-show-plugin.js')

    .combine([
        'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'
    ], 'public/css/tour-show-plugin.css')

    // Tour Create
    .combine([
        'resources/assets/admin/css/tour-create.css'
    ], 'public/css/tour-create-plugin.css')

    .combine([
        'resources/assets/admin/js/tour-create.js'
    ], 'public/js/tour-create-plugin.js')
    
    .combine([
        'public/vendor/unisharp/laravel-ckeditor/ckeditor.js'
    ],  'public/js/ckeditor.js')

    .combine([
        'node_modules/moment/min/moment.min.js',
        'node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
    ], 'public/assets/js/datetimepicker.plugin.js')

    .copy('node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 'public/assets/css/datetimepicker.plugin.css')
;
