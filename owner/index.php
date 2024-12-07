<?php include ('partials/owner-header.php'); ?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<h1>My Cars</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="section-cars">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">&nbsp;</div>
            <div class="col-lg-8">
                <div class="row " id="owner_car_list_div">
                    <img style="height:80px" id="loader" src="../assets/images/balls.svg" class="" alt="">
                </div>
            </div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
    </div>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
</section>


<script>
    $(document).on('click', '.main-toggle', function() {
        $(this).toggleClass('on');
    
        var id = $(this).data('id');
        var hiddenInput = $('#statusId_' + id);
    
        if ($(this).hasClass('on')) {
            hiddenInput.val('N'); 
            updateStatus('Y', id); 
        } else {
            hiddenInput.val('Y'); 
            updateStatus('N', id);
        }
    });

    function updateStatus(status, id) {
        $.ajax({
            type: 'POST',
            url: 'functions/cars/update_status.php',
            data: {
                status: status,
                id: id
            },
            success: function(result) {
                try {
                    const response = JSON.parse(result);
                    const responseData = response.response[0];

                    if (responseData.status) {
                        console.log(responseData.msg);
                        toastr.success(responseData.msg);
                    } else {
                        console.log("Failed to update status:", responseData.msg);
                        toastr.error('Something went wrong! Please contact admin.');
                    }
                } catch (error) {
                    console.error("Error parsing JSON response:", error);
                    toastr.error('An error occurred while processing the update.');
                }
            },
            error: function() {
                toastr.error('An error occurred with the AJAX request.');
            }
        });
    }


    function getownercarlist() {
        var userId = $('#user_id').val();

        $.ajax({
            type: 'POST',
            url: 'functions/cars/car-list.php',
            data: {
                userId: userId, 
            },
            success: function(response) {
                $('#owner_car_list_div').html(''); 
                $('#owner_car_list_div').html(response);
            },
            error: function() {
                toastr.error('An error occurred while retrieving your cars. Please try again!');
            }
        });
    }    

    setTimeout(()=>{
        getownercarlist(); 
    },3000);

</script>


<?php include ('partials/owner-footer.php'); ?>
