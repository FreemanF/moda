var dataTree = {};
var isPageIndex = true;
var jstree_default = -1;
var jstree_first   = false;
var manually_deselect_all = false;
var automatically_hash_changed = false;
var disable_add_in_root   = false;
var disable_delete_object = false;
var updateTableFP         = true;
var notclickable          = '.item_sort';
var laterHash             = '';
var manually_click_update = true;
callbackDeleteObject      = window.callbackDeleteObject || $.Callbacks('unique');
callbackSortObject        = window.callbackSortObject || $.Callbacks('unique');

function updateNode(obj,inst) {
    var newCrumbs, fid, text, href, clazz,
        currId   = -1,
        currText = '',
        currHref = 'javascript:void(0);',
        ulbc     = $('ul.xbreadcrumbs'),
        inTrash  = false;
        
    $('li',ulbc).not('.fix').remove();
    var lifirst = $('li:nth(1)',ulbc);
    do {
        if (obj==-1 || obj===false) break;
        fid  = obj.data('id');
        if (fid==='trash') inTrash = true;
        fid  = fid==parseInt(fid)?parseInt(fid):fid; // trash o1 1
        text = inst.get_text(obj);
        href = obj.children('a:eq(0)').attr('href');
        if (currId<0) {
            currId   = fid;
            currText = text;
            currHref = href;
            if ($('li.fix',ulbc).length<3)
                clazz    = ' class="current"';
            else
                clazz    = '';
        } else
            clazz    = '';
        
        newCrumbs = $('<li'+clazz+'><a href="'+href+'">'+text+'</a></li>');
        if (treeHrefPrefix=='')
            newCrumbs.find('a').click(function(event){
                event = event || window.event;
                event.stopPropagation();
                event.preventDefault();
                var th = $(this);
                if (!th.hasClass('current'))
                    jQuery('#jstree').jstree('select_node',th.attr('href'),true);
                return false;
            });
        lifirst.after(newCrumbs);
    } while (obj = inst._get_parent(obj));
    lifirst.toggleClass('current',currId<0);
    if (currId<0) {
        currId=0;
        currText='<ROOT>';
        currHref='';
    }
    $('#idParent').val(currId);
    if ('pageTitle' in window) {
        $('header h2').html('<small>'+(currId==0?pageTitleRoot:pageTitle+' <span>"'+currText+'"</span>')+'</small>');
    } else
        $('header h2 span').text('"'+currText+'"');
    
    var disableadd = inTrash || (disable_add_in_root && currId==0);
    var buttons = $('#addObject')
        .attr('href',disableadd ? 'javascript:void(0);' : '/admin/'+crudalias+'/create?dir='+currId+(isPageIndex?currHref:''));
    buttons.add('#buttonAddFolder')
        .toggleClass('disabled',disableadd);
        
    if ( ! updateTableFP) { 
        if (jstree_first)
            jstree_first = false;
        updateTableFP = true; 
        return; 
    }
    if (isPageIndex) {
        automatically_hash_changed = window.location.hash != currHref;
        window.location.hash = currHref;
        $.post('/admin/'+crudalias+'/list',{dir: currId}, function(data) {
            var id='#'+crudalias+'-grid';
            $(id).replaceWith($(id,'<div>'+data+'</div>'));
            var rows = $('table.dataTable tr',id);
            if (notclickable) rows = rows.not(notclickable);
            rows.click(function(event) {
                var target = $(event.target);
                if (target.hasClass('setting-link')) return true;
                if (target.prop("tagName")=='A' && target.attr("class")=='update' && target.length) return true;
                if (target.parent('a.update').length) return true;
                var tr = $(this);
                var fid = tr.data('id');
                if (fid === undefined) return false;
                if (fid>0 && target.parent('td.isnamefield').length) return true;
                var hash = fid ? (fid=='trash' ? '#trash' : '#node_'+(Math.abs(parseInt(fid)))) : false;
                if (hash) 
                    jQuery('#jstree').jstree('select_node',hash,true);
                else {
                    manually_deselect_all = true;
                    jQuery('#jstree').jstree('deselect_all');
                }
                return false;
            });
            
            // checkbox is_published
            if ('updateCBS' in window) updateCBS(); 
            
            // Сортировка страниц
            if ('getItemsSort' in window) {
                oldItemsSort = getItemsSort(); 
                initItemsSort();
            }
            if (laterHash) {
                var lh = laterHash; laterHash = '';
                jQuery('#jstree').jstree('select_node',lh,true);
                
            }
        });
    } else {
        if (jstree_first)
            jstree_first = false;
        else
            window.location = currHref;
    }
}

