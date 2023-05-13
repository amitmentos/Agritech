
// Define the data array
var data = [
    { id: 1, date: "05/06/2021", name: "Hanan Igal", avg: "-13%", level: "Low", crop: "Tomato", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 2, date: "19/05/2021", name: "Haim Etgar", avg: "+27%", level: "Medium", crop: "Cotton", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 3, date: "14/05/2021", name: "Ronen Elbaz", avg: "+19%", level: "Medium", crop: "Tomato", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 4, date: "10/05/2021", name: "Rafi Shem-Tov", avg: "+15%", level: "Medium", crop: "Wheat", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 5, date: "01/02/2021", name: "Moshe Haviv", avg: "+31%", level: "High", crop: "Wheat", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 6, date: "22/03/2021", name: "Neta Barak", avg: "-5%", level: "Low", crop: "Potato", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 7, date: "28/04/2021", name: "Avi Kadosh", avg: "+21%", level: "Medium", crop: "Corn", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 8, date: "15/07/2021", name: "Yael Shapira", avg: "+34%", level: "High", crop: "Soybean", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 9, date: "06/08/2021", name: "Elior Peleg", avg: "+8%", level: "Low", crop: "Barley", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 10, date: "25/09/2021", name: "Shiri Cohen", avg: "+24%", level: "Medium", crop: "Rice", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 11, date: "11/10/2021", name: "Yair Levi", avg: "-2%", level: "Low", crop: "Grapes", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" },
    { id: 12, date: "29/12/2021", name: "Omer Katz", avg: "+40%", level: "High", crop: "Almond", summary: "Lorem ipsum dolor sit amet, consectetur adipisicing elit.", details: "Details" }
];

// Function to populate the table with initial data
function populateTable() {
var table = $(".table tbody");

$.each(data, function (i, item) {
  var tr = $("<tr>").addClass(item.level);
  $("<th>").attr("scope", "row").addClass("align-middle").text(item.id).appendTo(tr);
  $("<td>").addClass("align-middle").text(item.date).appendTo(tr);
  $("<td>").addClass("align-middle").text(item.name).appendTo(tr);
  $("<td>").addClass("align-middle responsive-cols").text(item.avg).appendTo(tr);
  $("<td>").addClass("align-middle responsive-cols").text(item.level).appendTo(tr);
  $("<td>").addClass("align-middle responsive-cols").text(item.crop).appendTo(tr);
  $("<td>").addClass("align-middle").text(item.summary).appendTo(tr);
  $("<td>").addClass("align-middle").append($("<a>").addClass("btn btn-link").attr("href", "crop.html").text("Details")).appendTo(tr);
  table.append(tr);
});
}

// Populate the table with initial data
populateTable();


// Event listener for sort buttons
$(document).on("click", ".sort-button", function () {
var column = $(this).data("column");
sortTable(column);
});


// Function to sort the table based on the specified column
function sortTable(column) {
var sortOrder = 1;
var sortIcon = $(this).find("i");

if ($(this).hasClass("asc")) {
sortOrder = -1;
$(this).removeClass("asc").addClass("desc");
sortIcon.removeClass("fa-sort-amount-asc").addClass("fa-sort-amount-desc");
} else {
$(this).removeClass("desc").addClass("asc");
sortIcon.removeClass("fa-sort-amount-desc").addClass("fa-sort-amount-asc");
}

data.sort(function (a, b) {
var valueA = a[column];
var valueB = b[column];

if (column === "date") {
  valueA = new Date(valueA.split("/").reverse().join("/"));
  valueB = new Date(valueB.split("/").reverse().join("/"));
}

if (column === "avg") {
  valueA = parseFloat(valueA);
  valueB = parseFloat(valueB);
}

if (column === "level") {
  var levels = ["Low", "Medium", "High"];
  valueA = levels.indexOf(valueA);
  valueB = levels.indexOf(valueB);
}

if (column === "crop") {
  return valueA.localeCompare(valueB) * sortOrder;
}

if (valueA < valueB) {
  return -1 * sortOrder;
}
if (valueA > valueB) {
  return 1 * sortOrder;
}
return 0;
});

// Clear the table
$(".table tbody").empty();

// Rebuild the table with sorted data
$.each(data, function (i, item) {
var tr = $("<tr>").addClass(item.level);
$("<th>").attr("scope", "row").addClass("align-middle").text(item.id).appendTo(tr);
$("<td>").addClass("align-middle").text(item.date).appendTo(tr);
$("<td>").addClass("align-middle").text(item.name).appendTo(tr);
$("<td>").addClass("align-middle responsive-cols").text(item.avg).appendTo(tr);
$("<td>").addClass("align-middle responsive-cols").text(item.level).appendTo(tr);
$("<td>").addClass("align-middle responsive-cols").text(item.crop).appendTo(tr);
$("<td>").addClass("align-middle").text(item.summary).appendTo(tr);
$("<td>").addClass("align-middle").append($("<a>").addClass("btn btn-link").attr("href", "crop.html").text("Details")).appendTo(tr);
$(".table tbody").append(tr);
});
}





