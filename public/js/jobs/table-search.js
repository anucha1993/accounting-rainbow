
$(document).ready(function () {
               $(".btn-delete-job").on("click", function (e) {
                   var JobId = $(this).attr('data-id');
   
                   console.log(JobId);
                   e.preventDefault();
                   Swal.fire({
                       title: "Do you want to Delete Job?",
                       showCancelButton: true,
                       confirmButtonText: "Confirm",
                       denyButtonText: `Don't Delete`,
                   }).then((result) => {
                       if (result.isConfirmed) {
                           $.ajax({
                               url: jobOrderDeleteRoute,
                               method: "GET",
                               data: {
                                   JobId: JobId,
                               },
                               success: function (response) {
                                   if(response.success){
                                     $('tr[data-id="' + JobId + '"]').remove();
                                     alert('Delete Job Successfully!');
                                   }else{
                                     alert('Delete Job Error!');
                                   }
                                  
                               },
                               error: function (xhr) {
                                   console.log("Error retrieving customer data");
                               },
                           });
                       } else if (result.isDenied) {
                           Swal.fire("Changes are not saved", "", "info");
                       }
                   });
               });
           });