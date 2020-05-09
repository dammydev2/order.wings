<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Wings by nineseas logistics</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="wings by ninesasa logistics order Form , shipping in Lagos, Sign up with Wings , We move your logistics for you at Wings, Wings logistics is here, wings by nineseas" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Stylesheets {{ URL::asset('css/css.css') }} -->
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <!--// Stylesheets -->
    <!--fonts-->
    <!-- title -->
    <link href="//fonts.googleapis.com/css?family=Abhaya+Libre:400,500,600,700,800" rel="stylesheet">
    <!-- body -->
    <!--//fonts-->
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
        font-family: "Roboto";
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f9ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>
</head>

<body>
    <header>
        <h1>Wings by Nineseas Logistics</h1>
    </header>
    <div class="w3ls-contact">

        <!-- form starts here -->
        <form action="{{ route('check_amount') }}" method="post">
            @csrf

            <div id="locationField" class="agile-field-txt has-feedback {{ $errors->has('pickup_address') ? ' has-error' : '' }}">
                <label>
                    Pick-up Address:</label>
                <input type="text" id="autocomplete1" onFocus="geolocate()" name="pickup_address" placeholder="Enter Pick-up Address"  style="display: block" required="" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('pickup_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('pickup_address') }}</strong>
                </span>
                @endif
            </div>

            <div id="locationField"  class="agile-field-txt has-feedback {{ $errors->has('delivery_address') ? ' has-error' : '' }}" style="margin-top: 60px;">
                <label>
                    Delivery Address:</label>
                <input type="text"  id="autocomplete2" onFocus="geolocate()" name="delivery_address" placeholder="Enter Delivery Address "  required="" />
                @if ($errors->has('delivery_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('delivery_address') }}</strong>
                </span>
                @endif
            </div>

            <div class="agile-field-txt has-feedback {{ $errors->has('estimated_weight') ? ' has-error' : '' }}" style="margin-top: 60px;">
                <label>
                    Estimated Weight: (in Kg)</label>
                <input type="number" name="estimated_weight" placeholder="Enter Estimated Weight (eg 10) "  required="" />
                @if ($errors->has('estimated_weight'))
                <span class="help-block">
                    <strong>{{ $errors->first('estimated_weight') }}</strong>
                </span>
                @endif
            </div>

            <div class="w3ls-contact  w3l-sub" >
                <input type="submit" value="Get an Estimate">
            </div>

        </form>
    </div>
    <!-- GOOGLE MAP API -->
    <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete1'), {types: ['geocode']});

      autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('autocomplete2'), { types: [ 'geocode' ] });
google.maps.event.addListener(autocomplete2, 'place_changed', function() {
  fillInAddress();
});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <?php
     $key = env('GOOGLE_MAP_API');
     ?>
     <script>
         var nakeyme='<?php echo $key; ?>';
         console.log(nakeyme)
     </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=places&callback=initAutocomplete"
        async defer></script>
        <!-- GOOGLE MAP API -->
    <!-- //form ends here -->
    <div class="copy-wthree">
        <p>© {{ date('Y') }} Wings Shipping Form . All Rights Reserved | Design by
            <a href="http://odysoft.com/" target="_blank">odysoft</a>
        </p>
    </div>
</body>
<!-- //Body -->

<style>
    .help-block{
        color: red
    }
</style>

</html>