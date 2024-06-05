<?php
require 'nav.html';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Assets/bootstrap.css">
    <link rel="stylesheet" href="dboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"/>

</head>
<body>
    
    <div class="content container mt-5 d-flex gap-2">
        <!-- sidebox -->
        <div class="menubox">
            <div class="menubox_content">
                <div class="user_info p-1 mb-3">

                    <div class="d-flex justify-content-center">
                        <i class="fa-solid fa-circle-user fa-9x"></i>
                    </div>

                    <div class="user_name d-flex justify-content-center">
                        Rakesh Garai
                    </div>

                    <div class="verify d-flex justify-content-center align-items-center text-success gap-1">
                       <span>Active</span>
                        <i class="fa-solid fa-badge-check" style="font-family: 'Font Awesome 6 Pro'"></i>
                    </div>
                </div>
                <div class="menus">
                    <div class="menu_content d-flex flex-column gap-2">
            
                        <div class="menu_item">
                            <i class="fa-solid fa-user" style="font-size: 1.5rem;"></i>
                            <a href="">My Profile</a>
                        </div>

                        <div class="menu_item">
                        <i class="fa-duotone fa-motorcycle" style="font-size: 1.5rem;"></i>
                            <a href="">Bookings</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="infobox">
            <div class="infobox_content">
                <div class="heading">
                    <h3 class="text-center">Profile Information</h3>
                </div>
                <div class="infobox_body mt-4 d-flex flex-column gap-3 align-items-center ">
                    
                    <div class="field-group"style="gap:3.8rem">
                        <div class="field_title">User id</div>
                        <input type="text" id="disabledTextInput" class="form-control" value="SPR148514" disabled>
                    </div>
                    
                    <div class="field-group">
                        <div class="field_title">First Name</div>
                        <input type="text" id="disabledTextInput" class="form-control" value="Rakesh">
                    </div>
                    
                    <div class="field-group">
                        <div class="field_title">Last Name</div>
                        <input type="text" id="disabledTextInput" class="form-control" value="Garai">
                    </div>
                    
                    <div class="field-group" style="gap:4.4rem">
                        <div class="field_title">Email</div>
                        <input type="text" id="disabledTextInput" class="form-control" value="rakeshgarai23@gmail.com" disabled>
                    </div>
                    
                    <div class="field-group" style="gap:4.4rem">
                        <div class="field_title">Mobile No</div>
                        <input type="number" id="disabledTextInput" class="form-control" value="9593405410" disabled>
                    </div>
                    
                    <div class="field-group" style="gap:4.4rem">
                        <div class="field_title">Gender</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        
                    </div>

                    <div class="field-group">
                        <div class="field_title">Date of Birth</div>
                        <input type="date" class="form-control" value="2003-08-10">
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>
</html>

<?php
require 'footer.html';
?>
