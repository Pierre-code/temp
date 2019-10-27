
/*var slider = new Slider('#ex1', {
    formatter: function(value) {
        return 'Current value: ' + value;
    }
});
*/
// With JQuery
$('#ex1').slider({
    formatter: function(value) {
        return 'Current value: ' + value;
    }
});
