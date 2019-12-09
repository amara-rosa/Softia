$("button[name=submit]").on('click', function(e){
  e.preventDefault();
  $("#block").show();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  var submit = $(e.currentTarget).val();
  var date = $("input[name=date]").val();
  var hd = $("input[name=hd]").val();
  $.ajax({
    type: "POST",
    url: change_image_url,
    data: { 
      submit:submit,
      date:date,
      hd:hd
    },
    success: function(data){
      if(data != ''){
        data = JSON.parse(data);
        $("#show_date").html(data['date']);
        $("input[name=date]").val(data['date']);
        if($("#show_hd").hasClass('btn-success')){
          $("#img_hd").show();
          $("#img").hide();
        }else{
          $("#img_hd").hide();
          $("#img").show();
        }
        $("#img").attr('src', data['url']);
        $("#img_hd").attr('src', data['hdurl']);
        $("#img").attr('title', data['title']);
        $("#img_hd").attr('title', data['title']);
        $("#desc").html(data['explanation']);

        $(".msg_error").hide();
      }else{
        $(".msg_error").show();
      }
      setTimeout(function(){
        $("#block").hide();
      },1000);
    },
    error: function(data){
      $(".msg_error").show();
    }
  });
});


$("#show_hd").on("click", function(e){
  if($(e.currentTarget).hasClass('btn-success')){
    $(e.currentTarget).removeClass('btn-success').addClass('btn-danger');
    $("input[name=hd]").val(0);
    $("#img_hd").hide();
    $("#img").show();
  }else{
    $(e.currentTarget).addClass('btn-success').removeClass('btn-danger');
    $("input[name=hd]").val(1);
    $("#img_hd").show();
    $("#img").hide();
  }
});