callbackDeleteObject.add(function (id,data) {
    if ('tree' in data) {
        dataTree = data.tree;
        setTimeout(updateJsTree,0);
    } else
    if (id<0)
        if (data.status=='Trash')
            jQuery('#jstree').jstree('move_node','#node_'+(-id),'#trash','last');
        else
            jQuery('#jstree').jstree('delete_node','#node_'+(-id));
    else
        if (id>0 && ! disable_delete_object)
            jQuery('#jstree').jstree('delete_node','#node_'+id);
        
});

callbackSortObject.add(function (data) {
    if ('tree' in data) {
        dataTree = data.tree;
        setTimeout(updateJsTree,0);
    }
});

function updateJsTree() {
    updateTableFP = false;            
    $.jstree._focused()._get_settings().json_data.data = dataTree;
    $("#jstree").jstree('refresh').trigger('loaded.jstree');
}

function hashChanged(event,data) {
    if (automatically_hash_changed) {
        automatically_hash_changed = false;
        return false;
    }
    var hash = window.location.hash // && isPageIndex
        ? window.location.hash 
        : jstree_default;
    if (hash!=-1 && hash!='#trash' && hash.match(/\#?node_o?[0-9]+/)===null)
        hash = jstree_default;
    if (hash==-1 || $(hash).length==0) {            
        manually_deselect_all=true;
        jQuery('#jstree').jstree('deselect_all');
    } else {
        if (!isPageIndex) updateTableFP=false;
        jQuery('#jstree').jstree('select_node',hash,true);
    }
}

$(window).bind( 'hashchange', hashChanged );

$(function() {
    
    $('#addObject').unbind('click').click(function(event){
        var disabled = $(this).hasClass('disabled');
        if ( ! disabled) return true;
        event = event || window.event;
        event.preventDefault();
        return false;
    });
        
    $("#jstree").jstree({
        "json_data" : { "cache":false, "data" : dataTree },
        "plugins"   : ["json_data", "ui"],
        "ui"        : {"select_limit" : 1  }
    }).bind("loaded.jstree", hashChanged)
      .bind("select_node.jstree", function (event, data) {
        var obj  = data.rslt.obj;
        var inst = data.inst;
        if (obj!=-1) {
            var level = $(obj).data('level');
            var a = null;
            if (typeof type != undefined && laterHash=='')
                if (level==0) {
                    var id = $(obj).data('id');
                    var parent = inst._get_parent(obj);
                    parent = (parent==-1 || parent===false) ? 0 : parseInt(parent.data('id'));
                    var idParent = $('#idParent');
                    var oldValue = parseInt(idParent.val());
                    if (oldValue == parent) {
                        a  = $('table.dataTable tr[data-id="'+id+'"] td.button-column a.update');
                        if (a.length) 
                            if (manually_click_update)
                                a.trigger('click');
                            else
                                manually_click_update = true;
                        else    a = null;
                    } else {
                        laterHash = '#node_'+id;
                        if (oldValue==0)
                            manually_click_update = false;
                        inst.select_node(parent==0 ? -1 : '#node_'+parent,true);
                        a = 1;
                    }
                } else { // type!=0
                    
                }
            if (a == null) {
                if ($(obj).hasClass('jstree-closed'))
                    inst.open_node(obj);
                updateNode(obj,inst);
                
            }
        }
    }).bind("deselect_all.jstree", function (event, data) {
        if (manually_deselect_all) {
            manually_deselect_all = false;
            if ( ! updateTableFP) { updateTableFP = true; return; }
            updateNode(-1,data.inst);
        }
    });
});
