//get a bike ID from the form
var bikeID = $('#bikeID').val();
//get a date from the form
var dateStolen = $('#dateStolen').val();
//get a latitude from the form
var eventLat = marker.getPosition().lat();
//get a longitude from the form
var eventLng = marker.getPosition().lng();
//pass the above values into another page
window.location.href = "ReportStolenDAO.php?w1=" + eventLat + "&w2=" + eventLng + "&w3=" + bikeID + "&w4=" + dateStolen;