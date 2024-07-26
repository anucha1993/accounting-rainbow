$(document).ready(function () {

    //Nationality
    $(".Nationality").select2({
        dropdownParent: $("#addCus"),
    
        ajax: {
            url: RouteNationality,
            dataType: "json",
            method: "GET",
            data: function (params) {
               //console.log(params.term);
               return {
                   q: params.term,
               };
           },
            processResults: function (data) {
               const results = data.map(function (item) {
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
    
    $(".Nationality-customer").select2({
        dropdownParent: $("#customer-index"),
    
        ajax: {
            url: RouteNationality,
            dataType: "json",
            method: "GET",
            data: function (params) {
               //console.log(params.term);
               return {
                   q: params.term,
               };
           },
            processResults: function (data) {
               const results = data.map(function (item) {
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