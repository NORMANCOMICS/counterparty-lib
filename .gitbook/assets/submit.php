<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book of Stamp | Sub</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/common.css">


    <link rel="icon" type="image/png" sizes="512x512" href="assets/media/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>  
    <div class="wrap">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 10px; padding-right: 10px;">
    <a class="navbar-brand" href="/">Book of Stamp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/">Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="submit.php">Submit</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="rules.php">Rules</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="about.php">How it works</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="explore.php">Open Book</a>
        </li>


        
      </ul>
    </div>
</nav>
        <div style="margin-top: 8px;" class="main container clear-top">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row justify-content-center" style="margin-top: 4vw;">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-bottom: 10vh;">
                                        <form>
                                            <legend>Submit a Stamp</legend>
                                                <!-- Artist Name -->
                                                <div class="form-group has-success">
                                                    <label class="form-label mt-4 required" for="name-input">Artist Name</label>
                                                    <input type="text" placeholder="Artist Name" class="form-control" id="artist-name-input" name="artist-name">
                                                    <div id="addy-success" style="visibility: hidden;color:red;"></div>
                                                </div>

                                                <!-- Artist Tetlegram Handle -->
                                                <div class="form-group has-success">
                                                    <label class="form-label mt-4 required" for="tele-handle-input">Your Telegram Username (e.g. @kevin)</label>
                                                    <input type="text" placeholder="@YourHandle" class="form-control" id="handle-input" name="handle">
                                                    <div id="tele-success" style="visibility: hidden;color:red;"></div>
                                                </div>

                                                <!-- xcp address -->
                                                <!--div class="form-group has-success">
                                                    <label class="form-label mt-4 required" for="xcp-addy-input">Your Wallet Address</label>
                                                    <input type="text" placeholder="Wallet Address" class="form-control" id="xcp-addy-input" name="xcp-addy">
                                                    <div id="xcp-addy-success" style="visibility: hidden;color:red;"></div>
                                                </div-->

                                                <!-- Asset Name -->
                                                <div class="form-group has-success">
                                                    <label class="form-label mt-4 required" for="asset-name-input">Asset Name (e.g A808011111111111111)</label>
                                                    <input type="text" placeholder="Asset Name" class="form-control" id="asset-name-input" name="asset-name">
                                                    <div id="asset-name-success" style="visibility: hidden;color:red;"></div>
                                                </div>

                                        </form>
                                        
                                        <div style="margin-top: 8px;" id="alerts"></div>
                                        <div class="button-group" style="margin-bottom: 30px;">
                                            <a class="btn btn-info" onclick="submit()" style="margin-top: 10px;">Submit</a>
                                        </div>

                                        

                                        <div class="alert alert-dismissible alert-info">
                                            By submitting your stamp, you agree to the <a href="rules.php" class="alert-link"><strong>rules</strong></a> of the Book of Stamp project.
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <!-- Footer -->
<footer class="bg-dark text-light text-center text-lg-start footer" style="margin-top: -56px;">
    <!-- Copyright -->
    <div class="text-center p-3 ">
      <span>©2023 Book of Stamp</span>

      
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

    <!-- Include the jQuery library (if not already included) -->

    <script>

    function page_alert(type, message){
        var alert_div = document.getElementById("alerts");
        alert_div.innerHTML = `
        <div class="alert alert-dismissible alert-${type}">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        ${message}
        </div>`;
        setTimeout(function () {
        alert_div.innerHTML = ''; 
    }, 5000);
    }
    function submit() {
        var artist = $("#artist-name-input").val();
        var handle = $("#handle-input").val();
        //var xcp_addy = $("#xcp-addy-input").val();
        var asset_name = $("#asset-name-input").val();

        // Check if any required field is empty
        if (!artist.trim()) {
            $("#addy-success").text("Artist Name is required.").css("visibility", "visible");
            return;
        }else{
            $("#addy-success").css("visibility", "hidden");
        }

        if (!handle.trim()) {
            $("#tele-success").text("Telegram Username is required.").css("visibility", "visible");
            return;
        }else{
            $("#tele-success").css("visibility", "hidden");
        }

        //if (!xcp_addy.trim()) {
        //    $("#xcp-addy-success").text("Wallet Address is required.").css("visibility", "visible");
        //    return;
        //}else{
        //    $("#xcp-addy-success").css("visibility", "hidden");
        //}

        if (!asset_name.trim()) {
            $("#asset-name-success").text("Asset Name is required.").css("visibility", "visible");
            return;
        }else{
            $("#asset-name-success").css("visibility", "hidden");
        }


        $.ajax({
            type: "POST",
            url: "post_submissions.php",
            data: {
                'artist-name': artist,
                'handle': handle,
                'asset-name': asset_name
            },
            success: function(response) {
                // Update the form message based on the response
                if (response === "success") {
                    document.getElementById('artist-name-input').value = '';
                    document.getElementById('handle-input').value = '';
                    //document.getElementById('xcp-addy-input').value = '';
                    document.getElementById('asset-name-input').value = '';
                    page_alert("success", "Submission Successful!");
                } else if (response === "asset_present") {
                    $("#asset-name-success").text("Asset name has already been submitted.").css("visibility", "visible");
                } else if (response === "failure") {
                    $("#asset-name-success").text("Submission failed. Please try again later.").css("visibility", "visible");            
                } else {
                    $("#asset-name-success").text("Submission failed. Please try again later.").css("visibility", "visible");
                }
            },
            error: function() {
                $("#asset-name-success").text("Submission failed. Please try again later.").css("visibility", "visible");
            }
        });
    }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>