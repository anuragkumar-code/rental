<?php include ('partials/customer-header.php'); ?>

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
        
          let formData = new FormData();
          let car_id = document.querySelector('input[name="car_id"]').value;
          let from_date = document.querySelector('input[name="from_date"]').value;
          let to_date = document.querySelector('input[name="to_date"]').value;
          let user_id = document.querySelector('input[name="user_id"]').value;

            formData.append('renter_id', "<?php echo $_SESSION['user_id']; ?>");
            formData.append('car_id', car_id);
            formData.append('from_date', from_date);
            formData.append('to_date', to_date);
            formData.append('user_id', user_id);

             
            //   console.log("FormData ready to submit:", formData);
            //   return;
           

            $.ajax({
                url: 'functions/bookings/make_payment.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (abc) {
                   
                    //  console.log(response);
                    //  return;
                    // jsonreturn;
                    
                    var fetch = JSON.parse(abc);
                     console.log(fetch); 
                     return;
                    
                    if (fetch.response[0].status == true) {
                        
                        toastr.success('Car Successfully Booked')
                        // loadProfile();
                        location.reload();
                        
                    }
                        else {
                            toastr.error('An error occurred during profile image update. Please try again!');
                            
                            $('#editModal').modal('hide'); 
    
    
                             $('#profileImage').val(''); 
                            
                        }

                   
                    // alert('Profile updated successfully!');
                     
                },
                error: function () {
                    
                     toastr.error('An error occurred while profile image update. Please try again!');
                }
            });
    }
    
    
</script>

<?php include ('partials/customer-footer.php'); ?>
