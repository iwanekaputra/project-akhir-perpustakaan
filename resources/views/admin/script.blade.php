<!-- js -->
  <script src="{{ asset('admin/vendors/scripts/core.js') }}"></script>
  <script src="{{ asset('admin/vendors/scripts/script.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/scripts/process.js') }}"></script>
  <script src="{{ asset('admin/vendors/scripts/layout-settings.js') }}"></script>

  <script src="{{ asset('admin/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- buttons for Export datatable -->
  <script src="{{ asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
  <!-- Datatable Setting js -->
  <script src="{{ asset('admin/vendors/scripts/datatable-setting.js') }}"></script>
  {{-- ckeditor --}}
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'deskripsi' );
  </script>
  <script>
    function previewCover() {
        const cover = document.querySelector('#cover');
        const coverPreview = document.querySelector('.cover-preview');


        const oFReader = new FileReader();
        oFReader.readAsDataURL(cover.files[0]);

        oFReader.onload = function (oFREvent) {
            coverPreview.src = oFREvent.target.result;
        }
    }
  </script>
  {{-- notifikasi toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
      <script>
          $(document).ready(function() {
              toastr.options.timeOut = 10000;
              @if (Session::has('error'))
                  toastr.error('{{ Session::get('error') }}');
              @elseif(Session::has('success'))
                  toastr.success('{{ Session::get('success') }}');
              @elseif(Session::has('update'))
                  toastr.success('{{ Session::get('update') }}');
              @elseif(Session::has('delete'))
                  toastr.success('{{ Session::get('delete') }}');
              @endif
          });
      </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
   $('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
          }).then(function(value) {
          if (value) {
          window.location.href = url;
        }
      });
     });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
  <script src="{{asset('vendors/scripts/dashboard.js')}}"></script>

