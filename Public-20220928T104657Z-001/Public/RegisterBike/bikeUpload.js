$(document).ready(function ($) {

  //createTestData();

  $(document).on('change', '#fileBikeImages', function (event) {
    previewFile();
  });

  //func to view preview of image before submitting
  function previewFile() {
    var preview = document.querySelector('img#bannerImg');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () { //source of img preview
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file); //show preview
    } else {
      preview.src = ""; //preview empty
    }
  }

  $('#formRegBike').on('submit', function (e) {
    var formData = new FormData(this);

    if ($('#genderSelect').val() === '0') { //guard against empty selection input
      alert("Please Select a Gender");
      return false;
    }

    //ajax to post data from form and alert user on success
    e.preventDefault();
    $.ajax({
      url: "RegisterBikeDAO.php",
      method: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (echoedMsg) {
        alert("Bike Successfully Registered");
        location.reload();
      }
    });

  });

});