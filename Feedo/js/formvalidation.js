
window.addEventListener('load', function(){
    //console.log('test');
    jQuery('select.selector').change(function(){
        jQuery('input[name="GPC"]').val(jQuery('select.selector').val());
    })
})
