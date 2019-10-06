     // Switchery
 var _componenteditor = function() {
      $('.summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
     };
    

  var _componentDatePicker = function() {
       $('#mdate').bootstrapMaterialDatePicker({
          format: 'DD-MM-YYYY',
          time:false 
      });

   };

     var _componentClassDatePicker = function() {
       $('.mdate').bootstrapMaterialDatePicker({
          format: 'DD-MM-YYYY',
          time:false 
      });

   };

   var _componentDateTimePicker = function() {

    $('#date-format').bootstrapMaterialDatePicker({ 
        format: 'dddd DD MMMM YYYY - HH:mm' 
    });


};

var _componentDropFile = function() {

  $('.dropify').dropify();

};

var _componentTimePicker = function() {

 $('#timepicker').bootstrapMaterialDatePicker({ 
    format: 'HH:mm', time: true, date: false 
});

};
var _componentColorPicker = function() {

  $('#color').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

};

 /*
 * Form Select2
 */
 var _componentSelect2Normal = function() {
    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    $('.select').select2({
        dropdownAutoWidth: true,
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        dropdownAutoWidth: true,
        width: 'auto'
    });
};

/*
 * Form Select 2 For Modal 
 */

 var _componentSelect2Modal = function() {
    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    $('.select').select2({
        dropdownAutoWidth: true,
        dropdownParent: $("#modal_remote .modal-content"),
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        dropdownAutoWidth: true,
        width: 'auto'
    });
};

/*
 * Form Validation
 */

 var _formValidation = function() {
    if ($('#content_form').length > 0) {
        $('#content_form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }
    
    $('#content_form').on('submit', function(e) {
        e.preventDefault();
        $('#submit').hide();
        $('#submiting').show();
        $(".ajax_error").remove();
        var submit_url = $('#content_form').attr('action');
        //Start Ajax
        var formData = new FormData($("#content_form")[0]);
        $.ajax({
            url: submit_url,
            type: 'POST',
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
              if(data.status == 'danger'){
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500
                    
                });
                
            }
            else {
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500
                    
                });
                $('#submit').show();
                $('#submiting').hide();
                if (data.goto) {
                   setTimeout(function(){

                     window.location.href=data.goto;
                 },2500);
               }
           }
       },
       error: function(data) {
        var jsonValue = $.parseJSON(data.responseText);
        const errors = jsonValue.errors;
        if (errors) {
            var i = 0;
            $.each(errors, function(key, value) {
                const first_item = Object.keys(errors)[i]
                const message = errors[first_item][0];
                if ($('#' + first_item).length>0) {
                $('#' + first_item).parsley().removeError('required', {
                    updateClass: true
                });
                $('#' + first_item).parsley().addError('required', {
                    message: value,
                    updateClass: true
                });
                }
                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        $.toast({
                            heading: 'Error',
                            text: value,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                            
                        });
                        i++;
                    });
        } else {
           $.toast({
            heading: 'Error',
            text: jsonValue.message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3500
            
        });
           
       }
       _componentSelect2Normal();
       $('#submit').show();
       $('#submiting').hide();
   }
});
    });
};



//class

var _classformValidation = function() {
    if ($('.ajax_form').length > 0) {
        $('.ajax_form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }

    $('.ajax_form').on('submit', function(e) {
        e.preventDefault();
        $('#submit').hide();
        $('#submiting').show();
        $(".ajax_error").remove();
        var submit_url = $('.ajax_form').attr('action');
        //Start Ajax
        var formData = new FormData($(".ajax_form")[0]);
        $.ajax({
            url: submit_url,
            type: 'POST',
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 'danger') {
                   $.toast({
                        heading: 'Error',
                        text: data.message,
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'error',
                        hideAfter: 3500
                        
                    }); 

                } else {
                     $.toast({
                    heading: 'Success',
                    text: data.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500
                    
                });
                    $('#submit').show();
                    $('#submiting').hide();
                    if (data.goto) {
                        setTimeout(function() {

                            window.location.href = data.goto;
                        }, 2500);
                    }
                    if (data.window) {
                        window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                        setTimeout(function() {
                            window.location.href = '';
                        }, 1000);
                    }
                }
            },
            error: function(data) {
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                if (errors) {
                    var i = 0;
                    $.each(errors, function(key, value) {
                        const first_item = Object.keys(errors)[i]
                        const message = errors[first_item][0];
                    if ($('#' + first_item).length>0) {
                        $('#' + first_item).parsley().removeError('required', {
                            updateClass: true
                        });
                        $('#' + first_item).parsley().addError('required', {
                            message: value,
                            updateClass: true
                        });
                       } 
                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                           $.toast({
                                heading: 'Error',
                                text: value,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                                
                            }); 
                        i++;
                    });
                } else {
                       $.toast({
                    heading: 'Error',
                    text:jsonValue.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                    
                }); 
                   
                }
                _componentSelect2Normal();
                $('#submit').show();
                $('#submiting').hide();
            }
        });
    });
};


