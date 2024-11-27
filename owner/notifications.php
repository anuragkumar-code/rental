<?php include ('partials/owner-header.php'); ?>

<style>
/** {*/
/*    margin: 0;*/
/*    padding: 0;*/
/*    box-sizing: border-box;*/
/*}*/

/*body {*/
/*    font-family: Arial, sans-serif;*/
/*    background-color: #f7f7f7;*/
/*    color: #333;*/
/*}*/

.container1 {
    max-width: 400px;
    margin: 20px auto;
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/*header {*/
/*    display: flex;*/
/*    justify-content: space-between;*/
/*    align-items: center;*/
/*    padding: 10px;*/
/*    border-bottom: 1px solid #ddd;*/
/*}*/

/*header h1 {*/
/*    font-size: 18px;*/
/*    font-weight: bold;*/
/*}*/

/*header .back-arrow, header .menu {*/
/*    font-size: 24px;*/
/*    color: #333;*/
/*    cursor: pointer;*/
/*}*/

.notifications {
    padding: 10px;
}

.notification {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f0f7ff;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
}

.notification .icon {
    font-size: 20px;
    margin-right: 10px;
}

.notification .text {
    flex-grow: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification .text span {
    font-size: 16px;
}

.notification .like-icon {
    font-size: 18px;
    color: #007bff;
    margin-left: 10px;
}

/* Media Queries for Responsive Design */

/* For small screens (mobile devices) */
@media (max-width: 600px) {
    .container1 {
        max-width: 100%;
        margin: 10px;
        padding: 5px;
    }

    /*header h1 {*/
    /*    font-size: 16px;*/
    /*}*/

    /*header .back-arrow, header .menu {*/
    /*    font-size: 20px;*/
    /*}*/

    .notification {
        padding: 8px;
    }

    .notification .icon {
        font-size: 18px;
    }

    .notification .text span {
        font-size: 14px;
    }

    .notification .like-icon {
        font-size: 16px;
    }
}

/* For medium screens (tablets) */
@media (min-width: 601px) and (max-width: 992px) {
    .container1 {
        max-width: 600px;
        margin: 15px auto;
    }

    /*header h1 {*/
    /*    font-size: 18px;*/
    /*}*/

    /*header .back-arrow, header .menu {*/
    /*    font-size: 22px;*/
    /*}*/

    .notification {
        padding: 10px;
    }

    .notification .icon {
        font-size: 20px;
    }

    .notification .text span {
        font-size: 16px;
    }

    .notification .like-icon {
        font-size: 18px;
    }
}

/* For large screens (desktop and larger) */
@media (min-width: 993px) {
    .container1 {
        max-width: 800px;
        margin: 20px auto;
    }

    /*header h1 {*/
    /*    font-size: 20px;*/
    /*}*/

    /*header .back-arrow, header .menu {*/
    /*    font-size: 24px;*/
    /*}*/

    .notification {
        padding: 15px;
    }

    .notification .icon {
        font-size: 24px;
    }

    .notification .text span {
        font-size: 18px;
    }

    .notification .like-icon {
        font-size: 20px;
    }
}


</style>
<section id="subheader" class="jarallax text-light">
    <img src="../assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<h1>Notifications</h1>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

  <div class="container1">
       
            
       

        <div class="notifications">
            <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>

            <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>
            
              <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>
            
              <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>
            
              <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>
            
              <div class="notification">
                <div class="icon">📄</div>
                <div class="text">
                    <span>Hey <strong>Kevin</strong>, your request is now <strong>approved</strong></span>
                    <div class="like-icon">👍</div>
                </div>
            </div>

          
        </div>
    </div>









<?php include ('partials/owner-footer.php'); ?>