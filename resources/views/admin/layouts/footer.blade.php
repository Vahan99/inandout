</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy;{{ date('Y') }}</strong> All rights
    reserved.
</footer>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/admin-lte-plugin.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ mix('js/ckeditor.js') }}"></script>
@stack('scripts')
<script src="{{ asset('assets/js/modal.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.each(areas, function(i, area) {
      CKEDITOR.replace(area,
      {
        customConfig : '/assets/js/config.js',
        toolbar : 'simple'
      })
    });
  });
</script>
</body>
</html>