var _modalFormValidation = function() {
    if ($('#content_form').length > 0) {
        $('#content_form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }
    $('#content_form').on('submit', function(e) {
        e.preventDefault();
        $('#submit').hide();
        $('#submiting').show();
        $(".ajax_error").remove();
        var submit_url = $('#content_form').attr('action');
        //Start Ajax
        var formData = new FormData($("#content_form")[0]);
        $.ajax({
            url: submit_url,
            type: 'POST',
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
              if(data.status == 'danger'){
                  $.toast({
                    heading: 'Error',
                    text: data.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                    
                });                   
                  
              }
              else{
                $.toast({
                    heading: 'Success',
                    text: data.message,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3500
                    
                });
                $('#submit').show();
                $('#submiting').hide();
                $('#modal_remote').modal('toggle');
                if (data.goto) {
                 setTimeout(function(){

                   window.location.href=data.goto;
               },2500);
             }
             if (typeof(emran) != "undefined" && emran !== null) {
                        emran.ajax.reload(null, false);
                    } 
         }
     },
     error: function(data) {
        var jsonValue = data.responseJSON;
        const errors = jsonValue.errors;
        if (errors) {
            var i = 0;
            $.each(errors, function(key, value) {
                const first_item = Object.keys(errors)[i];
                const message = errors[first_item][0];
                if ($('#' + first_item).length > 0) {
                    $('#' + first_item).parsley().removeError('required', {
                        updateClass: true
                    });
                    $('#' + first_item).parsley().addError('required', {
                        message: value,
                        updateClass: true
                    });
                }

                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        $.toast({
                            heading: 'Error',
                            text: value,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                            
                        });
                        i++;
                    });
        } else {
          $.toast({
            heading: 'Error',
            text: jsonValue.message,
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3500
            
        });
          
      }
      $('#submit').show();
      $('#submiting').hide();
  }
});
    });
};


    /*
     * For Delete Item
     */

     $(document).on('click', '#delete_item', function(e) {

         e.preventDefault();
         var row = $(this).data('id');
         var url = $(this).data('url');

         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: 'Delete',
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        dataType: 'JSON',
                        success: function(data) {
                           $.toast({
                            heading: 'Success',
                            text: data.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3500
                            
                        });
                           if (typeof(emran) != "undefined" && emran !== null) {
                            emran.ajax.reload(null, false);
                        }
                        if (data.goto) {
                           setTimeout(function(){

                             window.location.href=data.goto;
                         },2500);
                       }
                   },
                   error: function(data) {
                    var jsonValue = $.parseJSON(data.responseText);
                    const errors = jsonValue.errors
                    var i = 0;
                    $.each(errors, function(key, value) {
                        $.toast({
                            heading: 'Error',
                            text: value,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                            
                        });
                        i++;
                    });
                    $('#delete_loading_' + row).hide();
                    $('#action_menu_' + row).show();
                }
            });
            }
        })
    });


     /*
     * For Status Change
     */
     $(document).on('click', '#change_status', function(e) {
        e.preventDefault();
        var row = $(this).data('id');
        var url = $(this).data('url');
        var status = $(this).data('status');
        if (status == 1) {
            msg = 'Change Status Form Online To Offline';
        } else {
            msg = 'Change Status Form Offline To Online';
        }
        $('#status_' + row).hide();
        $('#status_loading_' + row).show();
        Swal.fire({
            title: "Are you sure?",
            text: msg,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Change it!",
            cancelButtonText: "No, cancel plx!",
            
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    method: 'Put',
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        dataType: 'JSON',
                        success: function(data) {
                          $.toast({
                            heading: 'Success',
                            text: data.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3500
                            
                        });

                          if (typeof(emran) != "undefined" && emran !== null) {
                            emran.ajax.reload(null, false);
                        }
                        
                    },
                    error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                        const errors = jsonValue.errors
                        if (errors) {
                            var i = 0;
                            $.each(errors, function(key, value) {
                              $.toast({
                                heading: 'Error',
                                text: value,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                                
                            });
                              
                              i++;
                          });
                        } else {
                           $.toast({
                            heading: 'Success',
                            text: data.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3500
                            
                        });
                           
                       }
                       $('#status_loading_' + row).hide();
                       $('#status_' + row).show();
                   }
               });
            } else {
                $('#status_loading_' + row).hide();
                $('#status_' + row).show();
            }
        });
    });



     




     $(document).ready(function() {
    /*
     * For Logout
     */
     $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        $("#loader").show('fade');
        var url = $(this).data('url');
        $.ajax({
            url: url,
            method: 'Post',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
              $.toast({
                heading: 'Success',
                text: data.message,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 3500
                
            });
              
              setTimeout(function() {
                window.location.href = data.goto;
            }, 2000);
          },
          error: function(data) {
            var jsonValue = $.parseJSON(data.responseText);
            const errors = jsonValue.errors
            var i = 0;
            $.each(errors, function(key, value) {
                $.toast({
                    heading: 'Error',
                    text: value,
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                    
                });
                
                i++;
            });
        }
    });
    });
 });