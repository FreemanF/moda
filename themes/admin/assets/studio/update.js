
$(document).ready(function() {

    $(".simpleSelectBox").select2({
        dropdownCssClass: 'noSearch'
    });
   
    // Multilang projects
    if ('langTabbable' in window && langTabbable)
        $('#langType li:first a').tab('show');

});
