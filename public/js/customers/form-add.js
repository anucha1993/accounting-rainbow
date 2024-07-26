$(document).ready(function() {
  //Nationality-customer
  $(".Nationality").select2();



  // Nationatily-customer
  $(".Nationality-customer").select2({
      dropdownParent: $("#customer-index"),

      ajax: {
          url: RouteSelectNationality,
          dataType: "json",
          method: "GET",
          data: function(params) {
              //console.log(params.term);
              return {
                  q: params.term,
              };
          },
          processResults: function(data) {
              const results = data.map(function(item) {
                  return {
                      id: item.nationality_id,
                      text: item.nationality_name
                  };
              });
              return {
                  results: results,
              };
          },
      },
  });

});

$(document).ready(function() {
var self = this; // เก็บค่าของ this ไว้ในตัวแปร self

$.ajax({
  url: RouteVisaType ,
  dataType: "json",
  method: "GET",
  success: function(data) {
      var optionsHtml = '<option value="">none</option>';
      data.forEach(function(item) {
          optionsHtml += '<option data-name="'+ item.visa_type_name +'" data-renew="' + item.visa_type_renew +
              '" value="' + item.visa_type_id + '">' + item.visa_type_name +
              '</option>';
      });

      $('.visa-type').html(optionsHtml);

  },
  error: function(xhr, status, error) {
      console.error(xhr.responseText);
  }
});

$(document).on('change', '.visa-type', function() {
  var visaType = $(this).find('option:selected').attr('data-renew');
  var visaName = $(this).find('option:selected').attr('data-name');

   if(visaType === "Y") {
      $('.visa-type-date').css('display', 'block');
      $('#visa-type-start').html('Visa '+ visaName +' Date Start');
      $('#visa-type-end').html('Visa '+ visaName +' Date Expiry');
   }else{
      $('.visa-type-date').css('display', 'none');
   }
  
});
});