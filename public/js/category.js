/* ------------------------------------------------------------------------------
 *
 *  # Select extension for Datatables
 *
 *  Demo JS code for datatable_extension_select.html page
 *
 * ---------------------------------------------------------------------------- */
 // $('.content_managment_table').DataTable({
 //                responsive: true
 //            });

/* ------------------------------------------------------------------------------
 *
 *  # Select extension for Datatables
 *
 *  Demo JS code for datatable_extension_select.html page
 *
 * ---------------------------------------------------------------------------- */

// Setup module
// ------------------------------
var emran="";
var DatatableSelect = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableSelect = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }



           emran= $('.content_managment_table').DataTable({

              order: [0, 'asc'],
              responsive:true,
              processing: true,
              serverSide: true,


                ajax: $('.content_managment_table').data('url'),
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
          
            });


    };

    var _componentRemoteModalLoad = function() {
        $(document).on('click', '#content_managment', function(e) {

            e.preventDefault();
            //open modal
            $('#modal_remote').modal('toggle');
            // it will get action url
            var url = $(this).data('url');
            //leave it blank before ajax call
            $('.modal-body').html('');
            // load ajax loader
            $('#modal-loader').show();
            $.ajax({
                    url: url,
                    type: 'Get',
                    dataType: 'html'
                })
                .done(function(data) {
                    $('.modal-body').html(data).fadeIn(); // load response
                    $('#modal-loader').hide();
                    _componentDropFile();
                    _modalFormValidation();

                })
                .fail(function(data) {
                    $('.modal-body').html('<span style="color:red; font-weight: bold;"> Something Went Wrong. Please Try again later.......</span>');
                    $('#modal-loader').hide();
                });
        });
    };



    //
    // Return objects assigned to module
    //

    return {
        init: function() {
             _componentRemoteModalLoad();
            _componentDatatableSelect();
             _componentDropFile();
            _formValidation();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableSelect.init();
});