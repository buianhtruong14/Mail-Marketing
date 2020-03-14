<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Create Subscribers</h1>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="first_name">First Name :</label>
                <input type="text" class="form-control" id="first_name"
                       placeholder="Enter first name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name :</label>
                <input type="text" class="form-control" id="last_name"
                       placeholder="Enter last name" name="last_name">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email"
                       placeholder="Enter email" name="email">
            </div>
            <button class="btn btn-primary" id="create-sub">Submit</button>
        </div>

    </div>
</div>

<?php
include 'footer.php';
?>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript">
    $(function () {
        $("#create-sub").click(function (e) {
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            if (!email){
                alert('Email không được để trống !');
                return false;
            } else {
                $.ajax({
                   url:"../core/createSubscribers.php",
                   type:"post",
                   data : {
                       first_name : first_name,
                       last_name : last_name,
                       email : email
                   },
                   dataType: "json",
                   success: function (data) {
                        if (data) {
                            alert('Thêm danh sách thành công!');
                            window.location.href = "subscribers.php"
                        }
                   }
                });
            }
            e.preventDefault();

        });
    });
</script>