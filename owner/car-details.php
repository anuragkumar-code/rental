<?php 
include ('partials/owner-header.php');
$card_id = $_GET['car_id'];
?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Edit Car</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="add-car-form" class="container mt-5 mb-5">
    <div class="text-center">
        <img style="height:80px" id="loader" src="../assets/images/balls.svg" class="" alt="">
        <div class="spacer-20"></div>
            <h4>Loading...</h4>
        </div>
    </div>
</section>


<style>
    #add-car-form {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    h2 {
        color: #333;
        margin-bottom: 15px;
    }
</style>


<script>

    function editCarDetails() {
        $('.errorClass').addClass('d-none');

        var brand = $('#brand').val();
        var model = $('#model').val();
        var car_name = $('#car_name').val();
        var car_type = $('#car_type').val();
        var engine_specs = $('#engine_specs').val();
        var car_color = $('#car_color').val();
        var seats = $('#seats').val();
        var speed = $('#speed').val();
        var price = $('#price').val();
        var gear_type = $('#gear_type').val();
        var fuel_type = $('#fuel_type').val();
        var description = $('#description').val();
        var car_id = $('#car_id').val();
        // var car_loc = $('#car_loc').val();
        // var car_insurance = $('#new_car_insurance')[0].files[0];
        // var number_plate = $('#new_number_plate')[0].files[0];
        var ssn = $('#ssn').val();

        // var car_images = $('#car_images')[0].files;

        var formData = new FormData();
        formData.append('brand', brand);
        formData.append('model', model);
        formData.append('car_name', car_name);
        formData.append('car_type', car_type);
        formData.append('engine_specs', engine_specs);
        formData.append('car_color', car_color);
        formData.append('seats', seats);
        formData.append('speed', speed);
        formData.append('price', price);
        formData.append('gear_type', gear_type);
        formData.append('fuel_type', fuel_type);
        formData.append('description', description);
        formData.append('car_id', car_id);
        // formData.append('car_loc', car_loc);
           
        // formData.append('car_insurance', car_insurance);
        // formData.append('number_plate', number_plate);
        formData.append('ssn', ssn);

        // for (let i = 0; i < car_images.length; i++) {
        //     formData.append('car_images[]', car_images[i]);
        // }

        $.ajax({
            type: 'POST',
            url: 'functions/cars/edit-car.php',
            data: formData,
            processData: false,
            contentType: false, 
            success: function(response) {
                toastr.success('Car details updated successfully.');

                setTimeout(()=>{
                    window.location.reload();
                },500);
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
                console.log(xhr.responseText);
            }
        });
    }

    function get_brands(){
        $.ajax({
            type: 'POST',
            url: 'functions/cars/get-brands.php',
            success: function(response) {
                
                const data = JSON.parse(response);
                const brands = data.response[0].data;
            
                const brandSelect = $('#brand');
                brandSelect.empty(); 
                brandSelect.append('<option selected disabled>Select Car Brand</option>');

                brands.forEach((brandItem) => {
                    brandSelect.append(`<option value="${brandItem.brands}">${brandItem.brands}</option>`);
                });
                
            },
            error: function() {
                alert('An error occurred while brands.');
            }
        });
    }

    function get_car_details(){
        $.ajax({
            type: 'POST',
            url: 'functions/cars/car-details-edit.php',
            data: {
                car_id: "<?php echo $card_id; ?>"
            },
            success: function(response) {
                $('#add-car-form').html(response);
            }
        });
    }
    

    setTimeout(()=>{
        get_car_details()
    },300);
</script>


<?php include ('partials/owner-footer.php'); ?>