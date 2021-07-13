$(document).ready(function(){
    let urlGold = $('#box-gold').attr('data-url-gold');
    let urlCoin = $('#box-coin').attr('data-url-coin');
    $('#box-gold').load(urlGold);
    $('#box-coin').load(urlCoin);
})