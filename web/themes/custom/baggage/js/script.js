let bubble = 0;
$('#bubble').text(bubble);

$('.addToCart').click(function () {
    bubble = bubble + 1;
    $('#bubble').text(bubble);
  });