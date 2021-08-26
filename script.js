var colors = document.getElementsByClassName("color_show");
var colorName = document.getElementsByClassName("color_name");
var new_pallete = document.getElementById("shuffle");
var color_box = document.getElementsByClassName("color_box");
new_pallete.addEventListener("click", shuffle);
var total = 6;
var string = "0123456789ABCDEF";
var size = ["#", "#", "#", "#", "#", "#"];
//writing colors
function shuffle() {
  document.getElementById("save").style.display = "inline-block";
  document.getElementById("add").style.display = "inline-block";
  size = ["#", "#", "#", "#", "#", "#"];
  for (var i = 0; i <= 5; i++) {
    color_box[i].style.display = "flex";
    for (var j = 0; j <= 5; j++) {
      size[i] = size[i] + string[Math.floor(Math.random() * 16)];
    }
    colors[i].style.backgroundColor = size[i];
    colorName[i].innerHTML = size[i];
  }
  console.log(size);
}

function del_col(index) {
  color_box[index].style.display = "none";
  size[index] = "#";
  console.log(size);
}

function change_col(index) {
  var changed_col = "#";
  for (var j = 0; j <= 5; j++) {
    changed_col = changed_col + string[Math.floor(Math.random() * 16)];
  }
  colors[index].style.backgroundColor = changed_col;
  colorName[index].innerHTML = changed_col;
  size[index] = changed_col;
  console.log(size);
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

  console.log(color_box);
});

function save_data() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "insert.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = () => {
    if (xhr.status === 200) {
      alert("Pallete Saved");
    } else {
      alert("Problem");
    }
  };
  var final_submit = [];
  var j = 0;
  for (var i = 0; i < size.length; i++) {
    if (size[i] != "#") {
      final_submit[j] = size[i];
      j++;
    }
  }

  var data = JSON.stringify(final_submit);

  xhr.send(data);
}
