// The root URL for the RESTful services
var rootURL = "http://localhost/Cherry(f)/prajituri-admin/api/praji";

var currentPraji;

// Retrieve praji list when application starts 
findAll();

// Nothing to delete in initial application state
$('#btnDelete').hide();

// Register listeners
$('#btnSearch').click(function() {
	search($('#searchKey').val());
	return false;
});

// Trigger search when pressing 'Return' on search key input field
$('#searchKey').keypress(function(e){
	if(e.which == 13) {
		search($('#searchKey').val());
		e.preventDefault();
		return false;
    }
});

$('#btnAdd').click(function() {
	newPraji();
	return false;
});

$('#btnSave').click(function() {
	if ($('#prajituriId').val() == '')
		addPraji();
	else
		updatePraji();
	return false;
});

$('#btnDelete').click(function() {
	deletePraji();
	return false;
});

$('#prajiList a').live('click', function() {
	findById($(this).data('identity'));
});

// Replace broken images with generic praji bottle
$("img").error(function(){
  $(this).attr("src", "pics/tort.jpg");

});

function search(searchKey) {
	if (searchKey == '') 
		findAll();
	else
		findByName(searchKey);
}

function newPraji() {
	$('#btnDelete').hide();
	currentPraji = {};
	renderDetails(currentPraji); // Display empty form
}

function findAll() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
}

function findByName(searchKey) {
	console.log('findByName: ' + searchKey);
	$.ajax({
		type: 'GET',
		url: rootURL + '/search/' + searchKey,
		dataType: "json",
		success: renderList 
	});
}

function findById(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			$('#btnDelete').show();
			console.log('findById success: ' + data.nume);
			currentPraji = data;
			renderDetails(currentPraji);
		}
	});
}

function addPraji() {
	console.log('addPraji');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL,
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Praji created successfully');
			$('#btnDelete').show();
			$('#prajituriId').val(data.id);
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addPraji error: ' + textStatus);
		}
	});
}

function updatePraji() {
	console.log('updatePraji');
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: rootURL + '/' + $('#prajituriId').val(),
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Praji updated successfully');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updatePraji error: ' + textStatus);
		}
	});
}

function deletePraji() {
	console.log('deletePraji');
	$.ajax({
		type: 'DELETE',
		url: rootURL + '/' + $('#prajituriId').val(),
		success: function(data, textStatus, jqXHR){
			alert('Praji deleted successfully');
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('deletePraji error');
		}
	});
}

function renderList(data) {
	// JAX-RS serializes an empty list as null, and a 'collection of one' as an object (not an 'array of one')
	var list = data == null ? [] : (data.prajituri instanceof Array ? data.prajituri : [data.prajituri]);

	$('#prajiList li').remove();
	$.each(list, function(index, prajituri) {
		$('#prajiList').append('<li><a href="#" data-identity="' + prajituri.id + '">'+prajituri.nume+'</a></li>');
	});
}

function renderDetails(prajituri) {
	$('#prajituriId').val(prajituri.id);
	$('#nume').val(prajituri.nume);
	$('#data_valabilitate').val(prajituri.data_valabilitate);
	$('#calorii').val(prajituri.calorii);
	$('#tip').val(prajituri.tip);
	$('#eveniment').val(prajituri.eveniment);
	$('#pic').attr('src', 'pics/' + prajituri.picture);
	$('#description').val(prajituri.description);
}

// Helper function to serialize all the form fields into a JSON string
function formToJSON() {
	return JSON.stringify({
		"id": $('#prajituriId').val(), 
		"nume": $('#nume').val(), 
		"data_valabilitate": $('#data_valabilitate').val(),
		"calorii": $('#calorii').val(),
		"tip": $('#tip').val(),
		"eveniment": $('#eveniment').val(),
		"picture": currentPraji.picture,
		"description": $('#description').val()
		});
}
