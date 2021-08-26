var color_box = document.getElementsByClassName("color_box");
var colors = document.getElementsByClassName("color_show");
var colorName = document.getElementsByClassName("color_name");
var returned_array = [];
var colors_array = [];
var string = "0123456789ABCDEF";
var total = 0;
var pallete_number = null;
function view_pallete(pallete_no) {
  pallete_number = pallete_no;
  document.getElementById("add").style.display = "inline-block";
  document.getElementById("save").style.display = "inline-block";
  document.getElementById("back").style.display = "inline-block";
  document.getElementById("navbar").style.display = "flex";
  document.getElementById("navbarTop").style.display = "none";
  document.getElementById("table").style.display = "none";
  document.getElementById("heading").style.display = "none";
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "view1.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = () => {
    if (xhr.status === 200) {
      returned_array = xhr.response;
      console.log(returned_array);
      console.log(returned_array.length);
      if (returned_array != "0") {
        var j = 0;
        for (var i = 0; i < returned_array.length; i++) {
          if (
            returned_array[i] == "[" ||
            returned_array[i] == "]" ||
            returned_array[i] == "," ||
            returned_array[i] == '"'
          ) {
            continue;
          } else {
            for (var k = 0; k <= 6; k++) {
              if (k == 0) {
                colors_array[j] = "#";
                i++;
              } else {
                colors_array[j] += returned_array[i];
                i++;
              }
            }
            j++;
          }
        }
        console.log(colors_array);
        console.log(colors_array.length);
        display(colors_array);
      }
    } else {
      console.log("Problem Occured");
    }
  };
  xhr.send(JSON.stringify(pallete_no));
}

function display(colors_array) {
  for (var i = 0; i < colors_array.length; i++) {
    document.getElementById(
      "collection"
    ).innerHTML += `<div class="color_box" style="display:flex;">
    <div class="color_show">
    </div>
    <div class="color_content">
        <p class="color_name"></p>
        <button id="del${
          i + 1
        }"class="del" onclick=del_col(${i})>Delete</button>
        <button id="change${
          i + 1
        }" class="change" onclick=change_col(${i})>Change</button>
    </div>
    
    </div>`;
    var colors = document.getElementsByClassName("color_show");
    var colorName = document.getElementsByClassName("color_name");
    colors[i].style.backgroundColor = colors_array[i];
    colorName[i].innerHTML = colors_array[i];
    ++total;
  }
}

function del_col(index) {
  color_box[index].style.display = "none";
  colors_array[index] = "#";
  console.log(colors_array);
}
function change_col(index) {
  var changed_col = "#";
  for (var j = 0; j <= 5; j++) {
    changed_col = changed_col + string[Math.floor(Math.random() * 16)];
  }
  colors[index].style.backgroundColor = changed_col;
  colorName[index].innerHTML = changed_col;
  colors_array[index] = changed_col;
  console.log(colors_array);
}

document.getElementById("add").addEventListener("click", () => {
  document.getElementById(
    "collection"
  ).innerHTML += `<div class="color_box" style="display:flex;">
  <div class="color_show">
  </div>
  <div class="color_content">
      <p class="color_name">black</p>
      <button id="del${
        total + 1
      }"class="del" onclick=del_col(${total})>Delete</button>
      <button id="change${
        total + 1
      }" class="change" onclick=change_col(${total})>Change</button>
  </div>
  
  </div>`;
  change_col(total);
  ++total;
});

function save_data() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "view_save.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = () => {
    if (xhr.status === 200) {
      alert("Your pallete has been edited");
      window.location.href = "view.php";
    } else {
      console.log("Problem Occured");
    }
  };
  var final_submit = [];
  var j = 0;
  for (var i = 0; i < colors_array.length; i++) {
    if (colors_array[i] != "#") {
      final_submit[j] = colors_array[i];
      j++;
    }
  }
  var data = { array: final_submit, pallete: pallete_number };
  console.log(data.array);
  xhr.send(JSON.stringify(data));
}
