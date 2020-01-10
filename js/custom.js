/**

	INDEX
	1. Locations
	2. Add Questions (New Report)
	3. Issue/Request Tabs


**/

// 1. Locations - All and LAF location drop down

	$(document).ready(function() {

		var location = $('#location');

		location.hide();//hide location on initial load

		$(document).on('change', 'select#region', function() {

			var id = $(this).children(":selected").attr("id");
			var clear = $('option.remove');

			location.show();//show location after region is selected
			clear.remove();

			if ( id == "default" ) {

				clear.add(location).hide();//reset every thing

			}
			else {

				location.append('<option class="remove" value="" disabled selected>Select a Location</option>');

				if ( id == "OC" ) {
					var locations = ['Huntington Beach', 'Irvine', 'Yorba Linda', 'Anaheim Hills'];
				}
				else if ( id == "SDC" ) {
					var locations = ['Carlsbad', 'Sorrento Valley'];
				}
				else if ( id == "LAC" ) {
					var locations = ['Torrance', 'Palos Verdes', 'Culver City'];
				}
				else if ( id == "SGV" ) {
					var locations = ['Arcadia', 'Pasadena', 'Sierra Madre', 'Alhambra', 'West Covina'];
				}
				else if ( id == "AC" ) {
					var locations = ['Hayward'];
				}
				else if ( id == "SF" ) {
					var locations = ['20th Avenue'];
				}
				else if ( id == "SV" ) {
					var locations = ['San Jose', 'Sunnyvale', 'Almaden', 'North San Jose', 'Blossom Hill']
				}
				else if ( id == "DVR" ) {
					var locations = ['Highlands Ranch'];
				}

				$.each(locations, function(l, t) {
					locations.sort();
    				$("#location").append("<option class='remove' value='" + locations[l] + "'>" + locations[l] + "</option>");
				});

			}

		});
	});


// 2. Add Questions (New Report)

	function addRow(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		if(rowCount < 30){ // limit the user from creating fields more than your limits
			var row = table.insertRow(rowCount);
			var colCount = table.rows[0].cells.length;
			for(var i=0; i <colCount; i++) {
				var newcell = row.insertCell(i);
				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			}
		}
		else{
			 alert("Maximum 30 Questions");

		}
	}

	function deleteRow(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 1){ // limit the user from removing all the fields
					alert("Minimum of 1 Question.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
	}


// 3. Issue/Request Tabs

	/*---   Toggle Tabs   ---*/
	$(function (){

		$("#tabs-toggle").click(function(){

			$(this).toggleClass("tabs-toggle-open")
			$("#tabs").toggleClass("tabs-closed")

		});

	});


	/*---   Toggle Tab Lists   ---*/
	$(function (){

		$("#tabs div").click(function(){

			var tab = (this.id);
			var list = $("#list-" + tab);
			var toggle = "list-toggle";

			list.siblings().removeClass(toggle);
			list.toggleClass(toggle);

		});

	});
