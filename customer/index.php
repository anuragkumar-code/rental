<?php include ('partials/customer-header.php'); ?>
<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<h1>Cars</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="section-cars">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="item_filter_group">
                    <h4>Car Brands</h4>
                    <div class="de_form" id="brands_filter">
                        
                    </div>
                </div>
                <div class="item_filter_group">
                    <h4>Car Body Type</h4>
                    <div class="de_form" id="category_filter">
                        
                    </div>
                </div>
                
                <div class="item_filter_group">
                    <h4>Price ($)</h4>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="0">
                        </div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" value="20000">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="20000" value="0" step="1">
                        <input type="range" class="range-max" min="0" max="20000" value="20000" step="1">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row" id="listRow">
                    <div class="de-icon-box p-5 text-center">
                        <img style="height:80px" id="loader" src="../assets/images/balls.svg" class="" alt="">
                        <div class="spacer-20"></div>
                            <h4>Loading...</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function get_brands() {
        $.ajax({
            type: 'POST',
            url: '../owner/functions/cars/get-brands.php',
            data: {},
            success: function(response) {
                try {
                    const jsonResponse = JSON.parse(response);

                    if (jsonResponse.response && jsonResponse.response[0].data) {
                        const brandsData = jsonResponse.response[0].data;
                        renderBrands(brandsData);
                    } else {
                        console.error('Invalid response structure.');
                    }
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            },
            error: function() {
                alert('An error occurred while fetching brands.');
            }
        });
    }

    function renderBrands(brands) {
        const brandsContainer = document.getElementById('brands_filter');
        brandsContainer.innerHTML = ''; 

        brands.forEach((brand, index) => {
            const checkboxHTML = `
                <div class="de_checkbox">
                    <input id="brand_${index}" name="brand" type="checkbox" value="${brand.brands}">
                    <label for="brand_${index}">${brand.brands}</label>
                </div>
            `;
            brandsContainer.insertAdjacentHTML('beforeend', checkboxHTML);
        });
    }

    function get_categories() {
        $.ajax({
            type: 'POST',
            url: '../owner/functions/cars/get-categories.php',
            data: {},
            success: function(response) {
                try {
                    const jsonResponse = JSON.parse(response);

                    if (jsonResponse.response && jsonResponse.response[0].data) {
                        const categoriesData = jsonResponse.response[0].data;
                        renderCategories(categoriesData);
                    } else {
                        console.error('Invalid response structure.');
                    }
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            },
            error: function() {
                alert('An error occurred while fetching categories.');
            }
        });
    }

    function renderCategories(categories) {
        const categoryContainer = document.getElementById('category_filter');
        categoryContainer.innerHTML = ''; 

        categories.forEach((category, index) => {
            const checkboxHTML = `
                <div class="de_checkbox">
                    <input 
                        id="car_body_type_${index}" 
                        name="car_body_type" 
                        type="checkbox" 
                        value="${category.brands}">
                    <label for="car_body_type_${index}">${category.brands}</label>
                </div>
            `;
            categoryContainer.insertAdjacentHTML('beforeend', checkboxHTML);
        });
    }


    function categoryFilter() {
        $.ajax({
            type: 'POST',
            url: 'functions/cars/car-list.php',
            data: {
                
            },
            success: function(response) {
            try {
                const jsonResponse = JSON.parse(response);

                if (jsonResponse.response && jsonResponse.response[0].data.car_list) {
                    const carList = jsonResponse.response[0].data.car_list;
                    localStorage.setItem('carList', JSON.stringify(carList));

                    setTimeout(()=>{
                        displayCarList();
                    },300)
                } else {
                    console.error('Invalid response structure.');
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
            error: function() {
                alert('An error occurred while fetching the products.');
            }
        });
    } 
    
    
    function displayCarList() {
        const carListData = localStorage.getItem('carList');

        if (!carListData) {
            console.error('No car list found in local storage.');
            return;
        }

        const carList = JSON.parse(carListData);

        const listRow = document.getElementById('listRow');
        listRow.innerHTML = ''; 

        carList.forEach((car) => {
            const carHTML = `
                <div class="col-xl-4 col-lg-6">
                    <div class="de-item mb30">
                        <div class="d-img-list-div">
                            <img src="${car.image[0]}" class="img-fluid" alt="${car.brand} ${car.model}">
                        </div>
                        <div class="d-info">
                            <div class="d-text">
                                <h4>${car.brand} ${car.model}</h4>
                                <div class="d-item_like">
                                    <i class="fa fa-heart"></i><span>55</span>
                                </div>
                                <div class="d-atr-group">
                                    <span class="d-atr"><img src="../assets/images/icons/1-green.svg" alt="">${car.seats}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/2-green.svg" alt="">${car.gear}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/3-green.svg" alt="">${car.feul}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/4-green.svg" alt="">${car.cat_name}</span>
                                </div>
                                <div class="d-price">
                                    Daily price <span>$${car.price}</span>
                                    <a class="btn-main" href="../customer/car-details.php?car_id=${car.id}">Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            listRow.insertAdjacentHTML('beforeend', carHTML);
        });
    }


    function paginate(category, brand, from_date, to_date, price_from, price_to) {

        const carListData = localStorage.getItem('carList');

        if (!carListData) {
            console.error('No car list found in local storage.');
            return;
        }

        const carList = JSON.parse(carListData);

        const filteredCars = carList.filter((car) => {
            const matchesCategory = category ? car.cat_name.toLowerCase() === category.toLowerCase() : true;
            const matchesBrand = brand ? car.brand.toLowerCase() === brand.toLowerCase() : true;
            const matchesPrice = price_from || price_to ? car.price >= (price_from || 0) && car.price <= (price_to || Infinity) : true;

            const matchesDateRange = from_date && to_date ? true : true;

            return matchesCategory && matchesBrand && matchesPrice && matchesDateRange;
        });

        renderCarList(filteredCars);

    }

    function renderCarList(carList) {
        const listRow = document.getElementById('listRow');
        listRow.innerHTML = ''; 

        if (!carList.length) {
            listRow.innerHTML = '<p>No cars found matching the criteria.</p>';
            return;
        }

        carList.forEach((car) => {
            const carHTML = `
                <div class="col-xl-4 col-lg-6">
                    <div class="de-item mb30">
                        <div class="d-img-list-div">
                            <img src="${car.image[0]}" class="img-fluid" alt="${car.brand} ${car.model}">
                        </div>
                        <div class="d-info">
                            <div class="d-text">
                                <h4>${car.brand} ${car.model}</h4>
                                <div class="d-item_like">
                                    <i class="fa fa-heart"></i><span>55</span>
                                </div>
                                <div class="d-atr-group">
                                    <span class="d-atr"><img src="../assets/images/icons/1-green.svg" alt="">${car.seats}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/2-green.svg" alt="">${car.gear}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/3-green.svg" alt="">${car.feul}</span>
                                    <span class="d-atr"><img src="../assets/images/icons/4-green.svg" alt="">${car.cat_name}</span>
                                </div>
                                <div class="d-price">
                                    Daily price <span>$${car.price}</span>
                                    <a class="btn-main" href="../customer/car-details.php?car_id=${car.id}">Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            listRow.insertAdjacentHTML('beforeend', carHTML);
        });
    }

    setTimeout(()=>{
        categoryFilter(); 
        get_brands();
        get_categories();
    },100);

    document.querySelectorAll('input[name="car_brand"]').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const selectedBrands = getSelectedBrands();
            const selectedCategories = getSelectedCategories();

            paginate(selectedCategories, selectedBrands);
        });
    });

    document.querySelectorAll('input[name="car_body_type"]').forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const selectedBrands = getSelectedBrands();
            const selectedCategories = getSelectedCategories();

            paginate(selectedCategories, selectedBrands);
        });
    });

    function getSelectedBrands() {
        const selectedBrands = [];
        document.querySelectorAll('input[name="car_brand"]:checked').forEach((checkbox) => {
            selectedBrands.push(checkbox.value);
        });
        return selectedBrands;
    }

    function getSelectedCategories() {
        const selectedCategories = [];
        document.querySelectorAll('input[name="car_body_type"]:checked').forEach((checkbox) => {
            selectedCategories.push(checkbox.value);
        });
        return selectedCategories;
    }
</script>

<?php include ('partials/customer-footer.php'); ?>