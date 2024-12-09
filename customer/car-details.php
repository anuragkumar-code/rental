<?php include ('partials/customer-header.php'); ?>

<style>
    .owl-thumbs {
        display: flex;
        flex-wrap: nowrap; 
        overflow-x: auto;  
        padding: 10px 0;
        gap: 10px;        
        scrollbar-width: thin; 
    }

    .owl-thumb-item {
        flex: 0 0 auto; 
    }

    .owl-thumbs::-webkit-scrollbar {
        height: 8px; 
    }

    .owl-thumbs::-webkit-scrollbar-thumb {
        background: #ccc; 
        border-radius: 4px;
    }
</style>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Car Details</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>


<section id="section-car-details">
    
</section>


<script>

    function categoryFilter() {
        var car_id = "<?php echo $_GET['car_id']; ?>";
        $.ajax({
            type: 'POST',
            url: 'functions/cars/car-details.php',
            data: {
                car_id: car_id
            },
            success: function(response) {
                $('#section-car-details').html(''); 
                $('#section-car-details').html(response);
                
                $('#slider-carousel').owlCarousel('destroy'); 
                $('#slider-carousel').owlCarousel({
                    loop: true,
                    items: 1,
                    dots: false,
                    thumbs: true,
                    thumbImage: true,
                    thumbContainerClass: 'owl-thumbs',
                    thumbItemClass: 'owl-thumb-item'
                });
            },
            error: function() {
                alert('An error occurred while fetching the products.');
            }
        });
    }    

    setTimeout(()=>{
        categoryFilter(); 
    },1000);



    function showBookingPopup(){
        $('#bookingPopup').modal('show');
    }

    function hideBookingPopup(){
        $('#bookingPopup').modal('hide');

    }
    
    function makePayment(){

        var car_id = "<?php echo $_GET['car_id']; ?>";
        var from_date = $('#from-date').val();
        var to_date = $('#to-date').val();
        var owner_id = $('#owner_id').val();

        $.ajax({
            url: 'functions/bookings/make_payment.php',
            type: 'POST',
            data:{
                car_id: car_id,
                from_date: from_date,
                to_date: to_date,
                owner_id: owner_id,
            },
            success: function (response) {
                var fetch = JSON.parse(response);
                
                if(fetch.code == '200' && fetch.payment_link){
                    window.location.href = fetch.payment_link;
                }else {
                    toastr.error('An error occurred while initiating the booking. Please try again!');
                    $('#editModal').modal('hide'); 
                    $('#profileImage').val(''); 
                }
            },
            error: function () {
                toastr.error('An error occurred while initiating the booking. Please try again!');
            }
        });
    }
    
    
</script>

<?php include ('partials/customer-footer.php'); ?>
