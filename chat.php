<!DOCTYPE html>
<html lang="en">
<?php
include "openconn.php";
include "database_connection.php";
session_start();
if (!isset($_SESSION['loggedIn']))
{
    //if the value was not set, you redirect the user to your login page
    header('location: index.php');
    exit;
}
?>
<head>
  <meta charset="utf-8">
  <title>QuikChef</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Chat Links -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/953a4737fa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Questrial|Ubuntu&display=swap" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/styleAdmin.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="initialPage.php">home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    
    <h3 align="center">Chat</a></h3><br />
    
    <div class="table-responsive">
      <h4 align="center">Online User</h4>
      <p align="left">Hi - <?php echo $_SESSION['username'];?> - <a href="logout.php">Logout</a></p>
      <div id="user_details"></div>
    </div>
  </div>
</body>  

<script>
// $(document).ready(function){

  setInterval(function(){
    update_last_activity();
    fetch_user();
    update_chat_history_data();
  }, 1300);

  function fetch_user(){
    
    $.ajax({
      url:"fetch_user.php",
      method:"POST",
      success:function(data){
        $('#user_details').html(data);
      }
    })
  }

  function update_last_activity(){
    $.ajax({
      url:"update_last_activity.php",
      success:function(){

      }
    })
  }


  function make_chat_dialog_box(to_user_id, to_user_name){
    var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Chat with '+to_user_name+'">';
    modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
    $('#user_details').html(modal_content);
  }

  $(document).on('click', '#start_chat', function(){
    var to_user_id = $(this).data('touserid');
    var to_user_name = $(this).data('tousername');

    make_chat_dialog_box(to_user_id, to_user_name);
    $('#user_dialog_'+to_user_id).dialog({
      autoOpen:false,
      width:400
    });
    $('#user_dialog_'+to_user_id).dialog('open');
  });

  $(document).on('click', '.send_chat', function(){
    var to_user_id = $(this).attr('id');
    var chat_message = $('#chat_message_'+to_user_id).val();
    $.ajax({
      url:"insert_chat.php",
      method:"POST",
      data:{to_user_id:to_user_id, chat_message:chat_message},
      success:function(data){
        $('#chat_message_'+to_user_id).val('');
        $('#chat_history_'+to_user_id).html(data);
      }
    })
  });

  function fetch_user_chat_history(to_user_id){
    $.ajax({
      url:"fetch_user_chat_history.php",
      method:"POST",
      data:{to_user_id:to_user_id},
      success:function(data){
        $('#chat_history_'+to_user_id).html(data);
      }
    })
  }

  function update_chat_history_data(){
    $('.chat_history').each(function(){
      var to_user_id = $(this).data('touserid');
      fetch_user_chat_history(to_user_id);
    });
  }

  $(document).on('click', '.ui-button-icon', function(){
    $('.user_dialog').dialog('destroy').remove();
  });
 
// });
</script>

</html>

<!-- <script>
$(document).ready(function){

  fetch_user();

  function fetch_user(){
    
    $.ajax({
      url:"fetch_user.php",
      method:"POST",
      success:function(data){
        $('#user_details').html(data);
      }
    })
  }
});
</script> -->


<!-- <script>  
$(document).ready(function(){

 fetch_user();

}
 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   type:'POST',
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }
 
});  
</script> -->

  <!-- JavaScript Libraries -->
  <!-- <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script> -->
  <!-- Contact Form JavaScript File -->
  <!-- <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <!-- <script src="js/main.js"></script> -->
