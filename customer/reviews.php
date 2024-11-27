<?php include ('partials/customer-header.php'); ?>

<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1> Reviews</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

<section id="section-reviews">
    <div class="container">
        <div class="row review-button-row">
            <div class="col-lg-10"></div>
            <div class="col-lg-2">
           <a href="" class="btn-main" id="openModalBtn">Add a Review</a>
           <!--<button id="openModalBtn">Open Modal</button>-->
           </div>
            
            </div>
        <div class="row">
            <div class="col-lg-3 d-none">
                <div class="item_filter_group">
                    <h4>Review Filter</h4>
                    <div class="de_form">
                        <div class="de_checkbox">
                            <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox" value="car">
                            <label for="vehicle_type_1">Car</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox" value="van">
                            <label for="vehicle_type_2">Van</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox" value="minibus">
                            <label for="vehicle_type_3">Minibus</label>
                        </div>
                        <div class="de_checkbox">
                            <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox" value="prestige">
                            <label for="vehicle_type_4">Prestige</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="">
                        <div class="card review-card mb30 shadow-sm" style="border-radius: 10px;background-color:#e8e8e8">
                            <div class="row no-gutters">
                                <div class="col-md-2 text-center">
                                    <div class="profile_avatar">
                                        <div class="profile_img">
                                            <img style="width: 125px;" src="../assets/images/profile/1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">John Doe</h5>
                                        <div class="star-rating mb10">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half text-warning"></i>
                                        </div>
                                        <p class="card-text">"Had an amazing experience with the Jeep Renegade. The car was in great condition, and the rental process was smooth and fast."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card review-card mb30 shadow-sm" style="border-radius: 10px;">
                            <div class="row no-gutters">
                                <div class="col-md-2 text-center">
                                    <div class="profile_avatar">
                                        <div class="profile_img">
                                            <img style="width: 125px;" src="../assets/images/profile/1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">John Doe</h5>
                                        <div class="star-rating mb10">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half text-warning"></i>
                                        </div>
                                        <p class="card-text">"Had an amazing experience with the Jeep Renegade. The car was in great condition, and the rental process was smooth and fast."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- The Modal -->
<div id="reviewModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModalBtn">&times;</span>
    
    <h2>Submit Your Review</h2>
    <form id="reviewForm">
      <!-- Star Rating -->
      <div class="star-rating">
        <span class="star" data-value="1">&#9734;</span>
        <span class="star" data-value="2">&#9734;</span>
        <span class="star" data-value="3">&#9734;</span>
        <span class="star" data-value="4">&#9734;</span>
        <span class="star" data-value="5">&#9734;</span>
      </div>

      <!-- Textbox for review -->
      <div>
        <textarea id="reviewText" name="review" rows="4" cols="50" placeholder="Write your review..."></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit Review</button>
    </form>
  </div>
</div>

<style>/* Button styling */
.btn-main {
  background-color: #3a6abf;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Modal styling */
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5); 
}
/* Modal styling */
.modal-content {
  background-color: white;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  border-radius: 5px;
  position: relative; /* Set to relative for close button positioning */
}

/* Close button */
.close {
  color: #aaa;
  position: absolute;
  top: 10px;
  right: 15px; /* Align to the right */
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

/* Star rating styling */
.star-rating {
  font-size: 30px;
  display: inline-block;
}

.star {
  display: inline-block;
  cursor: pointer;
  color: #ccc; /* Default star color */
  transition: color 0.3s ease; /* Smooth transition */
}

/* When hovered or selected, fill the stars */
.star.hover, .star.selected {
  color: #ffa900 !important; /* Filled star color */
}

/* Fill stars from left to right when hovering */
.star:hover ~ .star {
  color: #ccc; /* Reset stars after hovered one */
}

.star:hover, .star:hover ~ .star.hover {
  color: #ffa900 !important; /* Apply yellow color from the hovered star and backward */
}

/* Submit button */
.submit-btn {
  background-color: #3a6abf;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

</style>
<script>
// Open Modal by ID
document.getElementById('openModalBtn').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('reviewModal').style.display = 'block';
});

// Close Modal by ID
document.getElementById('closeModalBtn').addEventListener('click', function() {
  document.getElementById('reviewModal').style.display = 'none';
});

// Close Modal when clicking outside of it
window.onclick = function(event) {
  if (event.target == document.getElementById('reviewModal')) {
    document.getElementById('reviewModal').style.display = 'none';
  }
};

// Star rating selection
let stars = document.querySelectorAll('.star');
let selectedRating = 0;

stars.forEach(star => {
  star.addEventListener('mouseover', function() {
    // Fill this star and all previous stars when hovering
    fillStarsUpTo(this);
  });

  star.addEventListener('mouseout', function() {
    // Reset the stars when not hovering, keep the selected ones
    resetStars();
    fillStarsUpToSelected();
  });

  star.addEventListener('click', function() {
    // Set selected rating
    selectedRating = this.getAttribute('data-value');
    resetStars(); // Clear previously selected stars
    fillStarsUpTo(this); // Fill stars up to the clicked star
    this.classList.add('selected'); // Mark the clicked star as selected
  });
});

// Function to fill stars up to the hovered or clicked one
function fillStarsUpTo(el) {
  resetStars();
  let prevSiblings = getPreviousSiblings(el);
  prevSiblings.forEach(sibling => sibling.classList.add('hover'));
  el.classList.add('hover');
}

// Function to fill stars up to the selected rating
function fillStarsUpToSelected() {
  if (selectedRating > 0) {
    stars.forEach(star => {
      if (star.getAttribute('data-value') <= selectedRating) {
        star.classList.add('selected');
      }
    });
  }
}

// Function to reset stars
function resetStars() {
  stars.forEach(star => star.classList.remove('hover', 'selected'));
}

// Function to get previous siblings (from left to right)
function getPreviousSiblings(el) {
  let siblings = [];
  while (el = el.previousElementSibling) {
    siblings.push(el);
  }
  return siblings;
}



</script>

<?php include ('partials/customer-footer.php'); ?>