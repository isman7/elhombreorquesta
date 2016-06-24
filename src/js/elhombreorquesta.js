$('#tabAll').click(function(){
  $('#tabAll').addClass('active');
  $('#steps .tab-pane').each(function(i,t){
    $('#steps li').removeClass('active');
    $(this).addClass('active in');
  });
});
