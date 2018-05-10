var notclickable = '';

function updateObject(event,target){
    
    event = event || window.event;
    event.stopPropagation();
    
    event.preventDefault();
    
    var href = $(target).attr("href");
    window.location.href = href;
    
    return false;
}