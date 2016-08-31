$(function(){
    $('.button-collapse').sideNav();
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            belowOrigin: true
        }
    );
    $('select').material_select();
});
